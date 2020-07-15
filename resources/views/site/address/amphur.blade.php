<?= Form::label('amphur', 'อำเภอ : '); ?>
<?= Form::select('amphur', App\Amphur::Amphur($PROVINCE_ID)->pluck('AMPHUR_NAME', 'AMPHUR_ID'), null, ['class' => 'form-control selectpicker amphur', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกอำเภอ' , 'onchange' =>"getDistrict()", 'required']); ?>
<script>
    $('.amphur').selectpicker();
</script>