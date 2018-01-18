<!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
      <nav class="offcanvas-menu">
        <ul class="menu">
            <li><a class="page-scroll active" href="#page-top"><span> {{ trans ('app.Home') }} </span></a></li>
            <li><a class="page-scroll" href="#pricing"><span> {{ trans ('app.Packages') }} </span></a></li>
            <li><a class="page-scroll" href="#contact"><span> {{ trans ('app.Contact') }} </span></a></li>
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
        <form action="{{ URL::route('language-chooser') }}" method="post">
            <select name="locale">
                <option value="en"> English</option>
                <option value="pt-BR" {{ Lang::locale() === 'pt-BR' ? ' selected ' : ''  }}> Portuguese</option>
                <option value="es" {{ Lang::locale() === 'es' ? ' selected ' : ''  }}> Spanish</option>
            </select>
      
            <input class="btn btn-sm btn-primary" type="submit" value="Choose">
            {{ Form::token( ) }}
        </form>
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
            <li><a class="page-scroll active" href="#page-top"><span> {{ trans ('app.Home') }}</span></a></li>
            <li><a class="page-scroll" href="#pricing"><span> {{ trans ('app.Packages') }} </span></a></li>
            <li><a class="page-scroll" href="#contact"><span>{{ trans ('app.Contact') }} </span></a></li>
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="search"><i class="fa fa-search" aria-hidden="true"></i></div>
            <div class="cart"><a href="{{route('cart.index')}}"></a><i class="fa fa-shopping-cart" aria-hidden="true"></i>
              @if (Cart::instance('default')->count() > 0)
                            <span>{{ Cart::instance('default')->count() }}</span>
              @endif
            </div>  
            <a class="btn btn-sm btn-warning" style="height: 44px;line-height: 44px;" href="{{ route('login') }}">{{trans('auth.login')}}</a>
            
          </div>
        </div>
      </div>
    </header>
    <!-- Off-Canvas Wrapper-->