<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController as GuestProjectController;
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
    return view('guests.welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


//raggruppo le route per renderle accessibili
//solo a chi è verificato ed ha accesso alla zona admin
Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        
        //project creater
        Route::post('/admin/projects', [ProjectController::class, "store"])->name("admin.projects.store");
        Route::get('/admin/projects/create', [ProjectController::class, "create"])->name("admin.projects.create");
        
        //projects reader
        Route::get('/admin/projects', [ProjectController::class, "index"])->name("admin.projects.index");
        Route::get('/admin/projects/{project}]', [ProjectController::class, "show"])->name("admin.projects.show");
    });


Route::get("/projects", [GuestProjectController::class, "index"])->name("projects.index");







Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__ . '/auth.php';
