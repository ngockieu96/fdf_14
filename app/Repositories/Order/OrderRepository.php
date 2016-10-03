<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getOrderHistory()
    {
        $currentId = auth()->user()->id;

        return $this->model->where('user_id', $currentId)->orderBy('created_at', 'DESC')->paginate(config('settings.order_per_page'));
    }

    public function findOrderById($id)
    {
        return $this->model->with('items.product')->find($id);
    }
}
