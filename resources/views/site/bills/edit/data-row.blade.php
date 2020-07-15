@foreach($data as $row)
@if($row->status == '1')
<tr>
    <?= Form::hidden('bills_id[]', $row->bills_id); ?>
    <td>{{$row->serial}}</td>
    <td>{{$row->name}}{{$row->status}}</td>
    <td><?php echo App\Bills::ShowBeforeEdit($row->address_id,$date_search) ?></td>
    <td><?= Form::number('latest[]', isset($row->latest) ? $row->latest : null,['class' =>'form-control input-no-spinner latest','placeholder' => 'จดครั้งหลัง','autocomplete'=> 'off']); ?></td>
    <td><?= Form::select('status[]', ['0'=> 'ค้างชำระ','1'=> 'ชำระเงินแล้ว'], isset($row->sta) ? $row->sta : null, ['class' => 'form-control selectpicker', 'dropupAuto' =>'false', 'data-size' =>'13', 'data-live-search' =>'true', 'placeholder' => 'เลือกสถานะชำระเงิน']); ?></td>
    <td><?= Form::text('note[]', isset($row->note) ? $row->note : null, ['class' => 'form-control', 'placeholder' => 'หมายเหตุ', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$']); ?></td>
</tr>
@elseif($row->status == '0')
<tr style="cursor: not-allowed;">
    <?= Form::hidden('bills_id[]', $row->bills_id ,['disabled']); ?>
    <td>{{$row->serial}}</td>
    <td>{{$row->name}}{{$row->status}}</td>
    <td><?php echo App\Bills::ShowBeforeEdit($row->address_id,$date_search) ?></td>
    <td><?= Form::number('latest[]', isset($row->latest) ? $row->latest : null,['class' =>'form-control input-no-spinner latest','placeholder' => 'จดครั้งหลัง','autocomplete'=> 'off','disabled']); ?></td>
    <td><?= Form::select('status[]', ['0'=> 'ค้างชำระ','1'=> 'ชำระเงินแล้ว'], isset($row->sta) ? $row->sta : null, ['class' => 'form-control selectpicker', 'dropupAuto' =>'false', 'data-size' =>'13', 'data-live-search' =>'true', 'placeholder' => 'เลือกสถานะชำระเงิน','disabled']); ?></td>
    <td><?= Form::text('note[]', isset($row->note) ? $row->note : null, ['class' => 'form-control', 'placeholder' => 'หมายเหตุ', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$','disabled']); ?></td>
</tr>
@endif
@endforeach