@extends('admin.layouts.master')

@section('head')
    {{ trans('category.add_category') }}
@endsection

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'category.store']) !!}

            @include('admin.category.fields')

        {!! Form::close() !!}
    </div>
@endsection
