/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/site/address/modal.js":
/*!********************************************!*\
  !*** ./resources/js/site/address/modal.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//modal Add
var name = document.getElementById('name');
var tel = document.getElementById('tel');
var postcode = document.getElementById('postcode');
var address = document.getElementById('address');
var serial = document.getElementById('serial');
var unit = document.getElementById('unit');

name.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ ชื่อ-นามสกุล ที่เป็นภาษาไทยหรืออักฤษเท่านั้น');
};

name.oninput = function (event) {
  event.target.setCustomValidity('');
};

tel.oninvalid = function (event) {
  event.target.setCustomValidity('เบอร์โทรศัพท์ไม่ถูกต้อง กรุณากรอกตัวเลขให้ครบ 10 หลัก');
};

tel.oninput = function (event) {
  event.target.setCustomValidity('');
};

postcode.oninvalid = function (event) {
  event.target.setCustomValidity('รหัสไปรษณีย์ไม่ถูกต้อง');
};

postcode.oninput = function (event) {
  event.target.setCustomValidity('');
};

address.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ที่อยู่ หรือ ใส่ที่อยู่โดยไม่มีตัวอักษรพิเศษ');
};

address.oninput = function (event) {
  event.target.setCustomValidity('');
};

serial.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่เลขที่เป็นตัวเลข');
};

serial.oninput = function (event) {
  event.target.setCustomValidity('');
};

unit.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ราคา/หน่วยเป็นตัวเลข');
};

unit.oninput = function (event) {
  event.target.setCustomValidity('');
};

$("#province").change(function () {
  var PROVINCE_ID = $(this).val();
  $.ajax({
    url: config.routes.getAmphur,
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      PROVINCE_ID: PROVINCE_ID
    },
    success: function success(data) {
      $("#div-amphur").html("");
      $("#div-amphur").html(data);
      $("#div-district").html("");
    }
  });
}); //modal Edit

var name_edit = document.getElementById("name-edit");
var tel_edit = document.getElementById('tel-edit');
var postcode_edit = document.getElementById('postcode-edit');
var address_edit = document.getElementById('address-edit');
var serial_edit = document.getElementById('serial-edit');
var unit_edit = document.getElementById('unit-edit');

name_edit.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ ชื่อ-นามสกุล ที่เป็นภาษาไทยหรืออักฤษเท่านั้น');
};

name_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

tel_edit.oninvalid = function (event) {
  event.target.setCustomValidity('เบอร์โทรศัพท์ไม่ถูกต้อง กรุณากรอกตัวเลขให้ครบ 10 หลัก');
};

tel_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

postcode_edit.oninvalid = function (event) {
  event.target.setCustomValidity('รหัสไปรษณีย์ไม่ถูกต้อง');
};

postcode_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

address_edit.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ที่อยู่ หรือ ใส่ที่อยู่โดยไม่มีตัวอักษรพิเศษ');
};

address_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

serial_edit.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่เลขที่เป็นตัวเลข');
};

serial_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

unit_edit.oninvalid = function (event) {
  event.target.setCustomValidity('กรุณาใส่ราคา/หน่วยเป็นตัวเลข');
};

unit_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

/***/ }),

/***/ 4:
/*!**************************************************!*\
  !*** multi ./resources/js/site/address/modal.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\WaterBill\resources\js\site\address\modal.js */"./resources/js/site/address/modal.js");


/***/ })

/******/ });