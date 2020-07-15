//modal Add
var name = document.getElementById('name');
var tel = document.getElementById('tel');
var postcode = document.getElementById('postcode');
var address = document.getElementById('address');
var serial = document.getElementById('serial');
var unit = document.getElementById('unit');
name.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ ชื่อ-นามสกุล ที่เป็นภาษาไทยหรืออักฤษเท่านั้น');
}
name.oninput = function(event) {
  event.target.setCustomValidity('');
}
tel.oninvalid = function(event) {
  event.target.setCustomValidity('เบอร์โทรศัพท์ไม่ถูกต้อง กรุณากรอกตัวเลขให้ครบ 10 หลัก');
}
tel.oninput = function(event) {
  event.target.setCustomValidity('');
}
postcode.oninvalid = function(event) {
  event.target.setCustomValidity('รหัสไปรษณีย์ไม่ถูกต้อง');
}
postcode.oninput = function(event) {
  event.target.setCustomValidity('');
}
address.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ที่อยู่ หรือ ใส่ที่อยู่โดยไม่มีตัวอักษรพิเศษ');
}
address.oninput = function(event) {
  event.target.setCustomValidity('');
}
serial.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่เลขที่เป็นตัวเลข');
}
serial.oninput = function(event) {
  event.target.setCustomValidity('');
}
unit.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ราคา/หน่วยเป็นตัวเลข');
}
unit.oninput = function(event) {
  event.target.setCustomValidity('');
}

$("#province").change(function(){
  var PROVINCE_ID = $(this).val();
  $.ajax({
      url: config.routes.getAmphur,
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: { PROVINCE_ID : PROVINCE_ID },
      success:function(data){
          $("#div-amphur").html("");
          $("#div-amphur").html(data);
          $("#div-district").html("");
      }
  });
});

//modal Edit
var name_edit = document.getElementById("name-edit");
var tel_edit = document.getElementById('tel-edit');
var postcode_edit = document.getElementById('postcode-edit');
var address_edit = document.getElementById('address-edit');
var serial_edit = document.getElementById('serial-edit');
var unit_edit = document.getElementById('unit-edit');

name_edit.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ ชื่อ-นามสกุล ที่เป็นภาษาไทยหรืออักฤษเท่านั้น');
}
name_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}
tel_edit.oninvalid = function(event) {
  event.target.setCustomValidity('เบอร์โทรศัพท์ไม่ถูกต้อง กรุณากรอกตัวเลขให้ครบ 10 หลัก');
}
tel_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}
postcode_edit.oninvalid = function(event) {
  event.target.setCustomValidity('รหัสไปรษณีย์ไม่ถูกต้อง');
}
postcode_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}
address_edit.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ที่อยู่ หรือ ใส่ที่อยู่โดยไม่มีตัวอักษรพิเศษ');
}
address_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}
serial_edit.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่เลขที่เป็นตัวเลข');
}
serial_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}
unit_edit.oninvalid = function(event) {
  event.target.setCustomValidity('กรุณาใส่ราคา/หน่วยเป็นตัวเลข');
}
unit_edit.oninput = function(event) {
  event.target.setCustomValidity('');
}