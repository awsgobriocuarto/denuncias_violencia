@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portals.index', Session::get('redirect')) }}">Portales</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </nav>
            @include('layouts.partials.errors_and_messages')
            <div class="card">
                <div class="card-header"><h3 class="mt-2">Crear Portal</h3></div>
                <div class="card-body">
                    <form 
                        action="{{ route('portals.store') }}" 
                        method="POST"
                        enctype="multipart/form-data"
                    >   
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre (*)</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" autofocus required minlength=3>
                        </div>
                        <div class="form-group">
                            <label for="description">Breve descripción </label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group col-12">
                            <div style="text-align:left;">
                                <a href="{{ route('portals.index', Session::get('redirect') )}}" class="btn btn-primary">Volver a listado</a>
                                <input type="submit" value="Crear" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection