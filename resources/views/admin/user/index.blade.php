@extends('admin.layouts.master')

@section('head')
    {{ trans('user.list_user') }}
@endsection

@section('content')
    <div class="panel-body">
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.user.table')
            </div>
        </div>
        {!! $users->render(); !!}
    </div>
@endsection
