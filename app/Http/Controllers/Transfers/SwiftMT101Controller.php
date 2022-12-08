<?php

namespace App\Http\Controllers\Transfers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwiftMT101Controller extends Controller
{
    //
    public function view_swift()
    {
        return view('pages.transfer.swift_mt101');
    }
}