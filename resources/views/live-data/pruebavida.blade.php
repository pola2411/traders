
@php
    $last_general = DB::table('live')
        ->where('id', '=', 101)
        ->limit(1)
        ->first();
    
    $lastDate = Carbon\Carbon::createFromDate($last_general->time);
    $now = Carbon\Carbon::now();
    
    $diff = $lastDate->diffInMinutes($now);
@endphp
<div class="title-trader d-flex justify-content-between align-items-center">
    <div>
        @if ($diff > 0)
            <span class="badge bg-danger">ALERTA: El último dato recibido fue hace más de 1 minuto</span>
        @endif
    </div>
    <div class="mt-1">
        <h5>
            Última actualización:
            {{ ucfirst(Carbon\Carbon::parse($last_general->time)->diffForHumans()) }}
        </h5>
    </div>
</div>
