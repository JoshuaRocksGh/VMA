<?php

namespace App\Http\Controllers\AccountEnquiry;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountEnquiryController extends Controller
{
    //method to return the account enquiry screen
    public function account_enquiry(Request $request)
    {

        return view('pages.accountEnquiry.accountEnquiry', [
            'accountNumber' => $request->query('ac')
        ]);
    }

    public function my_accounts()
    {
        return view('pages.accountEnquiry.myAccounts');
    }

    public function list_of_accounts()
    {
        return view('pages.accountEnquiry.listOfAccounts');
    }

    public function print_account_statement(Request $request)
    {

        return view('pages.accountEnquiry.print_statement', [
            'accountNumber' => $request->query('ac'),
            'startDate' => $request->query('sd'),
            'endDate' => $request->query('ed'),
        ]);
    }

    public function account_transaction_history(Request $request)
    {
        $accountNumber = $request->accountNumber;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $transLimit = $request->transLimit;

        $result = new ApiBaseResponse();

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');


        $data = [
            // "authToken" => $authToken,
            // "userId"    => $userID
            "accountNumber" => $accountNumber,
            "authToken" =>  $authToken,
            "endDate" => $endDate,
            "entrySource" => "A",
            "startDate" => $startDate,
            "transLimit" => $transLimit


        ];
        // return $data;
        // return env('API_BASE_URL') . "account/getTransactions";

        $response = Http::post(env('API_BASE_URL') . "account/getTransactions", $data);


        return $result->api_response($response);
    }


    // public function print_account_statement_history(Request $request)
    // {
    //     $accountNumber = $request->accountNumber;
    //     $startDate = $request->startDate;
    //     $endDate = $request->endDate;
    //     $transLimit = $request->transLimit;

    //     $result = new ApiBaseResponse();

    //     $authToken = session()->get('userToken');
    //     $userID = session()->get('userId');


    //     $data = [
    //         // "authToken" => $authToken,
    //         // "userId"    => $userID
    //         "accountNumber" => $accountNumber,
    //         "authToken" =>  $authToken,
    //         "endDate" => $endDate,
    //         "entrySource" => "string",
    //         "startDate" => $startDate,
    //         "transLimit" => $transLimit


    //     ];
    //     // return $data;
    //     // return env('API_BASE_URL') . "account/getTransactions";

    //     $response = Http::post(env('API_BASE_URL') . "account/getTransactions", $data);


    //     return $result->api_response($response);
    // }
    public function accountTransDocument(Request $res)
    {
        $response = Http::post(env('API_BASE_URL') . "/account/transDocuments/" . $res->batchNumber);
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }


    public function account_balance_info(Request $request)
    {
        $accountNumber = $request->accountNumber;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $result = new ApiBaseResponse();

        $data = [
            "authToken" => $authToken,
            "userId" => $accountNumber
        ];


        $response = Http::post(env('API_BASE_URL') . "account/getAccountDescription", $data);


        return $result->api_response($response);
    }
}
