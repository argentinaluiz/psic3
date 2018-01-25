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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Datatables files -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    
     <!--Export table button CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

    
</head>
<body>
    <div id="app">
        @php
            $navbar = Navbar::withBrand(config('app.name'))->inverse();
               if(Auth::guest()){
                    $arrayLinksGuest = [
                        ['link' => route('login'), 'title' => 'Login'],
                        ['link' => route('register'), 'title' => 'Registrar'],
                    ];
                    $navbar->withContent(Navigation::links($arrayLinksGuest)->right());
                }
                if(Auth::check()){
                    $arrayLinks = [
                        ['link' => route('users.index'), 'title' => 'Usuários'],
                        ['link' => route('roles.index'), 'title' => 'Papéis'],
                        ['link' => route('clients.index'), 'title' => 'Clientes'],
                        ['link' => route('states.index'), 'title' => 'Estados'],
                        ['link' => route('painel.products.index'), 'title' => 'Produtos'],
                        ['link' => route('rooms.index'), 'title' => 'Salas'],
                        ['link' => route('agendas.index'), 'title' => 'Agendas'],
                        ['link' => route('reserves.index'), 'title' => 'Reservas'],
                    ];
                    $navbar->withContent(Navigation::links($arrayLinks));
                
                $arrayLinksRight = [
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => route('logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();"
                                ]
                            ]
                        ]
                    ]
                ];
                $navbar->withContent(Navigation::links($arrayLinksRight)->right());

                $formLogout = FormBuilder::plain([
                    'id' => 'form-logout',
                    'url' => route('logout'),
                    'method' => 'POST',
                    'style' => 'display:none'
                ]);
            }
            @endphp
            {!! $navbar !!}
            
            @if(Auth::check())
                {!! form($formLogout) !!}
            @endif

            @if(Session::has('message'))
                <div class="container hidden-print">
                    {!! Alert::success(Session::get('message'))->close() !!}
                </div>
            @endif
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <!-- <script src="{{ asset('js/app.js') }}"></script> conflito, quando atualizo o botão do logout deixa de funcionar-->
</body>
</html>
