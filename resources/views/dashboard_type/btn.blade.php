@if ($statusGral == 1)
    @if ($status == 1)
        <button type="button"data-id="{{ $id }}" type="button" title="{{ $id }}"
            class="btn btn-success btn-sm btn-icon statusDashboard" disabled><i class="bi bi-check"></i></button>
    @else
        <button type="button" data-id="{{ $id }}" type="button" title="{{ $id }}"
            class="btn btn-danger btn-sm btn-icon statusDashboard" disabled><i class="bi bi-x"></i></button>
    @endif
@else
    @if ($status == 1)
        <button type="button" data-id="{{ $id }}" type="button" title="{{ $id }}"
            class="btn btn-success btn-sm btn-icon statusDashboard"><i class="bi bi-check"></i></button>
    @else
        <button type="button" data-id="{{ $id }}" type="button" title="{{ $id }}"
            class="btn btn-danger btn-sm btn-icon statusDashboard"><i class="bi bi-x"></i></button>
    @endif
@endif
