<?= Form::label('district', 'ตำบล : '); ?>
<?= Form::select('district', App\District::District($PROVINCE_ID,$AMPHUR_ID)->pluck('DISTRICT_NAME', 'DISTRICT_ID'), null, ['class' => 'form-control selectpicker district', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกตำบล', 'required']); ?>
<script>
    $('.district').selectpicker();
</script>