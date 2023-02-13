<?php

namespace App\Http\Controllers\Transfers;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SwiftMT101Controller extends Controller
{
    //
    public function view_swift(Request $request)
    {
        // return view('pages.transfer.swift_mt101');
        // path = storage/app/public
        $directory = "public";
        // $files = Storage::disk($directory);
        $files = Storage::allfiles($directory);
        foreach ($files as $file) {
            // $get_contents = File::fread((storage_path($file), filesize($file)));
            // $handle = fopen($path, 'r');
            $content = Storage::get($file);
            $slice = preg_split("/\\r\\n|\\r|\\n/", $content);
            dd($slice);
        }

        // $get_contents = File::get(storage_path);

        dd($files);
    }

    public function upload_mt101(Request $request)
    {
        // return response()->json([
        //     "responseCode" => "502",
        //     "message" => "file upload status",
        //     "data" => $request->all()
        // ]);
        $base_response = new BaseResponse();


        $validator = Validator::make($request->all(), [
            // 'excel_file' => 'required|mimes:xls,xlsx',
            'excel_file' => 'required|mimes:txt',
            'my_account' => 'required',
            // 'bulk_amount' => 'required',
            // 'reference_no' => 'required',
            // 'value_date' => 'required',
        ]);

        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $user_id = session()->get('userId');
        $customer_no = session()->get('customerNumber');
        $user_name = session()->get('userAlias');
        // $accountMandate = session()->get('')

        $documentRef = time();
        $file_upload = $request->excel_file;
        $account_no = $request->my_account;


        $getAccountDetails = explode("~", $account_no);
        $accountName = $getAccountDetails[1];
        $accountNumber = $getAccountDetails[2];
        $accountCurrency = $getAccountDetails[3];
        $accountCurrencyIsoCode = $getAccountDetails[5];
        $accountMandate = $getAccountDetails[6];

        $upload_file_excel = $request->file_name;

        $data = [
            'accountName' => $accountName,
            'accountNumber' => $accountNumber,
            'accountCurrency' => $accountCurrency,
            'accountCurrencyIsoCode' => $accountCurrencyIsoCode,
            'accountMandate' => $accountMandate,
            'userId' => $user_id,
            'customerNumber' => $customer_no,
            'postedBy' => $user_id,
            'userName' => $user_name
        ];

        try {

            $filename = $request->excel_file->getClientOriginalName();
            $path  =  $request->file('excel_file')->getPathName();

            $response = Http::attach(
                'file',
                file_get_contents($path),
                $filename
            )->post(env('CIB_API_BASE_URL') . "upload-mt101", $data);
            // return $response;
            // dd($response);



            $result = new ApiBaseResponse();

            return $result->api_response($response);
        } catch (Exception $e) {
            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE
        }
    }
}