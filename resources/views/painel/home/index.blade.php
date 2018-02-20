@extends('layouts.app')

@section('content')

<div class="container">
        <h3>Relatórios</h3>
        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-university" aria-hidden="true"></i>
                <div class="text-rel">
                     <p class="result">
                        
                    </p>
                    <p class="result-ds">
                        Total de Clínicas
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-building" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $totalRooms }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Salas
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $totalStates }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Estados
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $totalCities }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Cidades
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                    
                    </h2>
                    <h3 class="result-ds">
                        Total de Psicanalistas
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $totalAgendas }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Agendas
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-users" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        
                    </h2>
                    <h3 class="result-ds">
                        Total de Pacientes
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xm-12">
            <div class="rel-dash">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                <div class="text-rel">
                    <h2 class="result">
                        {{ $totalReserves }}
                    </h2>
                    <h3 class="result-ds">
                        Total de Reservas
                    </h3>
                </div>
            </div>
        </div>

</div><!--Content Dinâmico-->



@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin', 'Bem-vindo à PSICANALYSIS');

            }, 1300);
        });
    </script>
@endsection