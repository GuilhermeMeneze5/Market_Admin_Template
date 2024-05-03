<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Charge;
use App\Models\Role;
use App\Models\Message;
use App\Models\Event;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->whereNull('deleted_at')->count();
        $events = DB::table('events')->whereNull('deleted_at')->count();
        $messages =  DB::table('messages')->whereNull('deleted_at')->count();
        $groups  =  DB::table('groups')->whereNull('deleted_at')->count();

        return view('home')
        ->with(['users'=>$users])
        ->with(['groups'=>$groups])
        ->with(['messages'=>$messages])
        ->with(['events'=>$events])
        ;
    }
}
