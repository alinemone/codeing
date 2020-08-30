<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{!! SEO::generate() !!}
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@yield('style')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>


    <script src="{{asset('js/app.js')}}" ></script>
    @include('sweetalert::alert')
    @yield('script')

</body>
</html>
