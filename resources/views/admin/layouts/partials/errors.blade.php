@if (Session::has('errors'))
    <div class="alert alert-danger">
        {{ Session::get('errors') }}
    </div>
@endif
