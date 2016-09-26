@extends('admin.layouts.master')

@section('head')
    {{ trans('order.list_order') }}
@endsection

@section('content')
    <div class="panel-body">
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.order.table')
            </div>
        </div>
        {!! $orders->render(); !!}
    </div>
@endsection
