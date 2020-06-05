<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Movers') }} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    @include('admin.layouts.stylesheet')
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        {{-- @include('admin.layouts.header') --}}

        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="main-content">
            <!-- Content Header (Page header) -->
            @include('admin.layouts.header')
            <!-- /.alert message -->
            @include('admin.layouts.alert-message')
            <!-- /.content-header -->
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.script')
</body>

</html>
