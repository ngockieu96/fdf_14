<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('category.id') }}</th>
        <th>{{ trans('category.name') }}</th>
        <th>{{ trans('category.description') }}</th>
        <th>{{ trans('category.action') }}</th>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('category.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('label.confirm_delete') . '")']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
