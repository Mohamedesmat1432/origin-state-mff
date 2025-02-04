<?php

use App\Livewire\Backup\ListBackup;
use App\Livewire\Company\ListCompany;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Department\ListDepartment;
use App\Livewire\Home\HomeComponent;
use App\Livewire\Origin\ListOrigin;
use App\Livewire\Permission\ListPermission;
use App\Livewire\Project\ListProject;
use App\Livewire\Role\ListRole;
use App\Livewire\Source\ListSource;
use App\Livewire\Statement\ListStatement;
use App\Livewire\User\ListUser;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', HomeComponent::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/backup', ListBackup::class)->name('backup');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/users', ListUser::class)->name('users');
    Route::get('/roles', ListRole::class)->name('roles');
    Route::get('/permissions', ListPermission::class)->name('permissions');
    Route::get('/departments', ListDepartment::class)->name('departments');
    Route::get('/companies', ListCompany::class)->name('companies');
    Route::get('/sources', ListSource::class)->name('sources');
    Route::get('/projects', ListProject::class)->name('projects');
    Route::get('/statements', ListStatement::class)->name('statements');
    Route::get('/origins', ListOrigin::class)->name('origins');
});
