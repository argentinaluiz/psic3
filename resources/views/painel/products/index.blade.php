@extends('layouts.app')
@section('pag_title', 'Pacotes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Listagem dos produtos</h3>
            <div class="cleaner_h25"></div>
            <span class="pull-right small text-muted">Total de produtos: {{ $totalProducts}}</span>
            <br/>
            <a class="btn btn-default" href="{{route('products.create') }}">Criar novo</a>
            <div class="cleaner_h15"></div>
            <table class="table table-striped dataTables-products">
                <thead>
                <tr>
                    <th>Nome</th>
					<th>Imagem</th>
					<th>Detallhes</th>
                    <th>Preço anterior</th>
					<th>Preço vendido</th>
					<th>Descrição</th>
					<th>Destaque?</th>
					<th>Ativo?</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>
								@if($product->image)
									<img src="{{url("storage/products/{$product->image}")}}" alt="{{$product->id}}" style="max-width: 60px;">
								@else
									<img src="{{url('painel/imgs/no-image.png')}}" alt="{{$product->id}}" style="max-width: 100px;">
								@endif
							</td>
							<td>{{ $product->details }}</td>
							<td>R$ {{number_format($product->old_price, 2, ',', '.')}}</td>
							<td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
							<td>{{ $product->description }}</td>
							<td>{{$product->featured?'Sim': 'Não'}}</td>
							<td>{{$product->active?'Sim': 'Não'}}</td>
							<td>
								<a href="{{route('products.edit',['product' => $product->id])}}">Editar</a> |
								<a href="{{route('products.show',['product' => $product->id])}}">Ver</a>
							</td>
						</tr>
					@endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>$(document).ready(function () {
    $.noConflict();
		var table = $('.dataTables-products').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por página",
				"zeroRecords": "Nada encontrado",
				"info": "Mostrando _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro disponível",
				"infoFiltered": "(filtrado de _MAX_ registros no total)",
				"search":         "Busca:",
				"zeroRecords":    "Nenhum registro cadastrado",
				"paginate": {
					"first":      "Primeira",
					"last":       "Última",
					"next":       "Próxima",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": ativa para ordenar de modo crescente",
					"sortDescending": ": ativa para ordenar de modo decrescente"
				}
			},
			buttons: [
				{extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel', title: 'ProdutosFile'},
				{extend: 'pdf', title: 'ProdutosFile'},

				{extend: 'print',
					customize: function (win){
						$(win.document.body).addClass('white-bg');
						$(win.document.body).css('font-size', '10px');
						$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
				}
				}
			]
			
		});
	});
</script>
@endsection