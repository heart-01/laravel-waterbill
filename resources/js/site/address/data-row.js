$(".data-row").dblclick(function(){
    var address_id = $(this).data('address-id');
    var name = $(this).data('name');
    var tel = $(this).data('tel');
    var address = $(this).data('address');
    var province = $(this).data('province');
    var amphur = $(this).data('amphur');
    var district = $(this).data('district');
    var postcode = $(this).data('postcode');
    var serial = $(this).data('serial');
    var unit = $(this).data('unit');

    //$('#province-edit').val(province).change();
    $('#showEdit').modal('show'); 
    $('#address-id-edit').val(address_id);
    $('#name-edit').val(name);
    $('#tel-edit').val(tel);
    $('#address-edit').val(address);
    $('#postcode-edit').val(postcode);
    $('#serial-edit').val(serial);
    $('#unit-edit').val(unit);
    
    $.when(
        $.ajax({
            url: config.routes.getProvinceEdit1,
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { address_id : address_id },
            success:function(data){
                $("#div-province-edit").html("");
                $("#div-province-edit").html(data);
            }
        }),

        $.ajax({
            url: config.routes.getAmphurEdit,
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { PROVINCE_ID : province },
            success:function(data){
                $("#div-amphur-edit").html("");
                $("#div-amphur-edit").html(data);
                $('.amphur-edit').val(amphur).change();
            }
        }),

        $.ajax({
            url: config.routes.getDistrictEdit,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { PROVINCE_ID : province, AMPHUR_ID : amphur },
            success:function(data){
                $("#div-district-edit").html("");
                $("#div-district-edit").html(data);
                $('.district-edit').val(district).change();
            }
        })

    ).then(function() {
        var script_edit = document.getElementsByClassName("script-edit")[0];
        var script = document.createElement("script");
            script.type = 'text/javascript';
            script.src = config.script.AmphurEdit;  
        script_edit.appendChild(script);        
    });

    return false;
});

$(".ck-status").click(function(){
    var address_id = $(this).attr('id');
    var checked = $(this).attr('checked');
    var result;
    
    swal({
        title: "ต้องการเปลี่ยนสถานะใช่หรือไม่ ??",
        text: "", 
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.when(
                $.ajax({
                    url: config.routes.status,
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { address_id : address_id },
                    success:function(data){
                        result = data;
                    }
                })
            ).then(function() {
                if(result=="change"){
                    swal("เปลี่ยนสถานะเรียบร้อย..", "", "success");
                    if(!checked){
                        $("#"+address_id).prop('checked', true).attr('checked', 'checked');
                        return true;
                    }else{
                        $("#"+address_id).prop('checked', false).removeAttr('checked');
                        return true;
                    }
                }
            });
        }
    });

    return false;
});