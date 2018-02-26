<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Marisa: MarGraphics">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Psicanalysis - @yield('pag_title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Icons-->

    <link rel="icon" type="image/x-icon" href="{{ asset('site/img/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('site/img/favicon-96x96.png') }}">
    <link rel="android-icon" sizes="96x96" href="{{ asset('site/img/android-icon-96x96.png') }}">
    <link rel="android-icon" sizes="144x144" href="{{ asset('site/img/android-icon-144x144.png') }}">
    <link rel="android-icon" sizes="192x192" href="{{ asset('site/img/android-icon-192x192.png') }}">
    <link rel="ms-icon" sizes="144x144" href="{{ asset('site/img/ms-icon-144x144.png') }}">
    <link rel="ms-icon" sizes="150x150" href="{{ asset('site/img/ms-icon-150x150.png') }}">
    <link rel="ms-icon" sizes="310x310" href="{{ asset('site/img/ms-icon-310x310.png') }}">
    <link rel="apple-icon" href="{{ asset('site//assets/img/apple-icon.png') }}">
    <link rel="apple-icon" sizes="167x167" href="{{ asset('site/img/apple-icon-144x144.png') }}">
    <link rel="apple-icon" sizes="152x152" href="{{ asset('site/img/apple-icon-152x152.png') }}">
    <link rel="apple-icon" sizes="180x180" href="{{ asset('site/img/apple-icon-180x180.png') }}">

    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('site/css/vendor.min.css') }}"> 

    <link href="{{ asset('site/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('site/css/styles.min.css') }}"> 

    <!-- Modernizr-->
    <script src="{{ asset('site/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('site/js/modernizr.min.js') }}"></script>
    @yield('extra-css')
  </head>

  <body id="page-top">
    @include('partials.nav2')

    <div class="offcanvas-wrapper">
     @if(Session::has('message'))
          <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              {{Session::get('message')}}
          </div>
      @endif
      @yield('content')

      <div class="cleaner_h20"></div>
        
      @include('partials.footer-login')

    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- JavaScript (jQuery) -->
    <!--
    
    -->
    <script type="text/javascript" src="{{ asset('site/js/scriptLogin.js') }}"></script>
    <script src="{{ asset('site/js/vendor.min.js') }}"></script>
    <script src="{{ asset('site/js/scripts.min.js') }}"></script>
    @yield('extra-js')
  </body>
</html>