<?php

namespace App\Http\classes\API;


class BaseResponse
{
    public function api_response($response_code = '500', $message = '', $data = NULL)
    {
        return response()->json([
            'responseCode' => $response_code,
            'message' => $message,
            'data' => $data
        ], 200);
    }
}