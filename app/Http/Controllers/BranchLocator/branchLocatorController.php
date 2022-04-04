<?php

namespace App\Http\Controllers\BranchLocator;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class branchLocatorController extends Controller
{
    //
    public function branch_locator()
    {
        return view('pages.branchLocator.branch_locator');
    }

    //
    public function get_branches_api()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getBranches");
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}
