<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PortafolioGraph;

class PortafolioController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function index()
    {
        return view('portafolio.show');
    }

    public function index2()
    {
        return view('portafolio.table');
    }

    public function getPortafolio(Request $request)
    {
        
        $portafolio = DB::table('grafica_portafolios')
            ->select('valor', 'rendimiento', 'time')
            ->where('portafolio', $request->portafolio)
            // ->whereBetween('time', [$request->inicio, $request->fin])
            ->get();

        return response(['portafolio' => $portafolio]);
    }

    public function getPortafolioTable (Request $request)
    {
        $portafolioDots = DB::table("grafica_portafolios")
      
        ->get();

        return datatables()->of($portafolioDots)->addColumn('btn', 'portafolio.buttons')->rawColumns(['btn'])->toJson();
    }

    public function addPortafolioGraph(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'valor' => 'required',
                'rendimiento' => 'required',
                'portafolio' => 'required'
            ]);

            $portafolioGraph = new portafolioGraph;
            $portafolioGraph->valor = $request->input('valor');
            $portafolioGraph->rendimiento = $request->input('rendimiento');
            $portafolioGraph->portafolio = $request->input('portafolio');

            $portafolioGraph->save();
           
            return response($portafolioGraph);
            
        }
    }
}
