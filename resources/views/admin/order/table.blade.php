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
        <th>{{ trans('order.action') }}</th>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->price }}</td>
            <td>
                <span class="label label-primary">
                    {{ $order->showStatus() }}
                </span>
            </td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                {!! Form::open(['route' => ['order.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('order.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('order.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('label.confirm_delete') . '")']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
