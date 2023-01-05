<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MomentoController extends Controller
{
    public function index()
    {
        return view('momento.show');
    }

    public function getMomento(Request $request)
    {
        
        $fin = Carbon::parse($request->fecha_fin);

        // $traders = array();
        $i = 1;        
        for ($inicio = Carbon::parse($request->fecha_inicio); $inicio <= $fin; $inicio->addMinutes(15)) { 
            $traders_consulta = DB::table('analized_profit')
                ->select()
                ->where('date', $inicio->format('Y-m-d H:i:s'))
                ->where('trader_id', $request->id)
                ->count();

            $traders[] = array(
                'fecha' => $inicio->format('Y-m-d H:i:s'),
                'count' => $traders_consulta,
                'momento' => $i
            );
            
            $i++;
        }

        $tradersNombre = Trader::select()->where('id', $request->id)->get();
        return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);
    }

}