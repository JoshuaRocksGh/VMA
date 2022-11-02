<?php

namespace App\Http\Controllers\AccountCreation;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use DateTime;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SavingsAccountCreationController extends Controller
{
    //
    public function savings_account_creation(Request $request)
    {
        $validator = Validator::make($request->all(), [

            "title" =>  'required',
            "surname" =>  'required',
            "firstname" =>  'required',
            // "othername" =>  'required',
            "gender" =>  'required',
            "birthday" =>  'required',
            "birth_place" =>  'required',
            "country" =>  'required',
            "residence_status" =>  'required',
            "mobile_number" =>  'required',
            "email" =>  'required',
            "city" =>  'required',
            "town" =>  'required',
            "residential_address" =>  'required',
            "id_type" =>  'required',
            "id_number" =>  'required',
            "tin_number" =>  'required',
            "issue_date" =>  'required',
            "expiry_date" =>  'required',
            "id_image" =>  'required',
            "passport_picture" =>  'required',
            "signed_selfie_paper" => 'required',
            "proof_of_address" => 'required'
        ]);

        // return $request;

        $base_response = new BaseResponse();

        //VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), "");
        };



        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        // return $request;
        $entrySource = env('APP_ENTRYSOURCE');
        $channel = env('APP_CHANNEL');


        $passport_picture_ = $request->passport_picture;
        $passport_picture_1 = explode(',', $passport_picture_);
        $passport_picture = $passport_picture_1[1];
        // return response()->json([
        //     "message" => $passport_picture_
        // ]);

        $id_image_ = $request->id_image;
        $id_image_1 = explode(',', $id_image_);
        $id_image = $id_image_1[1];


        $signed_selfie_paper_ = $request->signed_selfie_paper;
        $proof_of_address_1 = explode(',', $signed_selfie_paper_);
        $signed_selfie_paper = $proof_of_address_1[1];


        // $passport_picture_ = explode(',', $request->passport_picture);
        // $signed_selfie_paper_ = explode(',', $$request->signed_selfie_paper);

        $proof_of_address_ = $request->proof_of_address;
        $proof_of_address_1 = explode(',', $proof_of_address_);
        $proof_of_address = $proof_of_address_1[1];


        // $id_image = ltrim($request->id_image, "data:image/png;base64,");
        // $passport_picture = ltrim($request->passport_picture, "data:image/png;base64,");
        // $signed_selfie_paper = ltrim($request->signed_selfie_paper, "data:image/png;base64,");
        // $proof_of_address = ltrim($request->proof_of_address, "data:image/png;base64,");
        $now = new DateTime();
        $date = $now->format('Y-m-d');
        $api_headers = session()->get('headers');
        // $data = json_encode({

        // }, true);
        $data1 = [
            "city" =>
            $request->city,
            "companyName" => null,
            "constitutionCode" => null,
            "corporateTin" => null,
            "createdAccountNumber" => null,
            "createdCustomerNumber" => null,
            "custCategory" => "ID",
            "custType" => "I",
            "dateOfIncorporation" => $date,
            "docRef" => "400",
            "domicileCountry" =>
            $request->country,
            "entrySource" => $entrySource,
            "channel" => $channel,
            "fingerPrint" => "sng",
            "kycDoc" => "mobile",
            "mandate" => "self to sign",
            "natureOfBusiness" => null,
            "noCrTrans" => "1",
            "noDbTrans" => "1",
            "occupation" => null,
            "postedBy" =>
            $request->firstname . " " . $request->surname,
            "preferredLanguage" => null,
            "proofOfAddress" => $proof_of_address,
            "reason" => null,
            "relationDetails" => [
                [
                    "approvalPanel" => null,
                    "countryOfResidence" =>
                    $request->country,
                    "dob" =>
                    $request->birthday,
                    "documentExpiry"
                    => $request->expiry_date,
                    "documentId"
                    => $request->id_number,
                    "documentType" =>
                    $request->id_type,
                    "email" =>
                    $request->email,
                    "firstName"
                    => $request->firstname,
                    "homeAddress" =>
                    $request->town,
                    "homeAddress1" =>
                    $request->residential_address,
                    "issueAuthority" =>
                    $request->issueAuthority,
                    "issueDate" =>
                    $request->issue_date,
                    "lastName" =>
                    $request->surname,
                    "nationality" =>
                    $request->country,
                    "otherName" =>
                    $request->othername,
                    "personalPhone" =>
                    $request->mobile_number,
                    "picture" =>
                    $passport_picture,
                    "placeOfBirth"
                    => $request->birth_place,
                    "sex" =>
                    $request->gender,
                    "signature" =>
                    $signed_selfie_paper,
                    "staffCategory" => "N",
                    "suffix" => "stg",
                    "tin"
                    => $request->tin_number,
                    "title" =>
                    $request->title,
                    "workAddress" => "sng"
                ]
            ],
            "relationshipManagerCode" => "1204",
            "residenceStatus" =>
            $request->residence_status,
            "rfId" => null,
            "riskCode" => null,
            "sourceOfFunds" => null,
            "sourceOfWorth" => null,
            "subProduct" => "220",
            "subSector" => "9901",
            "subSegment" => "1001",
            "terminal" => null,
            "totalCrTrans" => "1",
            "totalDbTrans" => "1",
            "userBranch" => "001",
            "userId" => "Mobile User",
            "userName" => "BANKOWNER",
            "worthValue" => ""
        ];


