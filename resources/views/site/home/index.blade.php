@extends('layouts.psic')
@section('pag_title', 'HOME')

@section('content')
  <section class="hero-slider" style="background-image: url({{ asset('site/img/hero-slider/main-bg.jpg') }});">
    <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
      <div class="item">
        <div class="container padding-top-3x">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
              <div class="from-bottom">
                <div class="h2 text-body text-normal mb-2 pt-1">Etiam porta sem malesuada</div>
                <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
              </div><a class="btn btn-primary scale-up delay-1" href="">View Offers</a>
            </div>
            <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src=" {{ asset('site/img/hero-slider/02.png') }} " alt="Psicanalysis"></div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="container padding-top-3x">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
              <div class="from-bottom">
                <div class="h2 text-body text-normal mb-2 pt-1">Donec sed odio dui</div>
                <div class="h2 text-body text-normal mb-4 pb-1">for only <span class="text-bold">$59.99</span></div>
              </div><a class="btn btn-primary scale-up delay-1" href="">Leia mais </a>
            </div>
            <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src=" {{ asset('site/img/hero-slider/01.png') }} " alt="Psicanalysis"></div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="container padding-top-3x">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
              <div class="from-bottom">
                <div class="h2 text-body text-normal mb-2 pt-1">Nullam id dolor id nibh</div>
                <div class="h2 text-body text-normal mb-4 pb-1">for only <span class="text-bold">$299.99</span></div>
              </div><a class="btn btn-primary scale-up delay-1" href="">Shop Now</a>
            </div>
            <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="{{ asset('site/img/hero-slider/03.png') }}"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
    <section id="features" class="container services padding-top-3x padding-bottom-3x">
        <div class="row">
            <div class="col-sm-3">
                <h2>Donec sed odio dui</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <p><a class="navy-link" href="#" role="button">Detalhes »</a></p>
            </div>
            <div class="col-sm-3">
                <h2>Donec sed odio dui</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <p><a class="navy-link" href="#" role="button">Detalhes »</a></p>
            </div>
            <div class="col-sm-3">
                <h2>Donec sed odio dui</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <p><a class="navy-link" href="#" role="button">Detalhes »</a></p>
            </div>
            <div class="col-sm-3">
                <h2>Donec sed odio dui</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <p><a class="navy-link" href="#" role="button">Detalhes »</a></p>
            </div>
        </div>
    </section>

    <section class="container features padding-bottom-3x">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Donec sed odio dui<br> <span class="navy"> magna mollis euismod</span> </h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div>
                    <i class="fa fa-mobile features-icon"></i>
                    <h2>Donec sed odio dui</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
                <div class="m-t-lg">
                    <i class="fa fa-bar-chart features-icon"></i>
                    <h2>Donec sed odio dui</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
            </div>
            <div class="col-md-6 text-center  wow zoomIn animated" style="visibility: visible;">
                <img src="{{ asset('site/img/landing/perspective.png') }}" alt="dashboard" class="img-responsive">
            </div>
            <div class="col-md-3 text-center wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div>
                    <i class="fa fa-envelope features-icon"></i>
                    <h2>Donec sed odio dui</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
                <div class="m-t-lg">
                    <i class="fa fa-google features-icon"></i>
                    <h2>Donec sed odio dui</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Etiam porta sem malesuada</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.Nullam id dolor id nibh ultricies vehicula ut id elit.   </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-6 features-text wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <small>Donec sed odio dui</small>
                <h2>Donec sed odio dui </h2>
                <p>Donec sed odio dui. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                <a href="" class="btn btn-primary">Leia mais</a>
            </div>
            <div class="col-lg-6 text-right wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <img src="{{ asset('site/img/landing/dashboard.png') }}" alt="" class="img-responsive pull-right">
            </div>
        </div>
    </section>
    
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Donec sed odio dui</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-3 features-text wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                    <small>PSICANALYSIS</small>
                    <h2>Donec sed odio dui </h2>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.</p>
                    <a href="" class="btn btn-primary">Leia mais</a>
                </div>
                <div class="col-lg-6 text-right m-t-n-lg wow zoomIn animated" style="visibility: visible;">
                    <img src="{{ asset('site/img/landing/iphone.jpg') }}" class="img-responsive" alt="">
                </div>
                <div class="col-lg-3 features-text text-right wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                    <small>PSICANALYSIS</small>
                    <h2>Donec sed odio dui </h2>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.</p>
                    <a href="" class="btn btn-primary">Leia mais</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="testimonials" class="navy-section testimonials padding-top-3x padding-bottom-3x">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center wow zoomIn animated" style="visibility: visible;">
                    <i class="fa fa-comment big-icon"></i>
                    <h1>
                        Donec sed odio dui
                    </h1>
                    <div class="testimonials-text">
                        <i>"Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus. Morbi leo risus (ultricies vehicula ut)."</i>
                    </div>
                    <small>
                        <strong>Lorem Ipsum</strong>
                    </small>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing padding-top-3x padding-bottom-3x">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>PACKAGES</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row">
                @component('components.list_product',['list'=>$products,'size'=>'4'])
                @endcomponent
            </div>
        </div>
    </section>

  <!-- Services-->
  <section class="container padding-top-3x padding-bottom-2x">
    <div class="row">
      <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 mx-auto mb-3" src="{{ asset('site/img/services/01.png') }}" alt="Salut Soft">
        <h6>Salut Soft</h6>
        <p class="text-muted margin-bottom-none">Donec sed odio dui. Etiam porta sem malesuada magna</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 mx-auto mb-3" src="{{ asset('site/img/services/02.png') }}" alt="Psicourses">
        <h6>Psicourses</h6>
        <p class="text-muted margin-bottom-none">Donec sed odio dui. Etiam porta sem malesuada magna</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 mx-auto mb-3" src="{{ asset('site/img/services/03.png') }}" alt="Psiclínicos">
        <h6>Psiclínicos</h6>
        <p class="text-muted margin-bottom-none">Donec sed odio dui. Etiam porta sem malesuada magna</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 mx-auto mb-3" src="{{ asset('site/img/services/04.png') }}" alt="Psicliniconline">
        <h6>Psicliniconline</h6>
        <p class="text-muted margin-bottom-none">Donec sed odio dui. Etiam porta sem malesuada magna</p>
      </div>
    </div>
  </section>
@endsection