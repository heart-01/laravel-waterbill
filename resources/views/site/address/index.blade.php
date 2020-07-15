@extends('layouts.dashboard')

@section('content')

@include('site/address/modal')

<div class="card" style="font-family: kanit;">
    <div class="card-header">
        <div class="row">
            <h4>บัญชีที่อยู่</h4>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="dataTables_wrapper dt-bootstrap4">
            @include('site/address/pagination')
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="serial" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
        </div>
    </div>
    <!-- /.card-body -->
</div>

<script>
    var config = {
        routes: {
            getAmphur: "{{ route('address.getAmphur') }}",
            getAmphurEdit: "{{ route('address.getAmphurEdit') }}",
            getDistrict: "{{ route('address.getDistrict') }}",
            getDistrictEdit: "{{ route('address.getDistrictEdit') }}",
            getProvinceEdit1: "{{ route('address.getProvinceEdit1') }}",
            getProvinceEdit: "{{ route('address.getProvinceEdit') }}",
            fetch_data: "{{ route('address.fetch_data') }}",
            pagination_link: "{{ route('address.pagination_link') }}",
            status: "{{ route('address.status') }}",
        },
        script: {
            AmphurEdit: "{{ asset('/js/site/address/amphur-edit.js') }}",
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

<script src="{{ asset('/js/site/address/index.js') }}" type="text/javascript"></script>
@endsection
