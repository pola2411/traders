<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Horarios;
use App\Models\TablaLog;

class HorariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    

    public function index(Request $request)
    {
        $par = strtolower($request->id);
        $horario = Horarios::select()->where('asset', $par)->first();

        if ($horario == null) {
            return view('horarios.showvacio', compact('par'));
        }else{
            return view('horarios.show', compact('horario', 'par'));
        }
    }

    public function getLive(Request $request)
    {
        $par = $request->input('par');
        $par = strtolower($par);
        $horariosLive = Horarios::where('asset', $par)
        ->orderByRaw("CASE day WHEN 'lunes' THEN 1 WHEN 'martes' THEN 2 WHEN 'miércoles' THEN 3 WHEN 'jueves' THEN 4 WHEN 'viernes' THEN 5 WHEN 'sábado' THEN 6 WHEN 'domingo' THEN 7 END, hour")
        ->latest()
        ->get();


        $data = array(
            'horariosLive' => $horariosLive,
            'par' => $par

        );

        return response()->view('horarios.tabla', $data, 200);
    }

    public function status(Request $request)
    {
        $horarioStatus = Horarios::find($request->id);
        
        if ($request->campo == "status") {
            if ($horarioStatus->status == 1) {
                $horarioStatus->status = 0;
               
            }else{
                $horarioStatus->status = 1;
             
            }
         
        }

        $horarioStatus->save();
        

        $horarioStatus_id = $horarioStatus->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Monitor";
        $log->id_tabla = $horarioStatus_id;
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
