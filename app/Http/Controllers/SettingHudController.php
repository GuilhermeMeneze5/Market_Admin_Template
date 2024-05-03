<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingHudController extends Controller
{
    public function settings()
    {
        return view ('config\confighud');
    }
}
