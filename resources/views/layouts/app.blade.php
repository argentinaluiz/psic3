<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Psicanalysis - @yield('pag_title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <style type="text/css">
        @media print{.hidden-print {display: none;} }
    </style>
    @yield('extra-css')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				 <ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element"> <span>
							<img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg')}} " />
							 </span>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Vestibulum ante</strong>
							 </span> <span class="text-muted text-xs block">Administrador <b class="caret"></b></span> </span> </a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="">Perfil</a></li>
								<li><a href="">Mudar Senha</a></li>
								<li><a href="">Email</a></li>
								<li><a href="">SAIR</a></li>
							</ul>
						</div>
						<div class="logo-element">
							PSIC
						</div>
					</li>
					<li class="active">
						<a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Geral</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="">Contatos</a></li>
							<li><a href="">Tarefas</a></li>
							<li><a href="">Observações</a></li>
							<li><a href="">Mensagens</a></li>
							<li><a href="">Email </a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-question"></i> <span class="nav-label">Perguntas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="">Dados iniciais</a></li>
							<li><a href="">Ética</a></li>
							<li><a href="">Regra Fundamental</a></li>
							<li><a href="">Investigações</a></li>
							<li><a href="">Fichas</a></li>
							<li><a href="">Depressão</a></li>
							<li><a href="">Neuroses</a></li>
							<li><a href="">Psicoses</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-comments-o"></i> <span class="nav-label">Consultas</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="consultas.html"><div class="fs1" aria-hidden="true"></div>Dados Gerais</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Queixas</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Sintomas</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Observação Corporal</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Perguntas</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Recursos</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>OBS</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Hipótese Diagnóstica</a></li>
							<li><a href=""><div class="fs1" aria-hidden="true"></div>Plano de Procedimentos</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-edit"></i> <span class="nav-label">Tratamento</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="">Depressão</a></li>
							<li><a href="">Neuroses</a></li>
							<li><a href="">Psiconeurose</a></li>
							<li><a href="">Conversão/Histeria</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-address-book-o"></i> <span class="nav-label">Agendas</span>  </a>
					</li>
					<li>
						<a href="{{ route('researches.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Pesquisa</span>  </a>
					</li>
					<li>
						<a href=""><i class="fa fa-comments-o"></i> <span class="nav-label">Recursos</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href=""> Contos </a></li>
							<li><a href=""> Dinâmicas</a></li>
							<li><a href=""> Frases</a></li>
							<li><a href=""> Vídeos </a></li>
							<li><a href=""> Literatura Indicada </a></li>
							<li><a href=""> Artigos </a></li>
							<li><a href=""> Metáforas </a></li>
							<li><a href=""> Músicas </a></li>
							<li><a href=""> Jogos </a></li>
						</ul>
					</li>

					<li>
						<a href="{{ route('products.index') }}"><i class="fa fa-qrcode"></i> <span class="nav-label">Produtos</span></a>
					</li>

					<li>
						<a href=""><i class="fa fa-picture-o"></i> <span class="nav-label">Imagens</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('imagens.index') }}"> Biblioteca de imagens </a></li>
						</ul>
					</li>

					<li>
						<a href="{{ route('slides.index') }}"><i class="fa fa-sliders"></i> <span class="nav-label">Slides</span></a>
					</li>
					
					<li>
						<a href=""><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Relatórios</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href=""> Pacientes</a> </li>
							<li><a href=""> Psicanalistas</a></li>
							<li><a href=""> Supervisão</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-envelope"></i> <span class="nav-label">Emails </span><span class="label label-warning pull-right">12/26</span></a>
						<ul class="nav nav-second-level collapse">
								<li><a href="">Caixa de entrada</a></li>
								<li><a href="">Ver email</a></li>
								<li><a href="">Escrever email</a></li>
								<li><a href="">Modelos de email</a></li>
						 </ul>
					</li>
					<li>
						<a href=""><i class="fa fa-flask"></i> <span class="nav-label">Supervisão</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Aplicações</span>  <span class="pull-right label label-primary">ESPECIAL</span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="">Blog</a></li>
							<li><a href="">Chat</a></li>
							<li><a href="">Aparelho psíquico</a></li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-money"></i> <span class="nav-label">Financeiro</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href=""> Pagamentos</a> </li>
							<li><a href=""> Recebimentos</a></li>
							<li> <a href=""> Convênios </a> </li>
						</ul>
					</li>
					<li>
						<a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configurações</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="{{ route('users.index') }}">Usuários</a></li>
							<li><a href="{{ route('roles.index') }}">Papéis</a></li>
							<li><a href="{{ route('specialties.index') }}">Especialidade</a></li>
							<li><a href="{{ route('class_informations.index') }}">Classe</a></li>
							<li><a href="{{ route('site.perfil') }}">Perfil</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>  

        <div id="page-wrapper" class="gray-bg">
			@include('partials.nav-painel')

			<div class="row wrapper border-bottom white-bg page-heading">
				@yield('breadcrumb')
			</div>

		   <div class="wrapper wrapper-content  animated fadeInRight">
				<div class="row">
					<div class="col-sm-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								@yield('h5-title')
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="close-link">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							<div class="ibox-content">
								@include('partials.message')                       
								<div class="row">
									<div class="col-md-12">
										@yield('content')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            @include('partials.footer-painel')
        </div>
    </div>

    <!-- Plugins -->
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/atendimento.js') }} "></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }} "></script>

   @yield('extra-js')
</body>
</html>
