@include('errors.errors')

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('product.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', trans('product.category')) !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', trans('product.description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('quantity', trans('product.quantity')) !!}
    {!! Form::number('quantity', null, ['class' => 'form-control', 'min' => config('settings.min_quantity_product')]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', trans('product.price')) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => config('settings.step_of_price'), 'min' => config('settings.min_price_product')]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', trans('product.status')) !!}
    {!! Form::select('status', config('settings.product.status'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', trans('product.image')) !!}
    {!! Form::file('image') !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('product.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('product.index') !!}" class="btn btn-default">{{ trans('product.back') }}</a>
</div>
