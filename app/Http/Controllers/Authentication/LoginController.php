<?php

namespace App\Http\Controllers\Authentication;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Stevebauman\Location\Facades\Location;
use Error;
use hisorange\BrowserDetect\Facade as Browser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        if (session()->get('userToken')) {
            return redirect('/home');
        }

        return view('pages.authentication.login');
    }



    public function login_(Request $req)
    {
        $base_response = new BaseResponse();
        $user_id = strtoupper($req->user_id);
        $password = $req->password;
        $data =  [
            "appVersion" => "string",
            "brand" => "string",
            "country" => "string",
            "deviceId" => "string",
            "deviceIp" => "string",
            "deviceOs" => "A",
            "manufacturer" => "string",
            "model" => "string",
            "password" => $password,
            "userId" => $user_id
        ];

        try {
            $response = Http::post(env('API_BASE_URL') . "/user/login", $data);
            // return $response;
            if (!$response->ok()) { // API response status code is 200
                return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE
            }
            $result = json_decode($response->body());
            if ($result->responseCode !== '000') {
                return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE
            } // API responseCode is 000
            $userDetail = $result->data;
            // return response()->json($userDetail->accountsList[0]->accountDesc);
            if (!config("app.corporate") && $userDetail->customerType === 'C') {
                return  $base_response->api_response('900', 'Corporate account, use Corporate Internet Banking platform',  NULL);
            } elseif (config("app.corporate") && $userDetail->customerType !== 'C') {
                return  $base_response->api_response('900', 'Personal account, use Personal Internet Banking platform',  NULL);
            }

            session([
                "userId" => $userDetail->userId,
                "userAlias" => $userDetail->userAlias,
                "setPin" => $userDetail->setPin,
                "changePassword" => $userDetail->changePassword,
                "email" => $userDetail->email,
                "firstTimeLogin" => $userDetail->firstTimeLogin,
                "userToken" => $userDetail->userToken,
                "customerNumber" => $userDetail->customerNumber,
                "customerPhone" => $userDetail->customerPhone,
                "lastLogin" => $userDetail->lastLogin,
                "customerType" => $userDetail->customerType,
                "checkerMaker" => $userDetail->checkerMaker,
                "accountDescription" => $userDetail->accountsList[0]->accountDesc,
                "customerAccounts" => $userDetail->accountsList,
                "userMandate" => 'A',
                "deviceInfo" => [
                    "appVersion" => "web",
                    // "deviceBrand" => Browser::deviceFamily(),
                    // "deviceCountry" => Location::get()->countryName,
                    // "deviceId" => Browser::browserName(),
                    "deviceIp" => request()->ip(),
                    // "deviceManufacturer" => Browser::deviceFamily(),
                    // "deviceModel" => Browser::deviceModel(),
                    // "deviceOs" =>  Browser::platformName(),
                ],
                "headers" => [
                    "x-api-key" => "123",
                    "x-api-secret" => "123",
                    "x-api-source" => "123",
                    "x-api-token" => "123"
                ]

            ]);
            return  $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE
        } catch (\Exception $error) {
            Log::alert($error);
            return $base_response->api_response('500', 'Cannot Contact API ... Check Your Connection',  NULL); // return API BASERESPONSE

        }
    }

    //     } catch (\Exception $e) {
    //         return $base_response->api_response('500', 'Error: Failed To Contact Server',  NULL); // return API BASERESPONSE



    //     }
    // }

    public function forgot_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'security_answer' => 'required',
            'password' => 'required',
            'security_question' => 'required',
            'user_id' => 'required'
        ]);

        // return $request;

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // $authToken = session()->get('userToken');
        // $userID = session()->get('userId');
        $client_ip = request()->ip();

        $data = [
            "deviceBrand" => null,
            "deviceCountry" => null,
            "deviceId" => "I",
            "deviceIp" => $client_ip,
            "newPassword" => $request->password,
            "securityAnswer" => $request->security_answer,
            "securityQuestion" => $request->security_question,
            "userId" => $request->user_id
        ];

        // return $data;

        try {

            $response = Http::post(env('API_BASE_URL') . "user/forgotPassword", $data);

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
}