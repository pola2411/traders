<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisPortafolio;

class AnalisisPortafolioController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index(Request $request)
    {
        return view('analisis.show');
    }

    public function getAnalisis(Request $request)
    {
        $analisis = AnalisisPortafolio::select('portfolio')->where("value", $request->value)->distinct('portfolio')->get();
        $data = array( 'analisis' => $analisis, 'value' => $request->value );

        return response()->view('analisis.tabla', $data, 200);
    }

    public function getAnalisisPortafolio(Request $request)
    {
        $analisis = AnalisisPortafolio::where("value", $request->value)->where("portfolio", $request->portfolio)->get();
        return response($analisis);
    }

    public function getAnalisisGrafica(Request $request)
    {
        $analisis = AnalisisPortafolio::select('portfolio')->where("value", $request->value)->distinct('portfolio')->get();
        $array = array();

        foreach ($analisis as $analis){
            $profit = AnalisisPortafolio::where('value', $request->value)->where('portfolio', $analis->portfolio)->sum('profit');
            $risk = AnalisisPortafolio::where('value', $request->value)->where('portfolio', $analis->portfolio)->sum('risk');

            $array[] = array('portfolio' => $analis->portfolio, 'profit' => $profit, 'risk' => $risk);
        }
        
        return response($array);
    }
}