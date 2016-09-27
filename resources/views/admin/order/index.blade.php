@extends('admin.layouts.master')

@section('head')
    {{ trans('order.list_order') }}
@endsection

@section('content')
    <a class="btn btn-primary pull-right" href="{!! route('order.create') !!}">{{ trans('order.add_order') }}</a>
    <div class="panel-body">
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.order.table')
            </div>
        </div>
        {!! $orders->render(); !!}
    </div>
@endsection
