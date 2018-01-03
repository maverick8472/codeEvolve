

@if(Session::has('success'))

    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{Session::get('success')}}
    </div>
@elseif(Session::has('failure'))

    <div class="alert alert-danger" role="alert">
        <strong>Failed:</strong> {{Session::get('failure')}}
    </div>

    @endif