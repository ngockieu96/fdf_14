@extends('admin.layouts.master')

@section('head')
    {{ trans('product.add_product') }}
@endsection

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'product.store', 'files' => true]) !!}

            @include('admin.product.fields')

        {!! Form::close() !!}
    </div>
@endsection
