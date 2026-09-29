@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
    <h1 class="mb-4">Editar Tarea</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Título -->
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título *</label>
                    <input 
                        type="text" 
                        id="titulo"
                        name="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror" 
                        value="{{ old('titulo', $tarea->titulo) }}" 
                        required
                    >
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea 
                        id="descripcion"
                        name="descripcion" 
                        rows="3" 
                        class="form-control @error('descripcion') is-invalid @enderror"
                    >{{ old('descripcion', $tarea->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fecha Límite -->
                <div class="mb-3">
                    <label for="fecha_limite" class="form-label">Fecha límite</label>
                    <input 
                        type="date" 
                        id="fecha_limite"
                        name="fecha_limite" 
                        class="form-control @error('fecha_limite') is-invalid @enderror" 
                        value="{{ old('fecha_limite', $tarea->fecha_limite?->format('Y-m-d')) }}"
                    >
                    @error('fecha_limite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado Completada -->
                <div class="form-check mb-4">
                    <input 
                        type="checkbox" 
                        id="completada"
                        name="completada" 
                        value="1" 
                        class="form-check-input"
                        {{ old('completada', $tarea->completada) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="completada">
                        Completada
                    </label>
                </div>

                <!-- Botones -->
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection