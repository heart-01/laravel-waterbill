<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

//Profiles
Route::resource('profiles','site\profiles\ProfilesController');
Route::get('profile/changePass', 'site\profiles\ProfilesController@changeIndex')->name('profiles.change.index');
Route::post('change-password', 'site\profiles\ProfilesController@changePass')->name('profiles.change.password');

//Address
Route::get('address', 'site\address\AddressController@index')->name('address');
Route::post('address', 'site\address\AddressController@store')->name('address.store');
Route::post('address/update', 'site\address\AddressController@update')->name('address.update');
Route::post('address/getAmphur', 'site\address\AddressController@getAmphur')->name('address.getAmphur');
Route::post('address/getAmphurEdit', 'site\address\AddressController@getAmphurEdit')->name('address.getAmphurEdit');
Route::post('address/getProvince1', 'site\address\AddressController@getProvinceEdit1')->name('address.getProvinceEdit1');
Route::post('address/getProvince', 'site\address\AddressController@getProvinceEdit')->name('address.getProvinceEdit');
Route::post('address/getDistrict', 'site\address\AddressController@getDistrict')->name('address.getDistrict');
Route::post('address/getDistrictEdit', 'site\address\AddressController@getDistrictEdit')->name('address.getDistrictEdit');
Route::post('address/fetch_data', 'site\address\AddressController@fetch_data')->name('address.fetch_data');
Route::post('address/pagination_link', 'site\address\AddressController@pagination_link')->name('address.pagination_link');
Route::post('address/status', 'site\address\AddressController@status')->name('address.status');

//Bill
Route::get('bill/insert', 'site\bills\BillsController@index')->name('bills');
Route::post('bill/insert', 'site\bills\BillsController@store')->name('bills.store');
Route::get('bill/edit', 'site\bills\BillsController@showEdit')->name('bills.showEdit');
Route::post('bill/edit', 'site\bills\BillsController@dataEdit')->name('bills.dataEdit');
Route::post('bill/update', 'site\bills\BillsController@update')->name('bills.update');

//Reports
Route::get('report/bill', 'site\reports\BillsController@index')->name('report.bills');
Route::post('report/bill', 'site\reports\BillsController@report')->name('report.bills.report');
Route::post('report/bill/pdf', 'site\reports\BillsController@pdf')->name('report.bills.report.pdf');