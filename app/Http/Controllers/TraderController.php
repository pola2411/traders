<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Solicitud;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraderController extends Controller
{
    public function index()
    {
        $traders = DB::table("traders")
        ->where("id", 2)
        ->orWhere("id", 4)
        ->orWhere("id", 5)
        ->orWhere("id", 9)
        ->orWhere("id", 22)
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))->get();

        return view('traders.show', compact('traders'));
    }

    public function editStatus(Request $request)
    {

        $solicitud = new Solicitud;
        $solicitud->status = "pendiente";
        $solicitud->comentario = $request->campo;

        $trader = Trader::find($request->id);
        
        if ($request->campo == "modificable") {
            if ($trader->modificable == "activado") {
                $trader->modificable = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->modificable = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "activado"){
            if ($trader->activado == "activado") {
                $trader->activado = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->activado = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "sl"){
            if($trader->sl == "activado"){
                $trader->sl = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->sl = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "tp"){
            if($trader->tp == "activado"){
                $trader->tp = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->tp = "activado";
                $solicitud->clave = "activado";
            }
        }

        $trader->save();
        
        $solicitud->trader_id = $trader->id;
        if ($request->campo != "modificable") {            
            $solicitud->save();
        }

        $traders = DB::table("traders")
        ->where("id", 2)
        ->orWhere("id", 4)
        ->orWhere("id", 5)
        ->orWhere("id", 9)
        ->orWhere("id", 22)
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))->get();

        return response()->view('traders.buttons', compact('traders'));
    }
}