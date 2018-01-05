function cartRemoverProduto( idpedido, idproduto, item ) {
    $('#form-remover-produto input[name="order_id"]').val(idorder);
    $('#form-remover-produto input[name="product_id"]').val(idproduct);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}

function cartAdicionarProduto( idproduto ) {
    $('#form-adicionar-produto input[name="id"]').val(idproduct);
    $('#form-adicionar-produto').submit();
}