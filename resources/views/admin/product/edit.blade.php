@extends('admin.layouts.master')

@section('head')
    {{ trans('product.edit_product') }}
@endsection

@section('content')
    <div class="panel-body">
        {{ Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PUT', 'files' => true]) }}

            @include('admin.product.fields')

        {!! Form::close() !!}
    </div>
@endsection
