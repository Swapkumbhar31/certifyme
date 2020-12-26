<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-formhelpers.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

</head>
<body>
    @include('admin.navbar')
    @yield('content')
    <div id="app">
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/intlTelInput.js') }}"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>
      <script src="//cdn.rawgit.com/tonystar/bootstrap-hover-tabs/master/bootstrap-hover-tabs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111797595-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111797595-1');
</script>

</body>
</html>
