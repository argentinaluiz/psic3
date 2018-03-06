@extends('layouts.psicSecound')
@section('pag_title', 'Checkout')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}"/>
@endsection

@section('content')
    <div class="container">
		<div class="row">
            <div class="col-sm-12">
				@if (session()->has('success_message'))
					<div class="alert alert-success">
						{{ session()->get('success_message') }}
					</div>
				@endif

				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
		</div>
		<div class="row">
            <div class="col-sm-6">
				<div>
					<form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
						{{ csrf_field() }}
						<h2 style="margin-top: 40px;">Checkout: Informações </h2>
						 <div class="form-group">
							<input type="text" class="form-control" placeholder="Nome"  name="name" value="{{ old('name') }}" required>
						 </div>
												
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Endereço" id="address" name="address" value="{{ old('address') }}" required>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Número" id="number" name="number" value="{{ old('number') }}" required>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Complemento" id="complement" name="complement" value="{{ old('complement') }}" required>
						</div>

						<div class="half-form">
							 <div class="form-group">
								<input type="text" class="form-control" placeholder="Bairro" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Cidade" id="city_id" name="city_id" value="{{ old('city_id') }}" required>
							</div> 
							 
						</div> <!-- end half-form -->

						<div class="half-form">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="CEP" id="cep" name="cep" value="{{ old('cep') }}" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Telefone" id="phone" name="phone" value="{{ old('phone') }}" required>
							</div>
						</div> <!-- end half-form -->

						<div class="cleaner_h20"></div>

						<h2>Detalhes do pagamento</h2>
												
                        <span>
                        	<input type="radio" name="pay" value="paypal"> PayPal
                         	@include('paypal')
                        </span>

						<div class="cleaner_h20"></div>
					</form>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="checkout-table-container">
					<h2 style="margin-top: 40px;">Seu pedido</h2>

					<div class="checkout-table">
						@foreach (Cart::content() as $item)
						<div class="checkout-table-row">
							<div class="checkout-table-row-left">
								<img src="{{ url($item->model->imagens()->where('deleted','=','N')->orderBy('order')->first()->imagem->galeriaUrl()) }}" alt="item" class="checkout-table-img">
								<div class="checkout-item-details">
									<div class="checkout-table-item">{{ $item->model->name }}</div>
									<div class="checkout-table-description">{{ $item->model->details }}</div>
									<div class="checkout-table-price"> {{ $item->model->textPrice }}</div>
								</div>
							</div> <!-- end checkout-table -->

							<div class="checkout-table-row-right">
								<div class="checkout-table-quantity">{{ $item->qty }}</div>
							</div>
						</div> <!-- end checkout-table-row -->
						@endforeach

					</div> <!-- end checkout-table -->

					<div class="checkout-totals">
						<div class="checkout-totals-left">
							Subtotal <br>
							@if (session()->has('coupon'))
								Discount ({{ session()->get('coupon')['name'] }}) :
								<form action="{{ route('coupon.destroy') }}" method="POST" style="display:inline">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit" style="font-size:14px">Remover</button>
								</form>
								<br>
								<hr>
								New Subtotal <br>
							@endif
							Tax (13%)<br>
							<span class="checkout-totals-total">Total</span>

						</div>

					  <div class="checkout-totals-right">
							R$ {{ (Cart::subtotal()) }} <br>
							@if (session()->has('coupon'))
								-{{ number_format($discount, 2, ',', '.') }} <br>
								<hr>
							   R$ {{ number_format($newSubtotal, 2, ',', '.') }} <br>
							@endif
						  R$ {{ number_format($newTax, 2, ',', '.') }} <br>
							<span class="checkout-totals-total">R$ {{ number_format($newTotal, 2, ',', '.') }}</span>

						</div> 
					</div> 

					@if (! session()->has('coupon'))

					<a href="#" class="have-code">Have a Code?</a>

					<div class="have-code-container">
						<form action="{{ route('coupon.store') }}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="coupon_code" id="coupon_code">
							<button type="submit" class="button button-plain">Aplicar</button>
						</form>
					</div> <!-- end have-code-container -->
					@endif
				</div>
			</div> <!-- end checkout-section -->
		</div>
		<div class="cleaner_h25"></div>
	</div>

@endsection

@section('extra-js')
    <script>
        
    </script>
@endsection
