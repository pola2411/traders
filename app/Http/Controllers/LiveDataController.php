<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Live;
use App\Models\TablaLog;


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

        $liveData = DB::table('live')->select()->where('spectrum','!=', 0)->orderBy('id', 'ASC')->get();


        return datatables()->of($liveData)
            ->addColumn('time', 'live-data.fecha')
            ->addColumn('strategybuy', 'live-data.strategybuy')
            ->addColumn('strategysell', 'live-data.strategysell')
            ->addColumn('status_buy', 'live-data.statusbuy')
            ->addColumn('status_sell', 'live-data.statussell')
            ->rawColumns(['time','strategybuy','strategysell', 'status_buy', 'status_sell'])->toJson();

    }

    public function getVidaData()
    {
        $liveData = DB::table('live')->select()->where('spectrum','!=', 0)->orderBy('id', 'ASC')->get();

        $data = array(
            "liveData" => $liveData,
        );

        return response()->view('live-data.fecha', $data, 200);
    }

    public function statusBuy(Request $request)
    {
        $live = Live::find($request->id);
        
        if ($request->campo == "status_buy") {
            if ($live->status_buy == 1) {
                $live->status_buy = 0;
               
            }else{
                $live->status_buy = 1;
             
            }
         
        }

        $live->save();
        

        $live_id = $live->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Live";
        $log->id_tabla = $live_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function statusSell(Request $request)
    {
        $live = Live::find($request->id);
        
        if ($request->campo == "status_sell") {
            if ($live->status_sell == 1) {
                $live->status_sell = 0;
               
            }else{
                $live->status_sell = 1;
             
            }
         
        }

        $live->save();
        

        $live_id = $live->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Live";
        $log->id_tabla = $live_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function getClave(Request $request)
    {
        $clave = DB::table('users')->where("id", "=", auth()->user()->id)->first();
        if (\Hash::check($request->clave, $clave->password)) {                
            return response("success");
        }else{
            return response("error");
        }
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
