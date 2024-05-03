<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ScalesHudController extends Controller
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
    public function scaleshudfun()
    {
        //controle usado para acessar rota
        $users = DB::table('users')->whereNull('deleted_at')->get();
        $events = DB::table('events')->whereNull('deleted_at')->get();

        return view('scaleshud',['users'=>$users],['events'=>$events]);

    }
}
