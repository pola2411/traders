<?php

namespace App\Http\Controllers;

use App\Models\Zigzag;
use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZigZagController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    

    public function index(Request $request)
    {
        $par = strtolower($request->id);
        $zigzag = Zigzag::select()->where('par', $par)->first();

        if ($zigzag == null) {
            return view('zigzag.showvacio', compact('par'));
        }else{
            return view('zigzag.show', compact('zigzag', 'par'));
        }
    }

    public function getLive(Request $request)
    {
        $live = Live::select()->where('pair', $request->par)->first();

        $data = array(
            "live" => $live,
        );

        return response()->view('zigzag.tabla', $data, 200);
    }
}
