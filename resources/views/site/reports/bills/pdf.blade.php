<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report {{$date_get}}</title>
    <link rel="stylesheet" href="{{ asset('css/site/reports/bills/pdf.css') }}">
    <style>
        @page {
            margin: 0;
        }
    </style>
</head>
<body>
        <div>
            <pre>
                <table width="100%">
                    <tbody>
                    @foreach($data as $index => $row)
                    <?php $DateBefore = date('Y-m', strtotime('-1 months', strtotime($date_Before) )); $before = App\Bills::ShowBefore($row->address_id,$DateBefore); $dateBefore = date('m/Y', strtotime('-1 months +543 years', strtotime($date_Before) )); ?>
                    <tr>
                        <td style="border: 1px dashed #cbcccc;" width="45%" ><div class="div-table-margin" ><b class="h4">ใบเสร็จรับเงินค่าน้ำประปาบาดาล</b>
                        <br>ประจำเดือน <b>{{ $date_search }}</b>
                    ชื่อ <b>{{$row->name}}</b> ที่อยู่ <b><span>{{$row->address}} </span><span>{{$row->DISTRICT_NAME}}</span><span>{{$row->AMPHUR_NAME}}</span><span>{{$row->PROVINCE_NAME}}</span><span>{{$row->postcode}}</span></b> 
                            <table width="100%" class="border-groove text-center">
                                <tr class="border-groove" >
                                    <td class="border-groove" >จดครั้งก่อน</td>
                                    <td class="border-groove" ><b>{{ $dateBefore }}</b></td>
                                    <td class="border-groove" >เลขมาตร</b></td>
                                    <td class="border-groove" ><b>{{ $before }}</b></td>
                                </tr>
                                <tr class="border-groove">
                                    <td class="border-groove" >จดครั้งนี้</td>
                                    <td class="border-groove" ><b>{{ $date_search }}</b></td>
                                    <td class="border-groove" >เลขมาตร</td>
                                    <td class="border-groove" ><b>{{$row->latest}}</b></td>
                                </tr>
                                <tr class="border-groove">
                                    <td class="border-groove" >จำนวนหน่วยที่ใช้</td>
                                    <td class="border-groove" ><b><?php
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
                                    <td class="border-groove" >รวมเป็นเงิน</td>
                                    <td class="border-groove" ><b><?php echo $sum = $total * $row->unit ?> บาท</b></td>
                                </tr>
                            </table>
                    เจ้าหน้าที่เก็บเงิน<U>    ยุ้ย    </U></div></td>

                        <td width="55%" style="border: 1px dashed #cbcccc;" ><div class="div-table-margin" ><b class="h4">ใบแจ้งหนี้ค่าน้ำประปาบาดาล <span class="text-danger">(ไม่ใช่ใบเสร็จรับเงิน)<span></b>
                        <br>ประจำเดือน <b>{{ $date_search }}</b>
                    ชื่อ <b>{{$row->name}}</b> ที่อยู่ <b><span>{{$row->address}} </span><span>{{$row->DISTRICT_NAME}}</span><span>{{$row->AMPHUR_NAME}}</span><span>{{$row->PROVINCE_NAME}}</span><span>{{$row->postcode}}</span></b>
                        <table width="100%">
                            <tr >
                                <td>จดครั้งนี้</td>
                                <td><b>{{ $date_search }}</b></td>
                                <td>จำนวนที่ใช้</td>
                                <td><b><?php echo $total; ?></b></td>
                                <td>รวมเป็นเงิน</td>
                                <td><b><?php echo $sum; ?> บาท</b></td>
                            </tr>
                        </table>
                    ** ติดต่อสอบถามได้ที่ 086-122-7035</div></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table></pre>
        </div>
</body>
</html>