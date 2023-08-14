@extends('index')

@section('css')
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .ui-tabs-anchor {
            outline: none;
        }
    </style>
@endsection

@section('title')
    Gráfica Puntos Portafolios
@endsection

@section('content')
    <div class="pagetitle">
        <h1> Gráfica Puntos Portafolios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active"> Gráfica Puntos Portafolios</li>
            </ol>
        </nav>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    {{-- <a class="btn principal-button mb-3 new me-1" data-bs-toggle="modal" data-bs-target="#formModal"> <i
                        class="bi-plus-lg me-1"> </i>Agregar Datos a Portafolio
                    </a> --}}
                    <div class="card-body" style="padding-top: 20px;">
                        <div class="row d-flex align-items-center">
                            {{-- <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaDesdeInput" required>
                                    <label for="fechaDesdeInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaHastaInput" required>
                                    <label for="fechaHastaInput">Hasta:</label>
                                </div>
                            </div> --}}
                            
                            <div class="col-md-2 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="portafolio">
                                        @php
                                            $pares = DB::table('grafica_portafolios')
                                                ->select('portafolio')
                                                ->distinct()
                                                ->get();
                                            foreach ($pares as $par) {
                                                echo '<option value="' . $par->portafolio . '">' . $par->portafolio . '</option>';
                                            }
                                            
                                        @endphp
                                    
                                    </select>
                                    <label for="portafolio">Portafolio</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                    
                        </div>
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Agregar puntos a gráfica de portafolios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="portafolioGraphForm" method="post">
                        @csrf
                        <input type="hidden" name="id" id="idInput">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Ingresa el nombre del cliente"
                                        id="valor" name="valor" required>
                                    <label for="valor">Valor</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Ingresa el correo del cliente"
                                        id="rendimiento" name="rendimiento" required>
                                    <label for="rendimiento">Rendimiento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" placeholder="Ingresa el teléfono del cliente"
                                        id="portafolio" name="portafolio" required>
                                    <label for="portafolio">Portafolio</label>
                                </div>
                            </div>
                        </div>
                        <div id="alertMessage"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCancel"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn principal-button" id="btnSubmit">Enviar solicitud</button>
                        </div>
                    </form>
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
    {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/portafolio.js') }}"></script>
@endsection
