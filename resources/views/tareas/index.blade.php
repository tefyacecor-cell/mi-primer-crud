@extends('layouts.app')

@section('title', 'Listado de Tareas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Tareas</h1>
        <a href="{{ route('tareas.create') }}" class="btn btn-success">
            + Nueva Tarea
        </a>
    </div>

    @if($tareas->isEmpty())
        <div class="alert alert-info">
            No hay tareas registradas.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover bg-white shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->titulo }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td class="text-end">
                                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                
                                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar esta tarea?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection