<?php

namespace App\Http\Controllers\Admin;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdministrationController extends Controller
{
    //
    public function create_admin()
    {
        $UserMandate = session()->get('UserMandate');
        // return $UserMandate;
        if ($UserMandate == "ConstituencyLevel") {
            $UserConstituency_ = session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                return view('pages.admin.create_admin_users', ['UserConstituency' => $UserConstituency]);
                // return view('pages.agents.edit_agent');
            } else {
                return view('pages.admin.create_admin_users', ['UserConstituency' => $UserConstituency_]);
                // return view('pages.agents.edit_agent', ['UserConstituency' => $UserConstituency_]);
            }
        } elseif ($UserMandate == "RegionalLevel") {
            $UserRegion_ = session()->get('Region');
            // return $UserRegion_;
            if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
                $UserRegion = str_replace(' ', '_', $UserRegion_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserRegion_;
                // return view('pages.agents.edit_agent', ['UserRegion' => $UserRegion]);
                return view('pages.admin.create_admin_users', ['UserRegion' => $UserRegion]);
            } else {
                return view('pages.admin.create_admin_users', ['UserRegion' => $UserRegion_]);
                // return view('pages.agents.edit_agent', ['UserRegion' => $UserRegion_]);
            }
        } else {
            return view('pages.admin.create_admin_users');
        }
        // return view('pages.admin.create_admin_users');
    }

    public function create_admin_user(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            "first_name" => "required",
            "last_name" => "required",
            "phone_number" => "required",
            "voters_id" => "required",
            "user_mandate" => "required",
            // "user_region" => "required",
            // "user_constituency" =>  "required",
            'admin_id' => 'required',
            'admin_password' => 'required'
        ]);

        $base_response = new BaseResponse();

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $user_constituency_ = $request->user_constituency;
        $constituency_split = (explode("~", $user_constituency_));

        $user_constituency = $constituency_split[0];
        $user_id = strtoupper($request->admin_id);
        $password = $request->admin_password;
        $mandate = $request->user_mandate;

        if ($mandate == "NationalLevel") {
            $data = [
                "Fname" => $request->first_name,
                "SurName" => $request->last_name,
                "PhoneNumber" => $request->phone_number,
                "Id" => $request->voters_id,
                "UserMandate" => $request->user_mandate,
                "Region" => $request->user_region,
                "Constituency" =>  "ALL",
                "Username" => $user_id,
                "Password" => $password,
                "FirstTime" => true,
                "Active" => true,
                "Picture" => "",
                "PhoneNumber2" => $request->secondary_phone_number,
                "PhoneNumber3" => $request->other_phone_number,
                "MiddleName" => $request->middle_name,
                "DOB" => $request->dob,
                "Gender" => $request->gender
            ];
        } elseif ($mandate == "RegionalLevel") {
            $data = [
                "Fname" => $request->first_name,
                "SurName" => $request->last_name,
                "PhoneNumber" => $request->phone_number,
                "Id" => $request->voters_id,
                "UserMandate" => $request->user_mandate,
                "Region" => $request->user_region,
                "Constituency" =>  "ALL",
                "Username" => $user_id,
                "Password" => $password,
                "FirstTime" => true,
                "Active" => true,
                "Picture" => "",
                "PhoneNumber2" => $request->secondary_phone_number,
                "PhoneNumber3" => $request->other_phone_number,
                "MiddleName" => $request->middle_name,
                "DOB" => $request->dob,
                "Gender" => $request->gender
            ];
        } elseif ($mandate == "ConstituencyLevel") {
            $data = [
                "Fname" => $request->first_name,
                "SurName" => $request->last_name,
                "PhoneNumber" => $request->phone_number,
                "Id" => $request->voters_id,
                "UserMandate" => $request->user_mandate,
                "Region" => $request->user_region,
                "Constituency" => $user_constituency,
                "Username" => $user_id,
                "Password" => $password,
                "FirstTime" => true,
                "Active" => true,
                "Picture" => "",
                "PhoneNumber2" => $request->secondary_phone_number,
                "PhoneNumber3" => $request->other_phone_number,
                "MiddleName" => $request->middle_name,
                "DOB" => $request->dob,
                "Gender" => $request->gender
            ];
        }

        // $data  = [

        //     "username" => $user_id,
        //     "password" => $password

        // ];
        // return $data;



        try {

            $response = Http::post(env('API_BASE_URL') . "userCreation", $data);
            return json_decode($response);
            // dd($response);
            // return response()->json([
            //     'responseCode' => '556',
            //     'message' => "Agent Creation API",
            //     'data' => $response
            // ], 200);

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return response()->json([
                "status" => "failed",
                "message" => "Internal Server Error",
                "data" => []
            ]);
            // return $base_response->api_response('500', "Internal Server Error",  NULL);


        }
    }
}