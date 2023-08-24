@php
    $traders = DB::table('traders')
        ->where('activado', 'activado')
        ->orderBy('id', 'DESC')
        ->get();
    $traders_data = DB::table('traders_data')->get();
    $valores_moneda = ['EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY'];
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

                <?php $foto = auth()->user()->foto_perfil; ?>

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
            <a class="@if (request()->is('admin/perfil')) nav-link @else nav-link collapsed @endif"
                href="{{ URL::to('admin/perfil') }}">
                <i class="bi bi-person"></i>
                <span>Mi cuenta</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/traders')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/traders') }}">
                <i class="bi bi-person-workspace"></i>
                <span>Panel de control</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="@if (request()->is('/admin/dashboard')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Saldos</span>
            </a>
        </li>

        <li>
            <a class="@if (request()->is('/admin/portafoliosActivos')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafoliosActivos') }}">
                <i class="bi bi-wallet2"></i>
                <span>Portafolios Activos</span>
            </a>
        </li>

        <li>
            <a class="@if (request()->is('/admin/portafolioGraph')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafolioGraph') }}">
               <i class="bi bi-distribute-horizontal"></i>
                <span>Gráfica Portafolios</span>
            </a>
        </li>

        <li>
            <a class="@if (request()->is('/admin/analisis-portafolios')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/analisis-portafolios') }}">
                <i class="bi bi-file-text"></i>
                <span>Análisis de portafolios</span>
            </a>
        </li>
        
        
        <li class="nav-item">
            <a class="@if (request()->is('/admin/fundamentales')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/fundamentales') }}">
                <i class="bi bi-graph-up"></i>
                <span>Fundamentales</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#equitybalance-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-line"></i><span>Equity/Balance</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="equitybalance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders as $trader)
                    <li>
                        <a class="ps-2" href="/admin/equityBalance/{{ $trader->id }}">
                            <i class="bi bi-circle"></i><span>{{ $trader->nombre }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        
        

        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#live_sidebar" data-bs-toggle="collapse" href="#">
                <i class="bi bi-camera-video"></i><span>Transmisión</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="live_sidebar" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="@if (request()->is('/admin/transmision')) nav-link @else nav-link collapsed @endif"
                        href="{{ url('/admin/transmision') }}">
                        <i class="bi bi-circle"></i>
                        <span>Agregar transmisión</span>
                    </a>
                </li>
                <li>
                    <a class="@if (request()->is('/admin/transmisionLive')) nav-link @else nav-link collapsed @endif"
                        href="{{ url('/admin/transmisionLive') }}">
                        <i class="bi bi-circle"></i>
                        <span>Visualizar transmisión</span>
                    </a>
                </li>
            </ul>


        </li>

        {{-- <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#puntosGraph" data-bs-toggle="collapse" href="#">
                <i class="bi bi-camera-video"></i><span>Gráfica Puntos Portafolios</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="puntosGraph" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="@if (request()->is('/admin/getPortafolioTable')) nav-link @else nav-link collapsed @endif"
                        href="{{ url('/admin/getPortafolioTable') }}">
                        <i class="bi bi-circle"></i>
                        <span>Agregar puntos</span>
                    </a>
                </li>
                <li>
                    <a class="@if (request()->is('/admin/portafolio')) nav-link @else nav-link collapsed @endif"
                        href="{{ url('/admin/portafolio') }}">
                        <i class="bi bi-circle"></i>
                        <span>Visualizar gráfica</span>
                    </a>
                </li>
            </ul>


        </li> --}}

        <li>
            <a class="@if (request()->is('/admin/portafolio')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafolio') }}">
                <i class="bi bi-bezier2"></i>
                <span>Gráfica puntos portafolio</span>
            </a>
        </li>


        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/operacion')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/operacion') }}">
                <i class="bi bi-arrow-repeat"></i>
                <span>Operaciones</span>
            </a>
        </li> --}}

        {{--
        <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes') }}">
                <i class="bi bi-boxes"></i>
                <span>Boxes</span>
            </a>
        </li>
        --}}


        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/boxes2')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/boxes2') }}">
                <i class="bi bi-box-seam"></i>
                <span>Boxes 2</span>
            </a>
        </li> --}}

      

         

             
        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#botones" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-steps"></i><span>Matriz</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="botones" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a class="@if (request()->is('/admin/botones')) nav-link @else nav-link collapsed @endif"
                    href="{{ url('/admin/botones') }}">
                    <i class="bi bi-circle"></i>
                    <span>Equity</span>
                </a>
          
            </li>
            </ul>

          
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/indexUSDCADCHF')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/indexUSDCADCHF') }}">
                <i class="bi bi-currency-exchange"></i>
                <span>Index USD</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/indexUSD')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/indexUSD') }}">
            <i class="bi bi-cone-striped"></i>
                <span>Index USD BETA</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="@if (request()->is('/admin/autorizacion')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/autorizacion') }}">
                <i class="bi bi-shield-lock"></i>
                <span>Autorización S8A</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="@if (request()->is('/admin/desbalanceo')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/desbalanceo') }}">
                <i class="bi bi-activity"></i>
                <span>Desbalanceo de cuentas</span>
            </a>
        </li> --}}



      
        {{-- }}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data Apertura</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tradersdata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders_data as $trader)
                    @if (strlen($trader->Signal) > 0)
                        <li>
                            <a class="ps-2" href="/admin/traders-data-apertura/{{$trader->id}}">
                                <i class="bi bi-circle"></i><span>Trader {{ $trader->id }} ({{$trader->Signal}})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
        --}}


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tradersdata-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-table"></i><span>Traders Data Cierre</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tradersdata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($traders_data as $trader)
                    @if (strlen($trader->Signal) > 0)
                        <li>
                            <a class="ps-2" href="/admin/traders-data/{{ $trader->id }}">
                                <i class="bi bi-circle"></i><span>Trader {{ $trader->id }}
                                    ({{ $trader->Signal }})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>


   

        <li class="nav-item">
            <a class="@if (request()->is('/admin/market')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/market') }}">
                <i class="bi bi-graph-down"></i>
                <span>Gráfica Market</span>
            </a>
        </li>  
             
    

     

        {{--
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
        --}}


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
                <li>
                    <a class="ps-2" href="/admin/status/99997">
                        <i class="bi bi-circle"></i><span>POOL II</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#status-magic-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-magic"></i><span>Magic Number</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="status-magic-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/statusMagic/99999">
                        <i class="bi bi-circle"></i><span>MAM</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/statusMagic/99998">
                        <i class="bi bi-circle"></i><span>POOL I</span>
                    </a>
                </li>

                <li>
                    <a class="ps-2" href="/admin/statusMagic/99997">
                        <i class="bi bi-circle"></i><span>POOL II</span>
                    </a>
                </li>
            </ul>
        </li>


        {{--
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
        --}}

        {{--
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
        --}}

        {{--
        <li class="nav-item">
            <a class="@if (request()->is('/admin/grafica-suma-lote')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/grafica-suma-lote') }}">
                <i class="bi bi-file-plus"></i>
                <span>Suma lote</span>
            </a>
        </li>
        --}}

        {{--
        <li class="nav-item">
            <a class="@if (request()->is('/admin/grafica-equity')) nav-link @else nav-link collapsed @endif" href="{{ url('/admin/grafica-equity') }}">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span>Gráfica equity</span>
            </a>
        </li>
        --}}


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cleo-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-discord"></i><span>Cleo Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cleo-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach ($valores_moneda as $moneda)
                    <li>
                        <a class="ps-2" href="/admin/cleo-data/{{ $moneda }}">
                            <i class="bi bi-circle"></i><span>{{ $moneda }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/cleoTabla')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/cleoTabla') }}">
                <i class="bi bi-discord"></i>
                <span>Cleo tabla</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/estudioLista')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/estudioLista') }}">
                <i class="bi bi-list"></i>
                <span>Lista de estudios</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="@if (request()->is('/admin/estudio-data')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/estudio-data') }}">
                <i class="bi bi-clipboard-data"></i>
                <span>Estudio Eficiencia</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#control-status" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clock"></i><span>Control</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="control-status" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="ps-2" href="/admin/bitacoraAcceso">
                        <i class="bi bi-circle"></i><span>Bitácora de accesos</span>
                    </a>
                </li>
                <li>
                    <a class="ps-2" href="/admin/historialCambios">
                        <i class="bi bi-circle"></i><span>Historial de cambios</span>
                    </a>
                </li>
            </ul>
        </li>

        {{--
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
        --}}

        {{--
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
        --}}

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
            <a class="@if (request()->is('/admin/logs')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/logs') }}">
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
