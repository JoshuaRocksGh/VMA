<?php

use App\Http\Controllers\API\AccountEnquiryController;
use App\Http\Controllers\API\Authentication\LoginController;
use App\Http\Controllers\API\Authentication\TransferController;
use App\Http\Controllers\API\Transfer\OwnAccountController;
use App\Http\Controllers\BENEFICIARY\Transfer\SameBankController as TransferSameBankController;
use App\Http\Controllers\BENEFICIARY\Transfer\LocalBankController as TransferLocalBankController;
use App\Http\Controllers\GeneralFunctions\FunctionsController;
use App\Http\Controllers\SelfEnroll;
use App\Http\Controllers\SelfEnrollController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/login', [LoginController::class, 'login_'])->name('login');

// Route::post('/add-same-bank-beneficiary',[TransferController::class,'same_bank_beneficiary_'])->name('same-bank-beneficiary');
// Route::get('/own-account-api', [OwnAccountController::class, 'own_account_'])->name('own-account-api');
// Route::post('/own-account-api', [OwnAccountController::class, 'own_account_transfer'])->name('own-account-api');

// Route::post('/add-same-bank-beneficiary-api', [TransferSameBankController::class, 'same_bank_benefiaciary_'])->name('same-bank-beneficiary');
// Route::post('/add-local-bank-beneficiary-api', [TransferLocalBankController::class, 'local_bank'])->name('local-bank-beneficiary-api');

// TRANSFER BENEFICIARY


// Savings Account Creation

// ACCOUNT ENQUIRY
// Route::post('/account-transactions', [AccountEnquiryController::class, 'account_transactions'])->name('account-transactions');
// Route::post('/account-balance-info', [AccountEnquiryController::class, 'account_balance_info'])->name('account-balance-info');
// Route::get('/get-accounts-api', [FunctionsController::class, 'get_accounts'])->name('get-accounts-api');