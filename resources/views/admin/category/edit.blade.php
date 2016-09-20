@extends('admin.layouts.master')

@section('head')
    {{ trans('category.edit_category') }}
@endsection

@section('content')
    <div class="panel-body">
        {{ Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT', 'files' => true]) }}

            @include('admin.category.fields')

        {!! Form::close() !!}
    </div>
@endsection
