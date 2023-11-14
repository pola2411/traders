<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TablaLog;
use App\Models\DashboardType;

class DashboardTypeController extends Controller
{
    public function index()
    {

        return view('dashboard_type.show');
        
    }

    public function getDashboard()
    {

        $dashboardType = DB::table('dashboard')->select()->orderBy('id', 'ASC')->get();

        return datatables()->of($dashboardType)
        ->addColumn('btn', 'dashboard_type.btn')
        ->addColumn('type', 'dashboard_type.type')
        ->addColumn('time', 'dashboard_type.time')
        ->rawColumns(['btn', 'type', 'time'])
        ->toJson();

    }

    public function status(Request $request)
    {
        $dashboardStatus = DashboardType::find($request->id);
        
        if ($request->campo == "status") {
            if ($dashboardStatus->status == 1) {
                $dashboardStatus->status = 0;
               
            }else{
                $dashboardStatus->status = 1;
             
            }
         
        }

        $dashboardStatus->save();
        

        $dashboardStatus_id = $dashboardStatus->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Dashboard";
        $log->id_tabla = $dashboardStatus_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function statusGral(Request $request)
    {
        $dashboardStatusGral = DashboardType::all();
        
        foreach ($dashboardStatusGral as $dashboardGral) {
            if ($request->campo == "statusGral") {
                $dashboardGral->statusGral = $dashboardGral->statusGral == 1 ? 0 : 1;
                $dashboardGral->save();
            }
        }

        $dashboardStatusGral_id = 1;
        $bitacora_id = session('bitacora_id');

        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Dashboard";
        $log->id_tabla = $dashboardStatusGral_id;
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
