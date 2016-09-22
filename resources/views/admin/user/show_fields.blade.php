<div class="form-group col-sm-6">
    {!! Form::label('id', trans('user.id')) !!}
    <p>{!! $user->id !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    <p>{!! $user->name !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    <p>{!! $user->email !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('role', trans('user.role')) !!}
    <p>{!! !$user->role ? trans('user.user') : trans('user.admin') !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('user.phone')) !!}
    <p>{!! $user->phone !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', trans('user.address')) !!}
    <p>{!! $user->address !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('user.avatar')) !!}
    <p><img src="{!! $user->getAvatarPath() !!}" class="img-admin"></p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('user.created_at')) !!}
    <p>{!! $user->created_at !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('user.updated_at')) !!}
    <p>{!! $user->updated_at !!}</p>
</div>
