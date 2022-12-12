<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MargenController extends Controller
{
    public function index()
    {
        
        return view('margen.show');

    }

    public function getMargen(Request $request)
    {
        // $traders = General::select()->where('trader_id', $request->id)->get();
        $traders = General::select()
            ->whereRaw('fecha > NOW() - INTERVAL 1 HOUR AND trader_id = ' . $request->id)
            ->get();
        $tradersNombre = Trader::select()->where('id', $request->id)->get();
        return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);
    }

}
