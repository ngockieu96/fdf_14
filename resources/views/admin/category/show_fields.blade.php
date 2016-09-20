<div class="form-group col-sm-12">
    {!! Form::label('id', trans('category.id')) !!}
    <p>{!! $category->id !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', trans('category.name')) !!}
    <p>{!! $category->name !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', trans('category.description')) !!}
    <p>{!! $category->description !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('created_at', trans('category.created_at')) !!}
    <p>{!! $category->created_at !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('updated_at', trans('category.updated_at')) !!}
    <p>{!! $category->updated_at !!}</p>
</div>
