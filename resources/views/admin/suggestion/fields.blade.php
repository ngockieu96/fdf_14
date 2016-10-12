@include('errors.errors')

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('suggestion.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', trans('suggestion.category')) !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', trans('suggestion.description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', trans('suggestion.image')) !!}
    {!! Form::file('image') !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('suggestion.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin-suggestion.index') !!}" class="btn btn-default">{{ trans('suggestion.back') }}</a>
</div>
