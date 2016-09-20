@extends('admin.layouts.master')

@section('head')
    {{ trans('category.detail_category') }}
@endsection

@section('content')
    <div class="panel-body">
        @include('admin.category.show_fields')
        <a href="{!! route('category.index') !!}" class="btn btn-default">{{ trans('category.back') }}</a>
    </div>
@endsection
