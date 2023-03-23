<?php

namespace App\Http\Controllers\Payments;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class paymentController extends Controller
{


    //method to return the bulk upload payment screen
    public function bulk_upload_payment()
    {
        return view("pages.payments.bulk_upload_payment");
    }



    //method to return the cardless payment screen
    public function cardless_payment()
    {
        return view("pages.payments.cardless_payment");
    }

    //method to return the korpone loane payment screen
    public function salone_link()
    {

        return view("pages.payments.e_korpor");
    }

    //method to return the order blink payment screen
    public function order_blink_payment()
    {
        return view("pages.payments.order_blink_payment");
    }

    //method to return the pay again payment screen
    public function pay_again_payment()
    {
        return view("pages.payments.pay_again_payment");
    }

    //method to return the qr payment screen
    public function qr_payment()
    {
        return view("pages.payments.qr_payment");
    }

    //method to return the request blink payment screen
    public function request_blink_payment()
    {
        return view("pages.payments.request_blink_payment");
    }

    //method to return the schudule payment screen
    public function schedule_payment()
    {
        return view("pages.payments.schedule_payment");
    }

    public function beneficiary_list()
    {

        return view('pages.payments.payments_beneficiary_list');
    }

    public function airport_tax()
    {
        return view('pages.payments.airport_tax_payment');
    }

    public function paymentBeneficiaries()
    {
        // $userID = session()->get('userId');
        $customerNumber = session()->get('customerNumber');
        $response = Http::get(env('API_BASE_URL') . "/beneficiary/getPaymentBeneficiaries/$customerNumber");
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function airport_tax_payment(Request $request)
    {

        $base_response = new BaseResponse();

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $customerNumber = session()->get('customerNumber');
        $deviceIP = $request->ip();
        $userAlias = session()->get('userAlias');
        // return $userAlias;


        $accountDetails = $request->accountDetails;
        $getAccountDetails = explode("~", $accountDetails);
        // return $getAccountDetails;
        $accountName = $getAccountDetails[1];
        $accountNumber = $getAccountDetails[2];
        $accountCurrency = $getAccountDetails[3];
        $accountCurrencyIsoCode = $getAccountDetails[5];
        $accountMandate = $getAccountDetails[6];
    }
}