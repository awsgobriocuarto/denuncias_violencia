@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-9 col-xl-8">
            @include('layouts.partials.errors_and_messages')
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body row">
                    @if (Gate::Allows('edit-users'))
                    <div class="col-12 col-md-4 mt-2">
                        <a href="{{ route('users.index') }}" class="btn btn-lg btn-primary pt-5 pb-5 btn-block">
                        <h5 class="">Usuarios</h5>
                        </a>
                    </div>
                    @endif
                    <div class="col-12 col-md-4 mt-2">
                        <a href="#" class="btn btn-lg btn-primary pt-5 pb-5 btn-block">
                        <h5 class="">Otra tarjetita accesible</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
