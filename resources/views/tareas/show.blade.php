@extends('layouts.app')

@section('title', 'Detalle de Tarea')

@section('content')
    <h1 class="mb-4">Detalle de la Tarea</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title">{{ $tarea->titulo }}</h3>
            <hr>
            
            <p><strong>Descripción:</strong> {{ $tarea->descripcion ?? 'Sin descripción' }}</p>
            <p><strong>Fecha límite:</strong> {{ $tarea->fecha_limite?->format('d/m/Y') ?? '—' }}</p>
            <p>
                <strong>Estado:</strong>
                @if($tarea->completada)
                    <span class="badge bg-success">Completada</span>
                @else
                    <span class="badge bg-warning text-dark">Pendiente</span>
                @endif
            </p>
            <p><strong>Creada:</strong> {{ $tarea->created_at->format('d/m/Y H:i') }}</p>

            <div class="mt-4">
                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
