<div>
    @if($errors->any())
        <hr>
        <div class="alert alert-warning" role="alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        <hr>
    @elseif (session('status'))
        <hr>
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        <hr>
    @endif
</div>