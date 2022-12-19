@php    
    if ($modificable == "activado"){
        $clase_modificable = "btn-primary";
        $icono_modificable = "bi bi-unlock-fill";
        $disabled = "";
    }else{
        $clase_modificable = "btn-warning";
        $icono_modificable = "bi bi-lock-fill";
        $disabled = "disabled";
    }

    if ($activado == "activado"){
        $clase_activado = "btn-success";
        $icono_activado = "bi bi-check-lg";
    }else{
        $clase_activado = "btn-danger";
        $icono_activado = "bi bi-x-lg";
    }

    if ($sl == "activado"){
        $clase_sl = "btn-success";
        $icono_sl = "bi bi-check-lg";
    }else{
        $clase_sl = "btn-danger";
        $icono_sl = "bi bi-x-lg";
    }

    if ($tp == "activado"){
        $clase_tp = "btn-success";
        $icono_tp = "bi bi-check-lg";
    }else{
        $clase_tp = "btn-danger";
        $icono_tp = "bi bi-x-lg";
    }
@endphp

<div class="col-3 text-center">
    <div class="mb-1">Modificable</div>
    <button class="btn {{ $clase_modificable }}" style="width: 33%;" id="editarStatusMod" data-id="{{ $id }}">
        <i class="{{ $icono_modificable }}"></i>
    </button>
</div>
<div class="col-3 text-center">
    <div class="mb-1">Activado</div>
    <button class="btn {{ $clase_activado }}" style="width: 33%;" id="editarStatusAct" data-id="{{ $id }}" {{ $disabled }}>
        <i class="{{ $icono_activado }}"></i>
    </button>
</div>
<div class="col-3 text-center">
    <div class="mb-1">SL</div>
    <button class="btn {{ $clase_sl }}" style="width: 33%;" id="editarStatusSL" data-id="{{ $id }}" {{ $disabled }}>
        <i class="{{ $icono_sl }}"></i>
    </button>
</div>
<div class="col-3 text-center">
    <div class="mb-1">TP</div>
    <button class="btn {{ $clase_tp }}" style="width: 33%;" id="editarStatusTP" data-id="{{ $id }}" {{ $disabled }}>
        <i class="{{ $icono_tp }}"></i>
    </button>
</div>