@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Denuncias</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left pt-1">Gestión de Denuncias</h3>
                    <a href="{{ route('complaints.create') }}" class="btn btn-md btn-primary float-right">Crear</a>
                </div>
                
                <div class="card-body">
                    @include('layouts.partials.errors_and_messages')
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th >Fecha</th>
                                <th>DNI</th>
                                <th>Efectuada en (webmaster admin)</th>
                                <th>Usuario que tomo la denuncia</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $complaint)
                            <tr>
                                <td>{{ $complaint->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($complaint->created_at)->format('d/m/Y, H:i') }}</td>
                                <td>{{ $complaint->person->dni }}</td>
                                <td>{{ $complaint->portal->name }}</td>
                                <td>{{ $complaint->user->name }}</td>
                                <td width="10px">
                                    <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('complaints.destroy', $complaint) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que desea eliminar la denuncia?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5"><i class="fas fa-exclamation-triangle"></i> No hay denuncias para listar</td></tr>
                            @endforelse
                        </tbody>   
                    </table>   
                </div>
                <div class="card-footer">
                    {{ $complaints->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection