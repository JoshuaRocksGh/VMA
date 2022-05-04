<?php

namespace App\Http\Middleware;

use App\Http\classes\WEB\UserAuth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserAuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // $value = $request->session()->get('key');

        if (!$request->session()->get('userId')) {
            session()->flush();
            return redirect('login');
        }

        try {
            $token = $request->session()->get('userToken');
            $response = Http::post(env('API_BASE_URL') . "/user/validateUser/" . $token);
            $responseBody = json_decode($response->body());
            if ($responseBody->responseCode === "999") {
                session()->flush();
                return redirect('login');
            }
        } catch (\Exception $e) {
            session()->flush();
            return redirect('login');
        }
        return $next($request);
    }
}
