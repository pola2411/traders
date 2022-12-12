<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradersDataController extends Controller
{
    public function index()
    {

        return view('tradersdata.show');
        
    }

    public function getInfo(Request $request)
    {
        $tradersNombre = DB::table('traders_data')->select('id','Signal')->where('id', $request->id)->first();

        $monedas = DB::table('valores_moneda')->select('moneda')->distinct()->limit(28)->get();

        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');

        $data = array(
            "tradersNombre" => $tradersNombre,
            "fecha_inicio" => $fecha_inicio,
            "fecha_fin" => $fecha_fin,
            "monedas" => $monedas
        );
    
        return response()->view('tradersdata.table', $data, 200);
    }

}