@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('complaints.index', Session::get('redirect')) }}">Denuncias</a></li>
                    <li class="breadcrumb-item active">Editar Denuncia</li>
                </ol>
            </nav>
            @include('layouts.partials.errors_and_messages')
            <div class="card">
                <div class="card-header">
                    <h3>Detalle de la denuncia</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('complaints.update', $complaint ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="person_id">Datos Persona</label>
                            <input type="text" class="form-control" name="person_id" value="{{ $complaint->person->id }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="type_of_violence">Tipo de violencia</label>
                            <input type="text" class="form-control" name="type_of_violence" value="{{ $complaint->type_of_violence}}">
                        </div>

                        <div class="form-group">
                            <label for="portal_id">Lugar donde se tomo la denuncia</label>
                            <input type="text" class="form-control" name="portal_id" value="{{ $complaint->portal->id }}">
                        </div>

                        <div class="form-group">
                            <label for="user_id">Usuario que tomo la denuncia </label>
                            <input type="text" class="form-control" name="user_id" value="{{ $complaint->user->id }}">
                        </div>
                        
                        <hr/>   
                        <div class="form-group col-12">
                            <div style="text-align:left;">
                                <a href="{{ route('complaints.index', Session::get('redirect')) }}" class="btn btn-primary">Volver a listado</a>
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