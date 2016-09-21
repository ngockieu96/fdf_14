<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('label.app_name') }}</title>

    {!! Html::style('css/admin.css') !!}

    <!-- Bootstrap CSS -->
    {!! Html::style('bower/bootstrap/dist/css/bootstrap.min.css') !!}

    <!-- Bootstrap theme CSS -->
    {!! Html::style('bower/bootstrap/dist/css/bootstrap-theme.min.css') !!}

    <!-- Bootstrap datatable CSS -->
    {!! Html::style('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
</head>
<body>

<!--Header -->
<div class="row" id="header">
    <h1><img class="img-admin" src="{{ asset(config('settings.avatar_path') . '/' .  config('settings.avatar_default')) }}"> {{ auth()->user()->name }} </h1>
</div>
<div class="row">

    <!-- Menu -->
    <div class="col-lg-2">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid" id="menu">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/home') }}">{{ trans('label.app_name') }}</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/admin/category') }}">{{ trans('label.category') }}</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/user') }}">{{ trans('label.user') }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Content -->
    <div class="col-lg-10">
        <div class="row" id="content">
            <div class="col-lg-10 col-lg-offset-1 panel panel-primary">
                <div class="panel-heading">
                    <h2> @yield('head') </h2>
                </div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
{!! Html::script('/bower/jquery/dist/jquery.min.js') !!}

<!-- Bootstrap Core JavaScript -->
{!! Html::script('/bower/bootstrap/dist/js/bootstrap.min.js') !!}

<!-- jQuery Datatable JavaScript -->
{!! Html::script('/bower/datatables.net/js/jquery.dataTables.min.js') !!}

<!-- Bootstrap Datatable JavaScript -->
{!! Html::script('/bower/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

</body>
</html>
