@php
    $traders = DB::table("traders")
        ->where("id", 2)
        ->orWhere("id", 4)
        ->orWhere("id", 5)
        ->orWhere("id", 9)
        ->orWhere("id", 22)
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))->get();
        
    $traders_data = DB::table('traders_data')->get();
@endphp        

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/admin/dashboard') }}" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Trader Software Up trading</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn menu-pc" id="btntog"></i>
        <a class="navbar-toggler buttonNav" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <i class="bi bi-list toggle-sidebar-btn menu-cel" id="btntog"></i>
        </a>
    </div>


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <?php $foto = auth()->user()->foto_perfil;  ?>

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset("img/usuarios/$foto") }}" id="imgPerfilNav" alt="Foto de perfil"
                        class="rounded-circle profilephoto2">
                    <span id="nombreSide" class="d-none d-md-block dropdown-toggle ps-2">
                        {{ auth()->user()->nombre }} 
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>
                            {{ auth()->user()->nombre }}
                        </h6>
                        <span>
                            Usuario administrador
                        </span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin/logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>

<div class="sidebar-nav sidebar offcanvas offcanvas-start activee" tabindex="-1" id="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Menú</li>

        <li class="nav-item">
            <a class="@if (request()->is('admin/perfil')) nav-link @else nav-link collapsed @endif" href="{{ URL::to('admin/perfil') }}">
                <i class="bi bi-person"></i>
                <span>Mi cuenta</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="@if (request()->is('/admin/dashboard')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Panel de control</span>
            </a>
        </li>        

        <li class="nav-item">
            <a class="@if (request()->is('/admin/operacion')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/operacion') }}">
                <i class="bi bi-arrow-repeat"></i>
                <span>Operaciones</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes') }}">
                <i class="bi bi-boxes"></i>
                <span>Boxes</span>
            </a>
        </li>
        {{--
        <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes2')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes2') }}">
                <i class="bi bi-box-seam"></i>
                <span>Boxes 2</span>
            </a>
        </li>
        --}}
        <li class="nav-item">
            <a class="@if (request()->is('/admin/indexUSD')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/indexUSD') }}">
                <i class="bi bi-currency-exchange"></i>
                <span>Index USD</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/desbalanceo')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/desbalanceo') }}">
                <i class="bi bi-activity"></i>
                <span>Desbalanceo de cuentas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/traders')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/traders') }}">
                <i class="bi bi-person-workspace"></i>
                <span>Traders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tradersdata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders_data as $trader)
                    @if(strlen($trader->Signal) > 0)
                        <li>
                            <a class="ps-2" href="/admin/traders-data/{{$trader->id}}">
                                <i class="bi bi-circle"></i><span>Trader {{ $trader->id }} ({{$trader->Signal}})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#momento-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clock"></i><span>Momento</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="momento-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders_data as $trader)
                    @if(strlen($trader->Signal) > 0)
                        <li>
                            <a class="ps-2" href="/admin/momento/{{$trader->id}}">
                                <i class="bi bi-circle"></i><span>Trader {{ $trader->id }} ({{$trader->Signal}})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#equitybalance-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-line"></i><span>Equity/Balance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="equitybalance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders as $trader)
                <li>
                    <a class="ps-2" href="/admin/equityBalance/{{$trader->id}}">
                        <i class="bi bi-circle"></i><span>{{$trader->nombre}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>        

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#margen-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up"></i><span>Margen</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="margen-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders as $trader)
                <li>
                    <a class="ps-2" href="/admin/margen/{{$trader->id}}">
                        <i class="bi bi-circle"></i><span>{{$trader->nombre}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#traderReport-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-earmark-bar-graph"></i><span>Trader report</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="traderReport-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders as $trader)
                <li>
                    <a class="ps-2" href="/admin/traderReport/{{$trader->id}}">
                        <i class="bi bi-circle"></i><span>{{$trader->nombre}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        {{--
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#monitoreo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tv"></i><span>Monitoreo</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="monitoreo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/datamonitor/">
                        <i class="bi bi-circle"></i><span>Data Monitor</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/monitor/">
                        <i class="bi bi-circle"></i><span>Monitoreo de datos</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/formulario/">
                        <i class="bi bi-circle"></i><span>Formulario de datos</span>
                    </a>
                </li>
            </ul>
        </li>--}}


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>


    </ul>
</div>