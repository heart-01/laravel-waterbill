@foreach($data as $row)
<?php $dataHome = App\Bills::IndexHome($row->address_id)->get(); ?>
<?php $dataHome_count = App\Bills::IndexHome($row->address_id)->count(); ?>
<tr>
    <td>{{$row->serial}}</td>
    <td>{{$row->name}}</td>
    <td><?php $before = App\Bills::ShowBeforeInsert($row->address_id) ?><?php echo $before; ?></td>
    @if($dataHome_count!=0)
        @foreach ($dataHome as $index => $Home)
        <td>{{$Home->latest}}</td>
        <td><?php
            if(is_numeric($before)){
                if(is_numeric($Home->latest)){
                    $before = $before; $latest = $Home->latest;
                    if($latest > $before){
                        echo $latest - $before;
                    }else if($latest < $before){
                        echo (10000-$before) + $latest;
                    }
                }
            }
        ?></td>
        <td><?php echo ($Home->status=='0' ? "<div class='text-red'>ค้างชำระ</div>" : ($Home->status=='1' ? "<div class='text-green'>ชำระเงินแล้ว</div>" : null)) ; ?></td>
        <td><?php echo ($Home->status=='0' ? "<div class='text-red'>$Home->note</div>" : ($Home->status=='1' ? "<div class='text-green'>$Home->note</div>" : $Home->note)) ; ?></td>
        @endforeach
    @else
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    @endif
</tr>
@endforeach