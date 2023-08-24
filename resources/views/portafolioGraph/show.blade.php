@extends('index')

@section('css')
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
            max-width: 100%
        }
    </style>
@endsection

@section('title')
    Gráfica Portafolios
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Gráfica Portafolios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Gráfica Portafolios</li>
            </ol>
        </nav>
    </div>


    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card pb-0">
                    <div class="card-body" style="padding-top: 20px;">

                        <div class="row d-flex align-items-center">

                            <div class="col-md-2 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="portafolioGraph">
                                        @php
                                            $chartData = DB::table('portafolios')
                                                ->select('value')
                                                ->distinct()
                                                ->get();
                                        @endphp
                                        @foreach ($chartData as $data)
                                            <option value="{{ $data->value }}">{{ $data->value }}</option>
                                        @endforeach
                                    </select>
                                    <label for="portafolioGraph">Portafolio</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                        </div>


                        <div class="card-group text-center justify-content-around" id="card-data">
                            <div class="card border-primary mb-3" style="max-width: 10rem;">
                                <div class="card-header text-danger">Riesgo</div>
                                <div class="card-body ">

                                    <p class="card-text risk"></p>

                                </div>
                            </div>
                            <div class="card border-secondary mb-3" style="max-width: 10rem;">
                                <div class="card-header text-success">Beneficio</div>
                                <div class="card-body ">

                                    <p class="card-text profit"></p>
                                </div>
                            </div>
                            <div class="card border-success mb-3" style="max-width: 10rem;">
                                <div class="card-header text-warning">Ratio</div>
                                <div class="card-body ">

                                    <p class="card-text ratio"></p>
                                </div>
                            </div>
                            <div class="card border-danger mb-3" style="max-width: 10rem;">
                                <div class="card-header text-primary">Margen</div>
                                <div class="card-body ">

                                    <p class="card-text margin"></p>
                                </div>
                            </div>
                            <div class="card border-danger mb-3" style="max-width: 10rem;">
                                <div class="card-header text-info">Status</div>
                                <div class="card-body ">

                                    <p class="card-text status"></p>
                                </div>
                            </div>
                        </div>

                        <div id="chartdiv"></div>

                        <div class="card-group text-center justify-content-around mt-5" id="card-money">
                            <div class="card border-primary mb-3" style="max-width: 10rem;">
                                <div class="card-header text-secondary">$ Beneficio Buscado</div>
                                <div class="card-body ">

                                    <p class="card-text profit_wanted"></p>
                                </div>
                            </div>
                            <div class="card border-secondary mb-3" style="max-width: 10rem;">
                                <div class="card-header text-secondary">$ Capitalizado al momento</div>
                                <div class="card-body ">

                                    <p class="card-text capitalized_moment"></p>
                                </div>
                            </div>
                            <div class="card border-success mb-3" style="max-width: 10rem;">
                                <div class="card-header text-secondary ">$ Capitalización total</div>
                                <div class="card-body capitalized_total">

                                    <p class="card-text"></p>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="{{ asset('js/portafolioGraph.js') }}"></script>
@endsection
