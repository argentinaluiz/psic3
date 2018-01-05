<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Marisa: MarGraphics">

    <title>{{$title or 'Psicanalysis | 503 Error'}}</title>


    <link href="{{ asset('painel/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('painel/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('painel/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('painel/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>503</h1>
        <h3 class="font-bold">Be Right Back</h3>

        <div class="error-desc">
            The server encountered something unexpected that didn't allow it to complete the request. We apologize.<br/>
            You can go back to main page: <br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('painel/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('painel/js/bootstrap.min.js') }}"></script>


</body>

</html>
