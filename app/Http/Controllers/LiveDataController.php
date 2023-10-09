<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LiveDataController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    
    public function index()
    {

        return view('live-data.show');
        
    }

    public function showLiveData()
    {

        $liveData = DB::table('live')->select()->where('spectrum','!=', 0)->orderBy('time', 'DESC')->get();


        return datatables()->of($liveData)
            ->addColumn('strategybuy', 'live-data.strategybuy')
            ->addColumn('strategysell', 'live-data.strategysell')
            ->rawColumns(['strategybuy','strategysell'])->toJson();
    }

    // public function showLiveDataFiltro(Request $request)
    // {
    //     $fechaInicio = $request->fecha_inicio;
    //     $fechaFin = $request->fecha_fin;
    //     // $cuenta = $request->cuenta;

    //     // if ($cuenta == 0) {
    //     //     $logs = DB::table('logs')->select()->whereBetween('fecha', [$fechaInicio, $fechaFin])->orderBy('fecha', 'DESC')->get();
    //     // } else
    //     if ($fechaInicio == null && $fechaFin == null) {
    //         $liveData = DB::table('live')->select()->orderBy('time', 'DESC')->get();
    //     } else
    //     $liveData = DB::table('live')->select()->whereBetween('time', [$fechaInicio, $fechaFin])->orderBy('time', 'DESC')->get();
    

    //     return datatables()->of($liveData)->toJson();
    // }
}
