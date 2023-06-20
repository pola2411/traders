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
Route::get('/admin/showTraderReport', [App\Http\Controllers\TraderReportController::class, 'getReportResult'])->middleware('auth');
Route::get('/admin/showReport', [App\Http\Controllers\TraderReportController::class, 'getReport'])->middleware('auth');

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

Route::get('/admin/indexUSDCADCHF', [App\Http\Controllers\IndexUSDCADCHFController::class, 'index'])->middleware('auth');
Route::get('/admin/getMonedasUSDCADCHF', [App\Http\Controllers\IndexUSDCADCHFController::class, 'getMonedasUSDCADCHF'])->middleware('auth');
Route::get('/admin/getIndexUSDUSDCADCHF', [App\Http\Controllers\IndexUSDCADCHFController::class, 'getIndexUSDUSDCADCHF'])->middleware('auth');

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
Route::get('/admin/traders-analysis/{id}', [App\Http\Controllers\TradersDataController::class, 'getPDF'])->middleware('auth');

Route::get('/admin/traders-data-apertura/{id}', [App\Http\Controllers\TradersDataAperturaController::class, 'index'])->middleware('auth');
Route::get('/admin/getInfoApertura', [App\Http\Controllers\TradersDataAperturaController::class, 'getInfo'])->middleware('auth');
Route::get('/admin/traders-analysis-apertura/{id}', [App\Http\Controllers\TradersDataAperturaController::class, 'getPDF'])->middleware('auth');


//Estudio Eficiencia
Route::get('/admin/estudio-data/{par}', [App\Http\Controllers\EstudioController::class, 'index'])->middleware('auth');
Route::get('/admin/getInfoEstudio', [App\Http\Controllers\EstudioController::class, 'getInfoEstudio'])->middleware('auth');
Route::get('/admin/estudio-analysis/{par}', [App\Http\Controllers\EstudioController::class, 'getPDF'])->middleware('auth');

//Estudio lista
Route::get('/admin/estudioLista', [App\Http\Controllers\EstudioListaController::class, 'index'])->middleware('auth');
Route::get('/admin/showLista', [App\Http\Controllers\EstudioListaController::class, 'getLista'])->middleware('auth');
Route::post('/admin/addEstudio', [App\Http\Controllers\EstudioListaController::class, 'addEstudio'])->middleware('auth');
Route::post('/admin/editEstudio', [App\Http\Controllers\EstudioListaController::class, 'editEstudio'])->middleware('auth');
Route::post('/admin/deleteEstudio', [App\Http\Controllers\EstudioListaController::class, 'deleteEstudio']);

//Traders
Route::get('/admin/traders', [App\Http\Controllers\TraderController::class, 'index'])->middleware('auth');
Route::get('/admin/showTraders', [App\Http\Controllers\TraderController::class, 'getTrader'])->middleware('auth');
Route::post('/admin/addTrader', [App\Http\Controllers\TraderController::class, 'addTrader'])->middleware('auth');
Route::get('/admin/editStatus', [App\Http\Controllers\TraderController::class, 'editStatus'])->middleware('auth');

//consultar momento
Route::get('/admin/momento/{id}', [App\Http\Controllers\MomentoController::class, 'index'])->name('momento')->middleware('auth');
Route::get('/admin/showMomento', [App\Http\Controllers\MomentoController::class, 'getMomento'])->middleware('auth');
Route::get('/admin/showMomento', [App\Http\Controllers\MomentoController::class, 'getMomento'])->middleware('auth');

//consultar operaciones magic number
Route::get('/admin/statusMagic/{id}', [App\Http\Controllers\MagicOperacionController::class, 'index'])->name('status')->middleware('auth');
Route::get('/admin/showStatusmagic', [App\Http\Controllers\MagicOperacionController::class, 'getDatos']);
Route::get('/admin/showStatusmagic403', [App\Http\Controllers\MagicOperacionController::class, 'getDatos403']);
Route::get('/admin/showStatusmagic404', [App\Http\Controllers\MagicOperacionController::class, 'getDatos404']);
Route::get('/admin/showStatusmagic405', [App\Http\Controllers\MagicOperacionController::class, 'getDatos405']);
Route::get('/admin/magicnumber-analysis', [App\Http\Controllers\MagicOperacionController::class, 'getPDF']);
Route::get('/admin/magicnumber403-analysis', [App\Http\Controllers\MagicOperacionController::class, 'getPDF403']);
Route::get('/admin/magicnumber404-analysis', [App\Http\Controllers\MagicOperacionController::class, 'getPDF404']);
Route::get('/admin/magicnumber405-analysis', [App\Http\Controllers\MagicOperacionController::class, 'getPDF405']);

// Route::get('/admin/showStatusmagic/404', [App\Http\Controllers\MagicOperacionController::class, 'getDatos404']);

//consultar status
Route::get('/admin/status/{id}', [App\Http\Controllers\StatusController::class, 'index'])->name('status')->middleware('auth');
Route::get('/admin/showStatus', [App\Http\Controllers\StatusController::class, 'getDatos']);


