<?php

namespace App\Http\Controllers\Reports\Tables\Console;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Table_all_logsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function table_all_logs()
    {
        $entradas = DB::table('entradas')->get();
        $saidas = DB::table('saidas')->get();

        return view('reports\console\all_logs',['entradas'=>$entradas],['saidas'=>$saidas]);
    }


}
