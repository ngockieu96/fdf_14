@extends('admin.layouts.master')

@section('head')
    {{ trans('category.list_category') }}
@endsection

@section('content')
    <a class="btn btn-primary pull-right" href="{!! route('category.create') !!}">{{ trans('category.add_category') }}</a>
    <div class="panel-body">
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.category.table')
            </div>
        </div>
        {!! $categories->render(); !!}
    </div>
@endsection
