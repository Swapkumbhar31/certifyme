<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-formhelpers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <style type="text/css">
        <style type="text/css">
        .center-cropped {
          width: 100%;
          height: 200px;
          background-position: center center;
          background-repeat: no-repeat;
          background-size: cover;
          border-radius: 50%;
        }
    </style>
    </style>
</head>
<body @yield('prop')>
    <div id="app">
	  @include('inc.navbar')
    @yield('banner')
    @yield('content')
    @include('inc.footer')
</div>
    <script type="text/javascript" src="/js/app.js"></script>
    <script src="{{ asset('js/intlTelInput.js') }}"></script>
      <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>
      <script src="//cdn.rawgit.com/tonystar/bootstrap-hover-tabs/master/bootstrap-hover-tabs.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
      <script type="text/javascript" src="/js/myjs.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111797595-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111797595-1');
</script>

      @yield('script')
</body>
</html>
