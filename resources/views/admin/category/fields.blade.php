@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('category.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', trans('category.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('category.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('category.index') !!}" class="btn btn-default">{{ trans('category.back') }}</a>
</div>
