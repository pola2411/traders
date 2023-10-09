@php
$lastid = DB::table('robots')->latest('id')->first();
@endphp
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offusd" data-id="{{$lastid->id}}">USD</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offeur" data-id="{{$lastid->id}}">EUR</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offgbp" data-id="{{$lastid->id}}">GBP</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offaud" data-id="{{$lastid->id}}">AUD</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offnzd" data-id="{{$lastid->id}}">NZD</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offcad" data-id="{{$lastid->id}}">CAD</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offchf" data-id="{{$lastid->id}}">CHF</button>
        </div>
        <div class="col">
            <button class="btn btn-dark btn-block mb-2" id="offjpy" data-id="{{$lastid->id}}">JPY</button>
        </div>
    </div>
</div>

    <table class="table table-striped table-bordered nowrap text-center" id="robots">
        <thead>

            <tr>
                <th>No. de Cuenta</th>
                <th>Encendido General</th>
                <th>Encendido en Tiempo</th>
                <th>EURUSD</th>
                <th>GBPUSD</th>
                <th>AUDUSD</th>
                <th>NZDUSD</th>
                <th>USDCAD</th>
                <th>USDCHF</th>
                <th>USDJPY</th>
                <th>EURGBP</th>
                <th>EURAUD</th>
                <th>EURNZD</th>
                <th>GBPAUD</th>
                <th>GBPNZD</th>
                <th>AUDNZD</th>
                <th>EURCAD</th>
                <th>EURCHF</th>
                <th>EURJPY</th>
                <th>GBPCAD</th>
                <th>GBPCHF</th>
                <th>GBPJPY</th>
                <th>AUDCAD</th>
                <th>AUDCHF</th>
                <th>AUDJPY</th>
                <th>NZDCAD</th>
                <th>NZDCHF</th>
                <th>NZDJPY</th>
                <th>CADCHF</th>
                <th>CADJPY</th>
                <th>CHFJPY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $robots_status[0]->no_account }}</td>
                <td>
                    @if ($robots_status[0]->on_general == 0)
                    <button type="button" class="btn btn-danger" id="Ongral" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->on_general }}</button>
                    @else
                    <button type="button" class="btn btn-success" id="Ongral" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->on_general}}</button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->on_time == 0)
                    <button type="button" class="btn btn-danger" id="Ontime" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->on_time }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="Ontime" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->on_time }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurusd == 0)
                    <button type="button" class="btn btn-danger" id="eurusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurusd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurusd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpusd == 0)
                    <button type="button" class="btn btn-danger" id="gbpusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpusd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpusd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->audusd == 0)
                    <button type="button" class="btn btn-danger" id="audusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audusd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="audusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audusd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->nzdusd == 0)
                    <button type="button" class="btn btn-danger" id="nzdusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdusd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="nzdusd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdusd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->usdcad == 0)
                    <button type="button" class="btn btn-danger" id="usdcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdcad }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="usdcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdcad }} </button>
                    @endif
                </td>   
                <td>
                    @if ($robots_status[0]->usdchf == 0)
                    <button type="button" class="btn btn-danger" id="usdchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="usdchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->usdjpy == 0)
                    <button type="button" class="btn btn-danger" id="usdjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="usdjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->usdjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurgbp == 0)
                    <button type="button" class="btn btn-danger" id="eurgbp" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurgbp }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurgbp" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurgbp }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->euraud == 0)
                    <button type="button" class="btn btn-danger" id="euraud" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->euraud }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="euraud" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->euraud }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurnzd == 0)
                    <button type="button" class="btn btn-danger" id="eurnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurnzd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurnzd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpaud == 0)
                    <button type="button" class="btn btn-danger" id="gbpaud" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpaud }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpaud" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpaud }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpnzd == 0)
                    <button type="button" class="btn btn-danger" id="gbpnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpnzd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpnzd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->audnzd == 0)
                    <button type="button" class="btn btn-danger" id="audnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audnzd }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="audnzd" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audnzd }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurcad == 0)
                    <button type="button" class="btn btn-danger" id="eurcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurcad }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurcad }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurchf == 0)
                    <button type="button" class="btn btn-danger" id="eurchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->eurjpy == 0)
                    <button type="button" class="btn btn-danger" id="eurjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="eurjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->eurjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpcad == 0)
                    <button type="button" class="btn btn-danger" id="gbpcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpcad }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpcad }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpchf == 0)
                    <button type="button" class="btn btn-danger" id="gbpchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->gbpjpy == 0)
                    <button type="button" class="btn btn-danger" id="gbpjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="gbpjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->gbpjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->audcad == 0)
                    <button type="button" class="btn btn-danger" id="audcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audcad }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="audcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audcad }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->audchf == 0)
                    <button type="button" class="btn btn-danger" id="audchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="audchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->audjpy == 0)
                    <button type="button" class="btn btn-danger" id="audjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="audjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->audjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->nzdcad == 0)
                    <button type="button" class="btn btn-danger" id="nzdcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdcad }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="nzdcad" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdcad }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->nzdchf == 0)
                    <button type="button" class="btn btn-danger" id="nzdchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="nzdchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->nzdjpy == 0)
                    <button type="button" class="btn btn-danger" id="nzdjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="nzdjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->nzdjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->cadchf == 0)
                    <button type="button" class="btn btn-danger" id="cadchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->cadchf }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="cadchf" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->cadchf }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->cadjpy == 0)
                    <button type="button" class="btn btn-danger" id="cadjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->cadjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="cadjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->cadjpy }} </button>
                    @endif
                </td>
                <td>
                    @if ($robots_status[0]->chfjpy == 0)
                    <button type="button" class="btn btn-danger" id="chfjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->chfjpy }} </button>
                    @else
                    <button type="button" class="btn btn-success" id="chfjpy" data-id="{{$robots_status[0]->id}}">{{ $robots_status[0]->chfjpy }} </button>
                    @endif
                </td>

                
                </tr>


         

        </tbody>
    </table>
