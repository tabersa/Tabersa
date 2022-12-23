<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CIFController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SinkronController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SettingController;


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
    return view('login');
});

Route::get('/keluar', [LoginController::class, 'keluar'])->name('keluar');
// 
Route::get('/dashboard', [DashboardController::class, 'Profile'])->name('dashboard');

Route::get('/cif', [CIFController::class, 'index'])->name('cif');
Route::get('/infocif/{id}/show', [CIFController::class, 'show'])->name('cif.show');




Route::get('/tabungan', [SavingController::class, 'index'])->name('tabungan');

Route::get('/infotabungan', function () {
    return view('page.tabungan.infotabungan');}
);

Route::get('/tes', function () {
    return view('page.tabungan.tes');}
);
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');


Route::get('/infotransaksi', function () {
    return view('page.transaksi.infotransaksi');}
);

Route::get('/sinkron', [SinkronController::class, 'index'])->name('sinkron');

Route::get('/setting', [SettingController::class, 'index'])->name('setting');


// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
