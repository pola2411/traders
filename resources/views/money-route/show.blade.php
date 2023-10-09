@extends('index')

@section('css')
    <style>
        #chartdiv {
            width: 90%;
            height: 950px;
        }

        .diferencia-texto {
            font-size: 14px;
            color: grey;
            font-weight: 550;
            text-align: right;
            align-items: flex-end;
            margin-top: 2rem;
        }
    </style>
@endsection

@section('title')
    Money Route
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Money Route</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Money Route</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="pagetitle text-center">
                            <h5>Últimos Valores Recibidos de Monedas</h1>
                        </div>

                        @php
                            $last_general = DB::table('money_route')
                                ->limit(1)
                                ->orderBy('id', 'desc')
                                ->first();
                        @endphp


                        @php
                            $lastDate = Carbon\Carbon::createFromDate($last_general->hora);
                            $now = Carbon\Carbon::now();
                            $diff = $lastDate->diffInMinutes($now);
                        @endphp

                        <div id="actualizacion-contenedor">

                            <div class="trader mb-0">
                                <div class="title-trader d-flex justify-content-between align-items-center">
                                    <div>
                                        @if ($diff > 0)
                                            <span class="badge bg-danger">ALERTA: El último dato recibido fue
                                                hace más de 1 minuto</span>
                                        @endif
                                    </div>
                                    <div class="mt-1">
                                        <h5 id="textoAct">


                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="chartdiv"></div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('preloader')
    <div id="loader" class="loader">
        <h1></h1>
        <span></span>
        <span></span>
        <span></span>
    </div>
@endsection

@section('footer')
    <footer id="footer" class="footer">
        <div class="copyright" id="copyright">
        </div>
        <div class="credits">
            Todos los derechos reservados
        </div>
    </footer>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="{{ asset('/js/moneyRoute.js') }}"></script>
@endsection
