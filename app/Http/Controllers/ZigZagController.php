<?php

namespace App\Http\Controllers;

use App\Models\Zigzag;
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
}
