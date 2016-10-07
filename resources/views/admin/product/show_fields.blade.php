<div class="form-group  col-sm-6">
    {!! Form::label('id', trans('product.id')) !!}
    <p>{!! $product->id !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('product.name')) !!}
    <p> {!! $product->name !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', trans('product.category')) !!}
    <p> {!! $product->category->name !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', trans('product.description')) !!}
    <p> {!! $product->description !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('quantity', trans('product.quantity')) !!}
    <p> {!! $product->quantity !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', trans('product.price')) !!}
    <p> {!! $product->price !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', trans('product.status')) !!}
        <span class="label {{ $product->status ? 'label-success' : 'label-danger' }}">
            {{ $product->showStatus() }}
        </span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('rate_count', trans('product.rate_count')) !!}
    <p> {!! $product->rate_count !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('rate_average', trans('product.rate_average')) !!}
    <p> {!! $product->rate_average !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('view_count', trans('product.view_count')) !!}
    <p> {!! $product->view_count !!} </p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', trans('product.image')) !!}
    <p><img src="{{ $product->getImagePath() }}" class="img-product"></p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('product.created_at')) !!}
    <p>{!! $product->created_at !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('product.updated_at')) !!}
    <p>{!! $product->updated_at !!}</p>
</div>
