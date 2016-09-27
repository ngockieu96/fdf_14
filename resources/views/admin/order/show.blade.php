@extends('admin.layouts.master')

@section('head')
    {{ trans('order.detail_order') }}
@endsection

@section('content')
    <div class="panel-body">
        @include('admin.order.show_fields')
        <a href="{!! route('order.index') !!}" class="btn btn-default">{{ trans('order.back') }}</a>
    </div>
@endsection
