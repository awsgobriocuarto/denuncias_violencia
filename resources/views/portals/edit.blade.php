@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portals.index', Session::get('redirect')) }}">Portales</a></li>
                    <li class="breadcrumb-item active">Editar portal</li>
                </ol>
            </nav>
            @include('layouts.partials.errors_and_messages')
            <div class="card">
                <div class="card-header">
                    <h3>Detalle del portal</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('portals.update', $portal ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ $portal->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" rows="3" class="form-control">{{ $portal->description }}</textarea>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="state">Estado</label>
                            <select class="form-control" name="state" required>
                                <option value="1" @if ($portal->state === 1) selected @endif>Publicado</option>
                                <option value="2" @if ($portal->state === 2) selected @endif>No publicado</option>
                            </select>
                        </div>
                        <hr/>   
                        <div class="form-group col-12">
                            <div style="text-align:left;">
                                <a href="{{ route('portals.index', Session::get('redirect')) }}" class="btn btn-primary">Volver a listado</a>
                                <input type="submit" name="guardar" value="Actualizar" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection