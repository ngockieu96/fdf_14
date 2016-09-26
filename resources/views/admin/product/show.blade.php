@extends('admin.layouts.master')

@section('head')
    {{ trans('product.detail_product') }}
@endsection

@section('content')
    <div class="panel-body">
        @include('admin.product.show_fields')
        <a href="{!! route('product.index') !!}" class="btn btn-default">{{ trans('product.back') }}</a>
    </div>
@endsection
