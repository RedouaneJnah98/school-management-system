@if(session('email'))
    <div class="alert alert-danger">
        {{ session('email') }}
    </div>
@endif
