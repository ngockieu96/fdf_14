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
                <div class='btn-group'>
                    <a href="{!! route('category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
