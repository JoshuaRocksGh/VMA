<?php

namespace App\Http\Controllers\Mandate;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NationalLevelController extends Controller
{
    //
    public function national()
    {
        $base_response = new BaseResponse();

        $response = Http::post(env('API_BASE_URL') . "checkTotalRegionalAssignment");

        // $response = Http::get("https://us-central1-parliamentary-dd744.cloudfunctions.net/checkRegionalAssignment2");

        return json_decode($response->body());


        $result = new ApiBaseResponse();
        $return = json_decode($response->body());
    }
}