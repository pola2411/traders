<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusGraficaController extends Controller
{
    public function index(Request $request)
    {
        return view('statusgrafica.show');
    }

    public function getMonedas()
    {
        $monedas = DB::table('valores_moneda')
            ->select(DB::raw('DISTINCT moneda'))
            ->get();

        return response(['monedas' => $monedas]);
    }

    public function getGrafica(Request $request)
    {
        $monedas = DB::table('status_profit')
            ->where('trader_id', $request->id)
            ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
            ->get();

        return response(['monedas' => $monedas]);
    }

}