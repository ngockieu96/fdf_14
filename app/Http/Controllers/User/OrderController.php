<?php

namespace App\Http\Controllers\User;

use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateInformationShippingRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;

class OrderController extends Controller
{

    protected $orderRepository;
    protected $productRepository;
    protected $itemRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository,
        ItemRepositoryInterface $itemRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->itemRepository = $itemRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getOrderHistory();

        return view('user.orders', compact('orders'));
    }

    public function create()
    {
        if (Session::has('listItem')) {
            $listItem = Session::get('listItem');
            $totalQuantity = config('settings.default_value');
            foreach ($listItem as $item) {
                $listProductId[] = $item['product_id'];
                $listQuantity[$item['product_id']] = $item['quantity'];
                $totalQuantity += $item['quantity'];
            }
            $orderedProduct = $this->productRepository->getListProductByListIds($listProductId);
            $totalMoney = config('settings.default_value');
            foreach ($orderedProduct as $product) {
                $listSubTotal[$product->id] = $product->price * $listQuantity[$product->id];
                $totalMoney += $listSubTotal[$product->id];
            }
            $currentUser = auth()->user();

            return view('user.checkout', compact('orderedProduct', 'listQuantity', 'totalMoney', 'currentUser', 'totalQuantity', 'listSubTotal'));
        }
    }

    public function show($id)
    {
        $order = $this->orderRepository->findOrderById($id);

        return view('user.order_details', compact('order'));
    }

    public function store(CreateInformationShippingRequest $request)
    {
        $inputs = $request->only('name', 'email', 'address', 'phone', 'totalMoney');
        $currentOrder = [
            'user_id' => auth()->user()->id,
            'price' => $inputs['totalMoney'],
            'status' => config('settings.default_status'),
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'address' => $inputs['address'],
            'phone' => $inputs['phone'],
        ];

        try {
            DB::beginTransaction();
            $order = $this->orderRepository->create($currentOrder);

            if (!$order) {
                throw new Exception(trans('message.create_error'));
            } else {
                $listItem = Session::get('listItem');
                $listPriceOfProducts = $this->productRepository->getListPriceOfProducts();
                foreach ($listItem as $item) {
                    $items[] = [
                        'product_id' => $item['product_id'],
                        'order_id' => $order->id,
                        'quantity' => $item['quantity'],
                        'price' => $listPriceOfProducts[$item['product_id']] * $item['quantity'],
                    ];
                }
                $this->itemRepository->insert($items);
            }

            DB::commit();
            Session::forget(['listItem', 'countItem']);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->action('HomeController@index');
    }
}
