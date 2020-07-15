@extends('layouts.dashboard')

@section('content')

<div class="card" style="font-family: kanit;">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4>บัญชีบิลน้ำประจำเดือน <b><?php echo App\Bills::MonthThai($month); ?></b></h4>
            </div>
            {{--<div class="col-12">
                <h4>มีรายชื่อที่อยู่มีทั้งหมด <b>{{$count}}</b> รายการ</h4>
            </div>--}}
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?= Form::open(array('route' => 'bills.store')) ?>
        
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success text-white"><i class="fas fa-sign-in-alt"></i> บันทึก</button>
                </div>
            </div>

            <div class="dataTables_wrapper dt-bootstrap4">
                @include('site/bills/insert/pagination')
            </div>

        <?= Form::close() ?> 
    </div>
    <!-- /.card-body -->
</div>

<script>
    var config = {
        routes: {
            getAmphur: "{{ route('address.getAmphur') }}",
            getAmphurEdit: "{{ route('address.getAmphurEdit') }}",
        }
    };
</script>

@if (session()->has('Success'))
    <script>
        swal("<?php echo session()->get('Success'); ?>", "", "success");
    </script>
@elseif (session()->has('Warning'))
    <script>
        swal("<?php echo session()->get('Warning'); ?>", "", "warning");
    </script>
@endif

<script src="{{ asset('/js/site/bills/insert/index.js') }}" type="text/javascript"></script>
@endsection
