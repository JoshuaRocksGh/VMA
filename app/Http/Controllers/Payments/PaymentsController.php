<?php

namespace App\Http\Controllers\Payments;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PaymentsController extends Controller
{

    public function paymentTypes()
    {

        return view('pages.payments.payment_types');
    }

    public function makePayment(Request $req)
    {
        // return $req;
        $base_response = new BaseResponse();


        $data = [
            'accountNumber' => $req->account,
            'amount' => $req->amount,
            'customerName' => session()->get('userId'),
            'customerNumber' => session()->get('customerNumber'),
            'customerPhone' => session()->get('customerPhone'),
            'entrySource' => "MOM",
            'naration' => $req->paymentDescription,
            'payeeName' => $req->payeeName,
            'payeeNumber' => $req->paymentAccount,
            'paymentCode' => $req->payeeName,
            'paymentType' => $req->paymentType,
            // 'pinCode' => $req->pinCode,
        ];


        if (config("app.corporate")) {

            // return $req;
            // return false;

            $authToken = session()->get('userToken');
            $userID = session()->get('userId');
            $userAlias = session()->get('userAlias');
            $customerPhone = session()->get('customerPhone');
            $customerNumber = session()->get('customerNumber');
            $userMandate = session()->get('userMandate');

            $data = [
                "account_no" => $req->account,
                // "authToken" => $authToken,
                "channel" => 'NET',
                'amount' => $req->amount,
                "currency" => $req->accountCurrency,
                "currency_isoCode" => $req->accountCurrCode,
                "postBy" => $userID,
                "account_mandate" => $req->accountMandate,
                "user_mandate" => $userMandate,
                "customerTel" => $customerPhone,
                "transBy" => $userID,
                "user_id" => $userID,
                "customer_no" => $customerNumber,
                "user_alias" => $userAlias,
                'naration' => $req->paymentDescription,
                'payeeName' => $req->payeeName,
                'payeeNumber' => $req->paymentAccount,
                'paymentCode' => $req->payeeName,
                'paymentType' => $req->paymentType,
                'beneficiaryAccount' => $req->beneficiaryAccount,
                'recipientName' => $req->recipientName,

            ];

            // return $data;

            try {
                $response = Http::post(env('CIB_API_BASE_URL') . "payment-gone-for-pending", $data);
                // return $response;
                $result = new ApiBaseResponse();
                return $result->api_response($response);
            } catch (\Exception $e) {
                return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE
            }
        }
        $data["pinCode"] = $req->pinCode;
        try {
            $response = Http::post(env('API_BASE_URL') . "payment/makePayment", $data);
            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {
            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE
        }
    }
}