@extends('admin.layouts.master')

@section('head')
    {{ trans('user.add_user') }}
@endsection

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'user.store', 'files' => true]) !!}

            @include('admin.user.fields')

        {!! Form::close() !!}
    </div>
@endsection
