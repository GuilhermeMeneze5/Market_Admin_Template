<?php

namespace App\Http\Controllers\Reports\Tables\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Table_all_usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function table_all_users()
    {
       
            $rules =  DB:: table('roles')->get();
            $users = DB::table('users')->get();
            $groups = DB::table('groups')->get();
            $charges = DB:: table('charges')->get();
    
            return view('reports\users\all_users')
            ->with(['users'=>$users])
            ->with(['groups'=>$groups])
            ->with(['rules'=>$rules])
            ->with(['charges'=>$charges])
            ;
       
    }

}
