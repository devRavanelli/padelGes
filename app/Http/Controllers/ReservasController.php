<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Pista;
use App\Models\FranjaHoraria;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{
    public function index(Request $request)
    {
        $query = Reserva::with(['franja', 'pista', 'usuario']);

        // Filtro por usuario (nombre o apellido)
        if ($request->filled('search')) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->search . '%')
                  ->orWhere('apellido1', 'like', '%' . $request->search . '%');
            });
        }

        // Filtro por fecha
        if ($request->filled('fecha')) {
            $query->whereDate('fecha', $request->fecha);
        }

        // Filtro por pista
        if ($request->filled('id_pista')) {
            $query->where('id_pista', $request->id_pista);
        }

        // Paginación con 10 resultados por página
        //$reservas = $query->simplePaginate(10);
        $reservas = $query->orderByDesc('id')->simplePaginate(10);
        // Obtener todas las pistas y usuarios para el select
        $pistas = Pista::all();
        $usuarios = Usuarios::all();  // 🔹 Agregar esta línea

        return view('admin.reservas.mostrar', compact('reservas', 'pistas', 'usuarios'));
    }


    public function edit($id)
{
    $reserva = Reserva::findOrFail($id);

    // Asegurémonos de que la fecha esté en formato 'Y-m-d'
    $reserva->fecha = $reserva->fecha->toDateString(); // Esto devuelve 'Y-m-d'

    $pistas = Pista::all();
    $usuarios = Usuarios::all();
    $franjas = FranjaHoraria::all();

    return view('admin.reservas.editar', compact('reserva', 'pistas', 'usuarios', 'franjas'));
}




public function destroy($id)
{
    // Encontrar la reserva por su ID
    $reserva = Reserva::findOrFail($id);

    // Eliminar la reserva
    $reserva->delete();

    // Redirigir al usuario a la lista de reservas con un mensaje de éxito
    return redirect()->route('admin.reservas.mostrar')
                     ->with('success', 'Reserva eliminada con éxito');
}


    public function create()
{
    // Obtener todas las pistas disponibles
    $pistas = Pista::all();

    // Obtener todos los usuarios para el formulario
    $usuarios = Usuarios::all();

    // Obtener todas las franjas horarias disponibles
    $franjas = FranjaHoraria::all();

    // Obtener todas las reservas para comprobar las franjas ocupadas
    $reservas = Reserva::all();

    // Devolver a la vista con las pistas, usuarios, franjas y reservas
    return view('admin.reservas.crear', compact('pistas', 'usuarios', 'franjas', 'reservas'));
}




    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'id_pista' => 'required|exists:pistas,id',
            'id_franja' => 'required|exists:franjas_horarias,id',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);


        // Crear la reserva
        Reserva::create([
            'fecha' => $request->fecha,
            'id_pista' => $request->id_pista,
            'id_franja' => $request->id_franja,
            'id_usuario' => $request->id_usuario,
        ]);

        // Redirigir a la lista de reservas con un mensaje de éxito
        return response()->json(['success' => true, 'message' => 'Reserva creada exitosamente']);
    }

    public function getFranjasDisponibles(Request $request)
    {
        // Validar que se envían los datos necesarios
        $request->validate([
            'fecha' => 'required|date',
            'id_pista' => 'required|exists:pistas,id',
        ]);

        // Obtener las franjas que ya están reservadas en esa fecha y pista
        $franjasOcupadas = Reserva::where('fecha', $request->fecha)
                                  ->where('id_pista', $request->id_pista)
                                  ->pluck('id_franja')
                                  ->toArray();

        // Obtener las franjas disponibles (las que no están en $franjasOcupadas)
        $franjasDisponibles = FranjaHoraria::whereNotIn('id', $franjasOcupadas)->get();

        // Retornar las franjas disponibles en formato JSON para AJAX
        return response()->json($franjasDisponibles);
    }


    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_pista' => 'required|exists:pistas,id',
            'id_franja' => 'required|exists:franjas_horarias,id',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        // Encuentra la reserva
        $reserva = Reserva::findOrFail($id);

        // Si no se ha modificado la fecha, mantener la original
        $fecha = $request->fecha == $reserva->fecha->format('Y-m-d') ? $reserva->fecha : $request->fecha;

        // Actualizar la reserva
        $reserva->update([
            'fecha' => $fecha,
            'id_pista' => $request->id_pista,
            'id_franja' => $request->id_franja,
            'id_usuario' => $request->id_usuario,
        ]);

        // Redirige a la vista de detalle con un mensaje de éxito
        return response()->json(['success' => true]);
    }


    public function misReservas()
    {
        // Obtener las reservas del usuario autenticado
        $reservas = Reserva::where('id_usuario', Auth::id())->get();

        // Retornar la vista del usuario con sus reservas
        return view('user.usuario', compact('reservas'));
    }

    public function canclearReserva($id){

        $reserva = Reserva::findOrFail($id);

        // Eliminar la reserva
        $reserva->delete();

        // Redirigir al usuario a la lista de reservas con un mensaje de éxito
        return redirect()->route('user.usuario')
                         ->with('success', 'Reserva eliminada con éxito');

    }

}


