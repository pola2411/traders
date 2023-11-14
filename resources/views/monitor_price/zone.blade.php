@if ($zone == 1)
    <div style="width: 100%; height: 100%;" class="bg-success text-white">
        {{ $zone }}
    </div>
@elseif ($zone == -1)
    <div style="width: 100%; height: 100%;" class="bg-danger text-white">
        {{ $zone }}
    </div>
@else
    <div style="width: 100%; height: 100%;" class="bg-warning text-white">
        {{ $zone }}
    </div>
@endif
