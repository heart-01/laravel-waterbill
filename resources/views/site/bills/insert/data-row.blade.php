@foreach($data as $row)
@if(App\Bills::ShowBillsInsert($row->address_id)!=1)
<tr>
    <td>{{$row->serial}}</td>
    <td>{{$row->name}} {{--$row->address_id--}}<?= Form::hidden('address_id[]', $row->address_id); ?></td>
    <td id="before{{$row->address_id}}"><?php echo App\Bills::ShowBeforeInsert($row->address_id) ?></td>
    <td><?= Form::number('latest[]', null,['class' =>'form-control input-no-spinner latest','placeholder' => 'จดครั้งหลัง', 'data-address-id' =>$row->address_id, 'autocomplete'=> 'off']); ?></td>
    <td><?= Form::text('note[]', null, ['class' => 'form-control', 'placeholder' => 'หมายเหตุ', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$']); ?></td>
    {{--<td id="sum{{$row->address_id}}"></td>
    <td>{{$row->unit}}</td>
    <td id="money{{$row->address_id}}">money</td>--}}
</tr>
@endif
@endforeach