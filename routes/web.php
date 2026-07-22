<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [VerificationController::class, 'index'])->name('verify.index');

Route::post('/verify', [VerificationController::class, 'verify'])
    ->name('verify.certificate');

Route::get('/verify/{certificate_number}', [VerificationController::class, 'show'])
    ->name('verify.show');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return view('dashboard', [

            'memberCount' => \App\Models\Member::count(),

            'certificateCount' => \App\Models\Certificate::count(),

            'validCertificates' => \App\Models\Certificate::where('status', 'Valid')->count(),

            'expiredCertificates' => \App\Models\Certificate::where('status', 'Expired')->count(),

        ]);

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Members
    |--------------------------------------------------------------------------
    */

    Route::resource('members', MemberController::class);

/*
|--------------------------------------------------------------------------
| Certificates
|--------------------------------------------------------------------------
*/

// These routes MUST come before Route::resource()

Route::get('/certificates/valid', [CertificateController::class, 'valid'])
    ->name('certificates.valid');

Route::get('/certificates/expired', [CertificateController::class, 'expired'])
    ->name('certificates.expired');

Route::get('/certificates/{certificate}/print', [CertificateController::class, 'print'])
    ->name('certificates.print');

// Resource routes LAST

Route::resource('certificates', CertificateController::class);

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';