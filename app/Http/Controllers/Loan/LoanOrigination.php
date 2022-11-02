<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LoanOrigination extends Controller
{

    public function loanOrigination(Request $req)
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $entrySource = env('APP_ENTRYSOURCE');
        $channel = env('APP_CHANNEL');

        $data = [
            "amount" => $req->loanAmount,
            "authToken" => $authToken,
            "customerNumber" => session()->get("customerNumber"),
            "entrySource" => $entrySource,
            "channel" => $channel,
            "facilityType" => "string",
            "introSource" => "string",
            "otherPurpose" => "string",
            "pBranch" => "string",
            "pin" => "string",
            "postedBy" => "string",
            "productCode" => "string",
            "purpose" => "string",
            "sector" => "string",
            "subSector" => "string"
        ];

        $response = Http::post(env('API_BASE_URL') . "/loans/loanQuotation", $data);
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
}