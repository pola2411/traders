<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Robots;
use App\Models\TablaLog;


class RobotsController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index(Request $request)
    {
        return view('robots.show');
    }

    public function getDatosRobot(Request $request)
    {
        $robots_status = DB::table('robots')
            ->get();
           

        $data = array(
            'robots_status' => $robots_status
        );

        return response()->view('robots.tabla', $data, 200);
    }

    public function botonGral(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "on_general") {
            if ($robot->on_general == 1) {
                $robot->on_general = 0;
               
            }else{
                $robot->on_general = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function botonTime(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "on_time") {
            if ($robot->on_time == 1) {
                $robot->on_time = 0;
               
            }else{
                $robot->on_time = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurusd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurusd") {
            if ($robot->eurusd == 1) {
                $robot->eurusd = 0;
               
            }else{
                $robot->eurusd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpusd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpusd") {
            if ($robot->gbpusd == 1) {
                $robot->gbpusd = 0;
               
            }else{
                $robot->gbpusd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function audusd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "audusd") {
            if ($robot->audusd == 1) {
                $robot->audusd = 0;
               
            }else{
                $robot->audusd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function nzdusd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "nzdusd") {
            if ($robot->nzdusd == 1) {
                $robot->nzdusd = 0;
               
            }else{
                $robot->nzdusd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function usdcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "usdcad") {
            if ($robot->usdcad == 1) {
                $robot->usdcad = 0;
               
            }else{
                $robot->usdcad = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function usdchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "usdchf") {
            if ($robot->usdchf == 1) {
                $robot->usdchf = 0;
               
            }else{
                $robot->usdchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function usdjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "usdjpy") {
            if ($robot->usdjpy == 1) {
                $robot->usdjpy = 0;
               
            }else{
                $robot->usdjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurgbp(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurgbp") {
            if ($robot->eurgbp == 1) {
                $robot->eurgbp = 0;
               
            }else{
                $robot->eurgbp = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function euraud(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "euraud") {
            if ($robot->euraud == 1) {
                $robot->euraud = 0;
               
            }else{
                $robot->euraud = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurnzd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurnzd") {
            if ($robot->eurnzd == 1) {
                $robot->eurnzd = 0;
               
            }else{
                $robot->eurnzd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpaud(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpaud") {
            if ($robot->gbpaud == 1) {
                $robot->gbpaud = 0;
               
            }else{
                $robot->gbpaud = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpnzd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpnzd") {
            if ($robot->gbpnzd == 1) {
                $robot->gbpnzd = 0;
               
            }else{
                $robot->gbpnzd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function audnzd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "audnzd") {
            if ($robot->audnzd == 1) {
                $robot->audnzd = 0;
               
            }else{
                $robot->audnzd = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurcad") {
            if ($robot->eurcad == 1) {
                $robot->eurcad = 0;
               
            }else{
                $robot->eurcad = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurchf") {
            if ($robot->eurchf == 1) {
                $robot->eurchf = 0;
               
            }else{
                $robot->eurchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function eurjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eurjpy") {
            if ($robot->eurjpy == 1) {
                $robot->eurjpy = 0;
               
            }else{
                $robot->eurjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpcad") {
            if ($robot->gbpcad == 1) {
                $robot->gbpcad = 0;
               
            }else{
                $robot->gbpcad = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpchf") {
            if ($robot->gbpchf == 1) {
                $robot->gbpchf = 0;
               
            }else{
                $robot->gbpchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function gbpjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbpjpy") {
            if ($robot->gbpjpy == 1) {
                $robot->gbpjpy = 0;
               
            }else{
                $robot->gbpjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function audcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "audcad") {
            if ($robot->audcad == 1) {
                $robot->audcad = 0;
               
            }else{
                $robot->audcad = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function audchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "audchf") {
            if ($robot->audchf == 1) {
                $robot->audchf = 0;
               
            }else{
                $robot->audchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function audjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "audjpy") {
            if ($robot->audjpy == 1) {
                $robot->audjpy = 0;
               
            }else{
                $robot->audjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function nzdcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "nzdcad") {
            if ($robot->nzdcad == 1) {
                $robot->nzdcad = 0;
               
            }else{
                $robot->nzdcad = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function nzdchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "nzdchf") {
            if ($robot->nzdchf == 1) {
                $robot->nzdchf = 0;
               
            }else{
                $robot->nzdchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function nzdjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "nzdjpy") {
            if ($robot->nzdjpy == 1) {
                $robot->nzdjpy = 0;
               
            }else{
                $robot->nzdjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function cadchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "cadchf") {
            if ($robot->cadchf == 1) {
                $robot->cadchf = 0;
               
            }else{
                $robot->cadchf = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function cadjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "cadjpy") {
            if ($robot->cadjpy == 1) {
                $robot->cadjpy = 0;
               
            }else{
                $robot->cadjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function chfjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "chfjpy") {
            if ($robot->chfjpy == 1) {
                $robot->chfjpy = 0;
               
            }else{
                $robot->chfjpy = 1;
             
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offusd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "usd") {
            if ($robot->eurusd == 1) {
                $robot->eurusd = 0;
                $robot->gbpusd = 0;
                $robot->audusd = 0;
                $robot->nzdusd = 0;
                $robot->usdcad = 0;
                $robot->usdchf = 0;
                $robot->usdjpy = 0;
               
            }else{
                $robot->eurusd = 1;
                $robot->gbpusd = 1;
                $robot->audusd = 1;
                $robot->nzdusd = 1;
                $robot->usdcad = 1;
                $robot->usdchf = 1;
                $robot->usdjpy = 1;       
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offeur(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "eur") {
            if ($robot->eurusd == 1) {
                $robot->eurusd = 0;
                $robot->eurgbp = 0;
                $robot->euraud = 0;
                $robot->eurnzd = 0;
                $robot->eurcad = 0;
                $robot->eurchf = 0;
                $robot->eurjpy = 0; 
            }else{
                $robot->eurusd = 1;
                $robot->eurgbp = 1;
                $robot->euraud = 1;
                $robot->eurnzd = 1;
                $robot->eurcad = 1;
                $robot->eurchf = 1;
                $robot->eurjpy = 1;    
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offgbp(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "gbp") {
            if ($robot->gbpusd == 1) {
                $robot->gbpusd = 0;
                $robot->eurgbp = 0;
                $robot->gbpaud = 0;
                $robot->gbpnzd = 0;
                $robot->gbpcad = 0;
                $robot->gbpchf = 0;
                $robot->gbpjpy = 0;
            }else{
                $robot->gbpusd = 1;
                $robot->eurgbp = 1;
                $robot->gbpaud = 1;
                $robot->gbpnzd = 1;
                $robot->gbpcad = 1;
                $robot->gbpchf = 1;
                $robot->gbpjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offaud(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "aud") {
            if ($robot->audusd == 1) {
                $robot->audusd = 0;
                $robot->euraud = 0;
                $robot->gbpaud = 0;
                $robot->audnzd = 0;
                $robot->audcad = 0;
                $robot->audchf = 0;
                $robot->audjpy = 0;
            }else{
                $robot->audusd = 1;
                $robot->euraud = 1;
                $robot->gbpaud = 1;
                $robot->audnzd = 1;
                $robot->audcad = 1;
                $robot->audchf = 1;
                $robot->audjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offnzd(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "nzd") {
            if ($robot->nzdusd == 1) {
                $robot->nzdusd = 0;
                $robot->eurnzd = 0;
                $robot->gbpnzd = 0;
                $robot->audnzd = 0;
                $robot->nzdcad = 0;
                $robot->nzdchf = 0;
                $robot->nzdjpy = 0;
            }else{
                $robot->nzdusd = 1;
                $robot->eurnzd = 1;
                $robot->gbpnzd = 1;
                $robot->audnzd = 1;
                $robot->nzdcad = 1;
                $robot->nzdchf = 1;
                $robot->nzdjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offcad(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "cad") {
            if ($robot->usdcad == 1) {
                $robot->usdcad = 0;
                $robot->eurcad = 0;
                $robot->gbpcad = 0;
                $robot->audcad = 0;
                $robot->nzdcad = 0;
                $robot->cadchf = 0;
                $robot->cadjpy = 0;
            }else{
                $robot->usdcad = 1;
                $robot->eurcad = 1;
                $robot->gbpcad = 1;
                $robot->audcad = 1;
                $robot->nzdcad = 1;
                $robot->cadchf = 1;
                $robot->cadjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offchf(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "chf") {
            if ($robot->usdchf == 1) {
                $robot->usdchf = 0;
                $robot->eurchf = 0;
                $robot->gbpchf = 0;
                $robot->audchf = 0;
                $robot->nzdchf = 0;
                $robot->cadchf = 0;
                $robot->chfjpy = 0;
            }else{
                $robot->usdchf = 1;
                $robot->eurchf = 1;
                $robot->gbpchf = 1;
                $robot->audchf = 1;
                $robot->nzdchf = 1;
                $robot->cadchf = 1;
                $robot->chfjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }

    public function offjpy(Request $request)
    {
        $robot = Robots::find($request->id);
        
        if ($request->campo == "jpy") {
            if ($robot->usdjpy == 1) {
                $robot->usdjpy = 0;
                $robot->eurjpy = 0;
                $robot->gbpjpy = 0;
                $robot->audjpy = 0;
                $robot->nzdjpy = 0;
                $robot->cadjpy = 0;
                $robot->chfjpy = 0;
            }else{
                $robot->usdjpy = 1;
                $robot->eurjpy = 1;
                $robot->gbpjpy = 1;
                $robot->audjpy = 1;
                $robot->nzdjpy = 1;
                $robot->cadjpy = 1;
                $robot->chfjpy = 1;
            }
         
        }

        $robot->save();
        

        $robot_id = $robot->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Robots";
        $log->id_tabla = $robot_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
       
    }
}