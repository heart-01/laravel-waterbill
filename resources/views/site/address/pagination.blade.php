<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary text-white btn-sm mb-3" data-toggle="modal" data-target="#showAdd"><i class="fas fa-plus-circle"></i> เพิ่ม</button>
        <div class="form-group row float-right">
            <label for="serach" class="col-sm-3 col-form-label col-form-label-sm">Search : </label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="serach" id="serach" placeholder="ค้นหา">
            </div>
        </div>
    </div>
    <div class="col-sm-12"><pre style="font-family: kanit;">
        <table class="table table-bordered table-hover dataTable dtr-inline text-center" role="grid">
            <thead>
                <tr role="row">
                    <th width="3%" class="sorting hand" tabindex="0" data-sorting_type="asc" data-column_name="serial" >ลำดับ <span id="serial_icon"><i class="fas fa-arrow-up"></i></span></th>
                    <th width="15%" class="sorting hand" tabindex="0" data-sorting_type="asc" data-column_name="name" >ชื่อ-นามสกุล <span id="name_icon"><i class="fas fa-arrow-up"></i></span></th>
                    <th width="10%">เบอร์โทรศัพท์</th>
                    <th width="3%">ราคา/หน่วย</th>
                    <th width="66%">ที่อยู่</th>
                    <th width="3%">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                @include('site/address/data-row')
            </tbody>
        </table></pre>
    </div>
</div>
<div class="row" id="pagination-link">
    @include('site/address/pagination-link')
</div>