<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Entrada;
use App\Models\Saida;
use Illuminate\Support\Facades\DB;

class PointerHudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pointerhud()
    {
        $entradas =  DB::table('entradas')->get();
        $UE = Entrada::orderBy('created_at','desc')->first('created_at'); //ultima_entrada
        $entradas =  DB::table('entradas')->get();

        $saidas =  DB::table('saidas')->get();
       return view('pointerhud')
        ->with(['entradas'=>$entradas])
        ->with(['saidas'=>$saidas])
        ->with(['UE'=>$UE]);


    }
    public function storestart(Request $request){
        Entrada::create([
            'user_id'=>$request->user_id,
        ]);
        return redirect('/pointerhud');
           }
    public function storeend(Request $request){
        Saida::create([
            'user_id'=>$request->user_id,
        ]);
        return redirect('/pointerhud');

    }


}
