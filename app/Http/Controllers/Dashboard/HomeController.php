<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $customerAccounts = session()->get('customerAccounts');
        return view('pages.dashboard.home', ["accounts" => $customerAccounts]);
    }


    public function get_accounts()
    {
        // return 'kjsdf';
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $base_response = new BaseResponse();
        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];
        return $data;
        $response = Http::post(env('API_BASE_URL') . "account/getAccounts", $data);
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    // public function get_expenses()
    // {
    //     $authToken = session()->get('userToken');
    //     $userID = session()->get('userId');

    //     $base_response = new BaseResponse();

    //     $data = [
    //         "authToken" => $authToken,
    //         "userId"    => $userID
    //     ];

    //     return [
    //         'responseCode' => '000',
    //         'message' => 'spending analysis',
    //         'data' => [
    //             'travel' => '200',
    //             'vendor payment' => '100',
    //             'petty cash' => '300',
    //             'salary' => '900',
    //             'groceries' => '50',
    //             'medical' => '50',
    //             'insurance' => '950',
    //             'tax' => '95',
    //             'others' => '40'
    //         ]
    //     ];
    // }
}
