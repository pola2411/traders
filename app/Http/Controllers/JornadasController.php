<?php

namespace App\Http\Controllers;

use App\Models\OperacionesTrader;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JornadasController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    
    public function index()
    {

        return view('jornadas.show');
        
    }

    public function getJornadas(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    
    public function getSessionJornadas(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('session', $request->session)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    public function getSessionPortfolio(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('portfolio', $request->portfolio)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    public function getJornadasSP(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('session', $request->session)
            ->where('portfolio', $request->portfolio)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    public function getJornadasSPM(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('session', $request->session)
            ->where('portfolio', $request->portfolio)
            ->where('symbol', $request->symbol)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }


    public function getSessionMonedas(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('symbol', $request->symbol)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    public function getJornadasAll(Request $request)
    {
        $jornadas = OperacionesTrader::select()
            ->where('trader', $request->id)
            ->where('session', $request->session)
            ->where('portfolio', $request->portfolio)
            ->where('symbol', $request->symbol)
            ->whereBetween('time_1', [$request->inicio, $request->fin])
            ->orderBy('time_1', 'asc')
            ->get();
        $jornadasNombre = Trader::select()->where('id', $request->id)->get();
        return response(['jornadas' => $jornadas, 'jornadasNombre' => $jornadasNombre]);
    }

    
}
