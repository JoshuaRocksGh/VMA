<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ChequeBookRequestController extends Controller
{
    //function or method to hit the cheque book request api
    public function cheque_book_request(Request $request)
    {


        $authToken = session()->get('userToken');


        $data = [

            "accountNumber" => $request->accountNumber,
            "branch" => $request->branchCode,
            "deviceIP" => "A",
            "Channel" => "NET",
            "numberOfLeaves" => $request->leaflets,
            "pinCode" => $request->pinCode,
            "tokenID" => $authToken

        ];
        // return ($data);
        $response = Http::post(env('API_BASE_URL') . "/request/chequeBook", $data);
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function corporate_cheque_book_request(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
            'branchCode' => 'required',
            'leaflet' => 'required',
            'account_mandate' => 'required'
        ]);


        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        return $request;


        $userID = session()->get('userId');
        $userAlias = session()->get('userAlias');
        $customerNumber = session()->get('customerNumber');
        $userMandate = $request->account_mandate;
        $userAlias = session()->get('userAlias');
        $accountNumber = $request->accountNumber;
        $branchCode = $request->branchCode;
        $numberOfLeaves = $request->leaflet;
        $deviceIP = $request->ip();
        $postBy = session()->get('userAlias');
        $transBy = session()->get('userAlias');

        //         'customer_no' => 'required',
        // 'account_mandate' => 'required',
        // 'user_id' => 'required',
        // 'user_alias' => 'required',
        // 'accountNumber' => 'required',
        // 'branch' => 'required',
        // 'deviceIP' => 'required',
        // 'entrySource' => 'required',
        // 'numberOfLeaves' => 'required',


        $data = [

            "user_id" => $userID,
            "user_name" => $userAlias,
            "customer_no" => $customerNumber,
            "account_mandate" => $userMandate,
            // "user_id" = $userID,
            "account_no" => $accountNumber,
            "branch_code" => $branchCode,
            // "deviceIP" => $deviceIP,
            "leaflet" => $numberOfLeaves,
            'postedBy' => $postBy,
            'transBy' => $transBy

        ];

        // return $data;


        try {

            // dd((env('CIB_API_BASE_URL') . "chequebook-request"));

            $response = Http::post(env('CIB_API_BASE_URL') . "chequebook-request", $data);
            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
            // return json_decode($response->body();

        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }
}
