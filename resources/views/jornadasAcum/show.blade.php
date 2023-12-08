@extends('index')

@section('title')
    Gráfica Balance/Equity
@endsection

@section('css')
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
    <style>
        #chartContainer {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1>Gráfica Jornadas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                    <li class="breadcrumb-item">Gráfica Jornadas</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    <div class="card-body" style="padding-top: 20px;">
                        <div class="row">
                            <div class="pagetitle d-flex justify-content-between align-items-center">
                                <h1 id="numeroTrader"></h1>
                            </div>
                            <hr class="m-0 p-0 mb-2">
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaDesdeInput" required>
                                    <label for="fechaDesdeInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaHastaInput" required>
                                    <label for="fechaHastaInput">Hasta:</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary mb-3" id="resetRegistros">Resetear información</button>
                            </div>
                            <div class="col-md-3 col-12">
                                {{-- Select que trae datos de la base de datos para filtrar --}}
                                @php
                                    $jornadaSesion = DB::table('operaciones_traders')
                                        ->select('session')
                                        ->where('session', '!=', '')
                                        ->distinct()
                                        ->orderBy('session', 'asc')
                                        ->get();
                                @endphp
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" id="sessionSelect"
                                        aria-label="Floating label select example">
                                        <option value="0">Todas las sesiones</option>
                                        @foreach ($jornadaSesion as $item)
                                            <option value="{{ $item->session }}">{{ $item->session }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sessionSelect">Filtrar por sesión</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                @php
                                    $jornadaPortafolio = DB::table('operaciones_traders')
                                        ->select('portfolio')
                                        ->where('portfolio', '!=', '')
                                        ->distinct()
                                        ->orderBy('portfolio', 'asc')
                                        ->get();
                                @endphp
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" id="portfolioSelect"
                                        aria-label="Floating label select example">
                                        <option value="0">Todas las sesiones</option>
                                        @foreach ($jornadaPortafolio as $item)
                                            <option value="{{ $item->portfolio }}">{{ $item->portfolio }}</option>
                                        @endforeach
                                    </select>
                                    <label for="portfolioSelect">Filtrar por portafolio</label>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                @php
                                    $jornadaMoneda = DB::table('operaciones_traders')
                                        ->select('symbol')
                                        ->where('symbol', '!=', '')
                                        ->distinct()
                                        ->orderBy('symbol', 'asc')
                                        ->get();
                                @endphp
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" id="symbolSelect"
                                        aria-label="Floating label select example">
                                        <option value="0">Todas las monedas</option>
                                        @foreach ($jornadaMoneda as $item)
                                            <option value="{{ $item->symbol }}">{{ $item->symbol }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sessionSelect">Filtrar por monedas</label>
                                </div>

                            </div>

                            <div class="row justify-content-ceter mt-2 mb-4 text-center">
                                {{-- <div class="col-md-12 col-12 mt-2"><button class="btn btn-dark" id="mostrarTodo">Mostrar todo</button></div> --}}
                            </div>
                            <div id="chartContainer"></div>
                        </div>
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
        {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}
        <script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="{{ asset('js/jornadas2.js') }}"></script>
@endsection
