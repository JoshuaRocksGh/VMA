<?php

namespace App\Http\Controllers\Transfers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BollorieController extends Controller
{
    //
    public function view_bollorie()
    {
        return view('pages.transfer.bollorie_link');
    }
}