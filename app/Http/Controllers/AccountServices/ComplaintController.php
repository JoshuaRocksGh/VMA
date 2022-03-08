<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Support\Facades\Http;

class ComplaintController extends Controller
{

    public function getServiceType()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getServiceTypes");
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function make_complaint_api(Request $request)
    {

        $data = [
            "accountNumber" => $request->accountNumber,
            "serviceType" => $request->serviceType,
            "description" => $request->description,
            "request_type" => 'comp'
        ];

        $response = Http::post(env('API_BASE_URL') . "/user/customerEnquiry", $data);
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function api_response($response_code = '500', $message = '', $data = NULL)
    {
        return response()->json([
            'responseCode' => $response_code,
            'message' => $message,
            'data' => $data
        ], 200);
    }
}
