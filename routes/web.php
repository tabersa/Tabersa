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

Route::get('/', function () {
    return view('login');
}
);

Route::get('/dashboard', function () {
    return view('page.dashboard');}
);

Route::get('/cif', function () {
    return view('page.cif.cif');}
);

Route::get('/infocif', function () {
    return view('page.cif.infocif');}
);


Route::get('/tabungan', function () {
    return view('page.tabungan.tabungan');}
);

Route::get('/infotabungan', function () {
    return view('page.tabungan.infotabungan');}
);

Route::get('/tes', function () {
    return view('page.tabungan.tes');}
);

Route::get('/transaksi', function () {
    return view('page.transaksi.transaksi');}
);

Route::get('/infotransaksi', function () {
    return view('page.transaksi.infotransaksi');}
);


Route::get('/sinkron', function () {
    return view('page.sinkron.sinkronisasi');}
);

Route::get('/setting', function () {
    return view('page.setting.setting');}
);
