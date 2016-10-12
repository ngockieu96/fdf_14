@extends('layouts.app')
@section('meta')
    <meta property="og:url" content="{{ action('User\ProductController@show',
    ['id' => $product->id]) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" ontent="{{ $product->name }}" />
    <meta property="og:description" content="{{ $product->description }}?" />
    <meta property="og:image" content="{{ $product->image }}" />
@endsection

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
                        <strong> {{ $product->name }} </strong>
                        <span class="label {{ $product->status ? 'label-success' : 'label-danger' }}">
                            {{ $product->showStatus() }}
                        </span>
                        <br>
                        <label class="statistic">
                            <span class="label label-primary">
                                {{ trans('product.view_count') }} {{ $product->view_count }}
                            </span>
                        </label>
                        <label class="statistic">
                            <span class="label label-primary">
                                {{ trans('product.rate_count') }} <span id="rate-count">{{ $product->rate_count }}</span>
                            </span>
                        </label>
                        <label class="statistic">
                            <span class="label label-primary">
                                {{ trans('product.rate_average') }} <span id="rate-average">{{ $product->rate_average }}</span>
                            </span>
                        </label>
                        <br>
                        <label> {{ trans('product.category') }} </label>
                        <i>{{ $product->category->name }} </i>
                        <br>
                        <label> {{ trans('product.description') }} </label>
                        <i> {{ $product->description }} </i>
                        <br>
                        <label> {{ trans('product.price') }} </label>
                        <i>{{ $product->price }}</i>
                        <br>
                        <label> {{ trans('product.quantity') }} </label>
                        <i>{{ $product->quantity }}</i>
                        <br>
                        @if ($product->quantity && $product->status)
                            {!! Form::open(['route' => 'item.store']) !!}
                            <div class="form-group col-sm-4">
                                {!! Form::number('quantity', config('settings.default_quantity'), ['min' => config('settings.min_quantity_product'), 'max' => $product->quantity, 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-4">
                                {!! Form::hidden('product_id', $product->id) !!}
                                    @if ($isOrdered)
                                        {!! Form::button(trans('label.add_to_cart'), ['type' => 'submit', 'class' => 'btn btn-success glyphicon glyphicon-shopping-cart', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::button(trans('label.add_to_cart'), ['class' => 'btn btn-success glyphicon glyphicon-shopping-cart add-to-cart']) !!}
                                    @endif
                            </div>
                            {!! Form::close() !!}
                        @endif
                        <div class="form-group col-sm-12">
                            <div class="fb-like"
                                data-href="{{ action('User\ProductController@show',
                                    ['id' => $product->id]) }}"
                                data-layout="standard" data-action="like"
                                data-size="small" data-show-faces="true"
                                data-share="true">
                            </div>
                    </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="list-comment">
                            <div class="fb-comments"
                                data-href="{{ action('User\ProductController@show', ['id' => $product->id]) }}" data-width="100%">
                            </div>
                            <br><br>
                            <div id="comments">
                                @if ($product->comments->count())
                                    @foreach ($product->comments as $comment)
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <img src="{{ $comment->user->getAvatarPath() }}" class="img-comment">
                                            </div>
                                            <div class="col-md-11">
                                                <strong> {{ $comment->user->name }} </strong> {{ $comment->created_at->diffForHumans() }}
                                                <br>
                                                {{ $comment->content }}
                                                <br><br>
                                            </div>
                                        <br>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <br>
                            @if (auth()->check())
                                <div class="hide" data-route="{{ url('user/comment') }}"></div>
                                {!! Form::open(['id' => 'formComment']) !!}
                                    @if (!$isRatedProduct)
                                        <div id="list-rating" class="col-md-6 col-md-offset-3">
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
                                    <div class="col-md-12 comment-content">
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
