<div class="row d-flex align-items-center">
    <div class="pagetitle d-flex align-items-center">
        <h1>Portafolios Activos</h1>
    </div>
</div>
<hr class="m-0 p-0 mb-2">
@foreach ($portafolios as $portafolio)
    @php
        
        $portafoliosArray = DB::table('portafolios')
            ->where('value', $portafolio->value)
            ->orderBy('time', 'desc')
            ->limit(1)
            ->get();

        $compPortafoliosArray = DB::table('comportamiento_portafolio')
            ->where('value', $portafolio->value)
            ->get();
        
        $last_general = DB::table('portafolios')
            ->where('value', $portafolio->value)
            ->limit(1)
            ->orderBy('id', 'desc')
            ->first();
    @endphp


    @php
        $lastDate = Carbon\Carbon::createFromDate($last_general->time);
        $now = Carbon\Carbon::now();
        
        $diff = $lastDate->diffInMinutes($now);
    @endphp

    @if ($portafoliosArray[0]->operations_number == 0)
    @else
        <div class="trader mb-0">
            <div class="title-trader d-flex justify-content-between align-items-center">
                <div>
                    @if ($diff > 0)
                        <span class="badge bg-danger">ALERTA: El último dato recibido de
                            {{ $portafoliosArray[0]->value }} fue
                            hace más de 1 minuto</span>
                    @endif
                </div>
                <div class="mt-1">
                    <h5>
                        Última actualización:
                        {{ ucfirst(Carbon\Carbon::parse($last_general->time)->diffForHumans()) }}
                    </h5>
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-xl-3">
                    <div class="card l-bg-blue shadow">
                        <div class="card-statistic-3 p-3">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-hashtag" style="font-size: 40px"></i>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        {{ $portafoliosArray[0]->value }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card l-bg-blue-bal shadow">
                        <div class="card-statistic-3 p-3">

                            <div class="card-icon card-icon-large mt-2">
                                <i class="fa-solid fa-scale-balanced fa-2xl "></i>
                            </div>

                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">Balance</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader fs-6">
                                        {{ number_format($portafoliosArray[0]->close, 2) }}
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card l-bg-cashout shadow">
                        <div class="card-statistic-3 p-3">

                            <div class="card-icon card-icon-large mt-2">
                                <i class="fa-solid fa-money-bill-transfer fa-2xl"></i>
                            </div>

                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">Cash Out</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader fs-6">
                                        {{ number_format($portafoliosArray[0]->cash_out, 2) }}
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $status = $portafoliosArray[0]->status;
                @endphp

                <div class="col-xl-3">
                    <div class="card l-bg-status shadow">
                        <div class="card-statistic-3 p-3">

                            <div class="card-icon card-icon-large">
                                <i class="fas fa-arrow-right-arrow-left"></i>
                            </div>

                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">Status</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        @if ($status == '')
                                            Sin status
                                        @elseif ($portafoliosArray[0]->operations_number == 0)
                                            {{ $portafoliosArray[0]->status }} / {{ $compPortafoliosArray[0]->capitalized_total }}
                                        @else
                                            {{ $portafoliosArray[0]->status }} / {{ $compPortafoliosArray[0]->capitalized_moment}}
                                        @endif
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card l-bg-good shadow">
                        <div class="card-statistic-3 p-3">
                            <div class="card-icon card-icon-large">
                                <i class="fas fa-arrow-right-arrow-left"></i>
                            </div>
                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">Take Profit</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        {{ number_format($portafoliosArray[0]->objective_tp, 2) }}
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 ">
                    <div
                        class="card 
                    
                        l-bg-middle 
                    shadow">
                        <div class="card-statistic-3 p-3">

                            <div class="card-icon card-icon-large">
                                <i class="fas fa-arrow-right-arrow-left"></i>
                            </div>

                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">70%</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        {{ number_format($portafoliosArray[0]->objective_70, 2) }}
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card l-bg-bad shadow">
                        <div class="card-statistic-3 p-3">
                            @if (0 == 0)
                                <div class="card-icon card-icon-large">
                                    <i class="fas fa-arrow-right-arrow-left"></i>
                                </div>
                            @elseif(0 < 0)
                                <div class="card-icon card-icon-large">
                                    <i class="fas fa-arrow-trend-down"></i>
                                </div>
                            @elseif(0 > 0)
                                <div class="card-icon card-icon-large">
                                    <i class="fas fa-arrow-trend-up"></i>
                                </div>
                            @endif
                            <div class="title-stats text-center">
                                <h5 class="card-title text-light pt-0 pb-0">Stop Loss</h5>
                            </div>
                            <div class="row">
                                <b></b>
                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        {{ number_format($portafoliosArray[0]->objective_sl, 2) }}
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card l-bg-up shadow">
                        <div class="card-statistic-3 p-3">
                            <div class="card-icon card-icon-large" style="font-size: 0px">
                                <i class="fas fa-arrow-trend-up"></i>
                            </div>
                            <div class="title-stats text-center">
                                <h5 class="card-title text-dark pt-0 pb-0"># de Operaciones</h5>

                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <h2 class="d-flex align-items-center justify-content-center mb-0 cant-trader">
                                        {{ $portafoliosArray[0]->operations_number }} </h2>
                                    @php
                                        $monedas = 'eurusd,gbpusd,audusd,nzdusd,usdcad,usdchf,usdjpy,eurgbp,euraud,eurnzd,gbpaud,gbpnzd,audnzd,eurcad,eurchf,eurjpy,gbpcad,gbpchf,gbpjpy,audcad,audchf,audjpy,nzdcad,nzdchf,nzdjpy,cadchf,cadjpy,chfjpy';
                                    @endphp
                                    @foreach (explode(',', $monedas) as $moneda)
                                        @if ($portafoliosArray[0]->$moneda != 0)
                                            <h2
                                                class="d-flex align-items-center justify-content-center mb-0 cant-trader">

                                                <div class="dropdown ">
                                                    <button class="btn btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Mostrar
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item"
                                                                href="#"><b>{{ strtoupper($moneda) }}: </b>$
                                                                {{ $portafoliosArray[0]->$moneda }}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                    </h2>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>

          

                <hr style="width:400px; margin: auto; color:darkgray;" />



            </div>
        </div>
        </div>
    @endif
@endforeach
