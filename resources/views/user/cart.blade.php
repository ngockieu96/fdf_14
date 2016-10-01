@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('cart.cart') }}</div>
                <div class="panel-body">
                    <div id="result">
                    </div>
                    <table class="table table-responsive" id="users-table">
                    @if (isset($orderedProduct))
                        <a href="{!! route('item.index') !!}" class="btn btn-default"> {{ trans('cart.empty_cart') }} </a>
                            <thead>
                                <th>{{ trans('cart.product_name') }}</th>
                                <th>{{ trans('cart.price') }}</th>
                                <th>{{ trans('cart.quantity') }}</th>
                                <th>{{ trans('cart.sub_total') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($orderedProduct as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $listQuantity[$product->id] }}</td>
                                    <td>{{ $listQuantity[$product->id] * $product->price }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td>
                                        <a href="{!! URL::action('User\OrderController@create') !!}" class='btn btn-success'>
                                            <span class='glyphicon glyphicon-shopping-cart'></span>{{ trans('cart.checkout') }}
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        {{ trans('cart.cart_empty') }}
                        <a href="{!! URL::action('HomeController@index') !!}">{{ trans('cart.back_to_home') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
