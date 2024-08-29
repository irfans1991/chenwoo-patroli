<?php

use App\Events\HelloEvent;
use App\Events\NotifPermission;
use App\Http\Livewire\MutasiIndex;
use App\Http\Livewire\MessageIndex;
use App\Http\Livewire\SmartphoneList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SmartphoneCreate;
use App\Http\Controllers\loginController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\vistorsController;
use App\Http\Controllers\documentController;
use App\Http\Controllers\containerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\suppliersController;
use App\Http\Controllers\transportController;
use App\Http\Controllers\inMutationController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\smartphoneController;
use App\Http\Controllers\tambahUserController;
use App\Http\Controllers\productController;
use App\Http\Controllers\brgKeluarController;
use App\Http\Controllers\notaBarangController;

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
// Dashboard
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');
// users
Route::get('/users', [usersController::class, 'index'])->middleware('auth');
Route::delete('/users/{id}', [usersController::class, 'destroy'])->middleware('auth');
//Tambah User
Route::get('/users/{slug}', [tambahUserController::class, 'index'])->middleware('auth');
// show users
Route::get('/users/detail/{profiles:id}', [usersController::class, 'show'])->middleware('auth');
//login
Route::get('/', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [loginController::class, 'auth']);
//supplier
Route::resource('/supplier', suppliersController::class);
Route::get('supplier/edit/{id}', [suppliersController::class, 'edit'])->middleware('auth');
Route::put('supplier/update/{id}', [suppliersController::class, 'update'])->middleware('auth');
Route::delete('supplier/delete/{id}', [suppliersController::class, 'destroy'])->middleware('auth');
//tambah data Post
Route::post('/users/{slug}', [tambahUserController::class, 'store'])->middleware('auth');
Route::get('/users/{users:id}/edit', [tambahUserController::class, 'edit'])->middleware('auth');
Route::put('/users/{users:id}', [tambahUserController::class, 'update'])->middleware('auth');
// Logout
Route::post('/logout', [loginController::class, 'logout']);
//Visitors
Route::resource('/visitors', vistorsController::class)->middleware('auth');
Route::get('/dataVisitor', [vistorsController::class, 'DataAll'])->middleware('auth');
// Route::get('/visitors/create',
// Route::get('/visitors/masuk', [vistorsController::class, 'masuk'])->middleware('auth');

//mutasi
Route::resource('/mutasi', inMutationController::class)->middleware('auth');
Route::get('/mutasi/edit/{id}', [inMutationController::class, 'TampilData'])->middleware('auth');
Route::get('/test/{name}', [inMutationController::class, 'createTest']);
Route::get('/mutasiKeluar', [inMutationController::class, 'keluar'])->middleware('auth');
Route::put('mutasi/update/{id}', [inMutationController::class, 'update'])->middleware('auth');
Route::get('/allMutasi', [inMutationController::class, 'allData'])->middleware('auth');

//Kontainer
Route::resource('/kontainer', containerController::class)->middleware('auth');

//Document
Route::resource('/dokumen', documentController::class)->middleware('auth');
//permission
Route::resource('/permission', permissionController::class)->middleware('auth');
Route::delete('permission/{id}/delete', [permissionController::class, 'destroy'])->middleware('auth');
//kendaraan
Route::resource('/kendaraan', transportController::class)->middleware('auth');
//profile
Route::resource('/profile', profileController::class)->middleware('auth');

// download_excel
Route::get('/exportVisitor', [vistorsController::class,     'visitorExcel'])->name('visitorExcel');
Route::get('/exportSmartphone', [smartphoneController::class, 'smartphoneExcel'])->name('smartphoneExcel');
Route::get('/storedExport', [smartphoneController::class, 'storedExport'])->name('storedExport');
Route::get('/SupplierExport', [suppliersController::class, 'SupplierExport'])->name('SupplierExport');
Route::get('/mutasiExport', [inMutationController::class, 'mutasiExport'])->name('mutasiExport');
Route::get('/containerExport', [containerController::class, 'containerExport'])->name('containerExport');
Route::get('/permissionExport', [permissionController::class, 'permissionExport'])->name('permissionExport');
Route::get('/transportExcel', [transportController::class, 'transportExcel'])->name('transportExcel');
Route::get('/DocumentExport', [documentController::class, 'DocumentExport'])->name('DocumentExport');
Route::get('/productExport', [productController::class, 'productExport'])->name('productExport');
Route::get('/notaBarangExport', [notaBarangController::class, 'notaBarangExport'])->name('notaBarangExport');
Route::get('/productOutExport', [brgKeluarController::class, 'productOutExport'])->name('productOutExport');
// Smartphone Live Wire
Route::get('/smartphone-create', SmartphoneCreate::class);
Route::group(['middleware' => 'auth'], function(){
    Route::get('getPhone/{idPhone}', [smartphoneController::class, 'getData']);
    Route::get('stored/{id}/edit', [smartphoneController::class, 'edit']);
    Route::get('stored/', [smartphoneController::class, 'index']);
    Route::post('stored/create', [smartphoneController::class, 'stored']);
    Route::delete('stored/{id}', [smartphoneController::class, 'destroy']);
    Route::put('stored/update/{id}', [smartphoneController::class, 'update']);

});

//Message Livewire
Route::get('message-index', MessageIndex::class)->middleware('auth');

// get data Message ajax
Route::get('/message/{id}/get', [MessageController::class, 'get'])->middleware('auth');
Route::put('/message/{id}/update', [MessageController::class, 'update'])->middleware('auth');

//Product
Route::group(['middleware' => 'auth'], function(){
    Route::resource('/product', productController::class);
    Route::resource('/brgKeluar', brgKeluarController::class);
    Route::resource('/notaBarang', notaBarangController::class);
    Route::put('/notaBarang/{$id}', [notaBarangController::class, 'update']);
    Route::put('/notaBarang/approve/{$id}', [notaBarangController::class, 'checked']);
    Route::get('/cetak-nota/{id}', [notaBarangController::class, 'cetakNota']);
});
