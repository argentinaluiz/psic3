<div class="slider ">
  <ul class="slides">
    @foreach($list as $key => $value)
      <li>
        <img src="{{$value->url}}"> <!-- random image -->
      </li>
    @endforeach
  </ul>
</div>


