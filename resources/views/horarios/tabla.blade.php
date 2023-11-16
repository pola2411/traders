<table class="table table-striped table-bordered nowrap text-center" style="width: 100%; font-size: 14px !important"
    id="horarios">
    <thead>
        <tr>
            <th data-priority="0" scope="col"></th>
            <th data-priority="0" scope="col">Lunes</th>
            <th data-priority="0" scope="col">Martes</th>
            <th data-priority="0" scope="col">Miércoles</th>
            <th data-priority="0" scope="col">Jueves</th>
            <th data-priority="0" scope="col">Viernes</th>
            <th data-priority="0" scope="col">Sábado</th>
            <th data-priority="0" scope="col">Domingo</th>
        </tr>
    </thead>
    <tbody>

        @for ($hour = 0; $hour <= 23.5; $hour += 0.5)
            <tr>
                <th>{{ sprintf('%02d:%02d', floor($hour), ($hour - floor($hour)) * 60) }}</th>
                @foreach (['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'] as $dia)
                    @php
                        $horarioDia = $horariosLive
                            ->where('hour', $hour)
                            ->where('day', $dia)
                            ->first();
                    @endphp
                    <td>
                        @if ($horarioDia)
                            <button type="button" data-id="{{ $horarioDia->id }}" title="{{ $horarioDia->id }}"
                                class="btn btn-{{ $horarioDia->status == 1 ? 'success' : 'danger' }} btn-sm btn-icon statusHorario">
                                <i class="bi bi-{{ $horarioDia->status == 1 ? 'check' : 'x' }}"></i>
                            </button>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endfor

    </tbody>
    <tfoot>
        <tr>
            <th colspan="8"> Última actualización: <span
                    style="font-weight: 500">{{ \Carbon\Carbon::parse($horariosLive[0]->time)->formatLocalized('%d de %B de %Y a las %H:%M hrs.') }}</span>
            </th>
        </tr>
    </tfoot>
</table>
