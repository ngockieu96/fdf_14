@extends('admin.layouts.master')

@section('head')
    {{ trans('order.add_order') }}
@endsection

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'order.store']) !!}

            @include('admin.order.fields')

        {!! Form::close() !!}
    </div>
@endsection
