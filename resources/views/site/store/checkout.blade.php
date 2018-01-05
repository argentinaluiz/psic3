@extends('layouts.psicSecound')
@section('pag_title', 'CHECKOUT')

@section('content')
    <section id="checkout" class="container padding-bottom-3x">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Checkout </h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#step1">Suas informações</a></li>
                    <li class="tab"><a href="#step2">Entrega</a></li>
                    <li class="tab"><a href="#step3">Pagamento</a></li>
                </ul>
            </div>
        </div>
        <form action="/checkout/{{ $id }}" method="post" id="form">
            {{ csrf_field() }}
            <input type="hidden" name="itemId1" value="0001">
            <input type="hidden" name="itemDescription1" value="Produto PagSeguroI">
            <input type="hidden" name="itemAmount1" value="250.00">
            <input type="hidden" name="itemQuantity1" value="2">

            <div id="step1">
                <input type="hidden" name="senderHash" id="senderHash">

                <p>Preencha suas informações</p>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="senderName" name="senderName">
                        <label for="senderName">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="senderCPF" name="senderCPF">
                        <label for="senderCPF">cpf</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="senderEmail" name="senderEmail">
                        <label for="senderEmail">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <input type="text" id="senderPhone" name="senderPhone">
                        <label for="senderPhone">Telefone</label>
                    </div>
                </div>
            </div>
            <div id="step2">
                <p>Informe os dados para entrega</p>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressPostalCode" name="shippingAddressPostalCode">
                        <label for="shippingAddressPostalCode">CEP</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressStreet" name="shippingAddressStreet">
                        <label for="shippingAddressStreet">Logradouro</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressNumber" name="shippingAddressNumber">
                        <label for="shippingAddressNumber">Número</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressComplement" name="shippingAddressComplement">
                        <label for="shippingAddressComplement">Complemento</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressDistrict" name="shippingAddressDistrict">
                        <label for="shippingAddressDistrict">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressCity" name="shippingAddressCity">
                        <label for="shippingAddressCity">Cidade</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="shippingAddressState" name="shippingAddressState">
                        <label for="shippingAddressState">Estado</label>
                    </div>
                    <div class="col s6">
                        <input type="hidden" name="shippingCost" value="21.50">
                        <select name="shippingType" id="shippingType" class="browser-default">
                            <option disabled selected>Forma de Entrega</option>
                            <option value="1">Encomenta normal (PAC)</option>
                            <option value="2">SEDEX</option>
                            <option value="3">Tipo de frete não especificado</option>
                        </select>
                        <label for="shippingType">Forma de entrega</label>
                    </div>
                </div>

            </div>
            <div id="step3">
                <p>Preencha os dados para pagamento</p>

                <input type="hidden" name="creditCardToken" id="creditCardToken">
                <input type="hidden" name="installmentValue" id="installmentValue">

                <div class="row">
                    <div class="input-field col s9">
                        <input type="text" id="cardNumber">
                        <label for="cardNumber">Número do cartão</label>
                        <div id="card_brand"></div>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="cvv">
                        <label for="cvv">Código de segurança</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="expirationMonth">
                        <label for="expirationMonth">Mês de expiração</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="expirationYear">
                        <label for="expirationYear">Ano de expiração</label>
                    </div>
                    <div class="col s4">
                        <select name="installmentQuantity" id="installmentQuantity" class="browser-default">
                            <option disabled selected>Parcelamento</option>
                        </select>
                    </div>
                </div>

                <p>Dados do dono do cartão</p>

                <p>
                    <input type="checkbox" id="copy_from_me">
                    <label for="copy_from_me">Copiar seus dados</label>
                </p>

                <div id="holder_data">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="creditCardHolderName" name="creditCardHolderName">
                            <label for="creditCardHolderName">Nome completo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="creditCardHolderCPF" name="creditCardHolderCPF">
                            <label for="creditCardHolderCPF">cpf</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="creditCardHolderPhone" name="creditCardHolderPhone">
                            <label for="creditCardHolderPhone">Telefone</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="creditCardHolderBirthDate" name="creditCardHolderBirthDate">
                        <label for="creditCardHolderBirthDate">Data de nascimento</label>
                    </div>
                </div>

                <p>Endereço da fatura</p>

                <p>
                    <input type="checkbox" id="copy_from_shipping">
                    <label for="copy_from_shipping">Copiar do endereço de entrega</label>
                </p>

                <div id="shipping_data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressPostalCode" name="billingAddressPostalCode">
                            <label for="billingAddressPostalCode">CEP</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressStreet" name="billingAddressStreet">
                            <label for="billingAddressStreet">Logradouro</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressNumber" name="billingAddressNumber">
                            <label for="billingAddressNumber">Número</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressComplement" name="billingAddressComplement">
                            <label for="billingAddressComplement">Complemento</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressDistrict" name="billingAddressDistrict">
                            <label for="billingAddressDistrict">Bairro</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressCity" name="billingAddressCity">
                            <label for="billingAddressCity">Cidade</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="billingAddressState" name="billingAddressState">
                            <label for="billingAddressState">Estado</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="pagar" class="btn btn-sm btn-primary">
                    </div>
                </div>
            </div>
        </form>

        <div id="payment_methods" class="center-align"></div>
    </section>
@endsection

@section('script')

    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="/js/pagseguro.js"></script>
    <script>
        
    </script>
@endsection