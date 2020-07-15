<?= Form::label('district-edit', 'ตำบล : '); ?>
<?= Form::select('district-edit', App\District::District($PROVINCE_ID,$AMPHUR_ID)->pluck('DISTRICT_NAME', 'DISTRICT_ID'), null, ['class' => 'form-control selectpicker district-edit', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกตำบล', 'required']); ?>
<script>
    $('.district-edit').selectpicker();
</script>