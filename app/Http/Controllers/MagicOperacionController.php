<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MagicOperacionController extends Controller
{
    public function index(Request $request)
    {
        return view('magicnumber.show');
    }

    public function getDatos(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");


        $magiceurusd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->get();

       
        $magicgbpusd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->get();

        $status_profit = DB::table('status_profit')
        ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
        ->select()
        ->where("trader_id", $request->id)
        ->orderBy('status_profit.fecha', 'DESC')
        ->first();

        $status_profit2 = DB::table('status_profit')
        ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
        ->select()
        ->where("trader_id", $request->id)
        ->orderBy('status_profit.fecha', 'DESC')
        ->get();

        if(sizeof($status_profit2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "status_profit" => $status_profit,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
        );

        return response()->view('magicnumber.tabla', $data, 200);
    }

}