<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserQuizController;
use App\Http\Controllers\UserTugasController;
use App\Http\Controllers\TahunAjaranController; 
use App\Http\Controllers\JurusanController;
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

Route::get('/welcome', function () {
    return view('welcome');
});



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('user{id}', [App\Http\Controllers\FrontController::class, 'profile'])->middleware('auth')->name('profile');


Route::get('materi{id}', [App\Http\Controllers\FrontController::class, 'isi'])->name('isi');
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('kelas', KelasController::class)->except(['show']);
    Route::resource('jurusan', JurusanController::class)->except(['show']);
    Route::resource('tahun_ajaran', TahunAjaranController::class);
    Route::post('tahun-ajaran/{id}/aktifkan', [TahunAjaranController::class, 'setAktif'])->name('tahun_ajaran.setAktif');
});

Route::middleware(['auth', 'role:guru,admin'])->group(function () {
    Route::resource('quiz', QuizController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('materi', MateriController::class);
});


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/kelas/tersedia', [KelasController::class, 'list'])->name('kelas.list');
    Route::post('/kelas/{kelas}/join', [KelasController::class, 'join'])->name('kelas.join');
});

Route::middleware(['auth', 'role:guru,admin'])->group(function () {
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
});

Route::middleware(['auth', 'role:siswa'])->prefix('user')->name('user.')->group(function () {
    Route::get('/tugas', [UserTugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/kerjakan', [UserTugasController::class, 'kerjakan'])->name('tugas.kerjakan');
    Route::post('/tugas/{id}/submit', [UserTugasController::class, 'tugasSubmit'])->name('tugasSubmit');
    Route::get('/tugas/{id}/hasil', [UserTugasController::class, 'hasil'])->name('tugas.hasil');
    Route::get('/quiz', [UserQuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{id}/kerjakan', [UserQuizController::class, 'kerjakan'])->name('quiz.kerjakan');
    Route::post('/quiz/{id}/submit', [UserQuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/{id}/hasil', [UserQuizController::class, 'hasil'])->name('quiz.hasil');
    Route::get('/quizz', [FrontController::class, 'quizz'])->name('quizz');

});

// Public


Route::post('/quiz/{id}/quiz-submit', [FrontController::class, 'quizSubmit'])->name('quizSubmit');
Route::post('/quizz/periksa-kode', [FrontController::class, 'periksaKode'])->name('periksaKode');
Route::get('/quizz/{kode}/kerjakan', [FrontController::class, 'kerjakan'])->name('kerjakan');



// Admin only
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('guru', GuruController::class);
    Route::get('guru/{id}/assign-kelas', [GuruController::class, 'showAssignKelasForm'])->name('guru.assignKelasForm');
    Route::post('guru/{id}/assign-kelas', [GuruController::class, 'assignKelas'])->name('guru.assignKelas');
});

Route::get('/', [FrontController::class, 'index'])->name('welcome');

