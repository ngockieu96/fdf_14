@extends('admin.layouts.master')

@section('head')
    {{ trans('user.edit_user') }}
@endsection

@section('content')
    <div class="panel-body">
        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'files' => true]) }}

            @include('admin.user.fields')

        {!! Form::close() !!}
    </div>
@endsection
