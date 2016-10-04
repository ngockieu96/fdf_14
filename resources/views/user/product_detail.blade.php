@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('label.list_product') }}</div>
                <div class="panel-body">
                    <div id="result">
                    </div>
                    <div class="form-group col-sm-6">
                        <img class="img-product-detail" src="{{ $product->getImagePath() }}">
                    </div>
                    <div class="form-group col-sm-6 product-detail">
                        <strong> {{ $product->name }} </strong> <i> ({{ $product->showStatus() }}) </i>
                        <br>
                        <i class="statistic"> {{ trans('product.view_count') }}: {{ $product->view_count }} </i>
                        <i class="statistic"> {{ trans('product.rate_count') }}: <span id="rate-count">{{ $product->rate_count }}</span> </i>
                        <i class="statistic"> {{ trans('product.rate_average') }}: <span id="rate-average">{{ $product->rate_average }}</span> </i>
                        <br>
                        <label> {{ trans('product.category') }}: </label>
                        <i>{{ $product->category->name }} </i>
                        <br>
                        <label> {{ trans('product.description') }}: </label>
                        <i> {{ $product->description }} </i>
                        <br>
                        <label> {{ trans('product.price') }}: </label>
                        <i>{{ $product->price }}</i>
                        <br>
                        {!! Form::open(['route' => 'item.store']) !!}
                        <div class="form-group col-sm-4">
                            {!! Form::number('quantity', config('settings.default_quantity'), ['min' => config('settings.min_quantity_product'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::hidden('product_id', $product->id) !!}
                                @if ($isOrdered)
                                    {!! Form::button(trans('label.add_to_cart'), ['type' => 'submit', 'class' => 'btn btn-success glyphicon glyphicon-shopping-cart', 'disabled' => 'disabled']) !!}
                                @else
                                    {!! Form::button(trans('label.add_to_cart'), ['type' => 'submit', 'class' => 'btn btn-success glyphicon glyphicon-shopping-cart']) !!}
                                @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="list-comment">
                            <div id="comments">
                                @if ($product->comments->count())
                                    @foreach ($product->comments as $comment)
                                        <strong> {{ $comment->user->name }} </strong> {{ $comment->created_at->diffForHumans() }}
                                        <br>
                                        {{ $comment->content }}
                                        @if (!$loop->last)
                                            <br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <br>
                            @if (auth()->check())
                                <div class="hide" data-route="{{ url('user/comment') }}"></div>
                                {!! Form::open(['id' => 'formComment']) !!}
                                    @if (!$isRatedProduct)
                                        <div id="list-rating">
                                            {!! Form::label('so_bad',  trans('label.rate.so_bad'), ['class' => 'rate']) !!}
                                            {!! Form::radio('rate', config('settings.rate.so_bad')) !!}
                                            {!! Form::label('bad',  trans('label.rate.bad'), ['class' => 'rate']) !!}
                                            {!! Form::radio('rate', config('settings.rate.bad')) !!}
                                            {!! Form::label('normal',  trans('label.rate.normal'), ['class' => 'rate']) !!}
                                            {!! Form::radio('rate', config('settings.rate.normal')) !!}
                                            {!! Form::label('good',  trans('label.rate.good'), ['class' => 'rate']) !!}
                                            {!! Form::radio('rate', config('settings.rate.good')) !!}
                                            {!! Form::label('excellent',  trans('label.rate.excellent'), ['class' => 'rate']) !!}
                                            {!! Form::radio('rate', config('settings.rate.excellent')) !!}
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        {!! Form::textarea('content', null, [
                                            'class' => 'form-control',
                                            'placeholder' => trans('label.comment_placeholder'),
                                            'rows' => config('settings.content_rows'),
                                            'id' => 'content'. $product->id,
                                            ])
                                        !!}
                                    </div>
                                    <div class="col-md-8" data-product-id="{{ $product->id }}">
                                        {!! Form::button(trans('label.comment'), ['class' => 'btn btn-success addComment']) !!}
                                    </div>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
