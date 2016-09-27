@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('orderer', trans('order.orderer')) !!}
     {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', trans('product.price')) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => config('settings.step_of_price'), 'min' => config('settings.min_price_product')]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', trans('order.status')) !!}
    {!! Form::select('status', config('settings.order.status'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('order.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('order.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('order.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', trans('order.address')) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('order.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('order.index') !!}" class="btn btn-default">{{ trans('order.back') }}</a>
</div>
