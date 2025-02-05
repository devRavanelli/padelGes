<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        // Crear la consulta base
        $query = Usuarios::query();

        // Si hay un término de búsqueda
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            // Filtrar por nombre, apellido1, apellido2 o dni
            $query->where('nombre', 'LIKE', "%$searchTerm%")
                ->orWhere('apellido1', 'LIKE', "%$searchTerm%")
                ->orWhere('apellido2', 'LIKE', "%$searchTerm%")
                ->orWhere('dni', 'LIKE', "%$searchTerm%");
        }

        // Obtener los usuarios que coinciden con el término de búsqueda
        $usuarios = $query->simplePaginate(10);


        // Pasar los usuarios a la vista
        return view('admin.usuarios.mostrar', compact('usuarios'));
    }

    public function toggleActivo($id)
    {
        $usuario = Usuarios::findOrFail($id); // Encuentra al usuario por su ID
        $usuario->activo = !$usuario->activo; // Cambia el estado de activo
        $usuario->save(); // Guarda los cambios

        return redirect()->back()->with('success', 'Estado del usuario actualizado correctamente.');
    }

    public function create()
    {
        return view('admin.usuarios.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido1' => 'required|string|max:255',
            'dni' => 'required|string|size:9|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'required|string|size:9',
            'direccion' => 'required|string|max:255',
            'rol' => 'required|in:socio,admin',
            'nivel' => 'required|numeric|between:1.0,7.0',
            'sexo' => 'required|in:M,F',
            'password' => 'required|confirmed|min:8',
        ]);

        // Crear el usuario
        Usuarios::create([
            'nombre' => $request->nombre,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rol' => $request->rol,
            'nivel' => $request->nivel,
            'sexo' => $request->sexo,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario creado exitosamente']);
    }

    public function mostrarDetalle($id)
    {
        // Buscar el usuario por ID
        $usuario = Usuarios::findOrFail($id);

        // Retornar la vista con los datos del usuario
        return view('admin.usuarios.detalle', compact('usuario'));
    }

    public function editar($id)
    {
        $usuario = Usuarios::findOrFail($id); // Busca el usuario por ID
        return view('admin.usuarios.editar', compact('usuario')); // Pasa los datos del usuario a la vista
    }


    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido1' => 'required|string|max:255',
            'dni' => [
                'required',
                'string',
                'size:9',
                Rule::unique('usuarios', 'dni')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('usuarios', 'email')->ignore($id),
            ],
            'telefono' => 'required|string|size:9',
            'direccion' => 'required|string|max:255',
            'rol' => 'required|in:socio,admin',
            'nivel' => 'required|numeric|between:1.0,7.0',
            'sexo' => 'required|in:M,F',
            'password' => 'required|confirmed|min:8',
        ]);



        // Encuentra el usuario y actualiza sus datos
        $usuario = Usuarios::findOrFail($id);

        $usuario->update([
            'nombre' => $request->nombre,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rol' => $request->rol,
            'nivel' => $request->nivel,
            'sexo' => $request->sexo,
            'password' => bcrypt($request->password),
        ]);

        // Redirige a la vista de detalle con un mensaje de éxito
        return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente']);
    }
}
