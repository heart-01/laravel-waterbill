<div class="div-amphur-edit-update">
    <?= Form::label('amphur-edit', 'อำเภอ : '); ?>
    <?= Form::select('amphur-edit', App\Amphur::Amphur($PROVINCE_ID)->pluck('AMPHUR_NAME', 'AMPHUR_ID'), null, ['class' => 'form-control selectpicker amphur-edit', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกอำเภอ' , 'data-province' => $PROVINCE_ID , 'required']); ?>
</div>
<div class="script-edit"></div>