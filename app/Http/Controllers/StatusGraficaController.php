<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusGraficaController extends Controller
{
    // public function index(Request $request)
    // {
    //     return view('statusgrafica.show');
    // }

    // public function getMonedas()
    // {
    //     $monedas = DB::table('valores_moneda')
    //         ->select(DB::raw('DISTINCT moneda'))
    //         ->get();

    //     return response(['monedas' => $monedas]);
    // }    

    public function indexProfit(Request $request)
    {
        $trader = DB::table('traders')
            ->select('nombre')
            ->where('id', $request->id)
            ->first();

        return view('statusgrafica.showprofit', compact('trader'));
    }

    public function getGraficaProfit(Request $request)
    {

        $par = $request->par;
        $monedas = DB::table('status_profit')
            ->select("$par")
            ->where('trader_id', $request->id)
            ->orderBy('fecha', 'DESC')
            ->first();

        return response($monedas->$par);
    }

    public function indexLote(Request $request)
    {
        $trader = DB::table('traders')
            ->select('nombre')
            ->where('id', $request->id)
            ->first();

        return view('statusgrafica.showlotes', compact('trader'));
    }

    public function getGraficaLote(Request $request)
    {

        $par = $request->par;
        $monedas = DB::table('status_lot')
            ->select("$par")
            ->where('trader_id', $request->id)
            ->orderBy('fecha', 'DESC')
            ->first();

        return response($monedas->$par);
    }

    public function indexSumLote(Request $request)
    {
        return view('statusgrafica.showsumalotes');
    }

    public function indexEquity(Request $request)
    {
        return view('statusgrafica.showequity');
    }

    public function indexVelocimetro(Request $request)
    {
        $par = $request->par;
        return view('statusgrafica.showvelocimetro', compact('par'));
    }

    public function cleoData(Request $request)
    {
        $pair = $request->pair;

        $cleo_data = DB::table('cleo_data')
            ->where('pair', $pair)
            ->orderBy('cleo_data.id', 'DESC')
            ->first();

        return response(["pair" => $cleo_data]);
    }

}