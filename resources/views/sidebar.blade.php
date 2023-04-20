@php
    $traders = DB::table("traders")->where("activado", "activado")->orderBy("id", "DESC")->get();        
    $traders_data = DB::table('traders_data')->get();
    $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");
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

        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/operacion')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/operacion') }}">
                <i class="bi bi-arrow-repeat"></i>
                <span>Operaciones</span>
            </a>
        </li> --}}
        
        <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes') }}">
                <i class="bi bi-boxes"></i>
                <span>Boxes</span>
            </a>
        </li>
        
        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes2')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes2') }}">
                <i class="bi bi-box-seam"></i>
                <span>Boxes 2</span>
            </a>
        </li> --}}
        
        <li class="nav-item">
            <a class="@if (request()->is('/admin/indexUSD')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/indexUSD') }}">
                <i class="bi bi-currency-exchange"></i>
                <span>Index USD</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/indexUSDCADCHF')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/indexUSDCADCHF') }}">
                <i class="bi bi-currency-exchange"></i>
                <span>Index USDCADCHF</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/desbalanceo')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/desbalanceo') }}">
                <i class="bi bi-activity"></i>
                <span>Desbalanceo de cuentas</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="@if (request()->is('/admin/traders')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/traders') }}">
                <i class="bi bi-person-workspace"></i>
                <span>Traders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data Apertura</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tradersdata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders_data as $trader)
                    @if(strlen($trader->Signal) > 0)
                        <li>
                            <a class="ps-2" href="/admin/traders-data-apertura/{{$trader->id}}">
                                <i class="bi bi-circle"></i><span>Trader {{ $trader->id }} ({{$trader->Signal}})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data Cierre</span><i class="bi bi-chevron-down ms-auto"></i>
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
                <i class="bi bi-graph-up"></i><span>Margen/Margen Libre</span><i class="bi bi-chevron-down ms-auto"></i>
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
            <a class="nav-link collapsed" data-bs-target="#status-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-kanban"></i><span>Status</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="status-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/status/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/status/99998">
                        <i class="bi bi-circle"></i><span>POOL</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#profit-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-arrow-up-square"></i><span>Profit</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profit-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/grafica-profit/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/grafica-profit/99998">
                        <i class="bi bi-circle"></i><span>POOL</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#lote-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bounding-box"></i><span>Lote</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="lote-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/grafica-lote/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/grafica-lote/99998">
                        <i class="bi bi-circle"></i><span>POOL</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/grafica-suma-lote')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/grafica-suma-lote') }}">
                <i class="bi bi-file-plus"></i>
                <span>Suma lote</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/grafica-equity')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/grafica-equity') }}">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span>Gráfica equity</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cleo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-discord"></i><span>Cleo Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cleo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($valores_moneda as $moneda)
                    <li>
                        <a class="ps-2" href="/admin/cleo-data/{{$moneda}}">
                            <i class="bi bi-circle"></i><span>{{$moneda}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/cleoTabla')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/cleoTabla') }}">
                <i class="bi bi-discord"></i>
                <span>Cleo tabla</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ejemplo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-body-text"></i></i><span>Ejemplos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ejemplo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/ejemplo">
                        <i class="bi bi-circle"></i><span>Ejemplo</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/ejemplo1">
                        <i class="bi bi-circle"></i><span>Ejemplo 1</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/ejemplo3">
                        <i class="bi bi-circle"></i><span>Ejemplo 3</span>
                    </a>
                </li>
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
        
        {{-- <li class="nav-item">
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
        </li> --}}

        <li class="nav-item">
            <a class="@if (request()->is('/admin/logs')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/logs') }}">
                <i class="bi bi-book-half"></i>
                <span>Logs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>