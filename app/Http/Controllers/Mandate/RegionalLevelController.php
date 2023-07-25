<?php

namespace App\Http\Controllers\Mandate;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class RegionalLevelController extends Controller
{
    //
    public function region($UserRegion)
    {
        session([
            "regionPath" => $UserRegion
        ]);


        $Mandate = session()->get('UserMandate');
        if ($Mandate == "NationalLevel") {
            $UserRegion_ = $UserRegion;
        } else {
            $UserRegion_ = session()->get('Region');
        }

        // return $UserRegion_;


        if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false) {
            $UserRegion = str_replace(' ', '_', $UserRegion_);

            view('snippets.side-bar', ['UserRegion' => $UserRegion]);
            return view('pages.mandate.regions', ['UserRegion' => $UserRegion]);
        } else {
            view('snippets.side-bar', ['UserRegion' => $UserRegion_]);
            return view('pages.mandate.regions', ['UserRegion' => $UserRegion_]);
        }
    }

    public function constituency($UserConstituency)
    {
        // return $UserConstituency;
        $Mandate = session()->get('UserMandate');
        $UserConstituency_ = $UserConstituency;
        $UserRegion = session()->get("Region");
        $RegionPath = session()->get('regionPath');


        if ($Mandate !== "ConstituencyLevel") {
            return view('pages.mandate.constituency', ['UserConstituency' => $UserConstituency_, 'UserRegion' => $UserRegion, "RegionPath" => $RegionPath]);

            // if ($UserRegion_ == trim($UserRegion_) && strpos($UserRegion_, ' ') !== false || $UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {
            //     $UserRegion = str_replace(' ', '_', $UserRegion_);
            //     $UserConstituency = str_replace(' ', '_', $UserConstituency_);

            //     return view('pages.mandate.constituency', ['UserConstituency' => $UserConstituency, 'UserRegion' => $UserRegion]);
            // } else {
            //     return view('pages.mandate.constituency', ['UserConstituency' => $UserConstituency, 'UserRegion' => $UserRegion]);
            // }
        } elseif ($Mandate == "ConstituencyLevel") {
            // echo 'has spaces, but not at beginning or end';
            // return session()->get('Constituency');
            if ($UserConstituency_ == trim($UserConstituency_) && strpos($UserConstituency_, ' ') !== false) {

                $UserConstituency = str_replace(' ', '_', $UserConstituency_);
                // dd($UserConstituency);

                // view('snippets.side-bar', ['UserRegion' => $UserConstituency]);
                return view('pages.mandate.constituency', ['UserConstituency' => $UserConstituency, 'UserRegion' => $UserRegion]);
            } else {
                $UserConstituency_ = session()->get('Constituency');

                // dd($UserConstituency);

                return view('pages.mandate.constituency', ['UserConstituency' => $UserConstituency_, 'UserRegion' => $UserRegion]);
            }
        } else {
            return false;
        }
        // $res = str_replace(array(
        //     '\'', '"',
        //     ',', ';', '<', '>', "'", ')', '}'
        // ), ' ', $constituency);
        // return preg_replace('/[^A-Za-z0-9\-]/', '', $constituency);
        // echo ($res);
        // return false;
        // view('pages.agents.unassign_agent', ['UserRegion' => $UserConstituency]);

    }

    public function view_user_profile()
    {
        $userDetails =  session()->get('userDetails');
        $UserRegion = session()->get('Region');
        $UserConstituency = session()->get('Constituency');

        // return $userDetails;
        // return $UserRegion;
        return view('pages.admin.view_profile', ['userDetails' => $userDetails, "UserRegion" => $UserRegion, "UserConstituency" => $UserConstituency]);
    }

    public function regional_constituency($UserRegion)
    {
        $region = $UserRegion;
        // return $region;

        $base_response = new BaseResponse();

        $response = Http::post(env('API_BASE_URL') . "checkConstituencyAssignmentPerRegion?region=$region");


        // dd($response);
        return json_decode($response->body());


        $result = new ApiBaseResponse();
        $return = json_decode($response->body());
    }

    public function regional(Request $request)
    {

        $region = $request->query('Region');
        // return $region;
        // $bene_id = $request->query('bene_id');

        return view('pages.mandate.regions', ['region' => $region]);
    }

    public function constituency_polling_station($constituency_name)
    {
        $constituency = $constituency_name;
        $res = str_replace(array(
            '\'', '"',
            ',', ';', '<', '>', "'", ')', '}'
        ), ' ', $constituency);
        // return preg_replace('/[^A-Za-z0-9\-]/', '', $constituency);
        // echo ($res);

        return view('pages.mandate.constituency', ['constituency' => $res]);
    }

    public function all_regional_users()
    {
        return view('pages.admin.all_regional_users');
    }

    public function all_regional_users_list()
    {
        $UserMandate = session()->get("UserMandate");
        $UserRegion = session()->get("Region");

        if ($UserMandate == "NationalLevel") {
            $response = Http::post(env('API_BASE_URL') . "getUsers");

            return json_decode($response->body());
        } elseif ($UserMandate == "RegionalLevel") {
            $response = Http::post(env('API_BASE_URL') . "getUsers?region=$UserRegion");

            return json_decode($response->body());
        } else {
            return response()->json([
                "status" => "failed",
                "message" => "Error Occured",
                "data" => []
            ]);
        }
        // return $UserRegion;
    }

    public function delete_user(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');

        $response = Http::post(env('API_BASE_URL') . "deleteUser?userId=$userID");
        // return $response;
        // return $response['message'];
        if ($response['status'] == "failed") {
            Alert::error('', $response['message']);
            return back();
        } else {
            Alert::success('', $response['message']);
            return back();
        }


        // return json_decode($response->body());
    }

    public function send_notifications()
    {
        $userDetails =  session()->get('userDetails');
        $UserRegion = session()->get('Region');
        $userID = session()->get('userID');
        $userConstituency = session()->get('Constituency');
        return view('pages.admin.send_notifications', ["UserRegion" => $UserRegion, "userID" => $userID, "UserConstituency" => $userConstituency]);
    }

    public function get_user_details(Request $request)
    {
        // return $request;
        $userID = $request->query('username');

        $response = Http::post(env('API_BASE_URL') . "userSearch?userId=$userID");

        return json_decode($response->body());
    }

    public function reset_password(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');
        // return $userID;

        // dd(env('API_BASE_URL') . "userReset?userId=$userID");

        $response = Http::post(env('API_BASE_URL') . "userReset?userId=$userID");
        return json_decode($response->body());

        // if ($response['status'] == "failed") {
        //     Alert::error('', $response['message']);
        //     return back();
        // } else {
        //     Alert::success('', $response['message']);
        //     return back();
        // }
    }

    public function reset_agent(Request $request)
    {
        return $request;
        $userID = $request->query('userId');
        // return $userID;

        // dd(env('API_BASE_URL') . "userReset?userId=$userID");

        $response = Http::post(env('API_BASE_URL') . "agentReset?userId=$userID");

        if ($response['status'] == "failed") {

            return Alert::error('', $response['message']);
        } else {
            // Alert::success('', $response['message']);
            return Alert::error('', $response['message']);

            // return back();
        }
    }

    public function activate_user(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');

        $data = [
            "UserId" => $userID, "data" => [
                "Active" => true
            ]



        ];

        // $data = [
        //     "UserId" => $userID,
        //     "Active" => true
        // ];

        // return $data;

        $response = Http::post(env('API_BASE_URL') . "userUpdate", $data);

        if (
            $response['status'] == "failed" ||
            $response['status'] == "error"
        ) {
            Alert::error('', $response['message']);
            return back();
        } else {
            Alert::success('', $response['message']);
            return back();
        }
    }

    public function de_activate_user(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');

        $data = [
            "UserId" => $userID, "data" => [
                "Active" => false
            ]



        ];
        // return $data;


        $response = Http::post(env('API_BASE_URL') . "userUpdate", $data);
        // return $response;

        if (
            $response['status'] == "failed" ||
            $response['status'] == "error"
        ) {
            Alert::error('', $response['message']);
            return back();
        } else {
            Alert::success('', $response['message']);
            return back();
        }
    }
    public function reported_issues()
    {
        $UserRegion = session()->get('Region');
        $userID = session()->get('userID');
        return view('pages.admin.reported_issues', ["UserRegion" => $UserRegion, "userID" => $userID]);
    }

    public function unblock_user(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');

        $response = Http::post(env('API_BASE_URL') . "agentUnlock?userId=$userID");

        if (
            $response['status'] == "failed" ||
            $response['status'] == "error"
        ) {
            Alert::error('', $response['message']);
            return back();
        } else {
            Alert::success('', $response['message']);
            return back();
        }
    }

    public function block_user(Request $request)
    {
        // return $request;
        $userID = $request->query('userId');

        $response = Http::post(env('API_BASE_URL') . "blockAgent?userId=$userID");

        if (
            $response['status'] == "failed" ||
            $response['status'] == "error"
        ) {
            Alert::error('', $response['message']);
            return back();
        } else {
            Alert::success('', $response['message']);
            return back();
        }
    }
}