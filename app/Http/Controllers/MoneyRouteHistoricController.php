<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MoneyRouteHistoricController extends Controller
{
  
    public function __construct(){
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('money-routehistoric.show');
    }

    public function getMoneyHistoric()
    {
        $monedas = DB::table('money_route')
            ->select(DB::raw('DISTINCT moneda'))
            // ->where('moneda', 'like', '%USD%')
            ->where('moneda', 'EUR')
            ->orwhere('moneda', 'GBP')
            ->orwhere('moneda', 'AUD')
            ->orwhere('moneda', 'USD')
            ->orwhere('moneda', 'NZD')
            ->orwhere('moneda', 'CAD')
            ->orwhere('moneda', 'CHF')
            ->orwhere('moneda', 'JPY')
            ->orderBY('moneda', 'ASC')
            // ->orderByDesc(DB::raw('FIELD(moneda, EURUSD, GBPUSD, AUDUSD, NZDUSD, USDCAD, USDCHF, USDJPY, USDMXN)'))
            ->get();

        return response(['monedas' => $monedas]);
    }

    public function getMoneyRouteHistoric(Request $request)
    {
        $fecha_desde = $request->fecha_desde;
        $fecha_desde = date("Y-m-d H:i:s", strtotime($fecha_desde));
        // $fecha_eje = $request->fecha_eje;
        // $fecha_eje = date("Y-m-d H:i:s", strtotime($fecha_eje));

        $moneda = $request->moneda;

        $fecha_eje_row = DB::table('money_route')
            ->where('hora', '>=', $fecha_desde)
            ->where('moneda', '=', $moneda)
            ->limit(1)
            ->get();

        $valor_eje = $fecha_eje_row[0]->valor;
        $fecha = $fecha_eje_row[0]->hora;

        $currencies = DB::table('money_route')
        ->where('hora', '>=', $fecha_desde)
            ->where('moneda', '=', $moneda)
            ->get();

        return response(['currencies' => $currencies, 'valor_eje' => $valor_eje, 'fecha' => $fecha]);
    }

    public function getMoneyLastHistoric(Request $request)
    {
        $data = DB::table('money_route')
          
            // ->where('moneda', 'like', '%USD%')
            ->where('moneda', 'EUR')
            ->orwhere('moneda', 'GBP')
            ->orwhere('moneda', 'AUD')
            ->orwhere('moneda', 'USD')
            ->orwhere('moneda', 'NZD')
            ->orwhere('moneda', 'CAD')
            ->orwhere('moneda', 'CHF')
            ->orwhere('moneda', 'JPY')
            ->orderBY('id', 'DESC')
            ->limit(8)
            // ->orderByDesc(DB::raw('FIELD(moneda, EURUSD, GBPUSD, AUDUSD, NZDUSD, USDCAD, USDCHF, USDJPY, USDMXN)'))
            ->get();

        return response()->json($data);
    }

    public function getEje(Request $request)
    {
        $fecha_eje = $request->fecha_eje;
        $moneda = $request->moneda;

        $fecha_eje_row = DB::table('money_route')
        ->where('hora', '>=', $fecha_desde)
            ->where('moneda', '=', $moneda)
            ->limit(1)
            ->get();

        $valor_eje = $fecha_eje_row[0]->valor;

        return $valor_eje;
    }
}

