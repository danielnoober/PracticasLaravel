<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::prefix('usuarios')->group(function(){
      /*Route::get('listado', function () {
        return "Lista usuarios";
      });
      Route::get('registro', function () {
        //return "Registro usuarios";
        return view('usuarios.registrar');
      })->name('registro_usuarios');
      Route::get('actualizar/{usuario_id}', function ($usuario_id) {
        return "Actualizar usuarios ".$usuario_id;
      });
      Route::get('eliminar/{usuario_id}', function ($usuario_id) {
        return "Eliminar usuarios ".$usuario_id;
      });*/
      Route::get('lista', [UsuarioController::class, 'listar'])->name('lista_usuarios');
      Route::get('crear', [UsuarioController::class, 'crear'])->name('crear_usuario');
      Route::post('registro', [UsuarioController::class, 'registrar'])->name('registro_usuario');
      Route::get('actualizar/{usuario_id}', [UsuarioController::class, 'actualizar'])->name('actualizar_usuario');
    });

    Route::fallback(function(){
      return "Esta pagina no existe, intente nuevamente";
    });

});

require __DIR__.'/auth.php';
