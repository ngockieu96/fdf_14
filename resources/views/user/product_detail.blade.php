@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('label.list_product') }}</div>
                <div class="panel-body">
                    <div class="form-group col-sm-6">
                        <img class="img-product-detail" src="{{ $product->getImagePath() }}">
                    </div>
                    <div class="form-group col-sm-6 product-detail">
                        <strong> {{ $product->name }} </strong> <i> ({{ $product->showStatus() }}) </i>
                        <br>
                        <i class="statistic"> {{ trans('product.view_count') }}: {{ $product->view_count }} </i>
                        <i class="statistic"> {{ trans('product.rate_count') }}: {{ $product->rate_count }} </i>
                        <i class="statistic"> {{ trans('product.rate_average') }}: {{ $product->rate_average }} </i>
                        <br>
                        <label> {{ trans('product.category') }}: </label>
                        <i>{{ $product->category->name }} </i>
                        <br>
                        <label> {{ trans('product.description') }}: </label>
                        <i> {{ $product->description }} </i>
                        <br>
                        <label> {{ trans('product.price') }}: </label>
                        <i>{{ $product->price }}</i>
                        <br>
                        <label> {{ trans('product.quantity') }}:</label>
                        <i>{{ $product->quantity }}</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
