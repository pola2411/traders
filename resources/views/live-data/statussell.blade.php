@if ($status_sell == 0)
<button type="button" class="btn btn-danger" id="status_sell" data-id="{{$id}}">{{ $status_sell }}</button>
@else
<button type="button" class="btn btn-success" id="status_sell" data-id="{{$id}}">{{ $status_sell }}</button>
@endif