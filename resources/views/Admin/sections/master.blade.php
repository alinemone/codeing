<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon.ico')}}">
    {!! SEO::generate() !!}
    <!-- Custom CSS -->
    <link href="{{asset('/css/admin.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>


@yield('content')


<div class="chat-windows"></div>

<script src="{{asset('js/admin.js')}}"></script>
@yield('script')
@include('sweetalert::alert')
</body>
</html>
