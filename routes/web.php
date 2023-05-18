<?php

use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Agents\AddAgentsController;
use App\Http\Controllers\Authentication\LoginController;
// use App\Http\Controllers\Authentication\NewLoginController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Mandate\ConstituencyLevelController;
use App\Http\Controllers\Mandate\NationalLevelController;
use App\Http\Controllers\Mandate\RegionalLevelController;
use App\Http\Controllers\Requests\GetAllRequestConttroller;
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

// Route::get('/', function () {
//     return view('authentication.login');
// });

//LOGIN ROUTE
Route::get('/', [LoginController::class, 'index']);
Route::get('login', [LoginController::class, 'index']);
Route::post('login-api', [LoginController::class, 'login'])->name('login-api');
// Route::post('/login-api', [NewLoginController::class, 'login'])->name('login-api');
Route::post('validate-user-details-api', [LoginController::class, 'validate_user_details']);
Route::post('user-setup-password-api', [LoginController::class, 'user_setup_password']);
Route::post('send-mail', [LoginController::class, 'send_mail']);
Route::post('contact', [LoginController::class, 'contact']);



//MIDDLEWARE
Route::group(['middleware' => ['userAuth']], function () {

    //WELCOME PAGE
    Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');

    //HOME ROUTE8
    Route::get('home', [HomeController::class, 'home'])->name('home');

    //AGENTS ROUTE
    Route::get('/add-agent', [AddAgentsController::class, 'add_agent'])->name('add-agent');
    Route::get('/edit-agent', [AddAgentsController::class, 'edit_agent'])->name('edit-agent');
    Route::get('/agent-list', [AddAgentsController::class, 'agent_list'])->name('agent-list');
    Route::get('/all-agents-list-api', [AddAgentsController::class, 'all_agent_list'])->name('all-agents-list-api');
    Route::post('/create-agent-api', [AddAgentsController::class, 'create_agent'])->name('create-agent-api');
    Route::post('/edit-agent-api', [AddAgentsController::class, 'edit_agent_api'])->name('edit-agent-api');
    Route::post('/get-agent-details', [AddAgentsController::class, 'get_agent_details'])->name('get-agent-details');
    Route::get('/send-agent-message', [AddAgentsController::class, 'send_message'])->name('send-agent-message');
    Route::post('/send-agent-message-api', [AddAgentsController::class, 'message_details'])->name('send-agent-message-api');
    Route::get('/agent-message-replies-api', [AddAgentsController::class, 'message_replies'])->name('agent-message-replies-api');

    Route::post('/send-notification-api', [AddAgentsController::class, "send_notifiation"]);


    Route::post('/unassign-agent-api', [ConstituencyLevelController::class, 'unassign_'])->name('unassign-agent-api');

    //Mandate Route
    Route::get('/national-api', [NationalLevelController::class, 'national'])->name('national-api');
    Route::get('/region/{UserRegion}', [RegionalLevelController::class, 'region'])->name('region');
    Route::get('/region/view-profile', [RegionalLevelController::class, 'view_user_profile']);
    Route::get('/regional', [RegionalLevelController::class, 'regional'])->name('regional/{UserRegion}');
    Route::get('/regional-constituency/{UserRegion}', [RegionalLevelController::class, 'regional_constituency'])->name('regional-constituency/{UserRegion}');
    // Route::get('get-user-details-api', [NationalLevelController::class, 'get_user_details']);

    //
    Route::get('/constituency/{UserConstituency}', [RegionalLevelController::class, 'constituency'])->name('constituency/{UserConstituency}');
    Route::get('/constituency-polling-station/{constituency_name}', [RegionalLevelController::class, 'constituency_polling_station'])->name('/constituency-polling-station/{constituency_name}');

    Route::get('/unassign-agent', [ConstituencyLevelController::class, 'unassign'])->name('unassign-agent');
    // Route::get('/assign-agent', [ConstituencyLevelController::class, 'assign'])->name('assign-agent');


    //ADMINiSTRATION
    Route::get('/create-user', [AdministrationController::class, 'create_admin'])->name('create-user');
    Route::post('/create-admin-user-api', [AdministrationController::class, 'create_admin_user'])->name('create-admin-user-api');

    Route::get('reset-password', [RegionalLevelController::class, "reset_password"]);
    Route::get('forgot-password', [RegionalLevelController::class, "reset_password"]);
    Route::get('delete-regional-user', [RegionalLevelController::class, 'delete_user']);
    Route::get('activate-user', [RegionalLevelController::class, 'activate_user']);
    Route::get('de_activate-user', [RegionalLevelController::class, 'de_activate_user']);

    // UunBlock Or Block Agent
    Route::get('unblock-user', [RegionalLevelController::class, 'unblock_user']);
    Route::get('block-user', [RegionalLevelController::class, 'block_user']);

    Route::get('reset-agent', [RegionalLevelController::class, "reset_agent"]);



    //REGIONAL LIST
    Route::get('all-regional-users', [RegionalLevelController::class, 'all_regional_users']);
    Route::get('get-all-regional-heads-list', [RegionalLevelController::class, 'all_regional_users_list']);

    Route::get('all-constituency-users', [ConstituencyLevelController::class, 'all_constituency_users']);

    Route::get('send-notifications', [RegionalLevelController::class, 'send_notifications']);
    Route::get('reported-issues', [RegionalLevelController::class, 'reported_issues']);
    Route::get('view-profile', [RegionalLevelController::class, 'view_user_profile']);



    Route::get('get-user-details-api', [RegionalLevelController::class, 'get_user_details']);

    //LOGOUT
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


    //REQUEST COLLECTIONS
    Route::get('/get-regions-api', [GetAllRequestConttroller::class, 'get_regions'])->name('get-regions-api');
    Route::get('/get-unassigned-regions-api', [GetAllRequestConttroller::class, 'get_unassigned_regions'])->name('get-unassigned-regions-api');
    Route::get('/get-constituency-api', [GetAllRequestConttroller::class, 'get_constituency'])->name('get-constituency-api');
    Route::get('/get-polling-station-api', [GetAllRequestConttroller::class, 'get_polling_station'])->name('get-polling-station-api');
    Route::get('/get-unassigned-polling-station-api', [GetAllRequestConttroller::class, 'get_unassigned_polling_station'])->name('get-unassigned-polling-station-api');
    Route::get('/get-assigned-polling-stations-api', [GetAllRequestConttroller::class, 'get_assigned_polling_stations'])->name('get-assigned-polling-stations-api');
    Route::get('/get-agents-assignments-api', [GetAllRequestConttroller::class, 'agents_assignments'])->name('get-agents-assignments-api');
    Route::get('/get-all-users-api', [GetAllRequestConttroller::class, 'get_all_users'])->name('get-all-users-api');
});