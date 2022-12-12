@extends('index')

@section('title') Perfil @endsection

@section('content')
    <div class="pagetitle">
        <h1>Mi cuenta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Mi cuenta</li>
            </ol>
        </nav>
    </div>

    <?php $foto = auth()->user()->foto_perfil;  ?>

    <section class="section">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="card pt-4">
                    <div class="card-body text-center">
                        <img src="{{ asset("img/usuarios/$foto") }}" alt="avatar" id="imgPerfil" class="img-fluid imgPerfil">
                        <h5 class="mt-3"><span id="perfilNombreCard">{{ auth()->user()->nombre }}</span> <span id="perfilApellidopCard">{{ auth()->user()->apellido_p }}</span></h5>
                        <p class="text-muted mb-4">{{ auth()->user()->correo }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="" data-id="{{ auth()->user()->id }}" type="button" class="btn btn-success editar" title="Editar perfil"><i class="bi bi-pencil"></i> Editar perfil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="card pt-4" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Nombre completo</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="ml-0 text-muted mb-0" id="perfilNombre">{{ auth()->user()->nombre }}</p>
                            </div>
                        </div>
                        <hr style="margin-left: 0">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Privilegio</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0" id="perfilPrivilegio">administrador</p>
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
<script src="{{ asset('/js/perfil.js') }}"></script>
@endsection