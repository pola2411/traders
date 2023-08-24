@extends('index')

@section('title', "Análisis de portafolios")

@section('css')
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1>Análisis de portafolios</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                    <li class="breadcrumb-item">Análisis de portafolios</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-12 mb-3">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="analisisValue">
                                        @php
                                            $analisis_portafolios = DB::table('analisis_portafolios')->select('value')->distinct('value')->get();
                                        @endphp
                                            <option disabled selected>Selecciona...</option>
                                        @foreach ($analisis_portafolios as $data)
                                            <option value="{{ $data->value }}">{{ $data->value }}</option>
                                        @endforeach
                                    </select>
                                    <label for="analisisValue">Selecciona un value</label>
                                </div>
                            </div>
                        </div>
                        <div id="contTabla"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover" style="border-collapse: separate !important; border-spacing: 0;">
                        <thead class="text-center">
                            <tr>
                                <th data-priority="0" scope="col">Activo</th>
                                <th data-priority="0" scope="col">Pair</th>
                                <th data-priority="0" scope="col">Buy/Sell</th>
                                <th data-priority="0" scope="col">Lotaje</th>
                                <th data-priority="0" scope="col">Swap</th>
                                <th data-priority="0" scope="col">Risk</th>
                                <th data-priority="0" scope="col">Profit</th>
                                <th data-priority="0" scope="col">Margin</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" style="vertical-align: middle" id="tbody"></tbody>
                    </table>

                    <div class="row justify-content-center mt-4 text-center">
                        <div class="col-md-4 col-12 text-center">
                            <b>Máximo nivel últimos 20 días: </b><span id="maximo"></span>
                        </div>
                        <div class="col-md-4 col-12 text-center">
                            <b>Mínimo nivel últimos 20 días: </b><span id="minimo"></span>
                        </div>
                        <div class="col-md-4 col-12 text-center">
                            <b>Diferencia: </b><span id="diferencia"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCancel" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/analisisportafolios.js') }}"></script>
@endsection