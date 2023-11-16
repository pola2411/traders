<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataController extends Controller
{
    public function index()
    {
        return view('data.show');
    }

    public function showData()
    {
   
        $estudios_lista = DB::table("estudio_lista")
        ->orderBy('id', 'asc')
        ->get();

        return datatables()->of($estudios_lista)->addColumn('btn', 'data.buttons')->rawColumns(['btn'])->toJson();

    }
    
}
