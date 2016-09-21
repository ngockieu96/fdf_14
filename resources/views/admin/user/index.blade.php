@extends('admin.layouts.master')

@section('head')
    {{ trans('user.list_user') }}
@endsection

@section('content')
     <a class="btn btn-primary pull-right" href="{!! route('user.create') !!}">{{ trans('user.add_user') }}</a>
    <div class="panel-body">
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.user.table')
            </div>
        </div>
        {!! $users->render(); !!}
    </div>
@endsection
