<?php

namespace App\Http\Controllers\Payments\BulkUpload;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CorporateKorporController extends Controller
{
    //
    public function corporate_initiate_korpor(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'debit_account' => 'required',
            // 'pin_code' => 'required',
            'receiver_address' => 'required',
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'sender_name' => 'required',
            'account_currency' => 'required',
            'account_mandate' => 'required',
            // 'currCode' => 'required'
        ]);



        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $authToken = session()->get('userToken');
        $mandate = session()->get('userMandate');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        $customer_no = session()->get('customerNumber');
        $amount = $request->amount;
        $debitAccount = $request->debit_account;
        $pinCode = $request->pin_code;
        $receiverAddress = $request->receiver_address;
        $receiverName = $request->receiver_name;
        $receiverPhone = $request->receiver_phone;
        $user_ip_address = $request->ip();
        $account_currency = $request->account_currency;
        $currCode = $request->currCode;
        $narration = $request->narration;



        $data = [

            'user_mandate' => $mandate,
            'account_mandate' => $request->account_mandate,
            'postBy' => $sender_name,
            'credit_account' => $receiverPhone,
            'account_no' => $debitAccount,
            'customer_no' => $customer_no,
            'user_alias' => $sender_name,
            'currency' => $account_currency,
            'amount' => $amount,
            'receiver_address' => $receiverAddress,
            'receiver_name' => $receiverName,
            'currCode' => $currCode,
            'narration' => $narration,
            'userID' => $userID
        ];

        // return $data;


        try {

            // dd(env('CIB_API_BASE_URL') . "send-korpor-gone-for-pending");

            $response = Http::post(env('CIB_API_BASE_URL') . "send-korpor-gone-for-pending", $data);


            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {


            return response()->json([]);
            return $response;
            return false;
            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return $base_response->api_response('500', "Internal Server Error",  NuLL); // return API BASERESPONSE


        }
    }

    public function corporate_reverse_korpor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reference_no' => 'required',
            'receiver_phoneNo' => 'required',
            'accountNumber' => 'required',
            'accountCurrency' => 'required',
            'accountMandate' => 'required',
            'accountCurrCode' => 'required'
        ]);


        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request ;

        $authToken = session()->get('userToken');
        $mandate = session()->get('userMandate');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        $customer_no = session()->get('customerNumber');
        $api_headers = session()->get("headers");
        $reference_no = $request->reference_no;
        $receiver_phoneNo = $request->receiver_phoneNo;
        $accountNumber = $request->accountNumber;
        $accountCurrency = $request->accountCurrency;
        $accountMandate = $request->accountMandate;
        $accountCurrCode = $request->accountCurrCode;

        // dd(env('API_BASE_URL') . "payment/unredeemedKorpor/",$accountNumber);

        $data = [
            'accountNumber' => $accountNumber
        ];

        // return $data ;

        // dd(env('API_BASE_URL') . "payment/unredeemedKorpor/{$accountNumber}");

        $responses = Http::get(env('API_BASE_URL') . "payment/unredeemedKorpor/{$accountNumber}");

        // dd($responses['data']);

        foreach ($responses['data'] as $response) {

            if ($reference_no == $response['REMITTANCE_REF']) {
                dd("Equal");
            } else {
                dd("Not Equal");
            };

            // dd($response['REMITTANCE_REF']);
            // $response['daa']
            // if($response['parent'] == 0){
            //     echo $menu['name'];
            // }
        }

        // return response()->json([
        //     'responseCode' => "750",
        //     'message' => "Unredeemed Details" ,
        //     'data'=> $response['data']
        // ]);

        // if($response->responseCode == "000"){

        // }



    }
}