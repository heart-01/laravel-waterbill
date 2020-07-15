@extends('layouts.dashboard')

@section('content')
    <div class="card" style="font-family: kanit;">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4>บัญชีบิลน้ำประจำเดือน <b><?php echo \App\Bills::MonthThai((int)\Carbon\Carbon::now()->month) ?></b></h4>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="button" onclick="window.location.href='{{ route('bills.store') }}';" class="btn btn-outline-success"><i class="fas fa-plus"></i> เพิ่ม</button>
                    <button type="button" onclick="window.location.href='{{ route('bills.showEdit') }}';" class="btn btn-outline-warning"><i class="far fa-edit"></i> แก้ไข</button>
                </div>
            </div>
            <div class="dataTables_wrapper dt-bootstrap4">
                @include('site/home/pagination')
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <script src="{{ asset('/js/home.js') }}"></script>
@endsection
