@extends('index')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="col-12 text-center mb-1">
            {{-- @php
                $statusGral = DB::table('monitor')
                    ->select('statusGral')
                    ->first();
            @endphp
            @if ($statusGral->statusGral == 1)
            <button type="button" class="btn btn-dark" id="statusGral" ><i class="bi bi-unlock"></i> Estatus General</button>
            @else
            <button type="button" class="btn btn-dark" id="statusGral"><i class="bi bi-lock"></i> Estatus General</button>
            @endif --}}
            <button type="button" class="btn btn-dark" id="statusGralDashboard"> Estatus General</button>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3" style=" overflow-x: auto;">
                        <table class="table table-striped table-bordered nowrap text-center"
                            style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                            id="dashboard_type">
                            <thead style="vertical-align: middle !important;">
                                <tr>
                                    <th data-priority="0" scope="col">Tiempo</th>
                                    <th data-priority="0" scope="col">Tipo</th>
                                    <th data-priority="0" scope="col">Estatus</th>
                                    <th data-priority="0" scope="col">Acción</th>
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
    <script src="{{ asset('/js/dashboard_type.js') }}"></script>
@endsection
