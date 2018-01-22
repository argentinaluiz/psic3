<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		@if(isset($paths))
			@foreach($paths as $path)    
				@if($path['url'])
				<a href="{{$path['url']}}" class="breadcrumb">{{$path['title']}}</a>
					@else
					<ol>
						<li><a class="breadcrumb">{{$path['title']}}</a></li>
					</ol>
					@endif
			@endforeach
		@else
			<li><a class="breadcrumb">Admin</a></li>
		@endif
	</div>
</div>