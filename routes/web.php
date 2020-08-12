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
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'ShortLinkController@short')->name('short');
Route::get('/{link}', 'ShortLinkController@shortLink')->name('shortLink');

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('adminedit', 'ProfilController', ['only' => ['index','create','destroy','store','update']]);    
    Route::resource('ubahpassword', 'UbahPasswordController', ['only' => ['index','update']]);
    Route::resource('short_link_all', 'SemuaShortLinkController', ['only' => ['index', 'destroy']]);
    Route::resource('kelola_member', 'KelolaMemberController', ['only' => ['index', 'destroy']]);
    Route::resource('kelola_link', 'ShortLinkController', ['except' => ['show']]);
    Route::get('{short_link}', 'ShortLinkController@shortenLink')->name('shorten.link');
});

Route::group(['as'=>'member.','prefix'=>'member', 'namespace'=>'Member', 'middleware'=>['auth','member']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('memberedit', 'ProfilController', ['only' => ['index','create','destroy','store','update']]);
    Route::resource('kelola_link', 'ShortLinkController', ['except' => ['show']]);
    Route::resource('ubahpassword', 'UbahPasswordController', ['only' => ['index','update']]);
    Route::resource('short', 'ShortLinkController');
    Route::get('{short_link}', 'ShortLinkController@shortenLink')->name('shorten.link');   
});