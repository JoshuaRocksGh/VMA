<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $logOutType = "LOGOUT";

        $data = [
            "authToken" => $authToken,
            "logoutType" => $logOutType,
            "userName" =>  $userID
        ];


        $response = Http::post(env('API_BASE_URL') . "/user/logout", $data);
        // return $response['responseCode'];
        // if($response)
        if ($response['responseCode'] == "000") {
            Auth::logout();
            session()->flush();
            return redirect('login');
        } else {
            Auth::logout();
            session()->flush();
            return redirect('login');
        }
    }
}