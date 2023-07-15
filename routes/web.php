<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Files\ChordController;
use App\Http\Controllers\Files\LyricController;
use App\Http\Controllers\Files\InternetController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\Account\SecurityController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Files\Services\HarpController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\EmployeeInfoController;
use App\Http\Controllers\Event\EventRegistration;
use App\Http\Controllers\Event\EventRegistrationController;
use App\Http\Controllers\Files\Services\SacredAssemblyController;
use App\Http\Controllers\GenerateDocumentController;
use App\Http\Controllers\OrgDataController;
use App\Http\Controllers\OrgListController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\TrackDocumentController;
use App\Http\Controllers\Website\VideosController;
use App\Models\GenerateDocument;
use App\Models\StudentInfo;

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



$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

Route::middleware('auth', 'role:super-admin')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::put('roles/{role}/permission', [RoleController::class, 'assignPermission'])->name('roles.assign');
    Route::delete('roles/{role}/permission/{permission}', [RoleController::class, 'deletePermission'])->name('roles.delete_permission');

    Route::resource('permissions', PermissionController::class);
    Route::put('permissions/{permission}/role', [PermissionController::class, 'assignRole'])->name('permissions.assign');
    Route::delete('permissions/{permission}/role/{role}', [PermissionController::class, 'deleteRole'])->name('permissions.delete_roles');

    Route::resource('users', UserController::class);
    Route::put('users/{user}/roles', [UserController::class, 'assignRole'])->name('user.assign_role');
    Route::delete('users/{user}/roles/{role}', [UserController::class, 'deleteRole'])->name('user.delete_role');
    Route::put('users/{user}/permissions', [UserController::class, 'assignPermission'])->name('user.assign_permission');
    Route::delete('users/{user}/permissions/{permission}', [UserController::class, 'deletePermission'])->name('user.delete_permission');

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});


// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

Route::middleware('auth')->group(function () { //verified

    Route::get('/', function () {
        return redirect('index');
    });
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    Route::prefix('account')->group(function () {
        Route::get('security', [SecurityController::class, 'index'])->name('security.index');
        Route::put('security', [SecurityController::class, 'update'])->name('security.update');
        Route::put('security/email', [SecurityController::class, 'changeEmail'])->name('security.changeEmail');
        Route::put('security/password', [SecurityController::class, 'changePassword'])->name('security.changePassword');
    });

    // Route::prefix('projects')->group(function () {
    Route::get('project', [ProjectsController::class, 'index'])->name('project.index');
    Route::put('project', [ProjectsController::class, 'update'])->name('project.update');
    // });

    Route::resource('generate-document', GenerateDocumentController::class);
    // MY CODE
    Route::match(['get', 'post'], 'validate-signed-pdf', [GenerateDocumentController::class, 'readHashOnly'])->name('readHashOnly');
    // Route::get('track-document/{search}', [TrackDocumentController::class, 'index'])->name('search-docs');


    Route::resource('org/list', OrgListController::class);
    Route::resource('generate-document', GenerateDocumentController::class);
    Route::resource('org-data', OrgDataController::class);
    Route::resource('student-info', StudentInfoController::class);
    Route::resource('employee-info', EmployeeInfoController::class);
    Route::resource('track-document', TrackDocumentController::class);
    Route::put('student-info/change-password/{id}', [StudentInfoController::class, 'changePass'])->name('student.change.pass');
    Route::put('employee-info/change-password/{id}', [EmployeeInfoController::class, 'changePass'])->name('employee.change.pass');
    Route::put('adviser-approved/{id}', [GenerateDocumentController::class, 'adviserApproved'])->name('adviser-approved');
    Route::delete('adviser-dissapproved/{id}', [GenerateDocumentController::class, 'adviserDissapproved'])->name('adviser-dissapproved');

    Route::put('osas-approved/{id}', [GenerateDocumentController::class, 'osasApproved'])->name('osas-approved');
    Route::delete('osas-dissapproved/{id}', [GenerateDocumentController::class, 'osasDissapproved'])->name('osas-dissapproved');

    Route::resource('setup', SetupController::class);
});


/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
