<?php

namespace App\Http\Controllers\Mandate;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NationalLevelController extends Controller
{
    //
    public function national()
    {
        $response = Http::get("https://us-central1-parliamentary-dd744.cloudfunctions.net/checkRegionalAssignment2");

        return json_decode($response->body());


        $result = new ApiBaseResponse();
        $return = json_decode($response->body());
    }
}