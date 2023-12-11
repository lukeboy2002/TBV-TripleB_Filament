<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::get('user/create', [\App\Http\Controllers\UserController::class, 'create'] )->name('user.create')->middleware('HasInvitation');
Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');

Route::get('members', [\App\Http\Controllers\MemberController::class, 'index'])->name('members.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:web', config('jetstream.auth_session'), 'verified', 'role:member|admin'])->group(function () {
    Route::post('member', [\App\Http\Controllers\Admin\MemberUploadController::class, 'upload'])->name('member.upload');

    Route::get('invite/create', [\App\Http\Controllers\Admin\InvitationController::class, 'create'])->name('invitations.create');
    Route::post('invite', [\App\Http\Controllers\Admin\InvitationController::class, 'store'])->name('invitations.store');
});
