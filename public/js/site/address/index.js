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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/site/address/index.js":
/*!********************************************!*\
  !*** ./resources/js/site/address/index.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".nav-sidebar > li > .nav-address").addClass("active");

function fetch_data(page, sort_type, sort_by, query) {
  var result1;
  var result2;
  $.when($.ajax({
    url: config.routes.fetch_data,
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      page: page,
      sorttype: sort_type,
      sortby: sort_by,
      query: query
    },
    success: function success(result) {
      result1 = result; //console.log(result);
    }
  }), $.ajax({
    url: config.routes.pagination_link,
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      page: page,
      sorttype: sort_type,
      sortby: sort_by,
      query: query
    },
    success: function success(result) {
      result2 = result; //console.log(result);
    }
  })).then(function () {
    $('tbody').html('');
    $('tbody').html(result1);
    $('#pagination-link').html('');
    $('#pagination-link').html(result2);
  });
}

$(document).on('keyup', '#serach', function () {
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  $('#hidden_page').val(1);
  var page = $('#hidden_page').val();
  fetch_data(page, sort_type, column_name, query);
});
$(document).on('click', '.sorting', function () {
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';

  if (order_type == 'asc') {
    $(this).data('sorting_type', 'desc');
    reverse_order = 'desc';
    $('#' + column_name + '_icon').html('<i class="fas fa-arrow-down"></i>');
  }

  if (order_type == 'desc') {
    $(this).data('sorting_type', 'asc');
    reverse_order = 'asc';
    $('#' + column_name + '_icon').html('<i class="fas fa-arrow-up"></i>');
  }

  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val(); //alert(page + reverse_order + column_name + query);

  fetch_data(page, reverse_order, column_name, query);
});
$(document).on('click', '.pagination a', function (event) {
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var query = $('#serach').val();
  $('li').removeClass('active');
  $(this).parent().addClass('active'); //alert(page + sort_type + column_name + query);

  fetch_data(page, sort_type, column_name, query);
});

/***/ }),

/***/ 3:
/*!**************************************************!*\
  !*** multi ./resources/js/site/address/index.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\WaterBill\resources\js\site\address\index.js */"./resources/js/site/address/index.js");


/***/ })

/******/ });