@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('label.register') !!}</div>
                <div class="panel-body">
                    @include('errors.errors')
                    {{ Form::open(['url' => '/register', 'class' => 'form-horizontal', 'files' => true]) }}

                        <div class="form-group">
                            {{ Form::label('avatar', trans('label.avatar'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::file('avatar', null, ['class'=>'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('name', trans('label.name'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', trans('label.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', trans('label.phone'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('phone', old('phone'), ['id' => 'phone', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', trans('label.address'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('address', old('address'), ['id' => 'address', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', trans('label.password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password-confirm', trans('label.confirm_password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">

                                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::button('<i class="fa fa-btn fa-user"></i>' . trans('label.register'), ['type' => 'submit', 'class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
