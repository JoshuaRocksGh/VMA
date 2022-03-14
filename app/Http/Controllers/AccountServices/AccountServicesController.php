<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountServicesController extends Controller
{
    //method to return activate cheque book screen
    public function activate_cheque_book()
    {
        return view('pages.accountServices.activate_cheque_book');
    }

    //method to return add signature screen
    public function add_signature()
    {
        return view('pages.accountServices.add_signature');
    }

    //method to return cheque book request screen
    // public function cheque_book_request()
    // {
    //     return view('pages.accountServices.chequeBookRequest');
    // }

    //method to return confirm cheque
    public function chequeServices()
    {
        return view('pages.accountServices.chequeServices.cheque_services');
    }

    //method to return fd creation screen
    public function fd_creation()
    {
        return view('pages.accountServices.fd_creation');
    }

    //method to return kyc update screen
    public function kyc_update()
    {
        return view('pages.accountServices.kyc_update');
    }

    //method to return open additional account screen
    public function open_additional_acc()
    {
        return view('pages.accountServices.open_additional_acc');
    }

    //method to return remove signature screen
    public function remove_signature()
    {
        return view('pages.accountServices.remove_signature');
    }

    //method to return request atm screen
    public function request_atm()
    {
        return view('pages.accountServices.request_atm');
    }

    public function block_atm()
    {
        return view('pages.accountServices.block_atm');
    }

    //method to return request draft screen
    public function request_draft()
    {
        return view('pages.accountServices.request_draft');
    }

    //method to return request statement screen
    public function request_statement()
    {
        return view('pages.accountServices.request_statement');
    }

    //method to return stop cheque screen
    public function stop_cheque()
    {
        return view('pages.accountServices.stop_cheque');
    }

    //method to return stop fd screen
    public function stop_fd()
    {
        return view('pages.accountServices.stop_fd');
    }

    //method to return request for a letter screen
    public function request_for_letter()
    {
        return view('pages.accountServices.request_for_letter');
    }

    //method to return close account screen
    public function close_account()
    {
        return view('pages.accountServices.close_account');
    }

    //method to return make a complaint screen
    public function make_complaint()
    {
        return view('pages.accountServices.make_complaint');
    }
}
