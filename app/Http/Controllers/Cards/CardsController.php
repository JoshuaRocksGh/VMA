<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\classes\WEB\ApiBaseResponse;

class CardsController extends Controller
{
    //method to return the block debit screen
    public function block_debit_card()
    {
        return view('pages.cards.block_debit_card');
    }

    //method to return the replace card screen
    public function replace_card()
    {
        return view('pages.cards.replace_card');
    }

    //method to return the activate card screen
    public function cardServices()
    {
        return view('pages.cards.card_services');
    }

    public function getCardTypes()
    {
        $api_headers = session()->get("headers");
        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . '/utilities/getCardTypes');
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}
