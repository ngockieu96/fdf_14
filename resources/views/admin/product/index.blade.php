@extends('admin.layouts.master')

@section('head')
    {{ trans('product.list_product') }}
@endsection

@section('content')
    <div class="panel-body">
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.product.table')
            </div>
        </div>
        {!! $products->render(); !!}
    </div>
@endsection
