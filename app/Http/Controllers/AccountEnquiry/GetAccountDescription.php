<?php

namespace App\Http\Controllers\AccountEnquiry;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class GetAccountDescription extends Controller
{


    public function getAccounts(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
        ]);
        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {
            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $account_no = $request->accountNumber;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];


        $response = Http::post(env('API_BASE_URL') . "/account/getAccounts", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }




    public function get_account_description(Request $request)
    {

        // return $request;
        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
        ]);

        $base_response = new BaseResponse();
        // VALIDATION
        if ($validator->fails()) {
            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;
        $accountNo = $request->accountNumber;
        $base_response = new BaseResponse();
        $authToken = session()->get('userToken');
        $data = [
            "authToken" => $authToken,
            "userId"    => $accountNo
        ];

        // return $data;
        $response = Http::post(\config('base_urls.api_base_url') . "account/getAccountDescription", $data);
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}