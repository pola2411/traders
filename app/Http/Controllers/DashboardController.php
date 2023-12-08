<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index()
    {

        $traders = DB::table("traders")->where("activado", "activado")->orderBy("id", "DESC")->get();

        $generales = array();

        foreach($traders as $trader) {
            $last_general = DB::table("general")
            ->where("id", "=", $trader->id)
            ->limit(1)
            ->orderBy("id","desc")
            ->get();
            array_push($generales, $last_general);
        }

        $data = array(
            "generales" => $generales,
        );

        return response()->view('dashboard.show', $data, 200);
    }

    public function getTrader(Request $request)
    {
        $traders = General::select()->where('trader_id', $request->id)->get();
        return response($traders);
    }

    public function getPruebasVida()
    {
        $traders = DB::table("traders")->where("activado", "activado")->orderBy("id", "DESC")->get();

        $data = array(
            "traders" => $traders,
        );

        return response()->view('dashboard.pruebavida', $data, 200);
    }

    public function updatedActivity(Request $request)
    {
        // $activity = \Telegram::getUpdates();
        // dd($activity);

        $traders = DB::table("traders")->where("activado", "activado")->orderBy("id", "DESC")->get();

        foreach ($traders as $trader) {
            $last_general = DB::table("general")
            ->where("trader_id", "=", $trader->id)
            ->limit(1)
            ->orderBy("id","desc")
            ->get();

            $fechaCreacion = $last_general[0]->fecha;
            //Fecha formateada con carbon para que se muestre como en el idioma español
            $fechaEspañol=ucfirst(\Carbon\Carbon::parse($last_general[0]->fecha)->format('d/m/Y H:i:s'));
           //Transformar fecha en minutos transcurridos hasta ahora con la libreria carbon
            $fechaActual = \Carbon\Carbon::now();
            $minutosTranscurridos = $fechaActual->diffInMinutes($fechaCreacion);
           
            //Enviar mensaje por telegram si minutosTranscurridos es mayor a 3
            if ($minutosTranscurridos > 3) {
                // $message = "El trader ".$trader->nombre." no ha enviado señales, su último dato fue hace ".$minutosTranscurridos." minutos";
                $message = "El trader ".$trader->nombre." no ha enviado señales, su último dato fue el ".$fechaEspañol."";
                \Telegram::sendMessage([
                    'chat_id' => '-1002041069139',
                    'parse_mode' => 'HTML',
                    'text' => "<a href='#'>$message</a>"
                ]);
            }
        }   
    }   
}