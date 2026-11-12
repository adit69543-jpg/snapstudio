<?php

use Illuminate\Support\Facades\Route;
use App\Models\Frame;
use App\Models\Filter;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\FrameController;
use App\Http\Controllers\Admin\FilterController;


// ========================================
// HALAMAN UTAMA
// ========================================

Route::get('/', function () {

    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if (auth()->user()->role === 'user') {
        return redirect()->route('user.dashboard');
    }

    abort(403, 'Role tidak dikenali.');

})->name('home');


// ========================================
// LOGIN DAN REGISTER
// ========================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');

});


// ========================================
// ROUTE KHUSUS PENGGUNA LOGIN
// ========================================

Route::middleware('auth')->group(function () {


    // ====================================
    // DASHBOARD ADMIN
    // ====================================

    Route::get('/admin/dashboard', function () {

        abort_unless(auth()->user()->role === 'admin', 403);

        return view('admin.dashboard');

    })->name('admin.dashboard');


    // ====================================
    // MANAJEMEN ADMIN, FRAME, DAN FILTER
    // ====================================

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {

            // MANAJEMEN ADMIN
            Route::resource('admins', AdminManagementController::class)
                ->except(['show']);

            // MANAJEMEN FRAME
            Route::resource('frames', FrameController::class)
                ->except(['show']);

            // MANAJEMEN FILTER
            Route::resource('filters', FilterController::class)
                ->except(['show']);

            // AKTIF / NONAKTIF FILTER
            Route::patch(
                '/filters/{filter}/toggle-status',
                [FilterController::class, 'toggleStatus']
            )->name('filters.toggleStatus');

        });


    // ====================================
    // LANDING PAGE USER
    // ====================================

    Route::get('/user/dashboard', function () {

        abort_unless(auth()->user()->role === 'user', 403);

        $frames = Frame::where('status', 'active')
            ->latest()
            ->get();

        return view('user.dashboard', compact('frames'));

    })->name('user.dashboard');


    // ====================================
    // STUDIO PHOTOBOOTH
    // ====================================

    Route::get('/user/photobooth', function () {

        abort_unless(auth()->user()->role === 'user', 403);

        // Ambil filter aktif dari database
        $filters = Filter::where('status', 'active')
            ->latest()
            ->get();

        // Ambil frame aktif dari database
        $frames = Frame::where('status', 'active')
            ->latest()
            ->get();

        // Kirim filter dan frame ke halaman photobooth
        return view('user.photobooth.index', compact(
            'filters',
            'frames'
        ));

    })->name('user.photobooth');


    // ====================================
    // LOGOUT
    // ====================================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
