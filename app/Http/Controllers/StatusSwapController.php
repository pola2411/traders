<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusSwapController extends Controller
{
    public function index(Request $request)
    {

        $status_swap = DB::table('status_swap')
            ->join('traders', 'traders.id', '=', 'status_swap.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_swap.fecha', 'DESC')
            ->first();

        $status_swap2 = DB::table('status_swap')
            ->join('traders', 'traders.id', '=', 'status_swap.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_swap.fecha', 'DESC')
            ->get();

        if(sizeof($status_swap2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        return view('statusswap.show', compact('status_swap', 'condicional'));
    }

}