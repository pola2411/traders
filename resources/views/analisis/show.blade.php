@extends('index')

@section('title', "Analisis de portafolios")

@section('css')
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1>Analisis de portafolios</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                    <li class="breadcrumb-item">Analisis de portafolios</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table table-striped table-bordered nowrap" id="analisisPortafolios">
                            <thead class="text-center">
                                <tr>
                                    <th data-priority="0" scope="col">Portafolio</th>
                                    <th data-priority="0" scope="col">Riesgo</th>
                                    <th data-priority="0" scope="col">Beneficio</th>
                                    <th data-priority="0" scope="col">Ratio</th>
                                    <th data-priority="0" scope="col">Margen</th>
                                    <th data-priority="0" scope="col">Swap</th>
                                    <th data-priority="0" scope="col">Riesgo apertura</th>
                                    <th data-priority="0" scope="col">Fichas</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align: middle">
                                @foreach ($analisis as $anali)
                                    <tr>
                                        <td>{{$anali->portfolio}}</td>
                                        <td>{{$anali->asset}}</td>
                                        <td>{{$anali->profit}}</td>
                                        <td>{{$anali->risk}}</td>
                                        <td>{{$anali->lotaje}}</td>
                                        <td>{{$anali->swap}}</td>
                                        <td>{{$anali->margin}}</td>
                                        <td>{{$anali->max_last}}</td>
                                    </tr>
                                @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/analisisportafolios.js') }}"></script>
@endsection