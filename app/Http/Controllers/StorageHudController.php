<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageHudController extends Controller
{
    public function storage()
    {
        return view ('storage\storagehud');
    }
}
