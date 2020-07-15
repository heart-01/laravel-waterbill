@extends('layouts.dashboard')

@section('content')

<div class="card" style="font-family: kanit;">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4>รีพอร์ตบิลน้ำ <b><?php echo isset($date_get) ? $date_get : null ?></b></h4>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        @if(!isset($data))
        <div class="row">
            <div class="col-12">
                <?= Form::open(array('route' => 'report.bills.report','class' => 'form-inline')) ?>
                    <div class="col-12 text-center">
                        <img src="https://xn--12c4bmfplte6kc5ei9v.net/wp-content/uploads/2016/04/%E0%B9%81%E0%B8%A1%E0%B8%A7%E0%B8%9E%E0%B8%B4%E0%B8%A1%E0%B8%9E%E0%B9%8C.gif" alt="การ์ตูน" width="60px">
                        <?= Form::select('month', ['01'=> 'มกราคม','02'=> 'กุมภาพันธ์','03'=> 'มีนาคม','04'=> 'เมษายน','05'=> 'พฤษภาคม','06'=> 'มิถุนายน','07'=> 'กรกฎาคม','08'=> 'สิงหาคม','09'=> 'กันยายน','10'=> 'ตุลาคม','11'=> 'พฤศจิกายน','12'=> 'ธันวาคม'], ($month>=10) ? $month : "0".$month, ['class' => 'form-control selectpicker col-6', 'dropupAuto' =>'false', 'data-size' =>'13', 'data-live-search' =>'true', 'placeholder' => 'เลือกเดือน', 'required']); ?>
                        <?= Form::select('year', ['2020'=> '2563','2021'=> '2564','2022'=> '2565','2023'=> '2566','2024'=> '2567','2025'=> '2568','2026'=> '2569','2027'=> '2570'], $year, ['class' => 'form-control selectpicker col-6', 'dropupAuto' =>'false', 'data-size' =>'13', 'data-live-search' =>'true', 'placeholder' => 'เลือกปี', 'required']); ?>
                        <button type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                <?= Form::close() ?>
            </div>
        </div>
        @endif

        @if(isset($data))
            @if($count_search!=0)
            <div class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-12 text-right">
                        <?= Form::open(array('route' => array('report.bills.report.pdf'),'target' => '_blank')) ?>
                            <?= Form::hidden('date_search', $date_search) ?>
                            <?= Form::hidden('date_Before', $date_Before) ?>
                            <?= Form::hidden('date_get', $date_get) ?>
                            <button type="submit" class="btn btn-success text-white"> PDF <i class="fas fa-download"></i></button>
                        <?= Form::close() ?>
                    </div>
                </div>

                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12"><pre style="font-family: kanit;">
                            <table class="table table-borderless">
                                <tbody>
                                    @include('site/reports/bills/reports')
                                </tbody>
                            </table></pre>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="card-header h3 text-center">ไม่มีข้อมูลรีพอร์ต <b><?php echo $date_get ?></b> <img src="https://i.pinimg.com/originals/f6/97/b5/f697b513c92e365c781d1dce461e18f1.gif" alt="การ์ตูน" width="50px"> </div>
            @endif
        @endif

    </div>
    <!-- /.card-body -->
</div>

@if (session()->has('Success'))
    <script>
        swal("<?php echo session()->get('Success'); ?>", "", "success");
    </script>
@elseif (session()->has('Warning'))
    <script>
        swal("<?php echo session()->get('Warning'); ?>", "", "warning");
    </script>
@endif


<script src="{{ asset('/js/site/reports/bills/index.js') }}" type="text/javascript"></script>
@endsection