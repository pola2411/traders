<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitorStatusController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    
    public function index()
    {

        return view('monitor_status.show');
        
    }

    public function getMonitorBuy()
    {

        $monitor_status = DB::table('monitor_status')->select()->where('robot', 'Live-BSOA')->orderBy('id', 'DESC')->get();

        $data = array();

        foreach($monitor_status->unique('asset') as $asset){
            array_push($data, $asset);
        }

        return datatables()->of($data)->toJson();

    }

    public function getMonitorSell()
    {

        $monitor_status = DB::table('monitor_status')->select()->where('robot', 'Live-SSOA')->orderBy('id', 'DESC')->get();

        $data = array();

        foreach($monitor_status->unique('asset') as $asset){
            array_push($data, $asset);
        }

        return datatables()->of($data)->toJson();

    }

    public function getMonitorDinamic(Request $request)
    {

        if($request->live == 'buy'){
            return response()->view('monitor_status.bsoa');
        }elseif($request->live == 'sell'){
            return response()->view('monitor_status.ssoa');
        }
    }

    public function getMonitorDinamic2(Request $request)
    {

        if($request->live == 'buy'){
            $monitor_status = DB::table('monitor_status')->select()->where('robot', 'Live-BSOA')->where('asset', $request->asset)->orderBy('time', 'DESC')->get();
        }elseif($request->live == 'sell'){
            $monitor_status = DB::table('monitor_status')->select()->where('robot', 'Live-SSOA')->where('asset', $request->asset)->orderBy('time', 'DESC')->get();
        }

        return datatables()->of($monitor_status)->toJson();
    }

}