@foreach($data as $row)
<?php $DateBefore = date('Y-m', strtotime('-1 months', strtotime($date_Before) )); $before = App\Bills::ShowBefore($row->address_id,$DateBefore); $dateBefore = date('m/Y', strtotime('-1 months +543 years', strtotime($date_Before) )); ?>
<tr class="border-dashed">
    <td style="border-right: 1px dashed #cbcccc;" width="45%" ><b class="h4">ใบเสร็จรับเงินค่าน้ำประปาบาดาล</b>
    <br>ประจำเดือน <b>{{ $date_search }}</b>
ชื่อ <b>{{$row->name}}</b> ที่อยู่ <b><span>{{$row->address}} </span><span>{{$row->DISTRICT_NAME}}</span><span>{{$row->AMPHUR_NAME}}</span><span>{{$row->PROVINCE_NAME}}</span><span>{{$row->postcode}}</span></b> 
        <table class="border border-info">
            <tr class="border border-info text-center" >
                <td class="border border-info" >จดครั้งก่อน</td>
                <td class="border border-info" ><b>{{ $dateBefore }}</b></td>
                <td class="border border-info" >เลขมาตร</b></td>
                <td class="border border-info" ><b>{{ $before }}</b></td>
            </tr>
            <tr class="border border-info text-center">
                <td class="border border-info" >จดครั้งนี้</td>
                <td class="border border-info" ><b>{{ $date_search }}</b></td>
                <td class="border border-info" >เลขมาตร</td>
                <td class="border border-info" ><b>{{$row->latest}}</b></td>
            </tr>
            <tr class="border border-info text-center">
                <td class="border border-info" >จำนวนหน่วยที่ใช้</td>
                <td class="border border-info" ><b><?php
                    $total = 0;
                    $sum = 0;
                    if(is_numeric($before)){
                        if(is_numeric($row->latest)){
                            $before = $before; $latest = $row->latest;
                            if($latest > $before){
                                echo $total = $latest - $before;
                            }else if($latest < $before){
                                echo $total = (10000-$before) + $latest;
                            }else if($latest = $before){
                                echo 0;
                            }
                        }else{
                            echo $total = $before;
                        }
                    }else{
                        echo $total = $row->latest;
                    }
                ?></b></td>
                <td class="border border-info" >รวมเป็นเงิน</td>
                <td class="border border-info" ><b><?php echo $sum = $total * $row->unit ?> บาท</b></td>
            </tr>
        </table>
เจ้าหน้าที่เก็บเงิน<U>    ยุ้ย    </U></td>

    <td width="55%" ><b class="h4">ใบแจ้งหนี้ค่าน้ำประปาบาดาล <span class="text-danger">(ไม่ใช่ใบเสร็จรับเงิน)<span></b>
    <br>ประจำเดือน <b>{{ $date_search }}</b>
ชื่อ <b>{{$row->name}}</b> ที่อยู่ <b><span>{{$row->address}} </span><span>{{$row->DISTRICT_NAME}}</span><span>{{$row->AMPHUR_NAME}}</span><span>{{$row->PROVINCE_NAME}}</span><span>{{$row->postcode}}</span></b>
    <table class="border border-info">
        <tr class="border border-info text-center">
            <td class="border border-info" >จดครั้งนี้</td>
            <td class="border border-info" ><b>{{ $date_search }}</b></td>
            <td class="border border-info" >จำนวนที่ใช้</td>
            <td class="border border-info" ><b><?php echo $total; ?></b></td>
            <td class="border border-info" >รวมเป็นเงิน</td>
            <td class="border border-info" ><b><?php echo $sum; ?> บาท</b></td>
        </tr>
    </table>
** ติดต่อสอบถามได้ที่ 086-122-7035</td>
</tr>
@endforeach