@extends('admin.layouts.master')

@section('head')
    {{ trans('suggestion.edit_suggestion') }}
@endsection

@section('content')
    <div class="panel-body">
        {{ Form::model($suggestion, ['route' => ['admin-suggestion.update', $suggestion->id], 'method' => 'PUT', 'files' => true]) }}

            @include('admin.suggestion.fields')

        {!! Form::close() !!}
    </div>
@endsection
