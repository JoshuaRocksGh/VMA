<?php

namespace App\Http\Controllers\Settings;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class ChangePasswordController extends Controller
{
    //

    public function change_password(Request $request)
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $new_password = $request->new_password;
        $old_password = $request->old_password;
        $security_answer = $request->security_answer;

        $data = [

            "authToken" => $authToken,
            "deviceId" => "A",
            "newPassword" => $new_password,
            "oldPassword" => $old_password,
            "securityAnswer" => $security_answer
        ];
        // return $data;

        $response = Http::post(env('API_BASE_URL') . "/user/changePassword", $data);

        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    public function post_chnage_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "security_question" => 'required',
            "security_answer" => 'required',
            "new_password" => 'required',
            "user_id" => 'required',

        ]);

        $base_response = new BaseResponse();

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $deviceIp = request()->ip();
        $deviceCountry = Location::get()->countryName;
        $str = $request->user_id;
        $userID = strtoupper($str);

        $data = [
            "authToken" => $authToken,
            "deviceBrand" => "A",
            "deviceCountry" => '',
            "deviceId" => "A",
            "deviceIp" => $deviceIp,
            "deviceModel" => "A",
            "password" => $request->new_password,
            "securityAnswer" => $request->security_answer,
            "securityQuestion" => $request->security_question,
            "userId" => $userID
        ];

        // return $data;
        // dd($data);

        $response = Http::post(env('API_BASE_URL') . "/user/initialPasswordSetup", $data);

        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
}