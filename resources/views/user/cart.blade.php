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
                                <th>{{ trans('cart.action') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($orderedProduct as $product)
                                <div class="hide" data-route-result = "cart"
                                    data-confirm-remove = "{{ trans('cart.confirm_remove_product_from_cart') }}">
                                </div>
                                <tr id={{ 'row' . $product->id }}>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <div class="col-md-6">
                                            {!! Form::number('quantity', $listQuantity[$product->id], ['min' => config('settings.min_quantity_order'), 'max' => $product->quantity, 'class' => 'form-control', 'id' => 'quantity' . $product->id]) !!}
                                        </div>
                                        <div class="col-md-6" data-product-id="{{ $product->id }}" data-price="{{ $product->price }}">
                                            {!! Form::button(trans('cart.update'), ['class' => 'form-control updateCart']) !!}
                                        </div>
                                    </td>
                                    <td id="sub-total{{ $product->id }}">{{ $listQuantity[$product->id] * $product->price }}</td>
                                    <td>
                                        <div data-product-id="{{ $product->id }}">
                                            {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ' . trans('cart.remove_from_cart'), ['class' => 'btn btn-danger removeCart'])!!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td><strong>{{ trans('cart.total_cost') }}</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td id="total-cost">{{ $totalCost }}</td>
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
