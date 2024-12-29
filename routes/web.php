<?php

use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\UmrohController;*/
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusPendaftaranController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\ProgramerController;  // Import ProgramerController
use App\Models\Programmer;


// Route to display programmers (profil-kami)
Route::get('/profil-kami', [ProgramerController::class, 'index'])->name('programmers.index');

// Route to store a new programmer (form submission)
Route::post('/programmers', [ProgramerController::class, 'store'])->name('programmers.store');



// Route for daftars
Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar.index');
Route::post('/daftar', [DaftarController::class, 'store'])->name('daftar.store');

// Route for records
Route::get('/records/create', [RecordsController::class, 'create'])->name('records.create');
Route::post('/records', [RecordsController::class, 'store'])->name('records.store');

// Route for status_pendaftaran resource
Route::resource('status_pendaftaran', StatusPendaftaranController::class);

// Route for beranda (home)
Route::get('/', [ProgramerController::class, 'beranda'])->name('programmers.beranda');


// Route for katalog
Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');

// Route for register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route for login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route for logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
