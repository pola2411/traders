<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas para panel principal de control
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/showTraders', [App\Http\Controllers\DashboardController::class, 'getTraders'])->middleware('auth');
Route::get('/admin/getPruebasVida', [App\Http\Controllers\DashboardController::class, 'getPruebasVida'])->middleware('auth');


// Rutas para gráficas
Route::get('/admin/equityBalance/{id}', [App\Http\Controllers\GraficaController::class, 'index'])->middleware('auth');
Route::get('/admin/getTrader', [App\Http\Controllers\GraficaController::class, 'getTrader'])->middleware('auth');

// Rutas de login y registro
Route::get('/', [App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('/', [App\Http\Controllers\SessionController::class, 'store'])->name('login.store');
Route::get('/admin/logout', [App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');

Route::get('/registro', [App\Http\Controllers\RegisterController::class, 'create'])->name('registro');
Route::post('/registro', [App\Http\Controllers\RegisterController::class, 'store'])->name('registro.store');

//consultar margen
Route::get('/admin/margen/{id}', [App\Http\Controllers\MargenController::class, 'index'])->name('margen')->middleware('auth');
Route::get('/admin/showMargen', [App\Http\Controllers\MargenController::class, 'getMargen'])->middleware('auth');

//trader report
Route::get('/admin/traderReport/{id}', [App\Http\Controllers\TraderReportController::class, 'index'])->middleware('auth');
Route::post('/admin/traderReport/{id}', [App\Http\Controllers\TraderReportController::class, 'getResults'])->middleware('auth');
Route::get('/admin/showReport', [App\Http\Controllers\TraderReportController::class, 'getReport'])->middleware('auth');
Route::post('/admin/showReportResult', [App\Http\Controllers\TraderReportController::class, 'getReport'])->middleware('auth');

//operaciones
Route::get('/admin/operacion', [App\Http\Controllers\OperacionController::class, 'index'])->name('operacion')->middleware('auth');
Route::get('/admin/showOperacion', [App\Http\Controllers\OperacionController::class, 'getOperacion'])->middleware('auth');
Route::get('/admin/showOperacionHuerfana', [App\Http\Controllers\OperacionController::class, 'getOperacionesHuerfanas'])->middleware('auth');
Route::get('/admin/showOperacionHija', [App\Http\Controllers\OperacionController::class, 'getOperacionHija'])->middleware('auth');
Route::post('/admin/operacion/cerrarHuerfana', [App\Http\Controllers\OperacionController::class, 'cierreHuerfana'])->middleware('auth');

//ruta de perfil
Route::get('/admin/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil')->middleware('auth');
Route::post('/admin/editPerfil', [App\Http\Controllers\PerfilController::class, 'editPerfil'])->middleware('auth');

//ruta para imprimir reporte
Route::get('/admin/operacion/reportHuerfanas', [App\Http\Controllers\OperacionController::class, 'reportHuerfanas'])->middleware('auth');

// Index USD reportes
Route::get('/admin/indexUSD', [App\Http\Controllers\IndexUSDController::class, 'index'])->middleware('auth');
Route::get('/admin/getMonedas', [App\Http\Controllers\IndexUSDController::class, 'getMonedas'])->middleware('auth');
Route::get('/admin/getIndexUSD', [App\Http\Controllers\IndexUSDController::class, 'getIndexUSD'])->middleware('auth');

//monitor
Route::get('/admin/monitor', [App\Http\Controllers\MonitorController::class, 'index'])->middleware('auth');
Route::get('/admin/showMonitor', [App\Http\Controllers\MonitorController::class, 'getMonitor'])->middleware('auth');
Route::post('/admin/editarColor', [App\Http\Controllers\MonitorController::class, 'editarColor'])->middleware('auth');
Route::post('/admin/solicitarApertura', [App\Http\Controllers\MonitorController::class, 'solicitarApertura'])->middleware('auth');

//DataMonitor
Route::get('/admin/datamonitor', [App\Http\Controllers\DataMonitorController::class, 'index'])->middleware('auth');
Route::get('/admin/showDataMonitor', [App\Http\Controllers\DataMonitorController::class, 'getMonitor'])->middleware('auth');

//Route::post('/admin/solicitarApertura2', [App\Http\Controllers\DataMonitorController::class, 'solicitarApertura'])->middleware('auth');

//form
Route::get('/admin/formulario', [App\Http\Controllers\FormularioController::class, 'index'])->middleware('auth');
Route::get('/admin/showFormulario', [App\Http\Controllers\FormularioController::class, 'getFormulario'])->middleware('auth');
Route::post('/admin/solicitarOperacion', [App\Http\Controllers\FormularioController::class, 'solicitarOperacion'])->middleware('auth');

//Desbalanceo
Route::get('/admin/desbalanceo', [App\Http\Controllers\DesbalanceoController::class, 'index'])->middleware('auth');
Route::get('/admin/showDesbalanceo', [App\Http\Controllers\DesbalanceoController::class, 'getOperaciones'])->middleware('auth');
Route::get('/admin/showDesbalanceoFix', [App\Http\Controllers\DesbalanceoController::class, 'getOperacionesFix'])->middleware('auth');
Route::post('/admin/addNoOperacion', [App\Http\Controllers\DesbalanceoController::class, 'addNoOperacion'])->middleware('auth');

//Boxes
Route::get('/admin/boxes', [App\Http\Controllers\BoxesController::class, 'index'])->middleware('auth');
Route::get('/admin/showBoxes', [App\Http\Controllers\BoxesController::class, 'getBoxes'])->middleware('auth');

//Boxes2
Route::get('/admin/boxes2', [App\Http\Controllers\Boxes2Controller::class, 'index'])->middleware('auth');
Route::get('/admin/showBoxes2', [App\Http\Controllers\Boxes2Controller::class, 'getBoxes'])->middleware('auth');

//Traders Data
Route::get('/admin/traders-data/{id}', [App\Http\Controllers\TradersDataController::class, 'index'])->middleware('auth');
Route::get('/admin/getInfo', [App\Http\Controllers\TradersDataController::class, 'getInfo'])->middleware('auth');