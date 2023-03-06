<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusRiskController extends Controller
{
    public function index(Request $request)
    {

        $status_risk = DB::table('status_risk')
            ->join('traders', 'traders.id', '=', 'status_risk.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_risk.fecha', 'DESC')
            ->first();

        $status_risk2 = DB::table('status_risk')
            ->join('traders', 'traders.id', '=', 'status_risk.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_risk.fecha', 'DESC')
            ->get();

        if(sizeof($status_risk2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        return view('statusrisk.show', compact('status_risk', 'condicional'));
    }

}