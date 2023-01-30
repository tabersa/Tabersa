<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CIFController;
use App\Http\Controllers\InfoCIFController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\infoSavingController;
use App\Http\Controllers\SinkronController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\infoTransaksiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DownloadController;


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
})->name('/');

Route::post('/masuk', [LoginController::class, 'login'])->name('masuk');
Route::get('/landing', [LoginController::class, 'index'])->name('landing');
Route::get('/back', [LoginController::class, 'back'])->name('back');
Route::get('/out', [LoginController::class, 'out'])->name('out');
// 
Route::get('/dashboard', [DashboardController::class, 'Profile'])->name('dashboard');

Route::get('/cif', [CIFController::class, 'index'])->name('cif');
Route::get('/infocif/cif/{id}', [InfoCIFController::class, 'index'])->name('cif.cif');
Route::get('/infocif/tabungan/{id}', [InfoCIFController::class, 'tabungan'])->name('cif.tabungan');
Route::get('/infocif/deposito/{id}', [InfoCIFController::class, 'deposito'])->name('cif.deposito');
Route::get('/infocif/kredit/{id}', [InfoCIFController::class, 'kredit'])->name('cif.kredit');
Route::put('/infocif/autorisasi/{id}', [InfoCIFController::class, 'autorisasi'])->name('autorisasi');

Route::get('/tabungan', [SavingController::class, 'index'])->name('tabungan');
Route::get('/infotabungan/show/{id}', [infoSavingController::class, 'index'])->name('tabungan.show');
Route::put('/infotabungan/autorisasi/{id}', [infoSavingController::class, 'autorisasi'])->name('autorisasi');
Route::post('/infotabungan/search', [infoSavingController::class, 'search'])->name('search');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/infotransaksi/show/{id}', [infoTransaksiController::class, 'index'])->name('transaksi.show');
Route::put('/infotransaksi/autorisasi/{id}', [infoTransaksiController::class, 'autorisasi'])->name('autorisasi');
Route::get('/cetakmutasi/{id}', [infoTransaksiController::class, 'cetak'])->name('cetakmutasi');

Route::get('/sinkron', [SinkronController::class, 'index'])->name('sinkron');

Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::get('/profileSetting', [SettingController::class, 'profile'])->name('profileSetting');
Route::get('/literasiSetting', [SettingController::class, 'literasi'])->name('literasiSetting');
Route::get('/tabunganSetting', [SettingController::class, 'tabungan'])->name('tabunganSetting');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/show/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/formupdate/{id}', [NewsController::class, 'formUpdate'])->name('news.formupdate');
Route::put('/news/update', [NewsController::class, 'update'])->name('news.update');
Route::get('/news/formadd', [NewsController::class, 'formAdd'])->name('news.formAdd');
Route::post('/news/add', [NewsController::class, 'add'])->name('news.add');


Route::get('/downloadpdf', [DownloadController::class, 'getDownload'])->name('download');




// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
