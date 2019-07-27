{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--<title>AdminLTE 3 | Dashboard</title>--}}
{{----}}
{{--<body class="hold-transition sidebar-mini">--}}
{{--<div class="wrapper" id="app">--}}

{{--@include('admin.includes.nav')--}}
{{--@include('admin.includes.sidebar')--}}



{{--<!-- /.content-wrapper -->--}}
{{--<footer class="main-footer">--}}
{{--<strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>--}}
{{--All rights reserved.--}}
{{--<div class="float-right d-none d-sm-inline-block">--}}
{{--<b>Version</b> 3.0.0-alpha--}}
{{--</div>--}}
{{--</footer>--}}

{{--<!-- Control Sidebar -->--}}
{{--<aside class="control-sidebar control-sidebar-dark">--}}
{{--<!-- Control sidebar content goes here -->--}}
{{--</aside>--}}
{{--<!-- /.control-sidebar -->--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}


        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    @include('admin.includes.nav')
    @include('admin.includes.sidebar')

    @if(!(\Illuminate\Support\Facades\Auth::user()))
        <router-view></router-view>
@endif

@yield('body')

<!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
