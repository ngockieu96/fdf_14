@extends('admin.layouts.master')

@section('head')
    {{ trans('suggestion.detail_suggestion') }}
@endsection

@section('content')
    <div class="panel-body">
        @include('admin.suggestion.show_fields')
        <a href="{!! route('admin-suggestion.index') !!}" class="btn btn-default">{{ trans('suggestion.back') }}</a>
    </div>
@endsection
