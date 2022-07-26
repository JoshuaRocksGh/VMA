<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class StatementRequestController extends Controller
{
    //method to check the statement request for the method
    public function statement_request(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'account_no' => 'required',
            'type_of_statement' => 'required',
            // 'pick_up_branch' => 'required',
            'transStartDate' => 'required',
            'transEndDate' => 'required',
            'medium' => 'required',
            'pin' => 'required'
        ]);
        // return $request;



        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };


        $authToken = session()->get('userToken');
        $userID = session()->get('userAlias');
        $customerNumber = session()->get('customerNumber');
        // return $authToken;

        // $base_response = new BaseResponse();
        $deviceIp = request()->ip();

        $accountNumber = $request->account_no;
        $branchCode = $request->pick_up_branch;
        $deviceIP = $request->deviceIP;
        $entrySource = $request->entrySource;
        $pincode = $request->pin;
        $startDate = $request->transStartDate;
        $endDate = $request->transEndDate;
        $statementType = $request->type_of_statement;
        $medium = $request->medium;

        $data = [

            "accountNumber" => $accountNumber,
            // "medium" => $medium,
            "channel" => "NET",
            "branch" => $branchCode,
            "deviceIP" => $deviceIp,
            "endDate" => $endDate,
            "entrySource" => "I",
            "pinCode" => $pincode,
            "startDate" => $startDate,
            "statementType" => $statementType,
            "tokenID" => $authToken,
            // "userID" => $userID,
            // "customer_num" => $customerNumber

        ];

        // return $data;


        try {
            $response = Http::post(env('API_BASE_URL') . "/request/statment", $data);

            // dd($response);
            // return $response;
            $result = new ApiBaseResponse();

            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);
            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE

        }
    }
}