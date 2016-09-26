<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('product.id') }}</th>
        <th>{{ trans('product.name') }}</th>
        <th>{{ trans('product.category') }}</th>
        <th>{{ trans('product.description') }}</th>
        <th>{{ trans('product.image') }}</th>
        <th>{{ trans('product.price') }}</th>
        <th>{{ trans('product.quantity') }}</th>
        <th>{{ trans('product.status') }}</th>
        <th>{{ trans('product.rate_average') }}</th>
        <th>{{ trans('product.rate_count') }}</th>
        <th>{{ trans('product.view_count') }}</th>
        <th>{{ trans('category.action') }}</th>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{  $product->getImagePath() }}" class="img-product"></span></td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status ? trans('product.active') : trans('product.disable') }}</td>
            <td>{{ empty($product->rate_average) ? config('settings.default_rate_average') : $product->rate_average }}</td>
            <td>{{ empty($product->rate_count) ? config('settings.default_rate_count') : $product->rate_count }}</td>
            <td>{{ empty($product->view_count) ? config('settings.default_view_count') : $product->view_count }}</td>
            <td>
                {!! Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('product.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('product.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('label.confirm_delete') . '")']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
