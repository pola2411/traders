@extends('index')

@section('title', 'Status Swap')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Status Swap</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Vista general</a></li>
                <li class="breadcrumb-item active">Status Swap</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-3">
                        @if ($condicional)
                            <table class="table table-striped table-bordered nowrap text-center" id="status_swap">
                                <thead>
                                    <tr>
                                        <th data-priority="0" scope="col">Trader: <span style="font-weight: 500">{{$status_swap->nombre}}</span></th>
                                        <th data-priority="0" scope="col">Fecha: <span style="font-weight: 500">{{\Carbon\Carbon::parse($status_swap->fecha)->formatLocalized('%d de %B de %Y a las %T')}}</span></th>
                                    </tr>
                                    <tr>
                                        <th>MONEDA</th>
                                        <th>VALOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-priority="0" scope="col">EURUSD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurusd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPUSD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpusd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">AUDUSD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->audusd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">NZDUSD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->nzdusd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">USDCAD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->usdcad}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">USDCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->usdchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">USDJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->usdjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURGBP</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurgbp}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURAUD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->euraud}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURNZD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurnzd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPAUD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpaud}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPNZD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpnzd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">AUDNZD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->audnzd}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURCAD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurcad}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">EURJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->eurjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPCAD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpcad}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">GBPJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->gbpjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">AUDCAD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->audcad}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">AUDCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->audchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">AUDJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->audjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">NZDCAD</td>
                                        <td data-priority="0" scope="col">{{$status_swap->nzdcad}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">NZDCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->nzdchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">NZDJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->nzdjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">CADCHF</td>
                                        <td data-priority="0" scope="col">{{$status_swap->cadchf}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">CADJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->cadjpy}}</td>
                                    </tr>
                                    <tr>
                                        <td data-priority="0" scope="col">CHFJPY</td>
                                        <td data-priority="0" scope="col">{{$status_swap->chfjpy}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="#fff" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-primary d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Info:">
                                    <use xlink:href="#info-fill" />
                                </svg>
                                <div>
                                    No se encontró ningún registro
                                </div>
                            </div>
                        @endif
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

    <script src="{{ asset('js/statusswap.js') }}"></script>
@endsection