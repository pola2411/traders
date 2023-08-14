@extends('index')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    Data Gráfica Puntos Portafolios
@endsection

@section('content')
    <div class="pagetitle">
        <h1> Data Gráfica Puntos Portafolios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active"> Data Gráfica Puntos Portafolios</li>
            </ol>
        </nav>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    <a class="btn principal-button mb-3 new me-1" data-bs-toggle="modal" data-bs-target="#formModal"> <i
                        class="bi-plus-lg me-1"> </i>Agregar Datos a Portafolio
                    </a>
                    <div class="card-body mt-3">

                        <table class="table table-striped table-bordered nowrap text-center"
                            style="width: 100%; vertical-align: middle !important" id="portafolioDots">
                            <thead>
                                <tr>
                                    <th data-priority="0" scope="col">Valor</th>
                                    <th data-priority="0" scope="col">Rendimiento</th>
                                    <th data-priority="0" scope="col">Tiempo</th>
                                    <th data-priority="0" scope="col">Portafolio</th>
                                    <th data-priority="0" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle !important">

                            </tbody>
                        </table>



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
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('/js/portafolio.js') }}"></script>
@endsection
