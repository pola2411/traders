@extends('index')

@section('css')

@endsection

@section('title', 'Ejemplo')

@section('content')
    <div class="pagetitle">
        <h1>Ejemplo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Ejemplo</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="col-md-3 col-12 text-center mt-3">
                        <button class="btn btn-dark" id="modificarButton">
                            Botón Ejemplo
                        </button>
                    </div>

                    <div class="card-body mt-3">
                        <table class="table table-striped table-bordered nowrap text-center"
                            style="width: 100%; vertical-align: middle !important" id="dataTable">
                            <thead>
                                <tr>
                                    <th data-priority="0" scope="col">ID</th>
                                    <th data-priority="0" scope="col">Nombre</th>
                                    <th data-priority="0" scope="col">Redacción</th>
                                    <th data-priority="0" scope="col">Botón</th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle !important">
                                    
                            </tbody>
                        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js/data.js') }}"></script>
@endsection
