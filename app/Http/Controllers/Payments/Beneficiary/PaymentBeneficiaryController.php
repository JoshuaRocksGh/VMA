<?php

namespace App\Http\Controllers\Payments\Beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentBeneficiaryController extends Controller
{

    public function savePaymentBeneficiary(Request $request)
    {

        $base_response = new BaseResponse();
        $userID = session()->get('userId');
        $entrySource = env('APP_ENTRYSOURCE');
        $channel = env('APP_CHANNEL');
        $customerNumber = session()->get('customerNumber');

        $data = [
            "account" => $request->account,
            "beneID" => $request->Id,
            "nickname" => $request->nickname,
            "payeeName" => $request->payeeName,
            "paymentType" => $request->paymentType,
            "securityDetails" =>
            [
                "approvedBy" => $request->approvedBy,
                "approvedDateTime" => date('Y-m-d'),
                "createdBy" => $customerNumber,
                "createdDateTime" => date('Y-m-d'),
                "entrySource" => $entrySource,
                "channel" => $channel,
                "modifyBy" => $request->modifyBy,
                "modifyDateTime" => date('Y-m-d')

            ],
            "userID" => $customerNumber
        ];
        // Log::alert($data);
        // return $data ;
        // dd(env('API_BASE_URL') . "beneficiary/addPaymentBeneficiary");

        try {
            if ($request->mode === "EDIT") {
                $response = Http::put(env('API_BASE_URL') . "/beneficiary/updatePaymentBeneficiary", $data);
            } else {
                $response = Http::post(env('API_BASE_URL') . "/beneficiary/addPaymentBeneficiary", $data);
            }

            // return json_decode($response->body());

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            return $base_response->api_response('500', "CONNECTION ERROR",  NULL); // return API BASERESPONSE


        }
    }

    public function deletePaymentBeneficiary(Request $req)
    {
        $response = Http::delete(
            env('API_BASE_URL') . "/beneficiary/deletePaymentBeneficiary/" . $req->beneficiaryId
        );
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}
