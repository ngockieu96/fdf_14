<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('user.id') }}</th>
        <th>{{ trans('user.name') }}</th>
        <th>{{ trans('user.email') }}</th>
        <th>{{ trans('user.phone') }}</th>
        <th>{{ trans('user.address') }}</th>
        <th>{{ trans('user.role') }}</th>
        <th>{{ trans('user.avatar') }}</th>
        <th>{{ trans('user.action') }}</th>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->role ? trans('user.admin') : trans('user.user') }} </td>
            <td><img src="{{  $user->getAvatarPath() }}" class="img-admin"></span></td>
            <td>
                <div class='btn-group'>
                    @if (auth()->user()->id == $user->id || !$user->isAdmin())
                        <a href="{!! route('user.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
