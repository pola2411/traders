<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraderReportController extends Controller
{
    public function index()
    {
        
        return view('traderreport.show');

    }

    public function showResults()
    {
        return redirect('/admin/dashboard');
        $traders = DB::table('traders')
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))
        ->get();

        return view('traderreport.showResults', compact("traders"));
    }

    public function getReport(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect('/admin/dashboard');
            // $traders = General::select()
            // ->whereRaw('fecha > NOW() - INTERVAL 1 HOUR AND trader_id = ' . $request->id)
            // ->get();

            // if($traders->isEmpty()) {
            //     return redirect('/admin/dashboard');
            // } else {
            //     $tradersNombre = Trader::select()->where('id', $request->id)->get();
            //     return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);   
            // }
        } 
    }

    public function getReportResult(Request $request)
    {
        $fromDate = $request->input('from');
        $toDate = $request->input('to');
        $traderID = $request->input('trader_id');

        $traders = General::select()
        ->whereRaw('fecha > NOW() - INTERVAL 1 HOUR AND trader_id = ' . $request->id)
        ->get();

        $tradersNombre = Trader::select()->where('id', $request->id)->get();
        return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);
    }
}