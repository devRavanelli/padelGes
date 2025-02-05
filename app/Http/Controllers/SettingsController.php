<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios


        // Pasar los usuarios a la vista
        return view('admin.settings');
    }
}
