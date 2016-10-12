@extends('admin.layouts.master')

@section('head')
    {{ trans('suggestion.list_suggestion') }}
@endsection

@section('content')
    <div class="panel-body">
        <a class="btn btn-primary pull-right" href="{!! route('admin-suggestion.create') !!}">
            {{ trans('suggestion.add_suggestion') }}
        </a>
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.errors')
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.suggestion.table')
            </div>
        </div>
        {!! $suggestions->render(); !!}
    </div>
@endsection
