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
        ->where("id", "!=", 1)
        ->where("id", "!=", 3)
        ->where("id", "!=", 6)
        ->where("id", "!=", 7)
        ->where("id", "!=", 8)
        ->where("id", "!=", 10)
        ->where("id", "!=", 11)
        ->where("id", "!=", 12)
        ->where("id", "!=", 13)
        ->where("id", "!=", 14)
        ->where("id", "!=", 15)
        ->where("id", "!=", 16)
        ->where("id", "!=", 17)
        ->where("id", "!=", 18)
        ->where("id", "!=", 19)
        ->where("id", "!=", 20)
        ->where("id", "!=", 21)
        ->where("id", "!=", 998)
        ->where("id", "!=", 999)
        ->where("id", "!=", 1000)
        ->where("id", "!=", 100000)
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))->get();        

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
        // $traders = DB::table("traders")
        // // ->where("id", "!=", 4)
        // // ->where("id", "!=", 5)
        // // ->where("id", "!=", 15)
        // // ->where("id", "!=", 17)
        // ->where("id", "!=", 100000)
        // ->whereNotIn('id', [998, 999, 1000])
        // ->orderByRaw('FIELD(id, 99999, 99998) DESC')
        // ->get();
        
        $traders = DB::table("traders")
        ->whereIn('id', [23, 22, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 99998, 99999])
        ->orderByRaw('FIELD(id, 99999, 99998) DESC')
        ->orderByRaw('FIELD(id, 22, 23) DESC')
        ->get();

        $data = array(
            "traders" => $traders,
        );

        return response()->view('dashboard.pruebavida', $data, 200);
    }
}