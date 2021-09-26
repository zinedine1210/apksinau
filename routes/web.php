<?php

use App\Http\Controllers\DirectController;
use App\Http\Controllers\EschoolController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostMemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;

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



Route::get('/', [DirectController::class, 'index']);
Route::get('/PusatInformasi', [DirectController::class, 'PusatInformasi']);

Route::get('/AsGuru', [EschoolController::class, 'AsGuru']);
Route::get('/AsSiswa', [EschoolController::class, 'AsSiswa']);

Route::get('/Eschool', [EschoolController::class, 'Eschool']);

Route::get('/GuruMasuk', [EschoolController::class, 'GuruMasuk']);
Route::get('/GuruDaftar', [EschoolController::class, 'GuruDaftar']);

Route::get('/Sekolah', [EschoolController::class, 'index']);


Route::get('/SiswaMasuk', [EschoolController::class, 'SiswaMasuk']);
Route::get('/SiswaDaftar', [EschoolController::class, 'SiswaDaftar']);

Route::get('/MemberDaftar', [RegisterController::class, 'index']);
Route::post('/MemberDaftar', [RegisterController::class, 'store']);
Route::post('/Profil/{id}', [RegisterController::class, 'EditProfil'])->middleware('auth');

Route::get('/MemberMasuk', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/MemberMasuk', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/Perpus', [LoginController::class, 'perpus'])->name('login')->middleware('auth');

// Direct
Route::resource('Perpus/Timeline', PostMemberController::class)->middleware('auth');
Route::get('/Perpus/AllPost', [PostController::class, 'AllPost'])->middleware('auth');
Route::get('/Perpus/MyPost', [PostController::class, 'MyPost'])->middleware('auth');
Route::get('/Perpus/Notif', [PostController::class, 'Notifikasi'])->middleware('auth');

Route::get('/Perpus/Buku', [PostController::class, 'Buku'])->middleware('auth');
Route::post('/Perpus/Buku', [PostController::class, 'Buku'])->middleware('auth');
Route::get('/Perpus/Member', [MemberController::class, 'index'])->middleware('auth');

// buku
Route::resource('Perpus/BukuSaya', BukuController::class)->middleware('auth');


// balas postingan
Route::post('/Perpus/Balas/{id}', [PostController::class, 'BalasPostingan'])->middleware('auth');

// komen
Route::post('/Comment/{id}', [PostController::class, 'Comment']);
Route::post('/CommentBuku/{id}', [PostController::class, 'CommentBuku']);
Route::post('/HapusComment/{id}', [PostController::class, 'Delete']);
