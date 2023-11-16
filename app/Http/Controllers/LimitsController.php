<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Live;
use App\Models\TablaLog;


class LimitsController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    
    public function index()
    {

        return view('limits.show');
        
    }

    public function showLimitsData()
    {

        $limitData = DB::table('limits')->select()->orderBy('id', 'DESC')->get();


        // return datatables()->of($limitData)
        //     ->addColumn('pares', 'limits.pares')
        //     ->rawColumns(['pares'])->toJson();

        $data = array(
            "limitData" => $limitData,
        );

        return response()->view('limits.tabla', $data, 200);

    }

    public function getVidaData()
    {
        $liveData = DB::table('live')->select()->where('spectrum','!=', 0)->orderBy('id', 'ASC')->get();

        $data = array(
            "liveData" => $liveData,
        );

        return response()->view('live-data.fecha', $data, 200);
    }

    public function getClave(Request $request)
    {
        $clave = DB::table('users')->where("id", "=", auth()->user()->id)->first();
        if (\Hash::check($request->clave, $clave->password)) {                
            return response("success");
        }else{
            return response("error");
        }
    }

   
}
