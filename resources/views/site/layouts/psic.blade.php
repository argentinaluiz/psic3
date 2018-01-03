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

    <title>{{$title or 'Psicanalysis'}}</title>

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
    <script src="{{ asset('site/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('site/js/modernizr.min.js') }}"></script>
  </head>

  <body id="page-top">
    <!-- Default Modal-->
    <div class="modal fade" id="modalDefault" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><img alt="image" class="img-circle" style="width: 150px;" src="{{ asset('site/img/logo2.png') }}"/></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
                <div>
                    <div class="cleaner_h10"></div> 
                    <h5 class="logo-name text-center">Área de Login</h5>
                    <div class="cleaner_h10"></div> 
                </div>

                <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
                  {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" placeholder="Senha" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary btn-block block full-width m-b">
                            {{trans('auth.login')}}
                        </button>
                        <div class="checkbox ">
                            <label style="float: right">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('auth.rememberme')}}
                            </label>
                        </div>
                         <div class="cleaner_h5"></div> 
                    </div>
                </form>

                <form class="form-inline" method="post" action="{{ url('/login/social') }}">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-sm btn-danger" value="google" name="social_type">
                              {{trans('auth.loginwithgoogle?')}} 
                          </button>
                      </div>
                      <div class="col-sm-2"></div>
                      <div class="col-sm-4">
                        <button type="submit" class="btn btn-sm" value="github" name="social_type">
                            {{trans('auth.loginwithgithub?')}} 
                        </button>
                      </div>
                    </div>
                </form>
                <div class="cleaner_h5"></div> 

                <p class="text-center"><a class="btn btn-sm btn-link" href="{{ route('password.request') }}">{{trans('auth.forgotYourPassword?')}}</a></p>
                
                <a class="btn btn-sm btn-outline-primary btn-block">Criar uma conta</a>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Fechar </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
      <nav class="offcanvas-menu">
        <ul class="menu">
            <li><a class="page-scroll active" href="#page-top"><span> HOME </span></a></li>
            <li><a class="page-scroll" href="#pricing"><span> PACKAGES </span></a></li>
            <li><a class="page-scroll" href="#contact"><span> CONTACT </span></a></li>
        </ul>
      </nav>
    </div>
    <!-- Topbar-->
    <div class="topbar">
      <div class="topbar-column">
        <a class="hidden-md-down" href="mailto:suporte@psicanalysis.com.br"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; suporte@psicanalysis.com.br</a>
        <a class="hidden-md-down" href="tel:055 11 xxxx-xxxx"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp; 055 11 xxxx-xxxx</a>
        <a class="social-button sb-youtube" href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        <a class="social-button sb-facebook" href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a class="social-button sb-skype" href="#" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a>
        <a class="social-button sb-whatsapp" href="#" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
      </div>
      <div class="topbar-column">
        <div class="lang-currency-switcher-wrap">
            <div class="lang-currency-switcher">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">LÍNGUA</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="" style="color: #333;"><img alt="image" class="img-circle" src="{{ asset('site/img/flags/16/United-States.png') }}"/> English</a> </li>
                    <li><a class="dropdown-item" href="" style="color: #333;"><img alt="image" class="img-circle" src="{{ asset('site/img/flags/16/Brazil.png') }}"/> Português</a></li>
                    <li><a class="dropdown-item" href="" style="color: #333;"><img alt="image" class="img-circle" src="{{ asset('site/img/flags/16/Spain.png') }}"/> Espanhol</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="fa fa-times-circle" aria-hidden="true"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href=""><img src="{{ asset('site/img/logo2.png') }}" alt="Psicanalysis"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
            <li><a class="page-scroll active" href="#page-top"><span> HOME </span></a></li>
            <li><a class="page-scroll" href="#pricing"><span> PACKAGES </span></a></li>
            <li><a class="page-scroll" href="#contact"><span> CONTACT </span></a></li>
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="search"><i class="fa fa-search" aria-hidden="true"></i></div>
            <div class="cart"><a href="/cart/add"></a><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="count"></span>
                <span class="subtotal">CART:<br/>
                <span>R$ </span>
            </div> 
            <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modalDefault" style="margin-left: 50px;">LOGIN</button>
          </div>
        </div>
      </div>
    </header>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      @yield('content')
      <!-- Site Footer-->
      <footer id="contact" class="site-footer footer-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <!-- Contact Info-->
              <section class="widget">
                <h3 class="widget-title">Get In Touch With Us</h3>
                <p>Phone: 55 11 xxxx-xxxx</p>
                <ul class="list-unstyled text-sm">
                  <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                  <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="" href="#">suporte@psicanalysis.com.br</a></p><a class="social-button shape-circle sb-youtube" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a><a class="social-button shape-circle sb-facebook" href="#"> <i class="fa fa-facebook" aria-hidden="true"></i></a><a class="social-button shape-circle sb-skype" href="#"><i class="fa fa-skype" aria-hidden="true"></i></a><a class="social-button shape-circle sb-whatsapp" href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
              </section>
            </div>

            <div class="col-lg-6 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links">
                <h3 class="widget-title">Donec Sed Odiodui</h3>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
              </section>
            </div>
          </div>
          <hr class="mt-2 margin-bottom-2x">
          <div class="row">
            <div class="col-md-7 padding-bottom-1x">
              <!-- Payment Methods-->
              <div class="margin-bottom-1x" style="max-width: 615px;"><img src="{{ asset('site/img/payment_methods.png') }}" alt="Payment Methods">
              </div>
            </div>
            <div class="col-md-5 padding-bottom-1x">
              <div class="margin-top-1x hidden-md-up"></div>

                  <form class="subscribe-form" action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                      <div class="input-group">
                        <input class="form-control required email" value="" id="mce-EMAIL" type="email" name="EMAIL" placeholder=""><span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                      </div>
                      <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="" tabindex="-1">
                      </div>
                      <input type="hidden" name="b_a8392504a50106aa06cdaab3c_13d10512c6" tabindex="-1" value="">
                      <button class="btn btn-primary" id="mc-embedded-subscribe" type="submit" style="float: none;"><i class="icon-check"></i></button>
                  </form>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright">2017 © Todos os Direitos Reservados <a href="http://margraphics.com.br" target="_blank"> &nbsp;para MarGraphics</a></p>
        </div>
      </footer>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- JavaScript (jQuery) -->
    <!--
    
    -->
    <script type="text/javascript" src="{{ asset('site/js/scriptLogin.js') }}"></script>
    <script src="{{ asset('site/js/vendor.min.js') }}"></script>
    <script src="{{ asset('site/js/scripts.min.js') }}"></script>
  </body>
</html>