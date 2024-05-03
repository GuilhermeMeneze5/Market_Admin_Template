<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproveRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function approvedrequest()
    {
        return view('approvedrequests');
    }

}
