<div class="form-group  col-sm-6">
    {!! Form::label('id', trans('order.id')) !!}
    <p>{!! $order->id !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('orderer', trans('order.orderer')) !!}
    <p>{!! $order->user->name !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', trans('order.price')) !!}
    <p>{!! $order->price !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', trans('order.status')) !!}
    <p>{!! $order->showStatus() !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('order.name')) !!}
    <p>{!! $order->name !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('order.email')) !!}
    <p>{!! $order->email !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('order.phone')) !!}
    <p>{!! $order->phone !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', trans('order.address')) !!}
    <p>{!! $order->address !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('order.created_at')) !!}
    <p>{!! $order->created_at !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('order.updated_at')) !!}
    <p>{!! $order->updated_at !!}</p>
</div>
