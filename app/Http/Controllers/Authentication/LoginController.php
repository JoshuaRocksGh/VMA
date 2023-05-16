<?php

namespace App\Http\Controllers\Authentication;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'password' => 'required'
        ]);

        $base_response = new BaseResponse();

        // return $request;
        // VALIDATION

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $user_id = strtoupper($request->user_id);
        $password = $request->password;

        $data  = [

            "username" => $user_id,
            "password" => $password

        ];

        // return $data;

        // dd(env('API_BASE_URL') . "userLogin");
        try {

            $response = Http::post(env('API_BASE_URL') . "userLogin", $data);
            // $response = Http::post("localhost/laravel/parliamentary_api/public/api/user-login", $data);
            // return json_decode($response);
            $error = json_decode($response->body());
            if ($response->ok()) {
                $result = json_decode($response->body());
                // return $result;

                // dd($result->message);
                if ($result->message === "success") {

                    $userDetail = $result->data;

                    $userID =  $userDetail->Username;

                    $get_agent = Http::post(env('API_BASE_URL') . "getAllagent");
                    $agent = json_decode($get_agent->body());
                    $agentDetails = $agent->data;




                    session([
                        "UserMandate" => $userDetail->UserMandate,
                        "Region" => $userDetail->Region,
                        "Constituency" => $userDetail->Constituency,
                        "FirstName" => $userDetail->Fname,
                        "Surname" => $userDetail->SurName,
                        "userDetails" => $userDetail,
                        "userID" => $userDetail->Username

                        // "Agents" => $agentDetails,
                    ]);


                    // session([

                    // ]);





                    // return $agentDetails;

                    // foreach ($agentDetails as $agentDetail) {
                    //     $request->session()->push('AgentDetail', [
                    //         'Constituency' => $agentDetail->Constituency,
                    //         'DOB' => $agentDetail->DOB,
                    //         'EducationalLevel' => $agentDetail->EducationalLevel,
                    //         'ElectoralArea' => $agentDetail->ElectoralArea,
                    //         'Fname' => $agentDetail->Fname,
                    //         'Gender' => $agentDetail->Gender,
                    //         'Id' => $agentDetail->Id,
                    //         'Institution' => $agentDetail->Institution,
                    //         'MiddleName' => $agentDetail->MiddleName,
                    //         'Picture' => $agentDetail->Picture,
                    //         'Region' => $agentDetail->Region,
                    //         'SurName' => $agentDetail->SurName,
                    //         'phoneNumber1' => $agentDetail->phoneNumber[0],
                    //         'phoneNumber2' => $agentDetail->phoneNumber[1],
                    //         'phoneNumber3' => $agentDetail->phoneNumber[2]
                    //     ]);

                    // }








                    // return $session ;

                    return  $base_response->api_response($result->status, $result->message,  $result->data); // return API BASERESPONSE
                } else {


                    return  $base_response->api_response($result->status, $result->message,  $result->data); // return API BASERESPONSE

                }
            } else {

                return $base_response->api_response($error->status, $error->message,  NULL); // return API BASERESPONSE
            }

            // die;
            // $result = new ApiBaseResponse();
            // return $result->api_response($response);
        } catch (\Exception $e) {

            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }

    public function validate_user_details(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'first_time_user_id' => 'required',
            'first_time_voter_id' => 'required',
            'first_time_dob' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                "status" => "failed",
                "message" => "All Fields Required",
                "data" => []
            ]);

            // return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $user_id = $request->first_time_user_id;
        $voter_id = $request->first_time_voter_id;
        $dob = $request->first_time_dob;

        $data = [
            "PhoneNumber" => $user_id,
            "ID" => $voter_id,
            "DOB" => $dob,
            "DeviceId" => "null"
        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "userAuthentication", $data);
            return json_decode($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "message" => "Error Occurred",
                "data" => []
            ]);
        }
    }

    public function user_setup_password(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'user_setup_user_id' => 'required',
            'user_setup_user_password' => 'required',
            // 'first_time_dob' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json([
                "status" => "failed",
                "message" => "All Fields Required",
                "data" => []
            ]);

            // return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $user_id = $request->user_setup_user_id;
        $password = $request->user_setup_user_password;

        $data = [
            "PhoneNumber" => $user_id,
            "Password" => $password,
            "DeviceId" => "null",
            "Location" => "null"
        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "userSetup", $data);
            return json_decode($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "message" => "Error Occurred",
                "data" => []
            ]);
        }
    }

    public function send_mail(Request $request)
    {
        // return $request->mailTopic;

        $details = [
            "title" => $request->mailTopic,
            "body" => $request->mailComment
        ];

        Mail::to('elijahashitey002@gmail.com')->send(new SendMail($details));

        return response()->json([
            "responseCode" => "000",
            "message" => "Message Sent",
            "data" => []
        ], 200);
    }

    public function contact(Request $request)
    {
        // return $request->mailTopic;

        // $details = [
        //     "title" => $request->mailTopic,
        //     "body" => $request->mailComment
        // ];

        Mail::to('elijahashitey002@gmail.com')->send(new SendMail($request));

        return response()->json([
            "responseCode" => "000",
            "message" => "Message Sent",
            "data" => []
        ], 200);
    }
}