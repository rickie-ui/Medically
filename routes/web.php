<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctors\UserController;
use App\Http\Controllers\Doctors\LogoutController;
use App\Http\Controllers\Doctors\ProfileController;
use App\Http\Controllers\Patients\DetailController;
use App\Http\Controllers\Doctors\DiseasesController;
use App\Http\Controllers\Doctors\PatientsController;
use App\Http\Controllers\Patients\BookingController;
use App\Http\Controllers\Patients\SignoutController;
use App\Http\Controllers\Doctors\DashboardController;
use App\Http\Controllers\Doctors\DiagnosisController;
use App\Http\Controllers\Doctors\ResidentsController;
use App\Http\Controllers\Doctors\AppointmentsController;
use App\Http\Controllers\Patients\PatientAuthController;
use App\Http\Controllers\Patients\PatientDashController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('patients.signin');
});

// doctor pages
// registration pages
Route::get('/doctor/register', [UserController::class, 'index'])->name('register');
Route::post('/doctor/register', [UserController::class, 'store']);

// login pages
Route::get('/doctor/login', [UserController::class, 'login'])->name('login');
Route::post('/doctor/login', [UserController::class, 'signin']);


// logout doctor
Route::post('/logout', [LogoutController::class, 'signout'])->name('logout');


//Doctor dashboard
Route::get('/doctor/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/patients', [PatientsController::class, 'index'])->name('patient');
Route::get('/doctors', [ResidentsController::class, 'index'])->name('resident');
Route::get('/diseases', [DiseasesController::class, 'index'])->name('disease');

Route::get('/appointments', [AppointmentsController::class, 'index'])->name('appointment');

Route::put('/appointments/{accept}', [AppointmentsController::class, 'accept'])->name('accept');
Route::put('/appointments/status/{reject}', [AppointmentsController::class, 'reject'])->name('reject');
Route::put('/appointments/passed/{finish}', [AppointmentsController::class, 'finish'])->name('finish');

Route::get('/patients/diagnosis/{token}', [DiagnosisController::class, 'index'])->name('diagnosis');

Route::get('/patients/details/{id}', [DiagnosisController::class, 'edit'])->name('detail');
Route::post('/patients/details/{id}', [DiagnosisController::class, 'store']);

// disease forms
Route::get('/diseases/create', [DiseasesController::class, 'edit'])->name('create');
Route::post('/diseases/create', [DiseasesController::class, 'store']);

// infections forms
Route::get('/diseases/{token}/update', [DiseasesController::class, 'register'])->name('infection');
Route::put('/diseases/{token}/update', [DiseasesController::class, 'update']);

// doctor profile

Route::get('/doctor/{token}/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/doctor/{token}/profile', [ProfileController::class, 'update']);


// patients pages

Route::get('/patient/signup', [PatientAuthController::class, 'index'])->name('signup');
Route::post('/patient/signup', [PatientAuthController::class, 'store']);

Route::get('/patient/signin', [PatientAuthController::class, 'login'])->name('signin');
Route::post('/patient/signin', [PatientAuthController::class, 'signin']);

Route::get('/patient/dashboard', [PatientDashController::class, 'index'])->name('patientdash');
Route::get('/patient/appointments', [PatientDashController::class, 'appoint'])->name('appoint');

// patient profile
Route::get('/patient/{token}/profile', [DetailController::class, 'index'])->name('details');
Route::put('/patient/{token}/profile', [DetailController::class, 'update']);

Route::get('/patient/booking', [BookingController::class, 'index'])->name('booking');

// booking form
Route::get('/booking/create/{bookId}', [BookingController::class, 'edit'])->name('book');
Route::post('/booking/create/{bookId}', [BookingController::class, 'store']);

// logout patient
Route::post('/signout', [SignoutController::class, 'signout'])->name('signout');







