@extends('admin.layouts.master')

@section('head')
    {{ trans('product.list_product') }}
@endsection

@section('content')
    <a class="btn btn-primary pull-right" href="{!! route('product.create') !!}">{{ trans('product.add_product') }}</a>
    <div class="panel-body">
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.product.table')
            </div>
        </div>
        {!! $products->render(); !!}
    </div>
@endsection
