<?php

namespace App\Http\Controllers\Corporate\Approvals;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ApprovedRequestController extends Controller
{
    //
    public function approved_request(Request $request) {

        $validator = Validator::make($request->all(), [
            'customer_no' => 'required',
            'request_id' => 'required'
        ]);



        // return $request_id ;

        $base_response = new BaseResponse();

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $customer_no = $request->customer_no;
        $request_id = $request->request_id;
        $usermadate = session()->get('userMandate');
        $userId = session()->get('userId');
        $userAlias = session()->get('userAlias');
        $userToken = session()->get('userToken');
        $deviceIp = $request->ip();

        $data = [
            "authToken" => $userToken,
            "deviceIp" => $deviceIp,
            "user_mandate" => $usermadate,
            "user_id" => $userId,
            "request_id" => $request_id,
            "user_alias" => $userAlias,
            "customer_no" => $customer_no
        ];

        // return $data ;

        // return env('CIB_API_BASE_URL') . "request-approval";

        try {

            $response = Http::post(env('CIB_API_BASE_URL') . "request-approval", $data);

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