//consultar status gráfica
Route::get('/admin/status-grafica/{id}', [App\Http\Controllers\StatusGraficaController::class, 'index'])->name('statusgrafica')->middleware('auth');
Route::get('/admin/getMonedasStatus', [App\Http\Controllers\StatusGraficaController::class, 'getMonedas'])->middleware('auth');

Route::get('/admin/grafica-profit/{id}', [App\Http\Controllers\StatusGraficaController::class, 'indexProfit'])->name('graficaprofit')->middleware('auth');
Route::get('/admin/getStatusGraficaProfit', [App\Http\Controllers\StatusGraficaController::class, 'getGraficaProfit'])->middleware('auth');

Route::get('/admin/grafica-lote/{id}', [App\Http\Controllers\StatusGraficaController::class, 'indexLote'])->name('graficalote')->middleware('auth');
Route::get('/admin/getStatusGraficaLote', [App\Http\Controllers\StatusGraficaController::class, 'getGraficaLote'])->middleware('auth');

Route::get('/admin/grafica-suma-lote', [App\Http\Controllers\StatusGraficaController::class, 'indexSumLote'])->name('graficasumalote')->middleware('auth');
Route::get('/admin/grafica-equity', [App\Http\Controllers\StatusGraficaController::class, 'indexEquity'])->name('graficaequity')->middleware('auth');

Route::get('/admin/cleo-data/{par}', [App\Http\Controllers\StatusGraficaController::class, 'indexVelocimetro'])->name('velocimetro')->middleware('auth');
Route::get('/admin/cleoDataShow', [App\Http\Controllers\StatusGraficaController::class, 'cleoData'])->middleware('auth');

Route::get('/admin/logs/', [App\Http\Controllers\LogsController::class, 'index'])->name('logs')->middleware('auth');
Route::get('/admin/logsShow', [App\Http\Controllers\LogsController::class, 'getLogs'])->middleware('auth');
Route::get('/admin/logsShowFiltro', [App\Http\Controllers\LogsController::class, 'getLogsFiltro'])->middleware('auth');

Route::get('/admin/ejemplo', [App\Http\Controllers\EjemploController::class, 'index'])->name('ejemplo')->middleware('auth');
Route::get('/admin/ejemplo1', [App\Http\Controllers\EjemploController1::class, 'index'])->name('ejemplo1')->middleware('auth');

Route::get('/admin/ejemplo3', [App\Http\Controllers\EjemploController::class, 'index3'])->name('ejemplo3')->middleware('auth');
Route::get('/admin/getEditEjemplo3', [App\Http\Controllers\EjemploController::class, 'getEditEjemplo3'])->middleware('auth');

Route::get('/admin/cleoTabla', [App\Http\Controllers\StatusGraficaController::class, 'cleoTabla'])->name('cleotabla')->middleware('auth');
Route::get('/admin/cleoTablaShow', [App\Http\Controllers\StatusGraficaController::class, 'cleoTablaShow'])->middleware('auth');

Route::get('/admin/transmision', [App\Http\Controllers\TransmisionController::class, 'index'])->middleware('auth');

Route::get('/admin/botones', [App\Http\Controllers\BotonController::class, 'index'])->middleware('auth');
Route::get('/admin/boton1', [App\Http\Controllers\BotonController::class, 'boton1'])->middleware('auth');
Route::get('/admin/boton2', [App\Http\Controllers\BotonController::class, 'boton2'])->middleware('auth');
Route::get('/admin/boton3', [App\Http\Controllers\BotonController::class, 'boton3'])->middleware('auth');
Route::get('/admin/boton4', [App\Http\Controllers\BotonController::class, 'boton4'])->middleware('auth');
Route::get('/admin/boton5', [App\Http\Controllers\BotonController::class, 'boton5'])->middleware('auth');
Route::get('/admin/boton6', [App\Http\Controllers\BotonController::class, 'boton6'])->middleware('auth');
Route::get('/admin/boton7', [App\Http\Controllers\BotonController::class, 'boton7'])->middleware('auth');
Route::get('/admin/boton8', [App\Http\Controllers\BotonController::class, 'boton8'])->middleware('auth');
Route::get('/admin/boton9', [App\Http\Controllers\BotonController::class, 'boton9'])->middleware('auth');
Route::get('/admin/boton10', [App\Http\Controllers\BotonController::class, 'boton10'])->middleware('auth');
Route::get('/admin/boton11', [App\Http\Controllers\BotonController::class, 'boton11'])->middleware('auth');
Route::get('/admin/boton12', [App\Http\Controllers\BotonController::class, 'boton12'])->middleware('auth');
Route::get('/admin/boton13', [App\Http\Controllers\BotonController::class, 'boton13'])->middleware('auth');
Route::get('/admin/boton14', [App\Http\Controllers\BotonController::class, 'boton14'])->middleware('auth');
Route::get('/admin/boton15', [App\Http\Controllers\BotonController::class, 'boton15'])->middleware('auth');
Route::get('/admin/boton16', [App\Http\Controllers\BotonController::class, 'boton16'])->middleware('auth');