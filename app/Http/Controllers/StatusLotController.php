<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusLotController extends Controller
{
    public function index(Request $request)
    {

        $status_lot = DB::table('status_lot')
            ->join('traders', 'traders.id', '=', 'status_lot.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_lot.fecha', 'DESC')
            ->first();

        $status_lot2 = DB::table('status_lot')
            ->join('traders', 'traders.id', '=', 'status_lot.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_lot.fecha', 'DESC')
            ->get();

        if(sizeof($status_lot2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        return view('statuslot.show', compact('status_lot', 'condicional'));
    }

}