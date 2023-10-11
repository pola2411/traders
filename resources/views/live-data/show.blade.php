@extends('index')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

    <style>
        #live-data td,
        #live-data th {
            width: auto !important;
            white-space: normal !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
        }
    </style>
@endsection

@section('title')
    Live Data
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Live Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Live Data</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row">

                            <div class="text-center" id="prueba">

                            </div>
                            

                            {{-- <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaInicioInput" required>
                                    <label for="fechaInicioInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaFinInput" required>
                                    <label for="fechaFinInput">Hasta:</label>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="cuentaInput">
                                        <option value="0">Todas</option>
                                        @php
                                            $cuentas = DB::table('logs')->select('cuenta')->groupBy('cuenta')->distinct('cuenta')->get();
                                        
                                            foreach ($cuentas as $cuenta) {
                                                echo '<option value="' . $cuenta->cuenta . '">' . $cuenta->cuenta . '</option>';
                                            }
                                        @endphp
                                    </select>
                                    <label for="cuentaInput">No. de cuenta:</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="mt-4" style=" overflow-x: auto;">
                            <table class="table table-striped table-bordered nowrap text-center"
                                style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                id="live-data">
                                <thead style="vertical-align: middle !important;">
                                    <tr>
                                        {{-- <th data-priority="0" scope="col">Time</th> --}}
                                        <th data-priority="0" scope="col">Status Buy</th>
                                        <th data-priority="0" scope="col">Pair</th>
                                        <th data-priority="0" scope="col">Spectrum</th>
                                        <th data-priority="0" scope="col">Condition Buy</th>
                                        <th data-priority="0" scope="col">Strategy Buy</th>
                                        <th data-priority="0" scope="col">Action Buy</th>
                                        <th data-priority="0" scope="col">Operations Buy</th>
                                        <th data-priority="0" scope="col">Checksite Buy</th>
                                        <th data-priority="0" scope="col">SL Buy</th>
                                        <th data-priority="0" scope="col">TP Buy</th>
                                        <th data-priority="0" scope="col">SL Buy Price</th>
                                        <th data-priority="0" scope="col">TP Buy Price</th>
                                        <th data-priority="0" scope="col">Condition Sell</th>
                                        <th data-priority="0" scope="col">Strategy Sell</th>
                                        <th data-priority="0" scope="col">Action Sell</th>
                                        <th data-priority="0" scope="col">Operations Sell</th>
                                        <th data-priority="0" scope="col">Checksite Sell</th>
                                        <th data-priority="0" scope="col">SL Sell</th>
                                        <th data-priority="0" scope="col">TP Sell</th>
                                        <th data-priority="0" scope="col">SL Sell Price</th>
                                        <th data-priority="0" scope="col">TP Sell Price</th>
                                        <th data-priority="0" scope="col">Status Sell</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js/live-data.js') }}"></script>
@endsection
