<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexUSDController extends Controller
{
    public function index()
    {
        return view('indexusd.show');
    }

    public function getMonedas()
    {
        $monedas = DB::table('valores_moneda')
            ->select(DB::raw('DISTINCT moneda'))
            // ->where('moneda', 'like', '%USD%')
            ->where('moneda', 'EURUSD')
            ->orwhere('moneda', 'GBPUSD')
            ->orwhere('moneda', 'AUDUSD')
            ->orwhere('moneda', 'NZDUSD')
            ->orwhere('moneda', 'USDCAD')
            ->orwhere('moneda', 'USDCHF')
            ->orwhere('moneda', 'USDJPY')
            ->orwhere('moneda', 'USDMXN')
            // ->orderByDesc(DB::raw('FIELD(moneda, EURUSD, GBPUSD, AUDUSD, NZDUSD, USDCAD, USDCHF, USDJPY, USDMXN)'))
            ->get();

        return response(['monedas' => $monedas]);
    }

    public function getIndexUSD(Request $request)
    {
        $fecha_desde = $request->fecha_desde;
        $fecha_desde = date("Y-m-d H:i:s", strtotime($fecha_desde));
        $fecha_eje = $request->fecha_eje;
        $fecha_eje = date("Y-m-d H:i:s", strtotime($fecha_eje));

        $moneda = $request->moneda;

        $fecha_eje_row = DB::table('valores_moneda')
            ->where('hora', '>=', $fecha_eje)
            ->where('moneda', '=', $moneda)
            ->limit(1)
            ->get();

        $valor_eje = $fecha_eje_row[0]->valor;

        $currencies = DB::table('valores_moneda')
            ->where('hora', '>=', $fecha_desde)
            ->where('moneda', '=', $moneda)
            ->get();

        return response(['currencies' => $currencies, 'valor_eje' => $valor_eje]);
    }

    public function getEje(Request $request)
    {
        $fecha_eje = $request->fecha_eje;
        $moneda = $request->moneda;

        $fecha_eje_row = DB::table('valores_moneda')
            ->where('hora', '>=', $fecha_eje)
            ->where('moneda', '=', $moneda)
            ->limit(1)
            ->get();

        $valor_eje = $fecha_eje_row[0]->valor;

        return $valor_eje;
    }
}