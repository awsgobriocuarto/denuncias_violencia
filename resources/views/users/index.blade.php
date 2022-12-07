@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left pt-1">Gestión de Usuarios</h3>
                </div>
                <div class="card-body">
                    @include('layouts.partials.errors_and_messages')
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Portal</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                @if ($user->role) {{ $user->role->name }} @else No asignado @endif
                                </td>
                                <td>
                                @if ($user->portal) {{ $user->portal->name }} @else No asignado @endif
                                </td>
                                <td width="10px">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que desea eliminar el usuario?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5"><i class="fas fa-exclamation-triangle"></i> Aún no se han definido usuarios</td></tr>
                            @endforelse
                        </tbody>   
                    </table>   
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection