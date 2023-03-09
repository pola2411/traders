<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $traders = DB::table("traders")
        ->where("id", 99999)
        ->orWhere("id", 99998)
        ->orWhere("id", 22)
        ->orderByDesc(DB::raw('FIELD(id, 22, 99998, 99999)'))->get();     

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
        $traders = DB::table("traders")
        ->where("id", 99999)
        ->orWhere("id", 99998)
        ->orWhere("id", 22)
        ->orderByDesc(DB::raw('FIELD(id, 22, 99998, 99999)'))->get();

        $data = array(
            "traders" => $traders,
        );

        return response()->view('dashboard.pruebavida', $data, 200);
    }
}