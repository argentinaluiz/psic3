<div class="ibox">
    <div class="ibox-content product-box">
        <div class="product-images">
            <img class="img-responsive" src="{{$imagem}}">
        </div>
        <div class="product-desc">
            <span class="product-price">
                {{$price}}
            </span>
            <a href="{{$url}}" class="product-name"> {{$name}}</a>

            <div class="small m-t-xs">
                {{$description}}
            </div>
            <div class="m-t text-righ">
                @can('favorites-view')
                    @if(Auth()->user()->products()->find($product->id))
                    <form action="{{route('site.favorites.delete',$product)}}" method="post">
                        <a href="{{$url}}" class="btn btn-sm btn-primary">Ver mais <i class="fa fa-long-arrow-right"></i> </a>
                        @can('favorites-delete')
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button title="Remover dos Favoritos" class="btn btn-sm btn-danger"><i class="fa fa-star" aria-hidden="true"></i></button>
                        @endcan
                    </form>
                    @else
                    <form action="{{route('site.favorites.create',$product)}}" method="post">
                        <a href="{{$url}}" class="btn btn-sm btn-primary">Ver mais <i class="fa fa-long-arrow-right"></i> </a>
                        @can('favorites-create')
                        {{ csrf_field() }}
                        <button title="Adicionar dos Favoritos" class="btn btn-sm btn-warning"><i class="fa fa-star" aria-hidden="true"></i></button>
                        @endcan
                    </form>
                    @endif
                @else
                    <a href="{{$url}}" class="btn btn-sm btn-primary">Ver mais <i class="fa fa-long-arrow-right"></i> </a>
                @endcan               
            </div>
        </div>
    </div>
</div>