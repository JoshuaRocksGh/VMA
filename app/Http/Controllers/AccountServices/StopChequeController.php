<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StopChequeController extends Controller
{
    //function or method to hit the cheque book request api
    public function submit_stop_cheque_book_request(Request $request)
    {
        // return $request;

        // return [
        //     'responseCode' => '000',
        //     'message' => 'Request sent for stop cheque',
        //     'data' => null
        // ];

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $accountNumber = $request->accountNumber;
        $numberOfLeaves = $request->numberOfLeaves;
        $branchCode = $request->branchCode;
        $pinCode = $request->pinCode;

        $data = [

            "accountNumber" => $accountNumber,
            "branch" => $branchCode,
            "deviceIP" => "A",
            "numberOfLeaves" => $numberOfLeaves,
            "pinCode" => $pinCode,
            "tokenID" => $authToken

        ];

        $response = Http::post(env('API_BASE_URL') . "/request/chequeBook", $data);
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}