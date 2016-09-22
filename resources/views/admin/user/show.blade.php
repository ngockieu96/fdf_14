@extends('admin.layouts.master')

@section('head')
    {{ trans('user.detail_user') }}
@endsection

@section('content')
    <div class="panel-body">
        @include('admin.user.show_fields')
        <a href="{!! route('user.index') !!}" class="btn btn-default">{{ trans('user.back') }}</a>
    </div>
@endsection
