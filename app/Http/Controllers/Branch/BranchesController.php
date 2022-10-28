<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Support\Facades\Http;

class BranchesController extends Controller

{
    public function get_branches_api()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getBranches");
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function branches()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getBranches");
        // return $response["data"];
        $Branches = $response["data"];
        return view('pages.branches.branches', ["Branches" => $Branches]);
    }
}