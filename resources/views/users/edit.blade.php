@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li class="breadcrumb-item active">Editar Usuario</li>
        </ol>
    </nav>
    @include('layouts.partials.errors_and_messages')
    <div class="card">
        <div class="card-header">
            <h3>Detalle de Usuario</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user ) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="email">Id de Usuario</label>
                        <input type="text" class="form-control" name="user_id" value="{{ $user->id }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="role_id">Rol de Usuario</label>
                        <select class="form-control" name="role_id" required>
                            <option value="">No asignado</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($user->role_id === $role->id) selected @endif>
                               {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </br>   
                <div class="form-row">
                    <div class="form-group col-12">
                        <div style="text-align:left;">
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Volver a listado</a>
                            <input type="submit" name="guardar" value="Actualizar" class="btn btn-success">
                        </div>
                    </div>
                </div>                
            </form>
        </div>
    </div>

</div>
@endsection
@section('scripts')
@endsection