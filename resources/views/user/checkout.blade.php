@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('order.order_items') }}</div>
                    <div class="panel-body">
                        <table class="table table-responsive" id="users-table">
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
                                    <td>{{ $listSubTotal[$product->id] }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td> <strong>{{ trans('cart.total_cost') }}</strong> </td>
                                    <td> </td>
                                    <td> <strong>{{ $totalQuantity }}</strong> </td>
                                    <td> <strong>{{ $totalMoney }}</strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <strong>{{ trans('order.billing_information') }}</strong>
                <br><br>
                @include('errors.errors')
                {!! Form::open(['route' => 'orders.store']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', trans('user.name')) !!}
                        {!! Form::text('name', $currentUser->name, ['class' => 'form-control']) !!}
                        {!! Form::hidden('totalMoney', $totalMoney) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', trans('user.email')) !!}
                        {!! Form::text('email', $currentUser->email, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', trans('user.phone')) !!}
                        {!! Form::text('phone', $currentUser->phone, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('address', trans('user.address')) !!}
                        {!! Form::text('address', $currentUser->address, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        <a href="{!! URL::action('User\CartController@index') !!}" class="btn btn-info">{{ trans('order.back_to_cart') }}</a>
                        {!! Form::submit(trans('order.confirm_order'), ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
