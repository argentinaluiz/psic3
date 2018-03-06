

	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="contato@salutsoft.com.br">


	<?php $count =0;?>
	@foreach (Cart::content() as $item)

		<?php $count++; ?>
		<input type="hidden" name="item_name_{{$count}}" value="{{ $item->model->name }}">
		<input type="hidden" name="item_number_{{$count}}" value="{{ $item->model->id }}">
		<input type="hidden" name="quantity_{{$count}}" value="{{ $item->qty }}">
		<input type="hidden" name="amount_{{$count}}" value="{{ $item->model->price }}">
		//<input type="hidden" name="shipping_{{$count}}" value="0.30">

		//<input type="hidden" name="tax_{{$count}}" value="0.12">
		<br>
	@endforeach
	<input name="submit" id="paypalbtn" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png" value="PayPal" formaction="https://www.paypal.com/cgi-bin/webscr">

