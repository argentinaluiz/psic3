<div class="slider ">
  <ul class="slides">
    @foreach($list as $key => $value)
      <li>
        <img src="{{$value->link}}"> <!-- random image -->
        <div class="caption center-align">
          @if(isset($value->title))
            <h3>{{$value->title}}</h3>
          @endif
          @if(isset($value->description))
            <h5 class="light grey-text text-lighten-3">{{$value->description}}</h5>
          @endif

          @if(isset($value->link) && $value->link != '')
            <a class="btn btn-sm btn-default" href="{{$value->link}}">Ver mais</a>
          @endif

        </div>
      </li>
    @endforeach
  </ul>
</div>


