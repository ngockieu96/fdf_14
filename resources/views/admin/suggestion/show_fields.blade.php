<div class="form-group  col-sm-12">
    {!! Form::label('id', trans('suggestion.id')) !!}
    <p class="form-control-static">{!! $suggestion->id !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('name', trans('suggestion.name')) !!}
    <p class="form-control-static"> {!! $suggestion->name !!} </p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('category_id', trans('suggestion.category')) !!}
    <p class="form-control-static"> {!! $suggestion->category->name !!} </p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', trans('suggestion.description')) !!}
    <p class="form-control-static"> {!! $suggestion->description !!} </p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('image', trans('suggestion.image')) !!}
    <p><img src="{{ $suggestion->getImagePath() }}" class="img-admin"></p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('created_at', trans('suggestion.created_at')) !!}
    <p class="form-control-static">{!! $suggestion->created_at !!}</p>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('updated_at', trans('suggestion.updated_at')) !!}
    <p class="form-control-static">{!! $suggestion->updated_at !!}</p>
</div>
