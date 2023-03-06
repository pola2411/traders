<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusProfitController extends Controller
{
    public function index(Request $request)
    {

        $status_profit = DB::table('status_profit')
            ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_profit.fecha', 'DESC')
            ->first();

        $status_profit2 = DB::table('status_profit')
            ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_profit.fecha', 'DESC')
            ->get();

        if(sizeof($status_profit2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        return view('statusprofit.show', compact('status_profit', 'condicional'));
    }

}