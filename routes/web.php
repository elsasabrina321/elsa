<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KepribadianController;
use App\Http\Controllers\KarakteristikController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CaptchaServiceController;
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
/* START DEFAULT ROUTE */
Route::get('/', [AuthController::class, 'index']);
/* END DEFAULT ROUTE */

/* START AUTH */
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
/* END AUTH */

/* START KEPRIBADIAN */
Route::controller(KepribadianController::class)->group(function () {
    
    Route::get('kepribadians', 'index')->name('kepribadian.index');
    Route::get('kepribadians/create', 'create')->name('kepribadian.create');
    Route::post('kepribadians/store', 'store')->name('kepribadian.store');
    Route::get('kepribadians/edit/{id}', 'edit')->name('kepribadian.edit');
    Route::post('kepribadians/update/{id}', 'update')->name('kepribadian.update');
    Route::get('kepribadians/destroy/{id}', 'destroy')->name('kepribadian.destroy');
    Route::get('kepribadians/print', 'print')->name('kepribadian.print');
    Route::post('kepribadians/import', 'import')->name('kepribadian.import');
});
/* END KEPRIBADIAN */

/* START KARAKTERISTIK */
Route::controller(KarakteristikController::class)->group(function () {
    
    Route::get('karakteristiks', 'index')->name('karakteristik.index');
    Route::get('karakteristiks/create', 'create')->name('karakteristik.create');
    Route::post('karakteristiks/store', 'store')->name('karakteristik.store');
    Route::get('karakteristiks/edit/{id}', 'edit')->name('karakteristik.edit');
    Route::post('karakteristiks/update/{id}', 'update')->name('karakteristik.update');
    Route::get('karakteristiks/destroy/{id}', 'destroy')->name('karakteristik.destroy');
    Route::get('karakteristiks/print', 'print')->name('karakteristik.print');
    Route::post('karakteristiks/import', 'import')->name('karakteristik.import');
});
/* END KARAKTERISTIK */

/* START JURUSAN */
Route::controller(JurusanController::class)->group(function () {
    
    Route::get('jurusans', 'index')->name('jurusan.index');
    Route::get('jurusans/create', 'create')->name('jurusan.create');
    Route::post('jurusans/store', 'store')->name('jurusan.store');
    Route::get('jurusans/edit/{id}', 'edit')->name('jurusan.edit');
    Route::post('jurusans/update/{id}', 'update')->name('jurusan.update');
    Route::get('jurusans/destroy/{id}', 'destroy')->name('jurusan.destroy');
    Route::get('jurusans/print', 'print')->name('jurusan.print');
    Route::post('jurusans/import', 'import')->name('jurusan.import');
});
/* END JURUSAN */

/* START RULE */
Route::controller(RuleController::class)->group(function () {
    
    Route::get('rules', 'index')->name('rule.index');
    Route::get('rules/create', 'create')->name('rule.create');
    Route::post('rules/store', 'store')->name('rule.store');
    Route::get('rules/edit/{id}', 'edit')->name('rule.edit');
    Route::post('rules/update/{id}', 'update')->name('rule.update');
    Route::get('rules/destroy/{id}', 'destroy')->name('rule.destroy');
    Route::get('rules/print', 'print')->name('rule.print');
    Route::post('rules/import', 'import')->name('rule.import');
});
/* END RULE */

/* START ANALISA */
Route::controller(AnalisaController::class)->group(function () {
    Route::get('analisa', 'index')->name('analisa.index');
    Route::post('analisa/store', 'store')->name('analisa.store');
    Route::get('analisa/destroy/{id}', 'destroy')->name('analisa.destroy');
    Route::get('analisa/result', 'result')->name('analisa.result');
    Route::get('analisa/cetak', 'cetak')->name('analisa.cetak');
    Route::get('analisa/verifikasi/{id}', 'verifikasi')->name('analisa.verifikasi');
});
/* END ANALISA */

/* START KEPRIBADIAN */
Route::controller(KepribadianController::class)->group(function () {
    
    Route::get('kepribadians', 'index')->name('kepribadian.index');
    Route::get('kepribadians/create', 'create')->name('kepribadian.create');
    Route::post('kepribadians/store', 'store')->name('kepribadian.store');
    Route::get('kepribadians/edit/{id}', 'edit')->name('kepribadian.edit');
    Route::post('kepribadians/update/{id}', 'update')->name('kepribadian.update');
    Route::get('kepribadians/destroy/{id}', 'destroy')->name('kepribadian.destroy');
    Route::get('kepribadians/print', 'print')->name('kepribadian.print');
    Route::post('kepribadians/import', 'import')->name('kepribadian.import');
});
/* END KEPRIBADIAN */

/* START MANAJEMEN USER */
Route::controller(UserController::class)->group(function () {
    
    Route::get('users', 'index')->name('user.index');
    Route::get('users/create', 'create')->name('user.create');
    Route::post('users/store', 'store')->name('user.store');
    Route::get('users/edit/{id}', 'edit')->name('user.edit');
    Route::post('users/update/{id}', 'update')->name('user.update');
    Route::get('users/destroy/{id}', 'destroy')->name('user.destroy');
    Route::get('users/print', 'print')->name('user.print');
    Route::post('users/import', 'import')->name('user.import');
});
/* END MANAJEMEN USER */

/* START KUISIONER */
Route::controller(FamilyController::class)->group(function () {
    Route::get('soal', 'indexSoal')->name('soal.index');
    Route::get('soal/create', 'createSoal')->name('soal.create');
    Route::post('soal/store', 'storeSoal')->name('soal.store');
    Route::get('soal/edit/{id}', 'editSoal')->name('soal.edit');
    Route::post('soal/update/{id}', 'updateSoal')->name('soal.update');
    Route::get('soal/destroy/{id}', 'destroySoal')->name('soal.destroy');
});
/* END KUISIONER */