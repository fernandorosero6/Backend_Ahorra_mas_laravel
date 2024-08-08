<?php

use App\Http\Controllers\Api\ConsumoController;
use App\Http\Controllers\Api\ContadorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PresupuestoController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\Api\SimuladorController;
use App\Http\Controllers\GraficoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/prueba', function () {
    return 'prueba ñaño';
});

Route::get('/register', [RegisterController::class,'index'])->name('api.register.index');
Route::post('/register', [RegisterController::class,'store'])->name('api.register.store');
Route::get('register/{registro}', [RegisterController::class,'show'])->name('api.register.show');
Route::put('register/{registro}', [RegisterController::class,'update'])->name('api.register.update');
Route::delete('register/{registro}', [RegisterController::class,'destroy'])->name('api.register.delete');



Route::get('/contador', [ContadorController::class,'index'])->name('api.contador.index');
Route::post('/contador', [ContadorController::class,'store'])->name('api.contador.store');
Route::get('contador/{contadors}', [ContadorController::class,'show'])->name('api.contador.show');
Route::put('contador/{contadors}', [ContadorController::class,'update'])->name('api.contador.update');
Route::delete('contador/{contadors}', [ContadorController::class,'destroy'])->name('api.contador.delete');


Route::get('/login', [LoginController::class,'index'])->name('api.login.index');
Route::post('/login', [LoginController::class,'store'])->name('api.login.store');
Route::get('login/{logins}', [LoginController::class,'show'])->name('api.login.show');
Route::put('login/{logins}', [LoginController::class,'update'])->name('api.login.update');
Route::delete('login/{logins}', [LoginController::class,'destroy'])->name('api.login.delete');


Route::get('/presupuesto', [PresupuestoController::class,'index'])->name('api.presupuesto.index');
Route::post('/presupuesto', [PresupuestoController::class,'store'])->name('api.presupuesto.store');
Route::get('presupuesto/{presupuestos}', [PresupuestoController::class,'show'])->name('api.presupuesto.show');
Route::put('presupuesto/{presupuestos}', [PresupuestoController::class,'update'])->name('api.presupuesto.update');
Route::delete('presupuesto/{presupuestos}', [PresupuestoController::class,'destroy'])->name('api.presupuesto.delete');

Route::get('/consumo', [ConsumoController::class, 'index'])->name('api.consumo.index');
Route::post('/consumo', [ConsumoController::class, 'store'])->name('api.consumo.store');
Route::get('/consumo/{consumos}', [ConsumoController::class, 'show'])->name('api.consumo.show');
Route::put('/consumo/{consumos}', [ConsumoController::class, 'update'])->name('api.consumo.update');
Route::delete('/consumo/{consumos}', [ConsumoController::class, 'destroy'])->name('api.consumo.delete');
// Route::get('/consumoData', [ConsumoController::class, 'pasarDataConsumo'])->name('api.pasarDataConsumo.index');


Route::get('/simulador', [SimuladorController::class, 'index'])->name('api.simulador.index');
Route::post('/simulador', [SimuladorController::class, 'store'])->name('api.simulador.store');
// Route::get('/simulador/{consumos}', [SimuladorController::class, 'show'])->name('api.simulador.show');
// Route::put('/simulador/{consumos}', [SimuladorController::class, 'update'])->name('api.simulador.update');
// Route::delete('/simulador/{consumos}', [SimuladorController::class, 'destroy'])->name('api.simulador.delete');



// api categories
// Route::get('categories', [CategoryController::class,'index'])->name('api.categories.index');
// Route::post('categories', [CategoryController::class,'store'])->name('api.categories.store');
// Route::get('categories/{category}', [CategoryController::class,'show'])->name('api.categories.show');
// Route::put('categories/{category}', [CategoryController::class,'update'])->name('api.categories.update');
// Route::delete('categories/{category}', [CategoryController::class,'destroy'])->name('api.categories.delete');