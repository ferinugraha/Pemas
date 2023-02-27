<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\Logout;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Models\Pengaduan;
use Dompdf\Dompdf;

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

Route::resource('login', LoginController::class);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [AkunController::class, 'register'])->name('registeruser');

Route::get('/registeruserstore', [AkunController::class, 'registeruserstore'])->name('registeruserstore');

Route::middleware('login')->group(function() {

    Route::get('/admin', function() {
        return view('Admin.index');
    })->middleware('admin')->name('admin.index');

    Route::resource('akun', AkunController::class)->middleware('admin');

    Route::get('akunmasyarakat', [AkunController::class, 'akunmasyarakat'])->name('akunmasyarakat')->middleware('admin');
    
    Route::put('/adminapprove/{id}', [TanggapanController::class, 'adminapprove'])->name('adminapprove')->middleware('admin');
    
    Route::get('editapprove/{id}', [TanggapanController::class, 'adminedit'])->name('editapprove')->middleware('admin');
    
    Route::put('/proveadmin/{id}', [TanggapanController::class, 'proveadmin'])->name('proveadmin')->middleware('admin');
    
    Route::get('history', [TanggapanController::class, 'historyadmin'])->name('history')->middleware('admin');
    
    Route::get('approveadmin', [TanggapanController::class, 'indexadmin'])->name('approveadmin')->middleware('admin');

    Route::get('/generateLaporan', function () {
        $history = Pengaduan::all();
        $dompdf = new Dompdf();
        $html = view('admin.tanggapan.pdf', compact('history'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('Laporan Pembayaran.pdf');
    })->middleware('admin');
    
    Route::get('/petugas', function() {
        return view('petugas.index');
    })->middleware('petugas')->name('petugas.index');

    Route::resource('tanggapan2', TanggapanController::class)->middleware('petugas');

    Route::put('/approve/{id}', [TanggapanController::class, 'approve'])->name('approve')->middleware('petugas');

    Route::get('/user', function() {
        return view('user.index');
    })->middleware('user')->name('user.index');
    
    Route::resource('pengaduan', PengaduanController::class)->middleware('user');

    Route::get('/tanggapan', [PengaduanController::class, 'tanggapan'])->name('tanggapan.user')->middleware('user');

});