<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
class PistasController extends Controller
{
    public function index()
{

    $pistas = Pista::all();
    return view('admin.pistas.mostrar', compact('pistas'));
}

public function show($id)
{
    $pista = Pista::findOrFail($id);
    return view('admin.pistas.detalle', compact('pista'));
}

public function edit($id)
{
    $pista = Pista::findOrFail($id);
    return view('admin.pistas.editar', compact('pista'));
}

public function update(Request $request, $id)
{
    $pista = Pista::findOrFail($id);

    // Validación de los datos
    $validated = $request->validate([
        'nombre_pista' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tipo_pared' => 'nullable|string',
        'tipo_suelo' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    // Actualizar los datos
    $pista->update($validated);

    // Si hay una imagen, manejarla
    if ($request->hasFile('imagen')) {
        $imagePath = $request->file('imagen')->store('images', 'public');
        $pista->imagen = $imagePath;
        $pista->save();
    }

    return redirect()->route('admin.pistas.mostrar')->with('success', 'Pista actualizada correctamente.');
}

}
