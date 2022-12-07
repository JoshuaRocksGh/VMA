<?php

namespace App\Http\Controllers;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class transferController extends Controller
{

    public function transfer()
    {
        return view('pages.transfer.transfer');
    }



    public function international_bank()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getBanks");
        return view('pages.transfer.international_bank_beneficiary')->with('banks', $response['data']);
    }

    public function international_bank_()
    {
        return view('pages.transfer.international_bank');
    }

    public function beneficiary_list()
    {
        return view('pages.transfer.beneficiary_list');
    }
    public function forex_request()
    {
        return view('pages.transfer.forex_rate');
    }

    public function transferBeneficiaryList()
    {

        $customerNumber = session()->get('customerNumber');
        $userID = session()->get('userId');
        $response = Http::get(env('API_BASE_URL') . "/beneficiary/getTransferBeneficiaries/$customerNumber");

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function delete_beneficiary(Request $request)
    {
        $beneficiaryId = $request->beneficiaryId;

        return $beneficiaryId;
    }
}
