<?php

namespace App\Http\Controllers\Reports\Tables\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Table_all_eventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function table_all_events()
    {
        $events = DB::table('events')->get();
        return view('reports\scales\all_events',['events'=>$events]);
    }



}
