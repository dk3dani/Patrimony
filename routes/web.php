<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group([
    'prefix' => 'manufacturer',
    'middleware'=>['auth']
], function() {
    Route::get('/', 'ManufacturerController@index')->name('manufacturer');
    Route::post('/', 'ManufacturerController@store')->name('manufacturer_store');
    Route::get('/form', 'ManufacturerController@form')->name('manufacturer_form');
    Route::get('/{manufacturer}/form_update', 'ManufacturerController@formUpdate')->name('manufacturer_form_update');
    Route::put('/{manufacturer}/update', 'ManufacturerController@update')->name('manufacturer_update');
    Route::get('/{manufacturer}/delete', 'ManufacturerController@delete')->name('manufacturer_delete');

});
