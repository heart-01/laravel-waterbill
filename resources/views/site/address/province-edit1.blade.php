<?= Form::label('province-edit', 'จังหวัด : '); ?>
<?= Form::select('province-edit', App\Province::all()->pluck('PROVINCE_NAME', 'PROVINCE_ID'), $PROVINCE_ID, ['class' => 'form-control selectpicker province-edit', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกจังหวัด', 'required']); ?>
<script>
    $('.province-edit').selectpicker();
</script>