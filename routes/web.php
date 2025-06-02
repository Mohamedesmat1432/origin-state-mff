<?php

use App\Livewire\Backup\ListBackup;
use App\Livewire\Company\ListCompany;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Department\ListDepartment;
use App\Livewire\Home\HomeComponent;
use App\Livewire\JobTitle\ListJobTitle;
use App\Livewire\ListCity;
use App\Livewire\ListGovernment;
use App\Livewire\Log\ListActivityLog;
use App\Livewire\Origin\ListOrigin;
use App\Livewire\Permission\ListPermission;
use App\Livewire\Project\ListProject;
use App\Livewire\Responsibility\ListResponsibility;
use App\Livewire\Role\ListRole;
use App\Livewire\DecisionType\ListDecisionType;
use App\Livewire\EditRequestOrigin\ListEditRequestOrigin;
use App\Livewire\ListOriginNotifier;
use App\Livewire\Statement\ListStatement;
use App\Livewire\User\ListUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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
    Route::get('/decision-types', ListDecisionType::class)->name('decision.types');
    Route::get('/projects', ListProject::class)->name('projects');
    Route::get('/statements', ListStatement::class)->name('statements');
    Route::get('/origins', ListOrigin::class)->name('origins');
    Route::get('/governments', ListGovernment::class)->name('governments');
    Route::get('/cities', ListCity::class)->name('cities');
    Route::get('/job-titles', ListJobTitle::class)->name('job.titles');
    Route::get('/responsibilities', ListResponsibility::class)->name('responsibilities');
    Route::get('/activity-logs', ListActivityLog::class)->name('activity.logs');
    Route::get('/edit-request-origin', ListEditRequestOrigin::class)->name('edit.request.origin');
    Route::get('/notifications', ListOriginNotifier::class)->name('notifications');

    Route::get('/test-mail', function () {
        $origin = \App\Models\Origin::first(); // or mock object
        $sender = Auth::user() ?? \App\Models\User::find('e28df551-c71f-4c6e-8d4f-27c75d870afa');
        $recipient = User::find('8c82d771-63ae-4740-9ef8-b55a33b5821b'); // change this to an actual recipient ID

        return (new \App\Notifications\CreateOriginNotification($origin, $sender))
            ->toMail($recipient);
    });

    Route::get('/proxy/nominatim', function () {
        $response = Http::get('https://nominatim.openstreetmap.org/search', [
            'format' => 'json',
            'q' => request('q'),
        ]);

        return response()->json($response->json());
    });
});
