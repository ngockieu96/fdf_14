<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('order.id') }}</th>
        <th>{{ trans('order.orderer') }}</th>
        <th>{{ trans('order.price') }}</th>
        <th>{{ trans('order.status') }}</th>
        <th>{{ trans('order.name') }}</th>
        <th>{{ trans('order.email') }}</th>
        <th>{{ trans('order.phone') }}</th>
        <th>{{ trans('order.address') }}</th>
        <th>{{ trans('order.date') }}</th>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->isPaid() ? trans('order.paid') : ($order->isUnpaid() ? trans('order.unpaid') : trans('order.cancel')) }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
