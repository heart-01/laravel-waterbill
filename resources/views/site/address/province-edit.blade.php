<?= Form::label('amphur-edit', 'อำเภอ : '); ?>
<?= Form::select('amphur-edit', App\Amphur::Amphur($PROVINCE_ID)->pluck('AMPHUR_NAME', 'AMPHUR_ID'), null, ['class' => 'form-control selectpicker amphur-edit province-edit', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'เลือกอำเภอ' , 'data-province' => $PROVINCE_ID , 'required']); ?>
<script>
$('.province-edit').selectpicker();
$('.amphur-edit').change(function(){
    var PROVINCE_ID = $(this).data('province');
    var AMPHUR_ID = $(this).val();
    
    $.ajax({
        url: config.routes.getDistrictEdit,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { PROVINCE_ID : PROVINCE_ID, AMPHUR_ID : AMPHUR_ID },
        success:function(data){
            $('#div-district-edit').html('');
            $('#div-district-edit').html(data);
        }
    });

    return false;
});
</script>