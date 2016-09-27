<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $userRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->paginate(config('settings.order_per_page'));

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->userRepository->getListUser();

        return view('admin.order.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->only('user_id', 'price', 'status', 'name', 'phone', 'address', 'email');

        if ($this->orderRepository->create($input)) {
            return redirect()->route('order.index')->with('success', trans('order.create_order_successfully'));
        }

        return redirect()->route('order.index')->with('errors', trans('order.create_order_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);
        $users = $this->userRepository->getListUser();

        if (!$order) {
            return redirect()->route('order.index')->with('errors', trans('order.order_not_found'));
        }

        return view('admin.order.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
         $input = $request->only('user_id', 'price', 'status', 'name', 'phone', 'address', 'email');

        if ($this->orderRepository->update($input, $id)) {
            return redirect()->route('order.index')->with('success', trans('order.update_order_successfully'));
        }

        return redirect()->route('order.index')->with('errors', trans('order.update_order_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
