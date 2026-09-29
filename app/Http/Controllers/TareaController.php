<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'completada' => 'nullable|boolean',
            'fecha_limite' => 'nullable|date',
        ]);
        // Crear la tarea
        Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'completada' => $request->has('completada'),
            'fecha_limite' => $request->fecha_limite,
        ]);
        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'completada' => 'nullable|boolean',
            'fecha_limite' => 'nullable|date',
        ]);
            $tarea->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'completada' => $request->has('completada'),
            'fecha_limite' => $request->fecha_limite,
        ]);
            return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
