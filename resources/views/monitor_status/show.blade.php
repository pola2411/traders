@php
    $assets = \Illuminate\Support\Facades\DB::table('monitor_status')->select()->orderBy('id', 'DESC')->get();
    $data = array();

    foreach($assets->unique('asset') as $asset){
        array_push($data, $asset);
    }
@endphp

@extends('index')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('title') Monitor @endsection

@section('content')
<div class="pagetitle">
    <h1>Monitor Status</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
            <li class="breadcrumb-item active">Monitor Status</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body mt-3">
                    <div class="mb-5">
                        <table class="table table-striped table-bordered nowrap" id="monitor_buy">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="10"><b>LIVE-BSOA</b></th>
                                </tr>
                                <tr>
                                    <th data-priority="0" scope="col">Asset</th>
                                    <th data-priority="0" scope="col">Robot</th>
                                    <th data-priority="0" scope="col">Activation</th>
                                    <th data-priority="0" scope="col">Site</th>
                                    <th data-priority="0" scope="col">Last close</th>
                                    <th data-priority="0" scope="col">Pip limit</th>
                                    <th data-priority="0" scope="col">Operations</th>
                                    <th data-priority="0" scope="col">Strategy</th>
                                    <th data-priority="0" scope="col">Action</th>
                                    <th data-priority="0" scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align: middle"></tbody>
                        </table>
                    </div>

                    <div class="mb-5">
                        <table class="table table-striped table-bordered nowrap" id="monitor_sell">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="10"><b>LIVE-SSOA</b></th>
                                </tr>
                                <tr>
                                    <th data-priority="0" scope="col">Asset</th>
                                    <th data-priority="0" scope="col">Robot</th>
                                    <th data-priority="0" scope="col">Activation</th>
                                    <th data-priority="0" scope="col">Site</th>
                                    <th data-priority="0" scope="col">Last close</th>
                                    <th data-priority="0" scope="col">Pip limit</th>
                                    <th data-priority="0" scope="col">Operations</th>
                                    <th data-priority="0" scope="col">Strategy</th>
                                    <th data-priority="0" scope="col">Action</th>
                                    <th data-priority="0" scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align: middle"></tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="cliente_id" class="form-control" id="liveInput">
                                        <option value="" disabled selected>Selecciona...</option>
                                        <option value="buy" >Buy</option>
                                        <option value="sell" >Sell</option>
                                    </select>
                                    <label for="liveInput">BUY/SELL</label>
                                </div>
                            </div>
                        
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="cliente_id" class="form-control" id="assetInput">
                                        <option value="" disabled selected>Selecciona...</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->asset }}" >{{ $item->asset }}</option>
                                        @endforeach
                                    </select>
                                    <label for="assetInput">Asset</label>
                                </div>
                            </div>
                        </div>
                        <div id="contTabla"></div>
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
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('/js/monitor-status.js') }}"></script>
@endsection