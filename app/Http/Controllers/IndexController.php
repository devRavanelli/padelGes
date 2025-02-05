<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Pista;

class IndexController extends Controller
{
    public function index()
{
    $totalUsuarios = Usuarios::count(); // Contar usuarios en la base de datos
    $totalPistas = Pista::count();
    return view('guest.index', compact('totalUsuarios', 'totalPistas'));
}
}
