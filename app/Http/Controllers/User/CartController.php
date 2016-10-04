<?php

namespace App\Http\Controllers\User;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;

class CartController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        if (Session::has('listItem')) {
            $listItem = Session::get('listItem');
            foreach ($listItem as $item) {
                $listProductId[] = $item['product_id'];
                $listQuantity[$item['product_id']] = $item['quantity'];
            }
            $orderedProduct = $this->productRepository->getListProductByListIds($listProductId);
            $totalCost = $this->productRepository->getTotalCost($listItem);

            return view('user.cart', compact('orderedProduct', 'listQuantity', 'totalCost'));
        } else {
            return view('user.cart');
        }
    }

    public function update($id, Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only('product_id', 'quantity');
            $result = [
                'success' => false,
                'message' => trans('cart.update_cart_fail'),
            ];

            try {
                if (Session::has('listItem')) {
                    $listItem = Session::get('listItem');
                    foreach ($listItem as $key => $item) {
                        if ($item['product_id'] == $data['product_id']) {
                            $listItem[$key]['quantity'] = $data['quantity'];
                        }
                    }
                    $totalCost = $this->productRepository->getTotalCost($listItem);
                    Session::put('listItem', $listItem);
                    $result = [
                        'success' => true,
                        'message' => trans('cart.update_cart_successfully'),
                        'total_cost' => $totalCost,
                    ];
                }
            } catch (Exception $e) {
                return response()->json($result);
            }

            return response()->json($result);
        }
    }

    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only('product_id');
            $result = [
                'success' => false,
                'message' => trans('cart.remove_from_cart_fail'),
            ];

            try {
                if (Session::has('listItem')) {
                    $listItem = Session::get('listItem');
                    foreach ($listItem as $key => $value) {
                        if ($value['product_id'] == $data['product_id']) {
                            unset($listItem[$key]);
                            break;
                        }
                    }
                    Session::put('listItem', $listItem);
                    $result = [
                        'success' => true,
                        'message' => trans('cart.remove_from_cart_successfully'),
                    ];

                    if (!count($listItem)) {
                        Session::forget(['listItem', 'countItem']);
                        $result['isEmptyCart'] = true;
                    } else {
                        $totalCost = $this->productRepository->getTotalCost($listItem);
                        $result['total_cost'] = $totalCost;
                        $result['isEmptyCart'] = false;
                    }
                }
            } catch (Exception $e) {
                return response()->json($result);
            }

            return response()->json($result);
        }
    }
}
