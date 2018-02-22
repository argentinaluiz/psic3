
   @foreach($list as $key => $value)
    <div class="col-md-4 ">
       @component('components.ibox',[
        'product'=>$value,
        'name'=>$value->name,
        'description'=>$value->description,
        'imagem'=>$value->imagens()->where('deleted','=','N')->orderBy('order')->first()->imagem->galeriaUrl(),
        'price'=>$value->textPrice,
        'url'=>route('shop.show',[$value->slug])]
        )
      @endcomponent
    </div>
    @endforeach
