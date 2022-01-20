<?php

namespace App\Http\Controllers\Corporate\GeneralFunctions;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FunctionsController extends Controller
{
    //


    public function get_pending_requests(Request $request)
    {
        // return $request;
        $customerNumber = $request->query('customerNumber');
        $requestStatus = $request->query('requestStatus');

        // return ('Welcome');

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        // dd((env('CIB_API_BASE_URL') . "/pending-request-api?customerNumber=$customerNumber&requestStatus=$requestStatus"));

        $response = Http::get(env('CIB_API_BASE_URL') . "pending-request-api?customerNumber=$customerNumber&requestStatus=$requestStatus");

        // return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function get_transfer_requests(Request $request)
    {
        $customerNumber = $request->customerNumber;
        $base_response = new BaseResponse();

        // dd(env('API_BASE_URL') . "transfers/achBankTransferStatus/$customerNumber");

        $response = Http::get(env('API_BASE_URL') . "transfers/achBankTransferStatus/$customerNumber");

        // return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}