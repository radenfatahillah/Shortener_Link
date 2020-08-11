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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'ShortLinkController@short')->name('short');
Route::get('/DK/{link}', 'ShortLinkController@shortLink')->name('shortLink');

Auth::routes();

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('adminedit', 'ProfilController', ['only' => ['index','create','destroy','store','update']]);
    Route::get('ubahpassword', 'UbahPasswordController@index')->name('ubahpasswordindex');
    Route::get('kelolamember', 'KelolaMemberController@index')->name('kelolamemberindex');
    Route::delete('kelolamember/delete/{id}', 'KelolaMemberController@destroy')->name('kelolamemberdelete');
    Route::put('/password', 'UbahPasswordController@updatePassword')->name('passwordupdate');

    Route::resource('short_link_all', 'SemuaShortLinkController', ['only' => ['index', 'destroy']]);
    Route::resource('kelola_member', 'KelolaMemberController', ['only' => ['index', 'destroy']]);
    Route::resource('kelola_link', 'ShortLinkController', ['except' => ['show']]);
    Route::get('{short_link}', 'ShortLinkController@shortenLink')->name('shorten.link');    
});

Route::group(['as'=>'member.','prefix'=>'member', 'namespace'=>'Member', 'middleware'=>['auth','member']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('memberedit', 'ProfilController', ['only' => ['index','create','destroy','store','update']]);
    Route::get('kelolashortenerlink', 'ShortenerLinkController@index')->name('shortenerlinkindex');
    Route::delete('kelolashortenerlink/delete/{id}', 'ShortenerLinkController@destroy')->name('shortenerlinkdelete');
    Route::get('ubahpassword', 'UbahPasswordController@index')->name('ubahpasswordindex');
    Route::put('/password', 'UbahPasswordController@updatePassword')->name('passwordupdate');
});