<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('suggestion.id') }}</th>
        <th>{{ trans('suggestion.name') }}</th>
        <th>{{ trans('suggestion.category') }}</th>
        <th>{{ trans('suggestion.description') }}</th>
        <th>{{ trans('suggestion.image') }}</th>
        <th>{{ trans('category.action') }}</th>
    </thead>
    <tbody>
    @foreach ($suggestions as $suggestion)
        <tr>
            <td>{{ $suggestion->id }}</td>
            <td>{{ $suggestion->name }}</td>
            <td>{{ $suggestion->category->name }}</td>
            <td>{{ $suggestion->description }}</td>
            <td><img src="{{ $suggestion->getImagePath() }}" class="img-admin"></td>
            <td>
                {!! Form::open(['route' => ['admin-suggestion.destroy', $suggestion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin-suggestion.show', [$suggestion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin-suggestion.edit', [$suggestion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('label.confirm_delete') . '")']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
