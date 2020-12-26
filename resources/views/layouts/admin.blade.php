<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CertifyMe') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-formhelpers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
	@include('admin.navbar')
    <br>
    <div class = "container-fluid">
    	<div class="row">
            <div class="col-lg-3">
                @include('inc.adminsidenav')
            </div>
    		<div class="col-lg-9">
        		@yield('content')
        	</div>
    	</div>
    </div>
    @include('inc.footer')
      <script type="text/javascript" src="/js/app.js"></script>
    <script src="{{ asset('js/intlTelInput.js') }}"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>
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

</body>
</html>
