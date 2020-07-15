$('.amphur-edit').selectpicker();

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


$(".province-edit").change(function(){
    var PROVINCE_ID = $(this).val();
    $.ajax({
        url: config.routes.getProvinceEdit,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { PROVINCE_ID : PROVINCE_ID },
        success:function(data){
            $(".div-amphur-edit-update").html("");
            $(".div-amphur-edit-update").html(data);
            $('#div-district-edit').html("");
        }
    });

    return false;
});