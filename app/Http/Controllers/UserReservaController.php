<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
use App\Models\Reserva;
use App\Models\FranjaHoraria;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;


class UserReservaController extends Controller
{
    public function index(Request $request)
    {

        $pistas = Pista::all();
        return view('user.reservas', compact('pistas'));
}

public function mostrarCalendario($pistaId)
{
    $pista = Pista::findOrFail($pistaId);

    return view('user.calendario', compact('pista'));
}


public function verHorariosDisponibles(Request $request, $pistaId)
{
    $fecha = $request->query('fecha');

    // Obtener todas las franjas horarias
    $todasLasFranjas = FranjaHoraria::all();

    // Obtener las franjas ocupadas para la pista y fecha seleccionadas
    $franjasReservadas = Reserva::where('id_pista', $pistaId)
        ->where('fecha', $fecha)
        ->pluck('id_franja')
        ->toArray();

    // Filtrar franjas que están ocupadas
    $franjasDisponibles = $todasLasFranjas->filter(function ($franja) use ($franjasReservadas) {
        return !in_array($franja->id, $franjasReservadas);
    });

    // Si no hay franjas disponibles, devolver un array vacío
    return response()->json($franjasDisponibles->isEmpty() ? [] : $franjasDisponibles->map(function ($franja) {
        return [
            'id' => $franja->id,
            'hora_inicio' => date('H:i', strtotime($franja->hora_inicio)) // Formato HH:mm
        ];
    }));
}

public function reservar(Request $request, Pista $pista)
{
    // Validamos los datos recibidos
    $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required|string',
        'usuario_id' => 'required|exists:usuarios,id',
        'pista_id' => 'required|exists:pistas,id'
    ]);

    // Verificar si el usuario ya tiene 2 reservas en la fecha seleccionada
    $reservasCount = Reserva::where('id_usuario', $request->usuario_id)
                            ->whereDate('fecha', $request->fecha) // Comparar solo la fecha, sin la hora
                            ->count();

    if ($reservasCount >= 2) {
        return response()->json([
            'error' => 'No puedes hacer más de 2 reservas al día.'
        ], 400);
    }

    // Buscar la franja horaria que coincide con la hora seleccionada
    $franja = FranjaHoraria::where('hora_inicio', $request->hora)->first();

    if (!$franja) {
        return response()->json(['error' => 'Franja horaria no encontrada.'], 400);
    }

    // Crear la reserva
    $reserva = new Reserva();
    $reserva->fecha = $request->fecha;
    $reserva->id_franja = $franja->id;  // ID de la franja horaria encontrada
    $reserva->id_pista = $pista->id;    // ID de la pista seleccionada
    $reserva->id_usuario = $request->usuario_id;  // ID del usuario autenticado
    $reserva->save();  // Guardamos la reserva en la base de datos

    return response()->json(['success' => true, 'message' => 'Reserva realizada con éxito.']);
}






}
