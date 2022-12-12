@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Portales</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left pt-1">Portales</h3>
                    @if (Gate::Allows('edit-portals'))
                    <a href="{{ route('portals.create') }}" class="btn btn-md btn-primary float-right">Crear</a>
                    @endif
                </div>

                <div class="card-body">
                    @include('layouts.partials.errors_and_messages')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th colspan="2" width="20%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($portals as $portal)
                            <tr>
                                <td>{{ $portal->id }}</td>
                                <td>{{ $portal->name }}</td>
                                <td>{{ $portal->description }}</td>
                                <td>
                                @if ( $portal->state == 1) 
                                Publicado 
                                @else 
                                No publicado 
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('portals.edit', $portal) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('portals.destroy', $portal) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que desea eliminar..?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                Aún no se ha definido ningún portal.
                                Para continuar <a href="{{ route('portals.create') }}">cree uno</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $portals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection