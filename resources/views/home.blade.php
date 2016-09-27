@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('label.list_product') }}</div>
                <div class="panel-body">
                    <div class="list-product">
                        @if ($products->count())
                            @foreach ($products as $product)
                                <div class="form-group col-sm-6">
                                    <strong> {{ $product->name }} </strong> <i> ({{ $product->showStatus() }}) </i>
                                    <br>
                                    <i class="statistic"> {{ trans('product.view_count') }}: {{ $product->view_count }} </i>
                                    <i class="statistic"> {{ trans('product.rate_count') }}: {{ $product->rate_count }} </i>
                                    <i class="statistic"> {{ trans('product.rate_average') }}: {{ $product->rate_average }} </i>
                                    <br><br>
                                    <img class="img-product" src="{{ $product->getImagePath() }}">
                                    <br>
                                    <a class="btn btn-infor" href="{{ URL::action('User\ProductController@show', ['id' => $product->id]) }}">{{ trans('label.view_details') }}</a>
                                </div>
                            @endforeach
                        @else
                            <div class="form-group col-sm-6">
                                {{ trans('label.product_not_found') }}
                            </div>
                        @endif
                    </div>
                </div>
                {!! $products->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
