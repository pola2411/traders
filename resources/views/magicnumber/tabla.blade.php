@if ($condicional)
    @php
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumabuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        
        foreach ($magiceurusd as $eurusd) {
            $magiceurusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurusd->magicnumber) {
                $sumarest += $eurusd->profit;
            } else {
                $sumarest = $eurusd->profit;
            }
        
            $rest = substr($eurusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurusd[$i] = $sumarest;
                    $sumasell_array[$i] = $magiceurusdsell->sumsell;
                    $sumabuy_array[$i] = $magiceurusdbuy->sumbuy;
                }
                if ($sumasell_array[$i] == null) {
                    $sumasell_array[$i] = 0;
                }
                if ($sumabuy_array[$i] == null) {
                    $sumabuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurusd->magicnumber;
        }
        
        $suma_eurusd = array_sum($array_eurusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpusd as $gbpusd) {
            $magicgbpusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpusd->magicnumber) {
                $sumarest += $gbpusd->profit;
            } else {
                $sumarest = $gbpusd->profit;
            }
        
            $rest = substr($gbpusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpusd[$i] = $sumarest;
                    $sumagbpusdsell_array[$i] = $magicgbpusdsell->sumsell;
                    $sumagbpusdbuy_array[$i] = $magicgbpusdbuy->sumbuy;
                }
                if ($sumagbpusdsell_array[$i] == null) {
                    $sumagbpusdsell_array[$i] = 0;
                }
                if ($sumagbpusdbuy_array[$i] == null) {
                    $sumagbpusdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpusd->magicnumber;
        }
        
        $suma_gbpusd = array_sum($array_gbpusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudusd as $audusd) {
            $magicaudusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audusd->magicnumber) {
                $sumarest += $audusd->profit;
            } else {
                $sumarest = $audusd->profit;
            }
        
            $rest = substr($audusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audusd[$i] = $sumarest;
                    $sumaaudusdsell_array[$i] = $magicaudusdsell->sumsell;
                    $sumaaudusdbuy_array[$i] = $magicaudusdbuy->sumbuy;
                }
                if ($sumaaudusdsell_array[$i] == null) {
                    $sumaaudusdsell_array[$i] = 0;
                }
                if ($sumaaudusdbuy_array[$i] == null) {
                    $sumaaudusdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audusd->magicnumber;
        }
        
        $suma_audusd = array_sum($array_audusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdusdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdusdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdusd as $nzdusd) {
            $magicnzdusdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdusd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdusdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdusd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdusd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdusd->magicnumber) {
                $sumarest += $nzdusd->profit;
            } else {
                $sumarest = $nzdusd->profit;
            }
        
            $rest = substr($nzdusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdusd[$i] = $sumarest;
                    $sumanzdusdsell_array[$i] = $magicnzdusdsell->sumsell;
                    $sumanzdusdbuy_array[$i] = $magicnzdusdbuy->sumbuy;
                }
                if ($sumanzdusdsell_array[$i] == null) {
                    $sumanzdusdsell_array[$i] = 0;
                }
                if ($sumanzdusdbuy_array[$i] == null) {
                    $sumanzdusdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdusd->magicnumber;
        }
        
        $suma_nzdusd = array_sum($array_nzdusd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdcad as $usdcad) {
            $magicusdcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdcad->magicnumber) {
                $sumarest += $usdcad->profit;
            } else {
                $sumarest = $usdcad->profit;
            }
        
            $rest = substr($usdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdcad[$i] = $sumarest;
                    $sumausdcadsell_array[$i] = $magicusdcadsell->sumsell;
                    $sumausdcadbuy_array[$i] = $magicusdcadbuy->sumbuy;
                }
                if ($sumausdcadsell_array[$i] == null) {
                    $sumausdcadsell_array[$i] = 0;
                }
                if ($sumausdcadbuy_array[$i] == null) {
                    $sumausdcadbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdcad->magicnumber;
        }
        
        $suma_usdcad = array_sum($array_usdcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdchf as $usdchf) {
            $magicusdchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdchf->magicnumber) {
                $sumarest += $usdchf->profit;
            } else {
                $sumarest = $usdchf->profit;
            }
        
            $rest = substr($usdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdchf[$i] = $sumarest;
                    $sumausdchfsell_array[$i] = $magicusdchfsell->sumsell;
                    $sumausdchfbuy_array[$i] = $magicusdchfbuy->sumbuy;
                }
                if ($sumausdchfsell_array[$i] == null) {
                    $sumausdchfsell_array[$i] = 0;
                }
                if ($sumausdchfbuy_array[$i] == null) {
                    $sumausdchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdchf->magicnumber;
        }
        
        $suma_usdchf = array_sum($array_usdchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumausdjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicusdjpy as $usdjpy) {
            $magicusdjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $usdjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicusdjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $usdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $usdjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $usdjpy->magicnumber) {
                $sumarest += $usdjpy->profit;
            } else {
                $sumarest = $usdjpy->profit;
            }
        
            $rest = substr($usdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdjpy[$i] = $sumarest;
                    $sumausdjpysell_array[$i] = $magicusdjpysell->sumsell;
                    $sumausdjpybuy_array[$i] = $magicusdjpybuy->sumbuy;
                }
                if ($sumausdjpysell_array[$i] == null) {
                    $sumausdjpysell_array[$i] = 0;
                }
                if ($sumausdjpybuy_array[$i] == null) {
                    $sumausdjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $usdjpy->magicnumber;
        }
        
        $suma_usdjpy = array_sum($array_usdjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurgbp = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurgbpsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurgbpbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurgbp as $eurgbp) {
            $magiceurgbpsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurgbp->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurgbpbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurgbp->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurgbp->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurgbp->magicnumber) {
                $sumarest += $eurgbp->profit;
            } else {
                $sumarest = $eurgbp->profit;
            }
        
            $rest = substr($eurgbp->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurgbp[$i] = $sumarest;
                    $sumaeurgbpsell_array[$i] = $magiceurgbpsell->sumsell;
                    $sumaeurgbpbuy_array[$i] = $magiceurgbpbuy->sumbuy;
                }
                if ($sumaeurgbpsell_array[$i] == null) {
                    $sumaeurgbpsell_array[$i] = 0;
                }
                if ($sumaeurgbpbuy_array[$i] == null) {
                    $sumaeurgbpbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurgbp->magicnumber;
        }
        $suma_eurgbp = array_sum($array_eurgbp);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_euraud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeuraudsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeuraudbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceuraud as $euraud) {
            $magiceuraudsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $euraud->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceuraudbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $euraud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $euraud->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $euraud->magicnumber) {
                $sumarest += $euraud->profit;
            } else {
                $sumarest = $euraud->profit;
            }
        
            $rest = substr($euraud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_euraud[$i] = $sumarest;
                    $sumaeuraudsell_array[$i] = $magiceuraudsell->sumsell;
                    $sumaeuraudbuy_array[$i] = $magiceuraudbuy->sumbuy;
                }
                if ($sumaeuraudsell_array[$i] == null) {
                    $sumaeuraudsell_array[$i] = 0;
                }
                if ($sumaeuraudbuy_array[$i] == null) {
                    $sumaeuraudbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $euraud->magicnumber;
        }
        
        $suma_euraud = array_sum($array_euraud);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurnzd as $eurnzd) {
            $magiceurnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurnzd->magicnumber) {
                $sumarest += $eurnzd->profit;
            } else {
                $sumarest = $eurnzd->profit;
            }
        
            $rest = substr($eurnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurnzd[$i] = $sumarest;
                    $sumaeurnzdsell_array[$i] = $magiceurnzdsell->sumsell;
                    $sumaeurnzdbuy_array[$i] = $magiceurnzdbuy->sumbuy;
                }
                if ($sumaeurnzdsell_array[$i] == null) {
                    $sumaeurnzdsell_array[$i] = 0;
                }
                if ($sumaeurnzdbuy_array[$i] == null) {
                    $sumaeurnzdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurnzd->magicnumber;
        }
        
        $suma_eurnzd = array_sum($array_eurnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpaud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpaudsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpaudbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpaud as $gbpaud) {
            $magicgbpaudsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpaud->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpaudbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpaud->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpaud->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpaud->magicnumber) {
                $sumarest += $gbpaud->profit;
            } else {
                $sumarest = $gbpaud->profit;
            }
        
            $rest = substr($gbpaud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpaud[$i] = $sumarest;
                    $sumagbpaudsell_array[$i] = $magicgbpaudsell->sumsell;
                    $sumagbpaudbuy_array[$i] = $magicgbpaudbuy->sumbuy;
                }
                if ($sumagbpaudsell_array[$i] == null) {
                    $sumagbpaudsell_array[$i] = 0;
                }
                if ($sumagbpaudbuy_array[$i] == null) {
                    $sumagbpaudbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpaud->magicnumber;
        }
        
        $suma_gbpaud = array_sum($array_gbpaud);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpnzd as $gbpnzd) {
            $magicgbpnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpnzd->magicnumber) {
                $sumarest += $gbpnzd->profit;
            } else {
                $sumarest = $gbpnzd->profit;
            }
        
            $rest = substr($gbpnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpnzd[$i] = $sumarest;
                    $sumagbpnzdsell_array[$i] = $magicgbpnzdsell->sumsell;
                    $sumagbpnzdbuy_array[$i] = $magicgbpnzdbuy->sumbuy;
                }
                if ($sumagbpnzdsell_array[$i] == null) {
                    $sumagbpnzdsell_array[$i] = 0;
                }
                if ($sumagbpnzdbuy_array[$i] == null) {
                    $sumagbpnzdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpnzd->magicnumber;
        }
        
        $suma_gbpnzd = array_sum($array_gbpnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudnzdsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudnzdbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudnzd as $audnzd) {
            $magicaudnzdsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audnzd->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudnzdbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audnzd->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audnzd->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audnzd->magicnumber) {
                $sumarest += $audnzd->profit;
            } else {
                $sumarest = $audnzd->profit;
            }
        
            $rest = substr($audnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audnzd[$i] = $sumarest;
                    $sumaaudnzdsell_array[$i] = $magicaudnzdsell->sumsell;
                    $sumaaudnzdbuy_array[$i] = $magicaudnzdbuy->sumbuy;
                }
                if ($sumaaudnzdsell_array[$i] == null) {
                    $sumaaudnzdsell_array[$i] = 0;
                }
                if ($sumaaudnzdbuy_array[$i] == null) {
                    $sumaaudnzdbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audnzd->magicnumber;
        }
        
        $suma_audnzd = array_sum($array_audnzd);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurcad as $eurcad) {
            $magiceurcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurcad->magicnumber) {
                $sumarest += $eurcad->profit;
            } else {
                $sumarest = $eurcad->profit;
            }
        
            $rest = substr($eurcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurcad[$i] = $sumarest;
                    $sumaeurcadsell_array[$i] = $magiceurcadsell->sumsell;
                    $sumaeurcadbuy_array[$i] = $magiceurcadbuy->sumbuy;
                }
                if ($sumaeurcadsell_array[$i] == null) {
                    $sumaeurcadsell_array[$i] = 0;
                }
                if ($sumaeurcadbuy_array[$i] == null) {
                    $sumaeurcadbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurcad->magicnumber;
        }
        
        $suma_eurcad = array_sum($array_eurcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurchf as $eurchf) {
            $magiceurchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurchf->magicnumber) {
                $sumarest += $eurchf->profit;
            } else {
                $sumarest = $eurchf->profit;
            }
        
            $rest = substr($eurchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurchf[$i] = $sumarest;
                    $sumaeurchfsell_array[$i] = $magiceurchfsell->sumsell;
                    $sumaeurchfbuy_array[$i] = $magiceurchfbuy->sumbuy;
                }
                if ($sumaeurchfsell_array[$i] == null) {
                    $sumaeurchfsell_array[$i] = 0;
                }
                if ($sumaeurchfbuy_array[$i] == null) {
                    $sumaeurchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurchf->magicnumber;
        }
        
        $suma_eurchf = array_sum($array_eurchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaeurjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiceurjpy as $eurjpy) {
            $magiceurjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $eurjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiceurjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $eurjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $eurjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $eurjpy->magicnumber) {
                $sumarest += $eurjpy->profit;
            } else {
                $sumarest = $eurjpy->profit;
            }
        
            $rest = substr($eurjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurjpy[$i] = $sumarest;
                    $sumaeurjpysell_array[$i] = $magiceurjpysell->sumsell;
                    $sumaeurjpybuy_array[$i] = $magiceurjpybuy->sumbuy;
                }
                if ($sumaeurjpysell_array[$i] == null) {
                    $sumaeurjpysell_array[$i] = 0;
                }
                if ($sumaeurjpybuy_array[$i] == null) {
                    $sumaeurjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $eurjpy->magicnumber;
        }
        
        $suma_eurjpy = array_sum($array_eurjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpcad as $gbpcad) {
            $magicgbpcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpcad->magicnumber) {
                $sumarest += $gbpcad->profit;
            } else {
                $sumarest = $gbpcad->profit;
            }
        
            $rest = substr($gbpcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpcad[$i] = $sumarest;
                    $sumagbpcadsell_array[$i] = $magicgbpcadsell->sumsell;
                    $sumagbpcadbuy_array[$i] = $magicgbpcadbuy->sumbuy;
                }
                if ($sumagbpcadsell_array[$i] == null) {
                    $sumagbpcadsell_array[$i] = 0;
                }
                if ($sumagbpcadbuy_array[$i] == null) {
                    $sumagbpcadbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpcad->magicnumber;
        }
        
        $suma_gbpcad = array_sum($array_gbpcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpchf as $gbpchf) {
            $magicgbpchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpchf->magicnumber) {
                $sumarest += $gbpchf->profit;
            } else {
                $sumarest = $gbpchf->profit;
            }
        
            $rest = substr($gbpchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpchf[$i] = $sumarest;
                    $sumagbpchfsell_array[$i] = $magicgbpchfsell->sumsell;
                    $sumagbpchfbuy_array[$i] = $magicgbpchfbuy->sumbuy;
                }
                if ($sumagbpchfsell_array[$i] == null) {
                    $sumagbpchfsell_array[$i] = 0;
                }
                if ($sumagbpchfbuy_array[$i] == null) {
                    $sumagbpchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpchf->magicnumber;
        }
        
        $suma_gbpchf = array_sum($array_gbpchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumagbpjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicgbpjpy as $gbpjpy) {
            $magicgbpjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $gbpjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicgbpjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $gbpjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $gbpjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $gbpjpy->magicnumber) {
                $sumarest += $gbpjpy->profit;
            } else {
                $sumarest = $gbpjpy->profit;
            }
        
            $rest = substr($gbpjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpjpy[$i] = $sumarest;
                    $sumagbpjpysell_array[$i] = $magicgbpjpysell->sumsell;
                    $sumagbpjpybuy_array[$i] = $magicgbpjpybuy->sumbuy;
                }
                if ($sumagbpjpysell_array[$i] == null) {
                    $sumagbpjpysell_array[$i] = 0;
                }
                if ($sumagbpjpybuy_array[$i] == null) {
                    $sumagbpjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $gbpjpy->magicnumber;
        }
        
        $suma_gbpjpy = array_sum($array_gbpjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudcad as $audcad) {
            $magicaudcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audcad->magicnumber) {
                $sumarest += $audcad->profit;
            } else {
                $sumarest = $audcad->profit;
            }
        
            $rest = substr($audcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audcad[$i] = $sumarest;
                    $sumaaudcadsell_array[$i] = $magicaudcadsell->sumsell;
                    $sumaaudcadbuy_array[$i] = $magicaudcadbuy->sumbuy;
                }
                if ($sumaaudcadsell_array[$i] == null) {
                    $sumaaudcadsell_array[$i] = 0;
                }
                if ($sumaaudcadbuy_array[$i] == null) {
                    $sumaaudcadbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audcad->magicnumber;
        }
        
        $suma_audcad = array_sum($array_audcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudchf as $audchf) {
            $magicaudchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audchf->magicnumber) {
                $sumarest += $audchf->profit;
            } else {
                $sumarest = $audchf->profit;
            }
        
            $rest = substr($audchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audchf[$i] = $sumarest;
                    $sumaaudchfsell_array[$i] = $magicaudchfsell->sumsell;
                    $sumaaudchfbuy_array[$i] = $magicaudchfbuy->sumbuy;
                }
                if ($sumaaudchfsell_array[$i] == null) {
                    $sumaaudchfsell_array[$i] = 0;
                }
                if ($sumaaudchfbuy_array[$i] == null) {
                    $sumaaudchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audchf->magicnumber;
        }
        
        $suma_audchf = array_sum($array_audchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumaaudjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicaudjpy as $audjpy) {
            $magicaudjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $audjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicaudjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $audjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $audjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $audjpy->magicnumber) {
                $sumarest += $audjpy->profit;
            } else {
                $sumarest = $audjpy->profit;
            }
        
            $rest = substr($audjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audjpy[$i] = $sumarest;
                    $sumaaudjpysell_array[$i] = $magicaudjpysell->sumsell;
                    $sumaaudjpybuy_array[$i] = $magicaudjpybuy->sumbuy;
                }
                if ($sumaaudjpysell_array[$i] == null) {
                    $sumaaudjpysell_array[$i] = 0;
                }
                if ($sumaaudjpybuy_array[$i] == null) {
                    $sumaaudjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $audjpy->magicnumber;
        }
        
        $suma_audjpy = array_sum($array_audjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $rest = 0;
        $array_nzdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdcadsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdcadbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdcad as $nzdcad) {
            $magicnzdcadsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdcad->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdcadbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdcad->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdcad->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdcad->magicnumber) {
                $sumarest += $nzdcad->profit;
            } else {
                $sumarest = $nzdcad->profit;
            }
        
            $rest = substr($nzdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdcad[$i] = floatval($sumarest);
                    $sumanzdcadsell_array[$i] = $magicnzdcadsell->sumsell;
                    $sumanzdcadbuy_array[$i] = $magicnzdcadbuy->sumbuy;
                }
                if ($sumanzdcadsell_array[$i] == null) {
                    $sumanzdcadsell_array[$i] = 0;
                }
                if ($sumanzdcadbuy_array[$i] == null) {
                    $sumanzdcadbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdcad->magicnumber;
        }
        $suma_nzdcad = array_sum($array_nzdcad);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdchf as $nzdchf) {
            $magicnzdchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdchf->magicnumber) {
                $sumarest += $nzdchf->profit;
            } else {
                $sumarest = $nzdchf->profit;
            }
        
            $rest = substr($nzdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdchf[$i] = $sumarest;
                    $sumanzdchfsell_array[$i] = $magicnzdchfsell->sumsell;
                    $sumanzdchfbuy_array[$i] = $magicnzdchfbuy->sumbuy;
                }
                if ($sumanzdchfsell_array[$i] == null) {
                    $sumanzdchfsell_array[$i] = 0;
                }
                if ($sumanzdchfbuy_array[$i] == null) {
                    $sumanzdchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdchf->magicnumber;
        }
        
        $suma_nzdchf = array_sum($array_nzdchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumanzdjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicnzdjpy as $nzdjpy) {
            $magicnzdjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $nzdjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicnzdjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $nzdjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $nzdjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $nzdjpy->magicnumber) {
                $sumarest += $nzdjpy->profit;
            } else {
                $sumarest = $nzdjpy->profit;
            }
        
            $rest = substr($nzdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdjpy[$i] = $sumarest;
                    $sumanzdjpysell_array[$i] = $magicnzdjpysell->sumsell;
                    $sumanzdjpybuy_array[$i] = $magicnzdjpybuy->sumbuy;
                }
                if ($sumanzdjpysell_array[$i] == null) {
                    $sumanzdjpysell_array[$i] = 0;
                }
                if ($sumanzdjpybuy_array[$i] == null) {
                    $sumanzdjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $nzdjpy->magicnumber;
        }
        
        $suma_nzdjpy = array_sum($array_nzdjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadchfsell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadchfbuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiccadchf as $cadchf) {
            $magiccadchfsell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $cadchf->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadchfbuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $cadchf->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $cadchf->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $cadchf->magicnumber) {
                $sumarest += $cadchf->profit;
            } else {
                $sumarest = $cadchf->profit;
            }
        
            $rest = substr($cadchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadchf[$i] = $sumarest;
                    $sumacadchfsell_array[$i] = $magiccadchfsell->sumsell;
                    $sumacadchfbuy_array[$i] = $magiccadchfbuy->sumbuy;
                }
                if ($sumacadchfsell_array[$i] == null) {
                    $sumacadchfsell_array[$i] = 0;
                }
                if ($sumacadchfbuy_array[$i] == null) {
                    $sumacadchfbuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $cadchf->magicnumber;
        }
        
        $suma_cadchf = array_sum($array_cadchf);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumacadjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magiccadjpy as $cadjpy) {
            $magiccadjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $cadjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magiccadjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $cadjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $cadjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $cadjpy->magicnumber) {
                $sumarest += $cadjpy->profit;
            } else {
                $sumarest = $cadjpy->profit;
            }
        
            $rest = substr($cadjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadjpy[$i] = $sumarest;
                    $sumacadjpysell_array[$i] = $magiccadjpysell->sumsell;
                    $sumacadjpybuy_array[$i] = $magiccadjpybuy->sumbuy;
                }
                if ($sumacadjpysell_array[$i] == null) {
                    $sumacadjpysell_array[$i] = 0;
                }
                if ($sumacadjpybuy_array[$i] == null) {
                    $sumacadjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $cadjpy->magicnumber;
        }
        
        $suma_cadjpy = array_sum($array_cadjpy);
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_chfjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumachfjpysell_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumachfjpybuy_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $sumasell = 0;
        $sumabuy = 0;
        foreach ($magicchfjpy as $chfjpy) {
            $magicchfjpysell = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumsell'))
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('type', '=', 'SELL')
                ->where('magicnumber', $chfjpy->magicnumber)
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            $magicchfjpybuy = DB::table('operaciones')
                ->select(DB::raw('SUM(profit) as sumbuy'))
                ->where('symbol', '=', $chfjpy->symbol)
                ->where('trader_id', $trader_id)
                ->where('magicnumber', $chfjpy->magicnumber)
                ->where('type', '=', 'BUY')
                ->orderBy('magicnumber', 'ASC')
                ->first();
        
            if ($magicnumber_anterior == $chfjpy->magicnumber) {
                $sumarest += $chfjpy->profit;
            } else {
                $sumarest = $chfjpy->profit;
            }
        
            $rest = substr($chfjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_chfjpy[$i] = $sumarest;
                    $sumachfjpysell_array[$i] = $magicchfjpysell->sumsell;
                    $sumachfjpybuy_array[$i] = $magicchfjpybuy->sumbuy;
                }
                if ($sumachfjpysell_array[$i] == null) {
                    $sumachfjpysell_array[$i] = 0;
                }
                if ($sumachfjpybuy_array[$i] == null) {
                    $sumachfjpybuy_array[$i] = 0;
                }
            }
        
            $magicnumber_anterior = $chfjpy->magicnumber;
        }
        
        $suma_chfjpy = array_sum($array_chfjpy);
        $sum_totales = $suma_eurusd + $suma_gbpusd + $suma_audusd + $suma_nzdusd + $suma_usdcad + $suma_usdchf + $suma_usdjpy + $suma_eurgbp + $suma_euraud + $suma_eurnzd + $suma_gbpaud + $suma_gbpnzd + $suma_audnzd + $suma_eurcad + $suma_eurchf + $suma_eurjpy + $suma_gbpcad + $suma_gbpchf + $suma_gbpjpy + $suma_audcad + $suma_audchf + $suma_audjpy + $suma_nzdcad + $suma_nzdchf + $suma_nzdjpy + $suma_cadchf + $suma_cadjpy + $suma_chfjpy;
    @endphp
    <table class="table table-striped table-bordered nowrap text-center" id="status">
        <thead>
            <tr>
                <th data-priority="0" scope="col" colspan="4">Trader: <span
                        style="font-weight: 500">{{ $nombre_trader->nombre }}</span></th>
                <th data-priority="0" scope="col" colspan="7">Total totales: <span
                        style="font-weight: 500">{{ $sum_totales }}</span> </th>
            </tr>
            <tr>
                <th>MONEDA</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>Total</th>
            </tr>
        </thead>
        <div class="text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-dark mb-3" id="obtener403">Serie 403</button>
                    <button type="button" class="btn btn-dark mb-3" id="obtener404">Serie 404</button>
                    <button type="button" class="btn btn-dark mb-3" id="obtener405">Serie 405</button>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-dark mb-3" id="obtenerTodos">Todas las series</button>

                    </div>

                </div>
            </div>
        </div>
        <div class="text-center">
        </div>
        <tbody>
            <tr>
                <td data-priority="0" scope="col">EURUSD</td>
                @for ($i = 0; $i < 9; $i++)
                    @php
                        $sumabuy_sell = $sumabuy_array[$i] + $sumasell_array[$i];
                    @endphp
                    @if ($sumabuy_array[$i] == $sumasell_array[$i] && $sumabuy_array[$i] > 0 && $sumasell_array[$i] > 0)
                        <td data-priority="0" scope="col"
                            style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurusd[$i] }}</td>
                    @elseif ($sumabuy_array[$i] == $sumasell_array[$i] && $sumabuy_array[$i] != 0 && $sumasell_array[$i] != 0)
                        <td data-priority="0" scope="col"
                            style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurusd[$i] }}</td>
                    @elseif(
                        ($sumabuy_array[$i] != $sumasell_array[$i] && $sumasell_array[$i] > 0 && $sumabuy_array[$i] > 0) ||
                            $sumabuy_sell > 0)
                        <td data-priority="0" scope="col"
                            style="background-color: #285430; color:white; font-weight:500">{{ $array_eurusd[$i] }}
                        @elseif (
                            ($sumabuy_array[$i] != $sumasell_array[$i] && $sumasell_array[$i] < 0 && $sumabuy_array[$i] < 0) ||
                                $sumabuy_sell < 0)
                        <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                            {{ $array_eurusd[$i] }}
                        @else
                        <td data-priority="0" scope="col">{{ $array_eurusd[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurusd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPUSD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpusdbuy_array[$i] + $sumagbpusdsell_array[$i];
                @endphp
                       @if ($sumagbpusdbuy_array[$i] == $sumagbpusdsell_array[$i] && $sumagbpusdbuy_array[$i] > 0 && $sumagbpusdsell_array[$i] > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpusd[$i] }}</td>
                   @elseif ($sumagbpusdbuy_array[$i] == $sumagbpusdsell_array[$i] && $sumagbpusdbuy_array[$i] != 0 && $sumagbpusdsell_array[$i] != 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpusd[$i] }}</td>
                   @elseif(
                       ($sumagbpusdbuy_array[$i] != $sumagbpusdsell_array[$i] && $sumagbpusdsell_array[$i] > 0 && $sumagbpusdbuy_array[$i] > 0) ||
                           $sumabuy_sell > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpusd[$i] }}
                       @elseif (
                           ($sumagbpusdbuy_array[$i] != $sumagbpusdsell_array[$i] && $sumagbpusdsell_array[$i] < 0 && $sumagbpusdbuy_array[$i] < 0) ||
                               $sumabuy_sell < 0)
                       <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                           {{ $array_gbpusd[$i] }}
                       @else
                       <td data-priority="0" scope="col">{{ $array_gbpusd[$i] }}</td>
                   @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpusd }}</td>
            </tr>


            <tr>
                <td data-priority="0" scope="col">AUDUSD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaaudusdbuy_array[$i] + $sumaaudusdsell_array[$i];
                @endphp
                     @if ($sumaaudusdbuy_array[$i] == $sumaaudusdsell_array[$i] && $sumaaudusdbuy_array[$i] > 0 && $sumaaudusdsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_audusd[$i] }}</td>
                 @elseif ($sumaaudusdbuy_array[$i] == $sumaaudusdsell_array[$i] && $sumaaudusdbuy_array[$i] != 0 && $sumaaudusdsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_audusd[$i] }}</td>
                 @elseif(
                     ($sumaaudusdbuy_array[$i] != $sumaaudusdsell_array[$i] && $sumaaudusdsell_array[$i] > 0 && $sumaaudusdbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_audusd[$i] }}
                     @elseif (
                         ($sumaaudusdbuy_array[$i] != $sumaaudusdsell_array[$i] && $sumaaudusdsell_array[$i] < 0 && $sumaaudusdbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_audusd[$i] }}
                     @else
                     <td data-priority="0" scope="col">{{ $array_audusd[$i] }}</td>
                 @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audusd }}</td>
            </tr>


            <tr>
                <td data-priority="0" scope="col">NZDUSD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumanzdusdbuy_array[$i] + $sumanzdusdsell_array[$i];
                @endphp
                      @if ($sumanzdusdbuy_array[$i] == $sumanzdusdsell_array[$i] && $sumanzdusdbuy_array[$i] > 0 && $sumanzdusdsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_nzdusd[$i] }}</td>
                  @elseif ($sumanzdusdbuy_array[$i] == $sumanzdusdsell_array[$i] && $sumanzdusdbuy_array[$i] != 0 && $sumanzdusdsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_nzdusd[$i] }}</td>
                  @elseif(
                      ($sumanzdusdbuy_array[$i] != $sumanzdusdsell_array[$i] && $sumanzdusdsell_array[$i] > 0 && $sumanzdusdbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_nzdusd[$i] }}
                      @elseif (
                          ($sumanzdusdbuy_array[$i] != $sumanzdusdsell_array[$i] && $sumanzdusdsell_array[$i] < 0 && $sumanzdusdbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_nzdusd[$i] }}
                      @else
                      <td data-priority="0" scope="col">{{ $array_nzdusd[$i] }}</td>
                  @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdusd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumausdcadbuy_array[$i] + $sumausdcadsell_array[$i];
                @endphp
                      @if ($sumausdcadbuy_array[$i] == $sumausdcadsell_array[$i] && $sumausdcadbuy_array[$i] > 0 && $sumausdcadsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_usdcad[$i] }}</td>
                  @elseif ($sumausdcadbuy_array[$i] == $sumausdcadsell_array[$i] && $sumausdcadbuy_array[$i] != 0 && $sumausdcadsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_usdcad[$i] }}</td>
                  @elseif(
                      ($sumausdcadbuy_array[$i] != $sumausdcadsell_array[$i] && $sumausdcadsell_array[$i] > 0 && $sumausdcadbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_usdcad[$i] }}
                      @elseif (
                          ($sumausdcadbuy_array[$i] != $sumausdcadsell_array[$i] && $sumausdcadsell_array[$i] < 0 && $sumausdcadbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_usdcad[$i] }}
                      @else
                      <td data-priority="0" scope="col">{{ $array_usdcad[$i] }}</td>
                  @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdcad }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumausdchfbuy_array[$i] + $sumausdchfsell_array[$i];
                @endphp
                      @if ($sumausdchfbuy_array[$i] == $sumausdchfsell_array[$i] && $sumausdchfbuy_array[$i] > 0 && $sumausdchfsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_usdchf[$i] }}</td>
                  @elseif ($sumausdchfbuy_array[$i] == $sumausdchfsell_array[$i] && $sumausdchfbuy_array[$i] != 0 && $sumausdchfsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_usdchf[$i] }}</td>
                  @elseif(
                      ($sumausdchfbuy_array[$i] != $sumausdchfsell_array[$i] && $sumausdchfsell_array[$i] > 0 && $sumausdchfbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_usdchf[$i] }}
                      @elseif (
                          ($sumausdchfbuy_array[$i] != $sumausdchfsell_array[$i] && $sumausdchfsell_array[$i] < 0 && $sumausdchfbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_usdchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_usdchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">USDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumausdjpybuy_array[$i] + $sumausdjpysell_array[$i];
                @endphp
                   @if ($sumausdjpybuy_array[$i] == $sumausdjpysell_array[$i] && $sumausdjpybuy_array[$i] > 0 && $sumausdjpysell_array[$i] > 0)
                   <td data-priority="0" scope="col"
                       style="background-color: #FF6000; color:white; font-weight:500">{{$array_usdjpy[$i] }}</td>
               @elseif ($sumausdjpybuy_array[$i] == $sumausdjpysell_array[$i] && $sumausdjpybuy_array[$i] != 0 && $sumausdjpysell_array[$i] != 0)
                   <td data-priority="0" scope="col"
                       style="background-color: #D21312; color:white; font-weight:500">{{$array_usdjpy[$i] }}</td>
               @elseif(
                   ($sumausdjpybuy_array[$i] != $sumausdjpysell_array[$i] && $sumausdjpysell_array[$i] > 0 && $sumausdjpybuy_array[$i] > 0) ||
                       $sumabuy_sell > 0)
                   <td data-priority="0" scope="col"
                       style="background-color: #285430; color:white; font-weight:500">{{$array_usdjpy[$i] }}
                   @elseif (
                       ($sumausdjpybuy_array[$i] != $sumausdjpysell_array[$i] && $sumausdjpysell_array[$i] < 0 && $sumausdjpybuy_array[$i] < 0) ||
                           $sumabuy_sell < 0)
                   <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                       {{ $array_usdjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_usdjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURGBP</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeurgbpbuy_array[$i] + $sumaeurgbpsell_array[$i];
                @endphp
                       @if ($sumaeurgbpbuy_array[$i] == $sumaeurgbpsell_array[$i] && $sumaeurgbpbuy_array[$i] > 0 && $sumaeurgbpsell_array[$i] > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurgbp[$i] }}</td>
                   @elseif ($sumaeurgbpbuy_array[$i] == $sumaeurgbpsell_array[$i] && $sumaeurgbpbuy_array[$i] != 0 && $sumaeurgbpsell_array[$i] != 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurgbp[$i] }}</td>
                   @elseif(
                       ($sumaeurgbpbuy_array[$i] != $sumaeurgbpsell_array[$i] && $sumaeurgbpsell_array[$i] > 0 && $sumaeurgbpbuy_array[$i] > 0) ||
                           $sumabuy_sell > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #285430; color:white; font-weight:500">{{ $array_eurgbp[$i] }}
                       @elseif (
                           ($sumaeurgbpbuy_array[$i] != $sumaeurgbpsell_array[$i] && $sumaeurgbpsell_array[$i] < 0 && $sumaeurgbpbuy_array[$i] < 0) ||
                               $sumabuy_sell < 0)
                       <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                           {{ $array_eurgbp[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_eurgbp[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurgbp }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURAUD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeuraudbuy_array[$i] + $sumaeuraudsell_array[$i];
                @endphp
                    @if ($sumaeuraudbuy_array[$i] == $sumaeuraudsell_array[$i] && $sumaeuraudbuy_array[$i] > 0 && $sumaeuraudsell_array[$i] > 0)
                    <td data-priority="0" scope="col"
                        style="background-color: #FF6000; color:white; font-weight:500">{{ $array_euraud[$i] }}</td>
                @elseif ($sumaeuraudbuy_array[$i] == $sumaeuraudsell_array[$i] && $sumaeuraudbuy_array[$i] != 0 && $sumaeuraudsell_array[$i] != 0)
                    <td data-priority="0" scope="col"
                        style="background-color: #D21312; color:white; font-weight:500">{{ $array_euraud[$i] }}</td>
                @elseif(
                    ($sumaeuraudbuy_array[$i] != $sumaeuraudsell_array[$i] && $sumaeuraudsell_array[$i] > 0 && $sumaeuraudbuy_array[$i] > 0) ||
                        $sumabuy_sell > 0)
                    <td data-priority="0" scope="col"
                        style="background-color: #285430; color:white; font-weight:500">{{ $array_euraud[$i] }}
                    @elseif (
                        ($sumaeuraudbuy_array[$i] != $sumaeuraudsell_array[$i] && $sumaeuraudsell_array[$i] < 0 && $sumaeuraudbuy_array[$i] < 0) ||
                            $sumabuy_sell < 0)
                    <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                        {{ $array_euraud[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_euraud[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_euraud }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURNZD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeurnzdbuy_array[$i] + $sumaeurnzdsell_array[$i];
                @endphp
                      @if ($sumaeurnzdbuy_array[$i] == $sumaeurnzdsell_array[$i] && $sumaeurnzdbuy_array[$i] > 0 && $sumaeurnzdsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurnzd[$i] }}</td>
                  @elseif ($sumaeurnzdbuy_array[$i] == $sumaeurnzdsell_array[$i] && $sumaeurnzdbuy_array[$i] != 0 && $sumaeurnzdsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurnzd[$i] }}</td>
                  @elseif(
                      ($sumaeurnzdbuy_array[$i] != $sumaeurnzdsell_array[$i] && $sumaeurnzdsell_array[$i] > 0 && $sumaeurnzdbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_eurnzd[$i] }}
                      @elseif (
                          ($sumaeurnzdbuy_array[$i] != $sumaeurnzdsell_array[$i] && $sumaeurnzdsell_array[$i] < 0 && $sumaeurnzdbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_eurnzd[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_eurnzd[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurnzd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPAUD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpaudbuy_array[$i] + $sumagbpaudsell_array[$i];
                @endphp
                      @if ($sumagbpaudbuy_array[$i] == $sumagbpaudsell_array[$i] && $sumagbpaudbuy_array[$i] > 0 && $sumagbpaudsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpaud[$i] }}</td>
                  @elseif ($sumagbpaudbuy_array[$i] == $sumagbpaudsell_array[$i] && $sumagbpaudbuy_array[$i] != 0 && $sumagbpaudsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpaud[$i] }}</td>
                  @elseif(
                      ($sumagbpaudbuy_array[$i] != $sumagbpaudsell_array[$i] && $sumagbpaudsell_array[$i] > 0 && $sumagbpaudbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpaud[$i] }}
                      @elseif (
                          ($sumagbpaudbuy_array[$i] != $sumagbpaudsell_array[$i] && $sumagbpaudsell_array[$i] < 0 && $sumagbpaudbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_gbpaud[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_gbpaud[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpaud }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPNZD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpnzdbuy_array[$i] + $sumagbpnzdsell_array[$i];
                @endphp
                      @if ($sumagbpnzdbuy_array[$i] == $sumagbpnzdsell_array[$i] && $sumagbpnzdbuy_array[$i] > 0 && $sumagbpnzdsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpnzd[$i] }}</td>
                  @elseif ($sumagbpnzdbuy_array[$i] == $sumagbpnzdsell_array[$i] && $sumagbpnzdbuy_array[$i] != 0 && $sumagbpnzdsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpnzd[$i] }}</td>
                  @elseif(
                      ($sumagbpnzdbuy_array[$i] != $sumagbpnzdsell_array[$i] && $sumagbpnzdsell_array[$i] > 0 && $sumagbpnzdbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpnzd[$i] }}
                      @elseif (
                          ($sumagbpnzdbuy_array[$i] != $sumagbpnzdsell_array[$i] && $sumagbpnzdsell_array[$i] < 0 && $sumagbpnzdbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_gbpnzd[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_gbpnzd[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpnzd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDNZD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaaudnzdbuy_array[$i] + $sumaaudnzdsell_array[$i];
                @endphp
                      @if ($sumaaudnzdbuy_array[$i] == $sumaaudnzdsell_array[$i] && $sumaaudnzdbuy_array[$i] > 0 && $sumaaudnzdsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_audnzd[$i] }}</td>
                  @elseif ($sumaaudnzdbuy_array[$i] == $sumaaudnzdsell_array[$i] && $sumaaudnzdbuy_array[$i] != 0 && $sumaaudnzdsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_audnzd[$i] }}</td>
                  @elseif(
                      ($sumaaudnzdbuy_array[$i] != $sumaaudnzdsell_array[$i] && $sumaaudnzdsell_array[$i] > 0 && $sumaaudnzdbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_audnzd[$i] }}
                      @elseif (
                          ($sumaaudnzdbuy_array[$i] != $sumaaudnzdsell_array[$i] && $sumaaudnzdsell_array[$i] < 0 && $sumaaudnzdbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_audnzd[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_audnzd[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audnzd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURCAD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeurcadbuy_array[$i] + $sumaeurcadsell_array[$i];
                @endphp
                      @if ($sumaeurcadbuy_array[$i] == $sumaeurcadsell_array[$i] && $sumaeurcadbuy_array[$i] > 0 && $sumaeurcadsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurcad[$i] }}</td>
                  @elseif ($sumaeurcadbuy_array[$i] == $sumaeurcadsell_array[$i] && $sumaeurcadbuy_array[$i] != 0 && $sumaeurcadsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurcad[$i] }}</td>
                  @elseif(
                      ($sumaeurcadbuy_array[$i] != $sumaeurcadsell_array[$i] && $sumaeurcadsell_array[$i] > 0 && $sumaeurcadbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_eurcad[$i] }}
                      @elseif (
                          ($sumaeurcadbuy_array[$i] != $sumaeurcadsell_array[$i] && $sumaeurcadsell_array[$i] < 0 && $sumaeurcadbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_eurcad[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_eurcad[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurcad }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeurchfbuy_array[$i] + $sumaeurchfsell_array[$i];
                @endphp
                     @if ($sumaeurchfbuy_array[$i] == $sumaeurchfsell_array[$i] && $sumaeurchfbuy_array[$i] > 0 && $sumaeurchfsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurchf[$i] }}</td>
                 @elseif ($sumaeurchfbuy_array[$i] == $sumaeurchfsell_array[$i] && $sumaeurchfbuy_array[$i] != 0 && $sumaeurchfsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurchf[$i] }}</td>
                 @elseif(
                     ($sumaeurchfbuy_array[$i] != $sumaeurchfsell_array[$i] && $sumaeurchfsell_array[$i] > 0 && $sumaeurchfbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_eurchf[$i] }}
                     @elseif (
                         ($sumaeurchfbuy_array[$i] != $sumaeurchfsell_array[$i] && $sumaeurchfsell_array[$i] < 0 && $sumaeurchfbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_eurchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_eurchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">EURJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaeurjpybuy_array[$i] + $sumaeurjpysell_array[$i];
                @endphp
                       @if ($sumaeurjpybuy_array[$i] == $sumaeurjpysell_array[$i] && $sumaeurjpybuy_array[$i] > 0 && $sumaeurjpysell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_eurjpy[$i] }}</td>
                  @elseif ($sumaeurjpybuy_array[$i] == $sumaeurjpysell_array[$i] && $sumaeurjpybuy_array[$i] != 0 && $sumaeurjpysell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_eurjpy[$i] }}</td>
                  @elseif(
                      ($sumaeurjpybuy_array[$i] != $sumaeurjpysell_array[$i] && $sumaeurjpysell_array[$i] > 0 && $sumaeurjpybuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_eurjpy[$i] }}
                      @elseif (
                          ($sumaeurjpybuy_array[$i] != $sumaeurjpysell_array[$i] && $sumaeurjpysell_array[$i] < 0 && $sumaeurjpybuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_eurjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_eurjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPCAD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpcadbuy_array[$i] + $sumagbpcadsell_array[$i];
                @endphp
                     @if ($sumagbpcadbuy_array[$i] == $sumagbpcadsell_array[$i] && $sumagbpcadbuy_array[$i] > 0 && $sumagbpcadsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpcad[$i] }}</td>
                 @elseif ($sumagbpcadbuy_array[$i] == $sumagbpcadsell_array[$i] && $sumagbpcadbuy_array[$i] != 0 && $sumagbpcadsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpcad[$i] }}</td>
                 @elseif(
                     ($sumagbpcadbuy_array[$i] != $sumagbpcadsell_array[$i] && $sumagbpcadsell_array[$i] > 0 && $sumagbpcadbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpcad[$i] }}
                     @elseif (
                         ($sumagbpcadbuy_array[$i] != $sumagbpcadsell_array[$i] && $sumagbpcadsell_array[$i] < 0 && $sumagbpcadbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_gbpcad[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_gbpcad[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpcad }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpchfbuy_array[$i] + $sumagbpchfsell_array[$i];
                @endphp
                     @if ($sumagbpchfbuy_array[$i] == $sumagbpchfsell_array[$i] && $sumagbpchfbuy_array[$i] > 0 && $sumagbpchfsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpchf[$i] }}</td>
                 @elseif ($sumagbpchfbuy_array[$i] == $sumagbpchfsell_array[$i] && $sumagbpchfbuy_array[$i] != 0 && $sumagbpchfsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpchf[$i] }}</td>
                 @elseif(
                     ($sumagbpchfbuy_array[$i] != $sumagbpchfsell_array[$i] && $sumagbpchfsell_array[$i] > 0 && $sumagbpchfbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpchf[$i] }}
                     @elseif (
                         ($sumagbpchfbuy_array[$i] != $sumagbpchfsell_array[$i] && $sumagbpchfsell_array[$i] < 0 && $sumagbpchfbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_gbpchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_gbpchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumagbpjpybuy_array[$i] + $sumagbpjpysell_array[$i];
                @endphp
                     @if ($sumagbpjpybuy_array[$i] == $sumagbpjpysell_array[$i] && $sumagbpjpybuy_array[$i] > 0 && $sumagbpjpysell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_gbpjpy[$i] }}</td>
                 @elseif ($sumagbpjpybuy_array[$i] == $sumagbpjpysell_array[$i] && $sumagbpjpybuy_array[$i] != 0 && $sumagbpjpysell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_gbpjpy[$i] }}</td>
                 @elseif(
                     ($sumagbpjpybuy_array[$i] != $sumagbpjpysell_array[$i] && $sumagbpjpysell_array[$i] > 0 && $sumagbpjpybuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_gbpjpy[$i] }}
                     @elseif (
                         ($sumagbpjpybuy_array[$i] != $sumagbpjpysell_array[$i] && $sumagbpjpysell_array[$i] < 0 && $sumagbpjpybuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_gbpjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_gbpjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaaudcadbuy_array[$i] + $sumaaudcadsell_array[$i];
                @endphp
                      @if ($sumaaudcadbuy_array[$i] == $sumaaudcadsell_array[$i] && $sumaaudcadbuy_array[$i] > 0 && $sumaaudcadsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{  $array_audcad[$i] }}</td>
                  @elseif ($sumaaudcadbuy_array[$i] == $sumaaudcadsell_array[$i] && $sumaaudcadbuy_array[$i] != 0 && $sumaaudcadsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{  $array_audcad[$i] }}</td>
                  @elseif(
                      ($sumaaudcadbuy_array[$i] != $sumaaudcadsell_array[$i] && $sumaaudcadsell_array[$i] > 0 && $sumaaudcadbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{  $array_audcad[$i] }}
                      @elseif (
                          ($sumaaudcadbuy_array[$i] != $sumaaudcadsell_array[$i] && $sumaaudcadsell_array[$i] < 0 && $sumaaudcadbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_audcad[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_audcad[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audcad }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaaudchfbuy_array[$i] + $sumaaudchfsell_array[$i];
                @endphp
                     @if ($sumaaudchfbuy_array[$i] == $sumaaudchfsell_array[$i] && $sumaaudchfbuy_array[$i] > 0 && $sumaaudchfsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_audchf[$i] }}</td>
                 @elseif ($sumaaudchfbuy_array[$i] == $sumaaudchfsell_array[$i] && $sumaaudchfbuy_array[$i] != 0 && $sumaaudchfsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_audchf[$i] }}</td>
                 @elseif(
                     ($sumaaudchfbuy_array[$i] != $sumaaudchfsell_array[$i] && $sumaaudchfsell_array[$i] > 0 && $sumaaudchfbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_audchf[$i] }}
                     @elseif (
                         ($sumaaudchfbuy_array[$i] != $sumaaudchfsell_array[$i] && $sumaaudchfsell_array[$i] < 0 && $sumaaudchfbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_audchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_audchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumaaudjpybuy_array[$i] + $sumaaudjpysell_array[$i];
                @endphp
                     @if ($sumaaudjpybuy_array[$i] == $sumaaudjpysell_array[$i] && $sumaaudjpybuy_array[$i] > 0 && $sumaaudjpysell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_audjpy[$i] }}</td>
                 @elseif ($sumaaudjpybuy_array[$i] == $sumaaudjpysell_array[$i] && $sumaaudjpybuy_array[$i] != 0 && $sumaaudjpysell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_audjpy[$i] }}</td>
                 @elseif(
                     ($sumaaudjpybuy_array[$i] != $sumaaudjpysell_array[$i] && $sumaaudjpysell_array[$i] > 0 && $sumaaudjpybuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_audjpy[$i] }}
                     @elseif (
                         ($sumaaudjpybuy_array[$i] != $sumaaudjpysell_array[$i] && $sumaaudjpysell_array[$i] < 0 && $sumaaudjpybuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_audjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_audjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumanzdcadbuy_array[$i] + $sumanzdcadsell_array[$i];
                @endphp
                      @if ($sumanzdcadbuy_array[$i] == $sumanzdcadsell_array[$i] && $sumanzdcadbuy_array[$i] > 0 && $sumanzdcadsell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{ $array_nzdcad[$i] }}</td>
                  @elseif ($sumanzdcadbuy_array[$i] == $sumanzdcadsell_array[$i] && $sumanzdcadbuy_array[$i] != 0 && $sumanzdcadsell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{ $array_nzdcad[$i] }}</td>
                  @elseif(
                      ($sumanzdcadbuy_array[$i] != $sumanzdcadsell_array[$i] && $sumanzdcadsell_array[$i] > 0 && $sumanzdcadbuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{ $array_nzdcad[$i] }}
                      @elseif (
                          ($sumanzdcadbuy_array[$i] != $sumanzdcadsell_array[$i] && $sumanzdcadsell_array[$i] < 0 && $sumanzdcadbuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_nzdcad[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_nzdcad[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdcad }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumanzdchfbuy_array[$i] + $sumanzdchfsell_array[$i];
                @endphp
                       @if ($sumanzdchfbuy_array[$i] == $sumanzdchfsell_array[$i] && $sumanzdchfbuy_array[$i] > 0 && $sumanzdchfsell_array[$i] > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #FF6000; color:white; font-weight:500">{{ $array_nzdchf[$i] }}</td>
                   @elseif ($sumanzdchfbuy_array[$i] == $sumanzdchfsell_array[$i] && $sumanzdchfbuy_array[$i] != 0 && $sumanzdchfsell_array[$i] != 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #D21312; color:white; font-weight:500">{{ $array_nzdchf[$i] }}</td>
                   @elseif(
                       ($sumanzdchfbuy_array[$i] != $sumanzdchfsell_array[$i] && $sumanzdchfsell_array[$i] > 0 && $sumanzdchfbuy_array[$i] > 0) ||
                           $sumabuy_sell > 0)
                       <td data-priority="0" scope="col"
                           style="background-color: #285430; color:white; font-weight:500">{{ $array_nzdchf[$i] }}
                       @elseif (
                           ($sumanzdchfbuy_array[$i] != $sumanzdchfsell_array[$i] && $sumanzdchfsell_array[$i] < 0 && $sumanzdchfbuy_array[$i] < 0) ||
                               $sumabuy_sell < 0)
                       <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                           {{ $array_nzdchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_nzdchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">NZDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumanzdjpybuy_array[$i] + $sumanzdjpysell_array[$i];
                @endphp
                      @if ($sumanzdjpybuy_array[$i] == $sumanzdjpysell_array[$i] && $sumanzdjpybuy_array[$i] > 0 && $sumanzdjpysell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{$array_nzdjpy[$i] }}</td>
                  @elseif ($sumanzdjpybuy_array[$i] == $sumanzdjpysell_array[$i] && $sumanzdjpybuy_array[$i] != 0 && $sumanzdjpysell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{$array_nzdjpy[$i] }}</td>
                  @elseif(
                      ($sumanzdjpybuy_array[$i] != $sumanzdjpysell_array[$i] && $sumanzdjpysell_array[$i] > 0 && $sumanzdjpybuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{$array_nzdjpy[$i] }}
                      @elseif (
                          ($sumanzdjpybuy_array[$i] != $sumanzdjpysell_array[$i] && $sumanzdjpysell_array[$i] < 0 && $sumanzdjpybuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_nzdjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_nzdjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CADCHF</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumacadchfbuy_array[$i] + $sumacadchfsell_array[$i];
                @endphp
                     @if ($sumacadchfbuy_array[$i] == $sumacadchfsell_array[$i] && $sumacadchfbuy_array[$i] > 0 && $sumacadchfsell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{$array_cadchf[$i] }}</td>
                 @elseif ($sumacadchfbuy_array[$i] == $sumacadchfsell_array[$i] && $sumacadchfbuy_array[$i] != 0 && $sumacadchfsell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{$array_cadchf[$i] }}</td>
                 @elseif(
                     ($sumacadchfbuy_array[$i] != $sumacadchfsell_array[$i] && $sumacadchfsell_array[$i] > 0 && $sumacadchfbuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{$array_cadchf[$i] }}
                     @elseif (
                         ($sumacadchfbuy_array[$i] != $sumacadchfsell_array[$i] && $sumacadchfsell_array[$i] < 0 && $sumacadchfbuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_cadchf[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_cadchf[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_cadchf }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CADJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumacadjpybuy_array[$i] + $sumacadjpysell_array[$i];
                @endphp
                     @if ($sumacadjpybuy_array[$i] == $sumacadjpysell_array[$i] && $sumacadjpybuy_array[$i] > 0 && $sumacadjpysell_array[$i] > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #FF6000; color:white; font-weight:500">{{ $array_cadjpy[$i] }}</td>
                 @elseif ($sumacadjpybuy_array[$i] == $sumacadjpysell_array[$i] && $sumacadjpybuy_array[$i] != 0 && $sumacadjpysell_array[$i] != 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #D21312; color:white; font-weight:500">{{ $array_cadjpy[$i] }}</td>
                 @elseif(
                     ($sumacadjpybuy_array[$i] != $sumacadjpysell_array[$i] && $sumacadjpysell_array[$i] > 0 && $sumacadjpybuy_array[$i] > 0) ||
                         $sumabuy_sell > 0)
                     <td data-priority="0" scope="col"
                         style="background-color: #285430; color:white; font-weight:500">{{ $array_cadjpy[$i] }}
                     @elseif (
                         ($sumacadjpybuy_array[$i] != $sumacadjpysell_array[$i] && $sumacadjpysell_array[$i] < 0 && $sumacadjpybuy_array[$i] < 0) ||
                             $sumabuy_sell < 0)
                     <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                         {{ $array_cadjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_cadjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_cadjpy }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">CHFJPY</td>
                @for ($i = 0; $i < 9; $i++)
                @php
                $sumabuy_sell = $sumachfjpybuy_array[$i] + $sumachfjpysell_array[$i];
                @endphp
                      @if ($sumachfjpybuy_array[$i] == $sumachfjpysell_array[$i] && $sumachfjpybuy_array[$i] > 0 && $sumachfjpysell_array[$i] > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #FF6000; color:white; font-weight:500">{{$array_chfjpy[$i] }}</td>
                  @elseif ($sumachfjpybuy_array[$i] == $sumachfjpysell_array[$i] && $sumachfjpybuy_array[$i] != 0 && $sumachfjpysell_array[$i] != 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #D21312; color:white; font-weight:500">{{$array_chfjpy[$i] }}</td>
                  @elseif(
                      ($sumachfjpybuy_array[$i] != $sumachfjpysell_array[$i] && $sumachfjpysell_array[$i] > 0 && $sumachfjpybuy_array[$i] > 0) ||
                          $sumabuy_sell > 0)
                      <td data-priority="0" scope="col"
                          style="background-color: #285430; color:white; font-weight:500">{{$array_chfjpy[$i] }}
                      @elseif (
                          ($sumachfjpybuy_array[$i] != $sumachfjpysell_array[$i] && $sumachfjpysell_array[$i] < 0 && $sumachfjpybuy_array[$i] < 0) ||
                              $sumabuy_sell < 0)
                      <td data-priority="0" scope="col" style="background-color: #FFEA20; font-weight:500">
                          {{ $array_chfjpy[$i] }}
                    @else
                        <td data-priority="0" scope="col">{{ $array_chfjpy[$i] }}</td>
                    @endif
                @endfor
                <td data-priority="0" scope="col">{{ $suma_chfjpy }}</td>
            </tr>
        </tbody>
    </table>
@else
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        <div>
            No se encontró ningún registro
        </div>
    </div>
@endif
