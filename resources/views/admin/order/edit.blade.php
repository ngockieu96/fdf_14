@extends('admin.layouts.master')

@section('head')
    {{ trans('order.edit_order') }}
@endsection

@section('content')
    <div class="panel-body">
        {{ Form::model($order, ['route' => ['order.update', $order->id], 'method' => 'PUT', 'files' => true]) }}

            @include('admin.order.fields')

        {!! Form::close() !!}
    </div>
@endsection
