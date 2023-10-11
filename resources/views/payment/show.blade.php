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
    Fundamentales
@endsection

@section('content')
    <div class="pagetitle">
        <h1>PAYMENT</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Payment</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="container">
            <h1>Formulario de Pago</h1>
            <form method="post" action="{{ route('procesar-pago') }}">
                @csrf
                <div class="form-group">
                    <label for="amount">Cantidad a Cobrar:</label>
                    <input type="text" id="amount" name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Descripción del Pago:</label>
                    <input type="text" id="description" name="description" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Procesar Pago</button>
            </form>
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
@endsection
