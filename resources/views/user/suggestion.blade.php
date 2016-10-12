@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('suggestion.suggestion') }}</div>
                <div class="panel-body">
                    @include('errors.errors')
                    {!! Form::open(['route' => 'user-suggestion.store', 'files' => true]) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('category_id', trans('suggestion.category')) !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('name', trans('suggestion.name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('description', trans('suggestion.description')) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('image', trans('suggestion.image')) !!}
                            {!! Form::file('image') !!}
                        </div>

                        <div class="form-group col-sm-12">
                            <a href="{{ URL::previous() }}" class="btn btn-default">
                                {{ trans('product.back') }}
                            </a>
                            {!! Form::submit(trans('suggestion.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
