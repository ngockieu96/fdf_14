@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('order.history_orders') }}</div>
                <div class="panel-body">
                    @if ($orders->count())
                        <table class="table table-responsive" id="users-table">
                            <thead>
                                <th>{{ trans('order.no') }}</th>
                                <th>{{ trans('order.transaction_date') }}</th>
                                <th>{{ trans('order.total') }}</th>
                                <th>{{ trans('order.status') }}</th>
                                <th>{{ trans('order.action') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                        <span class="label label-primary">
                                            {{ $order->showStatus() }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-info'>
                                            <span class='glyphicon glyphicon-list-alt'>
                                                {{ trans('order.view_details') }}
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->render() !!}
                    @else
                        {{ trans('order.order_not_found') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
