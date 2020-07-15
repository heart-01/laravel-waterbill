<!-- modal Add -->
<div class="modal fade" id="showAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pencil-alt"></i> เพิ่มที่อยู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= Form::open(array('route' => 'address.store','id' => 'frmAcc')) ?>
                <div class="form-group">
                    <div class="form-group">
                        <?= Form::label('name', 'ชื่อ-สกุล : '); ?>
                        <?= Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อ-นามสกุล', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z]+$' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('tel', 'เบอร์โทรศัพท์ : '); ?>
                        <?= Form::text('tel',null,['class' =>'form-control','placeholder' => 'เบอร์โทรศัพท์','maxlength' =>'10','pattern' =>'^[\d]{10}$', 'autocomplete'=> 'off']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('unit', 'ราคา/หน่วย : '); ?>
                        <?= Form::text('unit',null,['class' =>'form-control','placeholder' => 'ราคา/หน่วย','maxlength' =>'10','pattern' =>'\d*', 'autocomplete'=> 'off' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('address', 'ที่อยู่ : '); ?>
                        <?= Form::text('address', null, ['class' => 'form-control','placeholder' => 'บ้านเลขที่ , อาคาร , และอื่นๆ','maxlength' =>'255', 'pattern' =>'^[ก-๏\sa-zA-Z\d/.]+$', 'autocomplete'=> 'off','required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('province', 'จังหวัด : '); ?>
                        <?= Form::select('province', App\Province::all()->pluck('PROVINCE_NAME', 'PROVINCE_ID'), 58, ['class' => 'form-control selectpicker', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกจังหวัด', 'required']); ?>
                    </div>
                    <div class="form-group">
                        <div id="div-amphur">
                            <?= Form::label('amphur', 'อำเภอ : '); ?>
                            <?= Form::select('amphur', App\Amphur::Amphur(58)->pluck('AMPHUR_NAME', 'AMPHUR_ID'), 810, ['class' => 'form-control selectpicker amphur', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกอำเภอ', 'onchange' =>"getDistrict()" ,'required']); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div-district">
                            <?= Form::label('district', 'ตำบล : '); ?>
                            <?= Form::select('district', App\District::District(58,810)->pluck('DISTRICT_NAME', 'DISTRICT_ID'), 7305, ['class' => 'form-control selectpicker district', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกตำบล' ,'required']); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= Form::label('postcode', 'รหัสไปรษณีย์ : '); ?>
                        <?= Form::text('postcode',73150,['class' =>'form-control','placeholder' => 'รหัสไปรษณีย์','maxlength' =>'5','pattern' =>'\d*', 'autocomplete'=> 'off' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('serial', 'เลขที่ : '); ?>
                        <?= Form::text('serial', null,['class' =>'form-control','placeholder' => 'เลขที่','maxlength' =>'3','pattern' =>'\d*', 'autocomplete'=> 'off']); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>       
                <button type="submit" class="btn btn-success text-white"><i class="fas fa-sign-in-alt"></i> ยืนยัน</button>
            </div>
            <?= Form::close() ?>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="showEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-warning">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-pencil-alt"></i> แก้ไขที่อยู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= Form::open(array('route' => 'address.update')) ?>
                <div class="form-group">
                    <input type="hidden" id="address-id-edit" name="address-id-edit">
                    <div class="form-group">
                        <?= Form::label('name-edit', 'ชื่อ-สกุล : '); ?>
                        <?= Form::text('name-edit', null, ['class' => 'form-control name-edit', 'placeholder' => 'ชื่อ-นามสกุล', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z]+$' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('tel-edit', 'เบอร์โทรศัพท์ : '); ?>
                        <?= Form::text('tel-edit',null,['class' =>'form-control tel-edit','placeholder' => 'เบอร์โทรศัพท์','maxlength' =>'10','pattern' =>'^[\d]{10}$', 'autocomplete'=> 'off']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('unit-edit', 'ราคา/หน่วย : '); ?>
                        <?= Form::text('unit-edit',null,['class' =>'form-control unit-edit','placeholder' => 'ราคา/หน่วย','maxlength' =>'10','pattern' =>'\d*', 'autocomplete'=> 'off' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('address-edit', 'ที่อยู่ : '); ?>
                        <?= Form::text('address-edit', null, ['class' => 'form-control address-edit','placeholder' => 'บ้านเลขที่ , อาคาร , และอื่นๆ','maxlength' =>'255', 'pattern' =>'^[ก-๏\sa-zA-Z\d/.]+$', 'autocomplete'=> 'off','required']); ?>
                    </div>
                    <div class="form-group">
                        <div id="div-province-edit"></div>
                    </div>
                    <div class="form-group">
                        <div id="div-amphur-edit"></div>
                    </div>
                    <div class="form-group">
                        <div id="div-district-edit"></div>
                    </div>
                    <div class="form-group">
                        <?= Form::label('postcode-edit', 'รหัสไปรษณีย์ : '); ?>
                        <?= Form::text('postcode-edit',null,['class' =>'form-control postcode-edit','placeholder' => 'รหัสไปรษณีย์','maxlength' =>'5','pattern' =>'\d*', 'autocomplete'=> 'off' ,'required']); ?>
                    </div>
                    <div class="form-group">
                        <?= Form::label('serial-edit', 'เลขที่ : '); ?>
                        <?= Form::text('serial-edit', null,['class' =>'form-control serial-edit','placeholder' => 'เลขที่','maxlength' =>'3','pattern' =>'\d*', 'autocomplete'=> 'off']); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>       
                <button type="submit" class="btn btn-success text-white"><i class="fas fa-sign-in-alt"></i> ยืนยัน</button>
            </div>
            <?= Form::close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#showAdd').on('shown.bs.modal', function() {
            $('#name').trigger('focus');
        });
        $('#showEdit').on('shown.bs.modal', function() {
            $('#name-edit').trigger('focus');
        });
    });
    function getDistrict(){
        var PROVINCE_ID = $("#province").val();
        var AMPHUR_ID = $("#amphur").val();
        $.ajax({
            url: config.routes.getDistrict,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { PROVINCE_ID : PROVINCE_ID, AMPHUR_ID : AMPHUR_ID },
            success:function(data){
                $("#div-district").html("");
                $("#div-district").html(data);
            }
        });
    }
</script>
<script src="{{ asset('/js/site/address/modal.js') }}"></script>