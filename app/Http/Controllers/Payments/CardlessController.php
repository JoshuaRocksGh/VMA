<?php

namespace App\Http\Controllers\Payments;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CardlessController extends Controller
{
    public function initiate_cardless(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'debit_account' => 'required',
            'pin_code' => 'required',
            'receiver_address' => 'required',
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'sender_name' => 'required'
        ]);

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        $authToken = session()->get('userToken');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        $amount = $request->amount;
        $debitAccount = $request->debit_account;
        $pinCode = $request->pin_code;
        $receiverAddress = $request->receiver_address;
        $receiverName = $request->receiver_name;
        $receiverPhone = $request->receiver_phone;
        $fee = $request->fee;
        $user_ip_address = $request->ip();

        $data = [
            "amount" => $amount,
            "debitAccount" => $debitAccount,
            "deviceIP" => $user_ip_address,
            "fee" => '0',
            "pinCode" => $pinCode,
            "receiverAddress" => $receiverAddress,
            "receiverName" => $receiverName,
            "receiverPhone" => $receiverPhone,
            "senderName" => $sender_name,
            "tokenID" => $authToken

        ];

        try {

            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/cardless", $data);
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

    public function getCardlessHistoryByType(Request $request)
    {

        $api_headers = session()->get("headers");
        $url = "payment/" . $request->type . "Cardless" . "/" . $request->accountNumber;
        // return $url;
        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . $url);
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
    //method to send reversed cardless request for list of reversed cardless transactions.
    public function send_reversed_request(Request $request)
    {
        $api_headers = session()->get("headers");
        $accountNumber = $request->accountNo;
        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "payment/reversedCardless/$accountNumber");
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    public function cardless_otp(Request $request)
    {
        $api_headers = session()->get('headers');
        $remittance_no = $request->remittance_no;
        $receiverPhone = $request->mobile_no;

        $data = [
            "beneficiaryTel" => $receiverPhone,
            "remittanceNumber" => $remittance_no
        ];
        try {
            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/cardlessOTP", $data);
            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);
        }
    }

    public function redeem_cardless(Request $request)
    {
        $api_headers = session()->get('headers');
        $redeem_amount = $request->redeem_amount;
        $redeem_receiver_name = $request->redeem_receiver_name;
        $redeem_receiver_phone = $request->redeem_receiver_phone;
        $redeem_account = $request->redeem_account;
        $redeem_remittance_no = $request->redeem_remittance_no;
        $otp_number = $request->otp_number;
        // return $user_ip_address ;

        $data = [
            "amount" => $redeem_amount,
            "beneficiaryName" => $redeem_receiver_name,
            "beneficiaryTel" => $redeem_receiver_phone,
            "creditAccount" => $redeem_account,
            "otpNumber" => $otp_number,
            "remittanceNumber" => $redeem_remittance_no
        ];
        try {
            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/redeemCardless", $data);
            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);
        }
    }

    //method to show redeemed cardless transactions...
    public function send_redeemed_request(Request $request)
    {
        $api_headers = session()->get("headers");
        $accountNumber = $request->accountNo;
        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "payment/redeemedCardless/$accountNumber");
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
    public function reverse_cardless(Request $request)
    {
        $base_response = new BaseResponse();
        $userID = session()->get('userId');
        $api_headers = session()->get("headers");
        $data = [
            "beneficiaryMobileNo" => $request->beneficiaryMobileNo,
            "customberNumber" => session()->get('customerNumber'),
            "pinCode" => $request->pinCode,
            "postedBy" => $userID,
            "referenceNo" => $request->referenceNo,
            "brand" => "string",
            "country" => "string",
            "deviceId" => "string",
            "deviceName" => "string",
            "entrySource" => "string",
            "manufacturer" => "string",
            "userName" => $userID
        ];
        try {

            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/reverseCardless", $data);
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

    public function bulk_cardless()
    {
        return view('pages.payments.cardless.bulk_cardless');
    }

    public function bulk_cardless_detail()
    {
        return view('pages.payments.cardless.bulk_cardless_details');
    }
}
