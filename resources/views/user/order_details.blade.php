@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">{{ trans('order.order_summary') }}</div>
                <div class="panel-body">
                    <table class="table table-responsive" id="users-table">
                        <tbody>
                            <tr>
                                <td><strong>{{ trans('order.transaction_date') }}</strong></td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.name') }}</strong></td>
                                <td>{{ $order->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.email') }}</strong></td>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.address') }}</strong></td>
                                <td>{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.phone') }}</strong></td>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.total') }}</strong></td>
                                <td>{{ $order->price }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('order.status') }}</strong></td>
                                <td>{{ $order->showStatus() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-heading">{{ trans('order.order_items') }}</div>
                    <div class="panel-body">
                        <table class="table table-responsive" id="users-table">
                            <thead>
                                <th>{{ trans('order.product_name') }}</th>
                                <th>{{ trans('order.price') }}</th>
                                <th>{{ trans('order.quantity') }}</th>
                                <th>{{ trans('order.sub_total') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ URL::previous() }}" class="btn btn-default">{{ trans('product.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
