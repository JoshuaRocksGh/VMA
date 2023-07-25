<?php

namespace App\Http\Controllers\Mandate;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ConstituencyLevelController extends Controller
{
    //
    public function unassign_(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            "pollingID" => "required",
            "userID" => "required",
            // "assign" => "required",
        ]);

        // return $request;

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // $polling_station = $request->pollingID;
        $assign = $request->assign;
        if ($assign == 'true') {
            $polling = $request->pollingID;
            $pollingId_ = explode('--', $polling);
            $pollingId = $pollingId_[0];

            $station = $pollingId_[1];
            $station_ = explode('~', $station);
            $PollingStation = $station_[0];
            $data = [
                "pollingId" => trim($pollingId),
                "userId" => trim($request->userID),
                "PollingStation" => trim($PollingStation)
            ];
        } else {
            // $pollingId = $request->pollingID;
            $polling = $request->pollingID;
            $pollingId_ = explode('--', $polling);
            // return $pollingId_;
            $pollingId = $pollingId_[0];
            $data = [
                "pollingId" => trim($pollingId),
                "userId" => trim($request->userID),
                "PollingStation" => ""
            ];
        }

        // $data = [
        //     "pollingId" => $pollingId,
        //     "userId" => $request->userID,
        //     "PollingStation" => ""
        // ];

        // return $data;

        try {
            $url =  $assign == 'true' ? "assignPollingAgent" : "unAssignPollingAgent";
            $response =  Http::post(env('API_BASE_URL') . $url, $data);
            // dd($response);
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

    public function unassign(Request $request)
    {
        // return $request;
        $Mandate = session()->get('UserMandate');

        if ($Mandate !== "ConstituencyLevel") {
            $UserRegion = session()->get('Region');

            $electoral_area = $request->query('electoral_area');
            $user_id = $request->query('user_id');
            $constituency = session()->get('Constituency');
            $assign = $request->query('assign');
            $UserConstituency = $request->query('UserConstituency');
            // return $UserConstituency;
            // view('snippets.side-bar', ['UserConstituency' => $UserConstituency]);

            return view('pages.agents.unassign_agent', ['electoral_area' => $electoral_area, 'UserRegion' => $UserRegion, 'assign' => $assign, 'user_id' => $user_id, 'constituency' => $constituency, 'UserConstituency' => $UserConstituency]);
        } else {
            $electoral_area = $request->query('electoral_area');
            $user_id = $request->query('user_id');
            $constituency = session()->get('Constituency');
            $assign = $request->query('assign');
            $UserConstituency = $request->query('UserConstituency');
            // return $UserConstituency;
            // view('snippets.side-bar', ['UserConstituency' => $UserConstituency]);

            return view('pages.agents.unassign_agent', ['electoral_area' => $electoral_area, 'assign' => $assign, 'user_id' => $user_id, 'constituency' => $constituency, 'UserConstituency' => $UserConstituency]);
        }
    }

    public function all_constituency_users(Request $request)
    {
        $UserRegion = session()->get('Region');
        return view('pages.admin.all_regional_users', ['UserRegion' => $UserRegion]);
    }

    public function create_parliamentry_candidate()
    {
        // return view('pages.agents.create_parlimantry');
        return view('pages.agents.create_parliamentry_candidate');
    }

    public function parliamentry_candidate()
    {
        return view('pages.agents.parliamentry_candidate');
    }
}