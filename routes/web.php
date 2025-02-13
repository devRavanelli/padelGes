<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserReservaController;
use App\Http\Controllers\PistasController;

// Ruta para mostrar todos los usuarios en el panel de administración
Route::get('/admin/usuarios/mostrar', [UsuariosController::class, 'index'])->name('admin.usuarios.mostrar')->middleware('auth');
Route::get('/admin/usuarios/crear', [UsuariosController::class, 'create'])->name('admin.usuarios.crear')->middleware(['auth', 'is_admin']);
Route::post('/admin/usuarios/crear', [UsuariosController::class, 'store'])->name('admin.usuarios.store')->middleware(['auth', 'is_admin']);
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings')->middleware(['auth', 'is_admin']);
Route::patch('/admin/usuarios/mostrar/{id}/toggle', [UsuariosController::class, 'toggleActivo'])->name('admin.usuarios.mostrar.toggle')->middleware(['auth', 'is_admin']);
Route::get('/admin/usuarios/detalle/{id}', [UsuariosController::class, 'mostrarDetalle'])->name('admin.usuarios.detalle')->middleware(['auth', 'is_admin']);
Route::get('/admin/usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('admin.usuarios.editar')->middleware(['auth', 'is_admin']); // Muestra el formulario de edición
Route::put('/admin/usuarios/editar/{id}', [UsuariosController::class, 'actualizar'])->name('admin.usuarios.actualizar')->middleware(['auth', 'is_admin']); // Procesa la actualización
Route::get('/admin/reservas/mostrar', [ReservasController::class, 'index'])->name('admin.reservas.mostrar')->middleware(['auth', 'is_admin']);
Route::get('/admin/reservas/crear', [ReservasController::class, 'create'])->name('admin.reservas.crear')->middleware(['auth', 'is_admin']);
Route::post('/admin/reservas/crear', [ReservasController::class, 'store'])->name('admin.reservas.store')->middleware(['auth', 'is_admin']);
Route::get('admin/reservas/editar/{id}', [ReservasController::class, 'edit'])->name('admin.reservas.editar')->middleware(['auth', 'is_admin']);
Route::put('/admin/reservas/editar/{id}', [ReservasController::class, 'actualizar'])->name('admin.reservas.actualizar')->middleware(['auth', 'is_admin']);
Route::delete('admin/reservas/{id}', [ReservasController::class, 'destroy'])->name('admin.reservas.destroy')->middleware(['auth', 'is_admin']);
Route::get('/admin/reservas/franjas-disponibles', [ReservasController::class, 'getFranjasDisponibles'])->name('admin.reservas.getFranjasDisponibles')->middleware(['auth', 'is_admin']);

Route::get('/admin/pistas/mostrar', [PistasController::class, 'index'])->name('admin.pistas.mostrar')->middleware(['auth', 'is_admin']);
Route::get('/admin/pistas/{id}', [PistasController::class, 'show'])->name('admin.pistas.detalle')->middleware(['auth', 'is_admin']);
Route::get('/admin/pistas/{pista}/editar', [PistasController::class, 'edit'])->name('admin.pistas.editar')->middleware(['auth', 'is_admin']);
Route::put('/admin/pistas/{pista}', [PistasController::class, 'update'])->name('admin.pistas.actualizar')->middleware(['auth', 'is_admin']);

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

Route::get('/user/reservas', [UserReservaController::class, 'index'])->name('user.reservas')->middleware('auth');

Route::get('/user/{pista}/calendario', [UserReservaController::class, 'mostrarCalendario'])->middleware('auth')
    ->name('user.calendario');

Route::get('/user/{pista}/horarios', [UserReservaController::class, 'verHorariosDisponibles'])->middleware('auth')
    ->name('user.horarios');


Route::post('/user/{pista}/reservar', [UserReservaController::class, 'reservar'])->middleware('auth')
    ->name('user.reservar');


Route::get('/user/usuario', [ReservasController::class, 'misReservas'])->name('user.usuario')->middleware('auth');
Route::delete('/user/usuario/{id}', [ReservasController::class, 'cancelarReserva'])->name('reservas.cancelarReserva')->middleware('auth');
