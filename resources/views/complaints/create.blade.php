@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('complaints.index', Session::get('redirect')) }}">Denuncias</a></li>
                    <li class="breadcrumb-item active">Crear Denuncia</li>
                </ol>
            </nav>
            @include('layouts.partials.errors_and_messages')
            <div class="card">
                <div class="card-header">
                    <h3>Detalle de la denuncia</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-5">
                            <label for="portal_id">Lugar donde se tomo la denuncia (Portal)</label>
                            <select class="form-control" name="portal_id" required>
                                @foreach ($portals as $portal)
                                <option value="{{$portal->id}}" @if ($portal->state === 1) selected @endif>
                                    {{$portal->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="user_id">Usuario que tomo la denuncia</label>
                            <input type="text" class="form-control" name="user_id" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="form-group col-12">
                            <label for="person_id">Datos Persona</label>
                            <input type="text" class="form-control" name="person_id" value="{{ old('person_id') }}">
                        </div>
                        
                        <div class="form-group col-12">
                            <label for="type_of_violence">Tipo de violencia</label>
                            <input type="text" class="form-control" name="type_of_violence" value="{{ old('type_of_violence') }}">
                        </div>

                        <hr/>   
                        <div class="form-group col-12">
                            <div style="text-align:left;">
                                <a href="{{ route('complaints.index', Session::get('redirect')) }}" class="btn btn-primary">Volver a listado</a>
                                <input type="submit" name="guardar" value="Crear" class="btn btn-success">
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