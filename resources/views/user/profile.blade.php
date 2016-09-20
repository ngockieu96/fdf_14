@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('label.profile') }}</div>
                <div class="panel-body">
                    @include('errors.errors')

                    {{ Form::model($currentUser, ['method' => 'PATCH', 'route' => ['profile.update', $currentUser->id], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) }}
                        <img class="edit-profile" id="output" src="{{ asset($currentUser->getAvatarPath()) }}"/>

                        <div class="form-group">
                            {{ Form::label('avatar', trans('label.avatar'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::file('avatar') }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('name', trans('label.name'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', $currentUser->name, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', trans('label.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', $currentUser->email, ['class' => 'form-control', 'name' => 'email']) }}
                             </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', trans('label.phone'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('phone', $currentUser->phone, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', trans('label.address'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('address', $currentUser->address, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', trans('label.password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control', 'name' => 'password']) }}
                             </div>
                        </div>

                        <div class="form-group">
                        {{ Form::label('email', trans('label.confirm_password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control', 'name' => 'password_confirmation']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> {{ trans('label.edit') }}
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
