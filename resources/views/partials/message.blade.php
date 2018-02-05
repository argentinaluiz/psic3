@if(Session::has('message'))
    <div class="container hidden-print">
        {!! Alert::success(Session::get('message'))->close() !!}
    </div>
@endif