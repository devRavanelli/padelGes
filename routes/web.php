<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Ruta para mostrar todos los usuarios en el panel de administración
Route::get('/admin/usuarios/mostrar', [UsuariosController::class, 'index'])->name('admin.usuarios.mostrar');
Route::get('/admin/usuarios/crear', [UsuariosController::class, 'create'])->name('admin.usuarios.crear');
Route::post('/admin/usuarios/crear', [UsuariosController::class, 'store'])->name('admin.usuarios.store');
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
Route::patch('/admin/usuarios/mostrar/{id}/toggle', [UsuariosController::class, 'toggleActivo'])->name('admin.usuarios.mostrar.toggle');
Route::get('/admin/usuarios/detalle/{id}', [UsuariosController::class, 'mostrarDetalle'])->name('admin.usuarios.detalle');
Route::get('/admin/usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('admin.usuarios.editar'); // Muestra el formulario de edición
Route::put('/admin/usuarios/editar/{id}', [UsuariosController::class, 'actualizar'])->name('admin.usuarios.actualizar'); // Procesa la actualización
Route::get('/admin/reservas/mostrar', [ReservasController::class, 'index'])->name('admin.reservas.mostrar');
Route::get('/admin/reservas/crear', [ReservasController::class, 'create'])->name('admin.reservas.crear');
Route::post('/admin/reservas/crear', [ReservasController::class, 'store'])->name('admin.reservas.store');
Route::get('admin/reservas/editar/{id}', [ReservasController::class, 'edit'])->name('admin.reservas.editar');
Route::put('/admin/reservas/editar/{id}', [ReservasController::class, 'actualizar'])->name('admin.reservas.actualizar');
Route::delete('admin/reservas/{id}', [ReservasController::class, 'destroy'])->name('admin.reservas.destroy');
Route::get('/admin/reservas/franjas-disponibles', [ReservasController::class, 'getFranjasDisponibles'])->name('admin.reservas.getFranjasDisponibles');
Route::get('/', function () {
    return redirect()->route('guest.index');
});
Route::get('/guest/index', [IndexController::class, 'index'])->name('guest.index');
Route::get('/guest/club', function () {
    return view('guest.club');  // Aquí 'club.club' hace referencia a resources/views/club/club.blade.php
});
Route::get('/guest/cursos', function () {
    return view('guest.cursos');  // Aquí 'club.club' hace referencia a resources/views/club/club.blade.php
});
Route::get('guest/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('guest/login', [AuthController::class, 'login'])->name('guest.login');
Route::post('guest/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user/reservas', function () {
    return view('user.reservas');  // Aquí 'reservas.reservas' hace referencia a resources/views/reservas/reservas.blade.php
});
Route::get('/user/usuario', [ReservasController::class, 'misReservas'])->name('user.usuario');
Route::delete('/user/usuario/{id}', [ReservasController::class, 'cancelarReserva'])->name('reservas.cancelarReserva');