        // return $data1;

        try {

            // dd((env('API_BASE_URL') . "account/openAccountNew"));

            // return $response = Http::post(env('API_BASE_URL') . "account/openAccountNew", $data1);
            $response = Http::post(env('API_BASE_URL') . "account/openAccountNew", $data1);
            // return $response;
            if ($response['responseCode'] == '000') {

                $customerNumber = $response['customerNumber'];
                $deviceIp = request()->ip();
                // return $deviceIp;
                $data = [
                    "appVersion" => "OS",
                    "country" => $request->country,
                    "customerNumber" => $customerNumber,
                    "deviceBrand" => "A",
                    "deviceId" => "A",
                    "deviceIp" => $deviceIp,
                    "deviceManufacturer" =>  "string",
                    "deviceModel" => "C",
                    "deviceOs" => "A"
                ];

                // return $data;

                $registartion = Http::post(env('API_BASE_URL') . "user/instantRegistration", $data);

                if ($registartion['responseCode'] == '000') {
                    // return $registartion;

                    // $result = new ApiBaseResponse();
                    return $response;
                }
                // docref

                // if ($registartion['responseCode']) {
                //     $customerNumber = $response['customerNumber'];
                //     $doc = [
                //         "id" => $id_image,
                //         "file" => $id_image,
                //         "customerno" => $customerNumber,
                //         "dept" => "9000010",
                //         "filename" => $request->id_type,
                //         "cat" => "4444",
                //         "description" => "Virtual Acct Opening",
                //         "category" => "Doc",
                //         "expiryDate" => $request->expiry_date,
                //         "docType" => "image",
                //         "comment" => "ID Image",
                //         "enteredBy" => "001",
                //         "approve" => "0",
                //         "department" => "NET",
                //         "contentType" => "image/png",

                //     ];




                //     $curl = curl_init();

                //     curl_setopt_array($curl, array(
                //         CURLOPT_URL => 'http://192.168.1.225:8680/DocumentManage/api/documentmanage/uploaddoc',
                //         CURLOPT_RETURNTRANSFER => true,
                //         CURLOPT_ENCODING => '',
                //         CURLOPT_MAXREDIRS => 10,
                //         CURLOPT_TIMEOUT => 0,
                //         CURLOPT_FOLLOWLOCATION => true,
                //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //         CURLOPT_CUSTOMREQUEST => 'POST',
                //         CURLOPT_POSTFIELDS => "file=$id_image&customerno=$customerNumber&dept=9000010&filename=$request->id_type&cat=4444&description=Virtual Acct Opening&category=Doc&expiryDate=$request->expiry_date&docType=image&comment=ID Image&enteredBy=001&approve=0&department=MOB&contentType=image/png",
                //         CURLOPT_HTTPHEADER => array(
                //             'Content-Type: application/x-www-form-urlencoded'
                //         ),
                //     ));

                //     $response = curl_exec($curl);

                //     curl_close($curl);
                //     return $response;



                //     // return $doc;
                //     // dd(env('API_BASE_URL') . "DocumentManage/api/documentmanage/uploaddoc");
                //     // $docManagement = Http::post("http://192.168.1.225:8680/DocumentManage/api/documentmanage/uploaddoc", $doc);
                //     // return $docManagement;
                // }


            }

            // return response()->json([
            //     'message' => $response
            // ]);

            // dd($response);

            // return json_decode($response->body();

        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }
}