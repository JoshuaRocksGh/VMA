<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AtmCardRequestController extends Controller
{
    //
    public function atm_card_request(Request $request)
    {

        $authToken = session()->get('userToken');
        $data = [
            "accountNumber" => $request->accountNumber,
            "branch" => $request->pickUpBranch,
            "cardNumber" => null,
            "channel" => 'NET',
            "entrySource" => "I",
            "pinCode" => $request->pinCode,
            "tokenID" => $authToken,
            "secondaryAccounts" => [""]
        ];
        $response = Http::post(env('API_BASE_URL') . "/request/atmCard", $data);
        $result = new ApiBaseResponse();
        return  $result->api_response($response);
    }

    public function activate_card_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_no' => 'required',
            'type_of_card' => 'required',
            'card_number' => 'required',
            'pin' => 'required'
        ]);

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;


        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $cardType = $request->type_of_card;
        $accountNumber = $request->account_no;
        $pin_code = $request->pin;
        $card_number = $request->card_number;

        $data = [
            "accountNumber" => $accountNumber,
            "branch" => null,
            "cardNumber" => $card_number,
            "channel" => "NET",
            "entrySource" => "I",
            "pinCode" => $pin_code,
            "tokenID" => $authToken
        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "/request/activateCard", $data);

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

    public function block_card_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_no' => 'required',
            'type_of_card' => 'required',
            'card_number' => 'required',
            'pin' => 'required'
        ]);

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;


        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $cardType = $request->type_of_card;
        $accountNumber = $request->account_no;
        $pin_code = $request->pin;
        $card_number = $request->card_number;

        $data = [
            "accountNumber" => $accountNumber,
            "branch" => null,
            "cardNumber" => $card_number,
            "channel" => "NET",
            "entrySource" => "I",
            "pinCode" => $pin_code,
            "tokenID" => $authToken
        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "/request/blockCard", $data);

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
