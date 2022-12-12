@extends('index')

@section('css')
<script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
        max-width: 100%
    }
</style>
@endsection

@section('title')
Gráfica Margen
@endsection

@section('content')
    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1>Gráfica Margen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                    <li class="breadcrumb-item">Gráfica Margen</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    <div class="card-body" style="padding-top: 20px;">
                        <div class="row d-flex align-items-center">
                            <div class="pagetitle d-flex justify-content-between align-items-center">
                                <h1 id="numeroTrader"></h1>
                            </div>
                            <hr class="m-0 p-0 mb-2">
                            <div class="col-12">
                                <div id="chartdiv"></div>
                            </div>
                        </div>
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
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="{{ asset('js/margen.js') }}"></script>
@endsection