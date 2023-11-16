@extends('index')

@section('css')
    <style>
        #indexUSD {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('title')
    Link de Pago
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Link de Pago</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Link de Pago</li>
            </ol>
        </nav>
    </div>



    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="email" name="correo" id="correo" class="form-control" required>
                                    <label for="correo">Correo</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="text" name="subject" id="subject" class="form-control" required>
                                    <label for="subject">Asunto</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="text" name="link" id="link" class="form-control" required>
                                    <label for="link">Link de Pago</label>
                                </div>
                            </div>
                            @php
                                
                            @endphp
                            <div class="col-md-3 col-12">
                                <button type="submit" class="btn btn-primary" id="send-email">Enviar Correo</button>
                            </div>
                        </div>
                        <div id="contTable" style="overflow-x: auto;"></div>
                        <!--<div class="col-12 mt-5">-->
                        <!--    <div id="chartdiv"></div>-->
                        <!--</div>-->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js/payment.js') }}"></script>
@endsection
