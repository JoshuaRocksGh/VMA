<?php

namespace App\Imports;

use App\Models\ExcelUpload;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use RealRashid\SweetAlert\Facades\Alert;

class ExcelUploadImport implements WithHeadingRow, ToCollection
{
    private $customer_no;
    private $user_id;
    private $user_name;
    private $value_date;
    private $ref_no;
    private $total_amount;
    private $currency;
    private $documentRef;
    private $account_no;
    private $trans_ref_no;
    private $desc;
    private $bank_code;
    private $file;
    private $account_mandate;




    public function headingRow(): int
    {
        return 1;
    }


    public function __construct($customer_no, $user_id, $user_name, $documentRef, $account_no, $bank_code, $trans_ref_no, $total_amount, $currency,  $value_date, $file, $account_mandate)
    {
        $this->customer_no = $customer_no;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->total_amount = $total_amount;
        $this->currency = $currency;
        $this->value_date = $value_date;
        $this->ref_no = $trans_ref_no;
        $this->bank_code = $bank_code;
        $this->documentRef = $documentRef;
        $this->account_no = $account_no;
        $this->file = $file;
        $this->account_mandate = $account_mandate;
    }

    public function collection(Collection $rows)
    {
        // Retriving form data which was place session from  ImportController.php

        // echo json_encode($rows);
        // die();


        $account_mandate = $this->account_mandate;
        $customer_no = $this->customer_no;
        $user_id = $this->user_id;
        $user_name = $this->user_name;
        $total_amount = $this->total_amount;
        $currency = $this->currency;
        $value_date = $this->value_date;
        $ref_no = $this->ref_no;
        $bank_code = $this->bank_code;
        $documentRef = $this->documentRef;
        $account_no = $this->account_no;
        $file = $this->file;
        $post_date = Carbon::now();
        $post_date = $post_date->toDateTimeString();

        header('Content-type: application/json');
        // echo json_encode([
        //     'total_amount' => $total_amount,
        //     'value_date' => $value_date,
        //     'ref_no' => $ref_no,
        //     'bank_code' => $bank_code,
        // ]);
        // die();



        // Formating Date
        $value_date = strtotime($value_date);
        $value_date = date('d-M-Y', $value_date);

        // $t_amt = 0;


        $check_ref = false;

        $batch_no = $documentRef;

        // foreach ($rows as $row) {


        //     if ($row['account_number'] == null) {
        //     } else {
        //         // echo json_encode($row);
        //         // die();
        //         $excel_t_amt = $excel_t_amt + floatval($row['amount']);
        //     }
        // }


        // Create an empty array
        // $excel_ref = array();

        // $excel_ref = [];





        // echo json_encode($error_insert);


        // echo json_encode($error_insert);
        // echo json_encode($row);





        // echo json_encode($t_amt);
        // die();


        // Looping through the excel file row by row
        /*
        foreach ($rows as $row) {
            // $ref_no_ = strval( $row['ref_no'] );

            if ($row['account_number'] == null) {
            } else {
                $ref = reset($row);
                if ($ref['ref_number'] != $ref_no) {

                    $check_ref = true;
                    break;
                }
                break;
            }

        }
        */

        // validation ref_number from session ref_no against ref_no in excel each row
        /*
        if ($check_ref) {
            echo json_encode([
                'responseCode' => '0333',
                'message' => "A reference Entered does not match file reference number"
            ]);

            die();
        }
        */


        // // Check if ref_no already exist in TB_CORP_BANK_BULK_REF
        /*
        $check_ref_no = DB::table('TB_CORP_BANK_BULK_REF')->where('ref_no', $ref_no)->value('ref_no');
        if ($check_ref_no) {
            echo json_encode([
                'responseCode' => '554',
                'message' => 'A file with the same ref_number already exist'
            ]);
            die();
        }
        */

        /*

        if ($t_amt != $total_amount) {
            echo json_encode([
                'responseCode' => '546',
                'message' => "Total amount does not tally with file total amount )"
            ]);
            die();
        }
        */

        // $query_result_delete = DB::table('tb_corp_bank_import_excel')
        //     ->where('customer_no', $customer_no)
        //     ->delete();

        // $error_insert_delete = DB::table('tb_bulk_error_logs')
        //     ->where('customer_no', $customer_no)
        //     ->delete();

        // $query_result_delete = DB::table('TB_CORP_BANK_BULK_REF')
        //     ->where('customer_no', $customer_no)
        //     ->delete();

        $t_amt = 0;
        $excel_t_amt = 0;




        foreach ($rows as $row) {


            // echo json_encode($row);

            // echo json_encode(floatval($row['amount']));
            // die();

            // $oracle = DB::connection('oracle');
            // Select name_of_column from g_ledger where acct_link = account number ;
            // if ($oracle) {
            //     echo (json_encode($oracle));
            // } else {
            //     echo ('failed');
            // };



            $error_message = '';
            // Validate reference number

            // if (null == ($row['name'])) {
            //     $error_message = $error_message . '- Name can not be empty.';
            //     $row['name'] = "";
            // }

            // if (null == ($row['amount'])) {
            //     $error_message = $error_message . '- Amount can not be empty.';
            //     $row['amount'] = "";
            // } else if (($row['amount']) <= 0) {
            //     $error_message = $error_message . '- Amount can not be 0.';
            //     $row['amount'] = "";
            // }

            // if (null == ($row['transaction_description'])) {
            //     $error_message = $error_message . '- Transaction description can not be empty.';
            //     $row['transaction_description'] = "";
            // }

            // if (null == ($row['bank'])) {
            //     $error_message = $error_message . '- Bank can not be empty.';
            //     $row['bank'] = "";
            // }

            if (null == ($row['ref_number'])) {
                $error_message = $error_message . '- Ref Number can not be empty.';
                $row['ref_number'] = "";
            } else if (($row['ref_number']) != $ref_no) {
                $error_message = $error_message . '- Ref Number do not match';
                $row['ref_number'] = "";
            }


            if (null == ($row['account_number'] || $row['name'] ||  $row['amount'] || $row['transaction_description'] || $row['bank'] || $row['ref_number'])) {
                // return null; here if on colum is empty.. that row will net insert at all. are you okay with that?
                // yeah... but u i go work with am' okay
            } else {

                if ($row['ref_number'] == null) {
                    $excel = "";
                } else {
                    $excel = $row['ref_number'];
                }

                // echo json_encode(floatval($row['amount']));
                // die();



                // if ($row['amount'] != "" || $row['amount'] != null) {
                //     // $excel_t_amt = $t_amt + floatval($row['amount']);
                //     $excel_t_amt = $t_amt + (float) $row['amount'];
                // }

                $beneficiaryname = $row['name'];
                $creditaccountnumber =  $row['account_number'];

                // return response()->json([
                //     'responseCode' => '526',
                //     'message' => 'Insert into database',
                //     "data"  => $creditaccountnumber
                // ]);

                // if ($row['amount'] != "" || $row['amount'] != null) {

                //     $t_amt = $t_amt + floatval($row['amount']);
                //     $t_amt = $t_amt + (float) $row['amount'];
                // }


                // $data = [
                //     'ref_no' => $row['ref_number'],
                //     'bban' => $row['account_number'],
                //     'name' => $row['name'],
                //     'amount' => $row['amount'],
                //     'trans_desc' => $row['transaction_description'],
                //     'value_date' => $value_date,
                //     'bank_code' => $bank_code,
                //     'user_id' => session()->get('userId'),
                //     'customer_no' => $customer_no,
                //     'account_no' => $account_no,
                //     'account_mandate' => $account_mandate,
                //     'total_amount' => $total_amount,
                //     'currency' => $currency,
                //     'message' => $error_message,
                //     'batch_no' => $batch_no,
                //     'status' => "P",
                //     'bank_name' => '$bank_name',
                //     'created_at' => NOW(),
                //     'updated_at' => NOW(),
                // ];
                $t_amt = $t_amt + floatval($row['amount']);

                // $t_amt = $t_amt + (float) $row['amount'];
                // echo json_encode($t_amt);
                // die();






                $query_result = DB::table('tb_corp_bank_import_excel')->insert([
                    'ref_no' => $row['ref_number'],
                    'bban' => $row['account_number'],
                    'name' => $row['name'],
                    'amount' => $row['amount'],
                    'trans_desc' => $row['transaction_description'],
                    'value_date' => $value_date,
                    'bank_code' => $bank_code,
                    'user_id' => session()->get('userId'),
                    'customer_no' => $customer_no,
                    'account_no' => $account_no,
                    'account_mandate' => $account_mandate,
                    'total_amount' => $total_amount,
                    'currency' => $currency,
                    'message' => $error_message,
                    'batch_no' => $batch_no,
                    'status' => "P",
                    'bank_name' => '$bank_name',
                    'created_at' => NOW(),
                    'updated_at' => NOW(),

                ]);

                // echo json_encode($query_result);
                // die();

                /*
                $query_result = DB::table('tb_corp_bank_req')->insert(
                    [
                        'request_type' => 'BULK',
                        'request_status' => 'P',
                        'user_id' => $user_id,
                        'customer_no' => $customer_no,
                        'user_name' => $user_name,
                        'account_no' => $account_no,
                        'account_mandate' => '',
                        'batch' => $documentRef,
                        'waitinglist' => 'not approved',
                        'bankcode' => $bank_code,
                        "creditaccountnumber" = $creditaccountnumber,
                        "beneficiaryname" => $beneficiaryname,
                        // 'narration' => $narration,
                        'post_date' => $post_date,
                        'is_accept_excel' => 'NY',
                        // 'ref_no' => $ref_no,
                        'total_amount' => $total_amount,
                        'value_date' => $value_date,
                    ]
                );
                */
            }
        }



        // echo json_encode($t_amt);
        // echo json_encode("===");
        // echo json_encode($excel_t_amt);


        $error_insert = DB::table('tb_bulk_error_logs')->insert([
            "batch_no" => $batch_no,
            "customer_no" => $customer_no,
            "account_balance" => "",
            "total_amount" => $total_amount,
            "ref_number" => $ref_no,
            "excel_total_amount" => $t_amt,
            "excel_ref_number" => $excel
        ]);


        $query_result_ = DB::table('TB_CORP_BANK_BULK_REF')->insert(
            [

                'REF_NO' => $ref_no,
                'VALUE_DATE' => $value_date,
                'TOTAL_AMOUNT' => $t_amt,
                'DESCRIPTION' => $ref_no,
                'USER_ID' => $user_id,
                'CUSTOMER_NO' => $customer_no,
                'ACCOUNT_NO' => $account_no,
                'ACCOUNT_MANDATE' => $account_mandate,
                'BATCH_NO' => $batch_no

            ]
        );



        // echo $query_result;die;

        // DB::commit();

        // if($query_result_){

        //     return back()->with('success', 'Bulk transfer pending approval');

        // }else{
        //     return back()->withErrors(['error' => 'Bulk transfer pending approval']);

        // }

        // if($query_result_){

        //     // return back()->with('success', 'Bulk transfer pending approval');
        //     return json_encode( [
        //         'responseCode' => '000',
        //         'message' => 'Bulk transfer pending approval'
        //     ]);
        //     // die();
        // }else{
        //     // return back()->with('success', 'Bulk transfer pending approval');
        //     return json_encode( [
        //         'responseCode' => 'ii',
        //         'message' => 'Something went wrong'
        //     ]);
        //     // die();
        // }


    }
}