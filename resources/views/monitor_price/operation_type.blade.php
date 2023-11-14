@if ($operation_type == 1)
    <div style="width: 100%; height: 100%;" class="bg-success text-white">
        {{ $operation_type }}
    </div>
@elseif ($operation_type == -1)
    <div style="width: 100%; height: 100%;" class="bg-danger text-white">
        {{ $operation_type }}
    </div>
@endif
