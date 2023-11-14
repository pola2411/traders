<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonitorPrice;
use App\Models\TablaLog;


class MonitorPriceController extends Controller
{
    public function index()
    {

        return view('monitor_price.show');
        
    }

    public function getMonitor()
    {

        $monitor = DB::table('monitor')->select()->orderBy('id', 'ASC')->get();

        return datatables()->of($monitor)
        ->addColumn('btn', 'monitor_price.btn')
        ->addColumn('zone', 'monitor_price.zone')
        ->addColumn('operation_type', 'monitor_price.operation_type')
        ->addColumn('schedule_upper_point', 'monitor_price.schedule_upper_point')
        ->addColumn('schedule_lower_point', 'monitor_price.schedule_lower_point')
        ->rawColumns(['btn', 'zone', 'operation_type', 'schedule_upper_point', 'schedule_lower_point'])
        ->toJson();

    }

    public function status(Request $request)
    {
        $monitorStatus = MonitorPrice::find($request->id);
        
        if ($request->campo == "status") {
            if ($monitorStatus->status == 1) {
                $monitorStatus->status = 0;
               
            }else{
                $monitorStatus->status = 1;
             
            }
         
        }

        $monitorStatus->save();
        

        $monitorStatus_id = $monitorStatus->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Monitor";
        $log->id_tabla = $monitorStatus_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function statusGral(Request $request)
    {
        $monitorStatusGral = MonitorPrice::all();
        
        foreach ($monitorStatusGral as $monitorGral) {
            if ($request->campo == "statusGral") {
                $monitorGral->statusGral = $monitorGral->statusGral == 1 ? 0 : 1;
                $monitorGral->save();
            }
        }

        $monitorStatusGral_id = 1;
        $bitacora_id = session('bitacora_id');

        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Monitor";
        $log->id_tabla = $monitorStatusGral_id;
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

  

}
