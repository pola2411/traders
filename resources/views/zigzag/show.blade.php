@php

    $par = strtoupper($par);
    $soporte_resistencia = $zigzag->soporte_resistencia;
@endphp

@extends('index')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <style>
        .imagenes_zigzag {
            height: 100% !important;
        }
    </style>
@endsection

@section('title', "Analysis ($par)")

@section('content')
    <div class="pagetitle">
        <h1>Analysis ({{$par}})</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Analysis ({{$par}})</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-6 col-12 text-center imagenes_zigzag mt-2 mb-2">
                                <h5 class="mb-3">Soporte y resistencia</h5>
                                <img src="{{$soporte_resistencia}}" alt="{{$par}}" width="100%" height="100%">
                            </div>
                        </div>

                        <div id="datosLive"></div>
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
    <script src="{{ asset('js/zigzag.js') }}"></script>
@endsection