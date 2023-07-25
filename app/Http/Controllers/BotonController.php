<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Switcher;
use App\Models\Trader;
use App\Models\Box;
use App\Models\TablaLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotonController extends Controller
{
    public function index()
    {
        $switchers = DB::table("switcher")
        ->where('type','equity')
        ->get();

      

        return view('botones.show',compact('switchers'));
    }

   

    public function boton1()
    {

        //Aquí va el código para el botón 1, si quieres llamar a la Base de datos puedes tomar el ejemplo de alguún controlador. (Borra el echo).
        echo "Botón 1";
        
    }

    public function boton2()
    {
        
    }

    public function boton3()
    {
        
    }

    public function boton4()
    {
        
    }

    public function boton5()
    {
        
    }

    public function boton6()
    {
        
    }

    public function boton7()
    {
        
    }

    public function boton8()
    {
        
    }

    public function boton9()
    {
        
    }

    public function boton10()
    {
        
    }

    public function boton11()
    {
        
    }

    public function boton12()
    {
        
    }

    public function boton13(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "modificable") {
            if ($switcher->modificable == "activado") {
                $switcher->modificable = "desactivado";
               
            }else{
                $switcher->modificable = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "modificable") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function boton14()
    {
        
    }

    public function boton15()
    {
        
    }

    public function boton16()
    {
        
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