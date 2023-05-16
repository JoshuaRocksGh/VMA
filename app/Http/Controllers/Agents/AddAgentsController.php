<?php

namespace App\Http\Controllers\Agents;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddAgentsController extends Controller
{
    //

    public function add_agent()
    {
        $UserMandate = session()->get('UserMandate');
        if ($UserMandate == "ConstituencyLevel") {
            $UserConstituency_ = session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                return view('pages.agents.add_agents', ['UserConstituency' => $UserConstituency]);
            } else {
                return view('pages.agents.add_agents', ['UserConstituency' => $UserConstituency_]);
            }
        } elseif ($UserMandate == "RegionalLevel") {
            $UserRegion_ = session()->get('Region');
            if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
                $UserRegion = str_replace(' ', '_', $UserRegion_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                return view('pages.agents.add_agents', ['UserRegion' => $UserRegion]);
            } else {
                return view('pages.agents.add_agents', ['UserRegion' => $UserRegion_]);
            }
        } else {
            return view('pages.agents.add_agents');
        }
        // return view('pages.agents.add_agents', ['UserConstituency' => $UserConstituency]);

        // return $UserConstituency;

    }

    public function edit_agent()
    {
        $UserMandate = session()->get('UserMandate');
        if ($UserMandate == "ConstituencyLevel") {
            $UserConstituency_ = session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                return view('pages.agents.edit_agent', ['UserConstituency' => $UserConstituency]);
            } else {
                return view('pages.agents.edit_agent', ['UserConstituency' => $UserConstituency_]);
            }
        } elseif ($UserMandate == "RegionalLevel") {
            $UserRegion_ = session()->get('Region');
            if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
                $UserRegion = str_replace(' ', '_', $UserRegion_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                return view('pages.agents.edit_agent', ['UserRegion' => $UserRegion]);
            } else {
                return view('pages.agents.edit_agent', ['UserRegion' => $UserRegion_]);
            }
        } else {
            return view('pages.agents.edit_agent');
        }
    }

    public function agent_list()
    {
        $UserMandate = session()->get('UserMandate');
        // return $UserMandate;
        if ($UserMandate == "ConstituencyLevel") {
            $UserConstituency_ = session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                $AgentDetails = session()->get('Agents');
                return view('pages.agents.agent_list', ['AgentDetails' => $AgentDetails, 'UserConstituency' => $UserConstituency, "UserMandate" => $UserMandate]);
                // return view('pages.agents.add_agents', ['UserConstituency' => $UserConstituency]);
            } else {
                $AgentDetails = session()->get('Agents');
                return view('pages.agents.agent_list', ['AgentDetails' => $AgentDetails, 'UserConstituency' => $UserConstituency_, "UserMandate" => $UserMandate]);
                // return view('pages.agents.add_agents', ['UserConstituency' => $UserConstituency_]);
            }
        } elseif ($UserMandate == "RegionalLevel") {
            $UserRegion_ = session()->get('Region');
            // return $UserRegion_;

            if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
                $UserRegion = str_replace(' ', '_', $UserRegion_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserRegion;
                $AgentDetails = session()->get('AgentDetail');
                return view('pages.agents.agent_list', ['AgentDetails' => $AgentDetails, "UserRegion" => $UserRegion, "UserMandate" => $UserMandate]);
                // return view('pages.agents.add_agents', ['UserRegion' => $UserRegion]);

            } else {
                $AgentDetails = session()->get('AgentDetail');
                return view('pages.agents.agent_list', ['AgentDetails' => $AgentDetails, "UserRegion" => $UserRegion_, "UserMandate" => $UserMandate]);
                // return view('pages.agents.add_agents', ['UserRegion' => $UserRegion_]);
            }
        } else {
            $AgentDetails = session()->get('AgentDetail');
            return view('pages.agents.agent_list', ['AgentDetails' => $AgentDetails, "UserMandate" => $UserMandate]);
        }
    }

    public function all_agent_list()
    {


        // $AgentDetails = session()->get('AgentDetail');
        // return json_encode($AgentDetails);
        // $response = $AgentDetails;
        // return json_encode($response);






        $base_response = new BaseResponse();

        $response = Http::post(env('API_BASE_URL') . "getAllagent");


        // dd($response);
        return json_decode($response->body());



        $result = new ApiBaseResponse();
        $return = json_decode($response->body());
    }

    public function create_agent(Request $request)
    {

        // return $request;

        $validator = Validator::make($request->all(), [
            'Id' => 'required',
            'PhoneNumber1' => 'required',
            'PhoneNumber2' => 'required',
            'Gender' => 'required',
            'Fname' => 'required',
            // 'MiddleName' => 'required',
            'SurName' => 'required',
            'DOB' =>  'required',
            // 'Picture' => 'required',
            'Region' => 'required',
            'Constituency' => 'required',
            'ElectoralArea' => 'required',
            'EducationalLevel' => 'required',
            'Institution' => 'required',
            'YearOfCompletion' => 'required',
        ]);


        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            // return back()->withErrors([$validator->errors(), 'The Message']);

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        $electoral_name = $request->ElectoralArea;

        $electoral_name_1 = explode("--", $electoral_name);

        $electoral_name_2 = explode("~", $electoral_name_1[1]);

        $new_electoral_name = $electoral_name_2[0];

        // return $electoral_name_2;


        $data = [
            "Id" => $request->Id ?? "",
            "PhoneNumber1" => $request->PhoneNumber1 ?? "",
            "PhoneNumber2" => $request->PhoneNumber2 ?? "",
            "PhoneNumber3" => $request->PhoneNumber3 ?? "",
            "Fname" => $request->Fname ?? "",
            "MiddleName" => $request->MiddleName ?? "",
            "SurName" => $request->SurName ?? "",
            "DOB" => $request->DOB ?? "",
            "Picture" => $request->Picture ?? "",
            "Gender" => $request->Gender ?? "",
            "Region" => $request->Region ?? "",
            "Constituency" => $request->Constituency ?? "",
            "ElectoralArea" => trim($electoral_name_1[0]) ?? "",
            "PollingStation" => trim($new_electoral_name) ?? "",
            "EducationalLevel" => $request->EducationalLevel ?? "",
            "Institution" => $request->Institution ?? "",
            "YearOfCompletion" => $request->YearOfCompletion ?? "",

        ];


        // return $data;

        try {

            $response = Http::post(env('API_BASE_URL') . "agentCreation", $data);
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

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function edit_agent_api(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Id' => 'required',
            'PhoneNumber1' => 'required',
            // 'PhoneNumber2' => 'required',
            'Gender' => 'required',
            'Fname' => 'required',
            // 'MiddleName' => 'required',
            'SurName' => 'required',
            'DOB' =>  'required',
            // 'Picture' => 'required',
            'Region' => 'required',
            'Constituency' => 'required',
            'ElectoralArea' => 'required',
            'EducationalLevel' => 'required',
            'Institution' => 'required',
            'YearOfCompletion' => 'required',
        ]);

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $request;


        $data = [
            "Id" => $request->Id,
            "PhoneNumber1" => $request->PhoneNumber1,
            "PhoneNumber2" => $request->PhoneNumber2,
            "PhoneNumber2" => $request->PhoneNumber2,
            "PhoneNumber3" => $request->PhoneNumber3,
            "Fname" => $request->Fname,
            "MiddleName" => $request->MiddleName,
            "SurName" => $request->SurName,
            "Gender" => $request->Gender,
            "DOB" => $request->DOB,
            "Picture" => $request->Picture,
            "Region" => $request->Region,
            "Constituency" => $request->Constituency,
            "ElectoralArea" => $request->ElectoralArea,
            "EducationalLevel" => $request->EducationalLevel,
            "Institution" => $request->Institution,
            "YearOfCompletion" => $request->YearOfCompletion,

        ];

        // return $data;

        try {

            $response = Http::post(env('API_BASE_URL') . "agentEdit", $data);
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

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function get_agent_details(Request $request)
    {

        // return $request;

        $validator = Validator::make($request->all(), [
            "phone_number" => "required"
        ]);


        $base_response = new BaseResponse();

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };


        $phoneNumber = $request->phone_number;


        // return $data;

        try {

            $response = Http::get(env('API_BASE_URL') . "agentSearch?phoneNumber=$phoneNumber");
            return json_decode($response);

            $result = new ApiBaseResponse();
            return $result->api_response($response);
            // return json_decode($response->body();

        } catch (\Exception $e) {

            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }

    public function send_message()
    {
        $UserMandate = session()->get('UserMandate');
        if ($UserMandate == "ConstituencyLevel") {
            $UserConstituency_ = session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                $UserRegion = session()->get('Region');
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                // return view('pages.agents.add_agents',);
                return view('pages.agents.send_message', ['UserConstituency' => $UserConstituency, 'UserRegion' => $UserRegion]);
            } else {
                // return view('pages.agents.add_agents', );
                return view('pages.agents.send_message', ['UserConstituency' => $UserConstituency_]);
            }
        } elseif ($UserMandate == "RegionalLevel") {
            $UserRegion_ = session()->get('Region');
            if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
                $UserRegion = str_replace(' ', '_', $UserRegion_);
                // echo 'has spaces, but not at beginning or end';
                // echo $UserConstituency;
                // return view('pages.agents.add_agents');
                return view('pages.agents.send_message', ['UserRegion' => $UserRegion]);
            } else {
                // return view('pages.agents.add_agents');
                return view('pages.agents.send_message', ['UserRegion' => $UserRegion_]);
            }
        } else {
            return view('pages.agents.send_message');
        }
    }

    public function message_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title"  =>  'required',
            "body"  =>  'required',
            "region" => 'required'
        ]);

        // if ($validator->fails()) {
        //     return back()->with('errors', $validator->messages()->all()[0])->withInput();
        // }


        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;
        // $region = strtolower($request->region);
        $region = $request->region;

        $data = [


            "data" => [
                "notification" => [
                    "title" => $request->title,
                    "body" => $request->body,
                ]
            ],
            "region" => $region,


        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "sendNotification", $data);
            return json_decode($response);

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function message_replies(Request $request)
    {
        // return $request;
        $regionId = $request->query("regionId");
        // return $regionId;

        $base_response = new BaseResponse();

        try {
            $response = Http::get(env('API_BASE_URL') . "getRegionChat?regionId=$regionId");
            return json_decode($response);

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            // DB::table('tb_error_logs')->insert([
            //     'platform' => 'ONLINE_INTERNET_BANKING',
            //     'user_id' => 'AUTH',
            //     'message' => (string) $e->getMessage()
            // ]);

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function send_notifiation(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            "title"  =>  'required',
            "body"  =>  'required',
            "region" => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                "responseCode" => "failed",
                "message" => $validator->errors(),
                "data" => NULL
            ], 200);
        };

        $uuid = (string) Str::uuid();
    }
}