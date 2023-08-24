<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortafoliosGraphController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index()
    {
        return view('portafolioGraph.show');
    }

    public function getPortafolioGraph(Request $request)
    {
        $chartData = DB::table('portafolios')
            ->where('value', $request->portafolioGraph)
            ->get();
         
          return response(['chartData' => $chartData]);

    }

    public function getDataGraph(Request $request)
    {
        $chartData2 = DB::table('comportamiento_portafolio')
        ->where('value', $request->portafolioGraph)
        ->get();

        return response(['chartData2' => $chartData2]);

    }

}