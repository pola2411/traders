@if ($status_buy == 0)
<button type="button" class="btn btn-danger" id="status_buy" data-id="{{$id}}">{{ $status_buy }}</button>
@else
<button type="button" class="btn btn-success" id="status_buy" data-id="{{$id}}">{{ $status_buy }}</button>
@endif