@if ($condicional)
    @php
        
        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurusd as $eurusd) {
            if ($magicnumber_anterior == $eurusd->magicnumber) {
                $sumarest += $eurusd->profit;
            } else {
                $sumarest = $eurusd->profit;
            }
        
            $rest = substr($eurusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurusd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurusd->magicnumber;
        }
        
        $suma_eurusd = array_sum($array_eurusd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpusd as $gbpusd) {
            if ($magicnumber_anterior == $gbpusd->magicnumber) {
                $sumarest += $gbpusd->profit;
            } else {
                $sumarest = $gbpusd->profit;
            }
        
            $rest = substr($gbpusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpusd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpusd->magicnumber;
        }
        
        $suma_gbpusd = array_sum($array_gbpusd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicaudusd as $audusd) {
            if ($magicnumber_anterior == $audusd->magicnumber) {
                $sumarest += $audusd->profit;
            } else {
                $sumarest = $audusd->profit;
            }
        
            $rest = substr($audusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audusd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $audusd->magicnumber;
        }
        
        $suma_audusd = array_sum($array_audusd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdusd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicnzdusd as $nzdusd) {
            if ($magicnumber_anterior == $nzdusd->magicnumber) {
                $sumarest += $nzdusd->profit;
            } else {
                $sumarest = $nzdusd->profit;
            }
        
            $rest = substr($nzdusd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdusd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $nzdusd->magicnumber;
        }
        
        $suma_nzdusd = array_sum($array_nzdusd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicusdcad as $usdcad) {
            if ($magicnumber_anterior == $usdcad->magicnumber) {
                $sumarest += $usdcad->profit;
            } else {
                $sumarest = $usdcad->profit;
            }
        
            $rest = substr($usdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdcad[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $usdcad->magicnumber;
        }
        
        $suma_usdcad = array_sum($array_usdcad);

         $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicusdchf as $usdchf) {
            if ($magicnumber_anterior == $usdchf->magicnumber) {
                $sumarest += $usdchf->profit;
            } else {
                $sumarest = $usdchf->profit;
            }
        
            $rest = substr($usdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $usdchf->magicnumber;
        }
        
        $suma_usdchf = array_sum($array_usdchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_usdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicusdjpy as $usdjpy) {
            if ($magicnumber_anterior == $usdjpy->magicnumber) {
                $sumarest += $usdjpy->profit;
            } else {
                $sumarest = $usdjpy->profit;
            }
        
            $rest = substr($usdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_usdjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $usdjpy->magicnumber;
        }
        
        $suma_usdjpy = array_sum($array_usdjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurgbp = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurgbp as $eurgbp) {
            if ($magicnumber_anterior == $eurgbp->magicnumber) {
                $sumarest += $eurgbp->profit;
            } else {
                $sumarest = $eurgbp->profit;
            }
        
            $rest = substr($eurgbp->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurgbp[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurgbp->magicnumber;
        }
        
        $suma_eurgbp = array_sum($array_eurgbp);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_euraud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceuraud as $euraud) {
            if ($magicnumber_anterior == $euraud->magicnumber) {
                $sumarest += $euraud->profit;
            } else {
                $sumarest = $euraud->profit;
            }
        
            $rest = substr($euraud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_euraud[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $euraud->magicnumber;
        }
        
        $suma_euraud = array_sum($array_euraud);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurnzd as $eurnzd) {
            if ($magicnumber_anterior == $eurnzd->magicnumber) {
                $sumarest += $eurnzd->profit;
            } else {
                $sumarest = $eurnzd->profit;
            }
        
            $rest = substr($eurnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurnzd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurnzd->magicnumber;
        }
        
        $suma_eurnzd = array_sum($array_eurnzd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpaud = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpaud as $gbpaud) {
            if ($magicnumber_anterior == $gbpaud->magicnumber) {
                $sumarest += $gbpaud->profit;
            } else {
                $sumarest = $gbpaud->profit;
            }
        
            $rest = substr($gbpaud->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpaud[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpaud->magicnumber;
        }
        
        $suma_gbpaud = array_sum($array_gbpaud);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpnzd as $gbpnzd) {
            if ($magicnumber_anterior == $gbpnzd->magicnumber) {
                $sumarest += $gbpnzd->profit;
            } else {
                $sumarest = $gbpnzd->profit;
            }
        
            $rest = substr($gbpnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpnzd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpnzd->magicnumber;
        }
        
        $suma_gbpnzd = array_sum($array_gbpnzd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audnzd = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicaudnzd as $audnzd) {
            if ($magicnumber_anterior == $audnzd->magicnumber) {
                $sumarest += $audnzd->profit;
            } else {
                $sumarest = $audnzd->profit;
            }
        
            $rest = substr($audnzd->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audnzd[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $audnzd->magicnumber;
        }
        
        $suma_audnzd = array_sum($array_audnzd);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurcad as $eurcad) {
            if ($magicnumber_anterior == $eurcad->magicnumber) {
                $sumarest += $eurcad->profit;
            } else {
                $sumarest = $eurcad->profit;
            }
        
            $rest = substr($eurcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurcad[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurcad->magicnumber;
        }
        
        $suma_eurcad = array_sum($array_eurcad);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurchf as $eurchf) {
            if ($magicnumber_anterior == $eurchf->magicnumber) {
                $sumarest += $eurchf->profit;
            } else {
                $sumarest = $eurchf->profit;
            }
        
            $rest = substr($eurchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurchf->magicnumber;
        }
        
        $suma_eurchf = array_sum($array_eurchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_eurjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiceurjpy as $eurjpy) {
            if ($magicnumber_anterior == $eurjpy->magicnumber) {
                $sumarest += $eurjpy->profit;
            } else {
                $sumarest = $eurjpy->profit;
            }
        
            $rest = substr($eurjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_eurjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $eurjpy->magicnumber;
        }
        
        $suma_eurjpy = array_sum($array_eurjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpcad as $gbpcad) {
            if ($magicnumber_anterior == $gbpcad->magicnumber) {
                $sumarest += $gbpcad->profit;
            } else {
                $sumarest = $gbpcad->profit;
            }
        
            $rest = substr($gbpcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpcad[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpcad->magicnumber;
        }
        
        $suma_gbpcad = array_sum($array_gbpcad);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpchf as $gbpchf) {
            if ($magicnumber_anterior == $gbpchf->magicnumber) {
                $sumarest += $gbpchf->profit;
            } else {
                $sumarest = $gbpchf->profit;
            }
        
            $rest = substr($gbpchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpchf->magicnumber;
        }
        
        $suma_gbpchf = array_sum($array_gbpchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_gbpjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicgbpjpy as $gbpjpy) {
            if ($magicnumber_anterior == $gbpjpy->magicnumber) {
                $sumarest += $gbpjpy->profit;
            } else {
                $sumarest = $gbpjpy->profit;
            }
        
            $rest = substr($gbpjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_gbpjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $gbpjpy->magicnumber;
        }
        
        $suma_gbpjpy = array_sum($array_gbpjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicaudcad as $audcad) {
            if ($magicnumber_anterior == $audcad->magicnumber) {
                $sumarest += $audcad->profit;
            } else {
                $sumarest = $audcad->profit;
            }
        
            $rest = substr($audcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audcad[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $audcad->magicnumber;
        }
        
        $suma_audcad = array_sum($array_audcad);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicaudchf as $audchf) {
            if ($magicnumber_anterior == $audchf->magicnumber) {
                $sumarest += $audchf->profit;
            } else {
                $sumarest = $audchf->profit;
            }
        
            $rest = substr($audchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $audchf->magicnumber;
        }
        
        $suma_audchf = array_sum($array_audchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_audjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicaudjpy as $audjpy) {
            if ($magicnumber_anterior == $audjpy->magicnumber) {
                $sumarest += $audjpy->profit;
            } else {
                $sumarest = $audjpy->profit;
            }
        
            $rest = substr($audjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_audjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $audjpy->magicnumber;
        }
        
        $suma_audjpy = array_sum($array_audjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdcad = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicnzdcad as $nzdcad) {
            if ($magicnumber_anterior == $nzdcad->magicnumber) {
                $sumarest += $nzdcad->profit;
            } else {
                $sumarest = $nzdcad->profit;
            }
        
            $rest = substr($nzdcad->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdcad[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $nzdcad->magicnumber;
        }
        
        $suma_nzdcad = array_sum($array_nzdcad);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicnzdchf as $nzdchf) {
            if ($magicnumber_anterior == $nzdchf->magicnumber) {
                $sumarest += $nzdchf->profit;
            } else {
                $sumarest = $nzdchf->profit;
            }
        
            $rest = substr($nzdchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $nzdchf->magicnumber;
        }
        
        $suma_nzdchf = array_sum($array_nzdchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_nzdjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicnzdjpy as $nzdjpy) {
            if ($magicnumber_anterior == $nzdjpy->magicnumber) {
                $sumarest += $nzdjpy->profit;
            } else {
                $sumarest = $nzdjpy->profit;
            }
        
            $rest = substr($nzdjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_nzdjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $nzdjpy->magicnumber;
        }
        
        $suma_nzdjpy = array_sum($array_nzdjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadchf = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiccadchf as $cadchf) {
            if ($magicnumber_anterior == $cadchf->magicnumber) {
                $sumarest += $cadchf->profit;
            } else {
                $sumarest = $cadchf->profit;
            }
        
            $rest = substr($cadchf->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadchf[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $cadchf->magicnumber;
        }
        
        $suma_cadchf = array_sum($array_cadchf);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_cadjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magiccadjpy as $cadjpy) {
            if ($magicnumber_anterior == $cadjpy->magicnumber) {
                $sumarest += $cadjpy->profit;
            } else {
                $sumarest = $cadjpy->profit;
            }
        
            $rest = substr($cadjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_cadjpy[$i] = $sumarest;
                }
            }
        
            $magicnumber_anterior = $cadjpy->magicnumber;
        }
        
        $suma_cadjpy = array_sum($array_cadjpy);

        $sumarest = 0;
        $magicnumber_anterior = 0;
        $array_chfjpy = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($magicchfjpy as $chfjpy) {
            if ($magicnumber_anterior == $chfjpy->magicnumber) {
                $sumarest += $chfjpy->profit;
            } else {
                $sumarest = $chfjpy->profit;
            }
        
            $rest = substr($chfjpy->magicnumber, -2, 1);
            for ($i = 0; $i < 9; $i++) {
                if ($rest == $i + 1) {
                    $array_chfjpy[$i] = $sumarest;
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
                        style="font-weight: 500">{{ $status_profit->nombre }}</span></th>
                <th data-priority="0" scope="col" colspan="7">Total totales: <span
                        style="font-weight: 500">{{ $sum_totales }}</span>
                </th>
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

        <tbody>
            <tr>
                <td data-priority="0" scope="col">EURUSD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurusd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurusd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">GBPUSD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpusd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpusd }}</td>
            </tr>

            <tr>
                <td data-priority="0" scope="col">AUDUSD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_audusd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audusd }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDUSD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_nzdusd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdusd }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_usdcad[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdcad }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_usdchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_usdjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_usdjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURGBP</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurgbp[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurgbp }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURAUD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_euraud[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_euraud }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURNZD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurnzd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurnzd }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPAUD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpaud[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpaud }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPNZD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpnzd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpnzd }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDNZD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_audnzd[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audnzd }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURCAD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurcad[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurcad }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_eurjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_eurjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPCAD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpcad[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpcad }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_gbpjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_gbpjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_audcad[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audcad }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_audchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_audjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_audjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDCAD</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_nzdcad[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdcad }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_nzdchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_nzdjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_nzdjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CADCHF</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_cadchf[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_cadchf }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CADJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_cadjpy[$i] }}</td>
                @endfor
                <td data-priority="0" scope="col">{{ $suma_cadjpy }}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CHFJPY</td>
                @for ($i = 0; $i < 9; $i++)
                    <td data-priority="0" scope="col">{{ $array_chfjpy[$i] }}</td>
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
