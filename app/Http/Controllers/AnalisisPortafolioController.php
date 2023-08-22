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
        $analisis = AnalisisPortafolio::where("value", $request->id)->get();
        return view('analisis.show', compact("analisis"));
    }
}
