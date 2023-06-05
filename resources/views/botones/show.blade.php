@extends('index')

@section('title', 'Botones')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Botones</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Vista general</a></li>
                <li class="breadcrumb-item active">Botones</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-12 text-center">
                                <button id="boton1" class="btn btn-success m-2">Botón 1</button>
                                <button id="boton2" class="btn btn-success m-2">Botón 2</button>
                                <button id="boton3" class="btn btn-success m-2">Botón 3</button>
                                <button id="boton4" class="btn btn-success m-2">Botón 4</button>
                                <button id="boton5" class="btn btn-success m-2">Botón 5</button>
                                <button id="boton6" class="btn btn-success m-2">Botón 6</button>
                                <button id="boton7" class="btn btn-success m-2">Botón 7</button>
                                <button id="boton8" class="btn btn-success m-2">Botón 8</button>
                            </div>
                            <div class="col-md-10 col-12 text-center">
                                <button id="boton9" class="btn btn-success m-2">Botón 9</button>
                                <button id="boton10" class="btn btn-success m-2">Botón 10</button>
                                <button id="boton11" class="btn btn-success m-2">Botón 11</button>
                                <button id="boton12" class="btn btn-success m-2">Botón 12</button>
                                <button id="boton13" class="btn btn-success m-2">Botón 13</button>
                                <button id="boton14" class="btn btn-success m-2">Botón 14</button>
                                <button id="boton15" class="btn btn-success m-2">Botón 15</button>
                                <button id="boton16" class="btn btn-success m-2">Botón 16</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('js/botones.js') }}"></script>
@endsection