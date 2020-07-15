<div class="row">
    <div class="col-sm-12"><pre style="font-family: kanit;">
        <table class="table table-bordered table-hover dataTable dtr-inline text-center" role="grid">
            <thead>
                <tr role="row">
                    <th width="3%">ลำดับ</th>
                    <th width="15%">รายชื่อ</th>
                    <th width="10%">จดครั้งก่อน</th>
                    <th width="10%">จดครั้งหลัง</th>
                    <th width="10%">หมายเหตุ</th>
                    {{--<th width="10%">รวมหน่วยที่ใช้</th>
                    <th width="10%">ราคา/หน่วย</th>
                    <th width="10%">รวมเงิน</th>--}}
                </tr>
            </thead>
            <tbody>
                @include('site/bills/insert/data-row')   
            </tbody>
        </table></pre>
    </div>
</div>