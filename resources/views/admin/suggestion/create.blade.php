@extends('admin.layouts.master')

@section('head')
    {{ trans('suggestion.add_suggestion') }}
@endsection

@section('content')
    <div class="panel-body">
        {!! Form::open(['route' => 'admin-suggestion.store', 'files' => true]) !!}

            @include('admin.suggestion.fields')

        {!! Form::close() !!}
    </div>
@endsection
