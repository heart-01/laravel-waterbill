@foreach($data as $row)
<tr class="data-row" data-address-id="{{ $row->address_id}}" data-name="{{ $row->name}}" data-tel="{{ $row->tel}}" data-address="{{ $row->address}}" data-province="{{ $row->PROVINCE_ID}}" data-amphur="{{ $row->AMPHUR_ID}}" data-district="{{ $row->DISTRICT_ID}}" data-postcode="{{ $row->postcode}}" data-serial="{{ $row->serial}}" data-unit="{{ $row->unit}}" role="row">
    <td class="hand">{{ $row->serial}}</td>
    <td class="hand">{{ $row->name}}</td>
    <td class="hand">{{ $row->tel}}</td>
    <td class="hand">{{ $row->unit}}</td>
    <td class="hand"><span>{{$row->address}} </span><span>{{$row->DISTRICT_NAME}}</span><span>{{$row->AMPHUR_NAME}}</span><span>{{$row->PROVINCE_NAME}}</span><span>{{$row->postcode}}</span></td>
    <td class="hand"><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"><input type="checkbox" class="custom-control-input ck-status" id="{{ $row->address_id}}"
        @if($row->status == 1) checked @endif ><label class="custom-control-label" for="{{ $row->address_id}}"></label></div></td>
</tr>
@endforeach

<script src="{{ asset('/js/site/address/data-row.js') }}" type="text/javascript"></script>