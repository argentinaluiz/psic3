@extends('layouts.psicSecound')
@section('pag_title', 'Obrigado!')

@section('content')

   <div class="thank-you-section">
       <h1>Obrigada pela <br> sua compra!</h1>
       <p>A confirmação foi enviada para o seu email.</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Home</a>
       </div>
   </div>

@endsection
