<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;


class FullCalenderController extends Controller
{
 //controle usado para realizar gravação
    public function index(){
    $users = DB::table('users')->whereNull('deleted_at')->get();
    $events = DB::table('events')->whereNull('deleted_at')->get();
    return view('scaleshud',['users'=>$users],['events'=>$events]);
    }

    public function store(Request $request){
        $users = $request['users'];
        $request['users']=implode(';',$users);

       $Event= Event::create([
            'name_event' =>  $request ->name_event,

            'vehicle'=> "Guilherme_MOTOR" ,
            'users'=> $request['users'],
            'destination'=> $request ->destination,
            $bhr_start = $request ->hr_start,
            $bday_start= $request ->day_start,
            $bhr_end = $request ->hr_end,
            $bday_end = $request ->day_end,
            'start'=> ($bday_start.' '.$bhr_start) ,
            'end'=> ($bday_end.' '.$bhr_end) ,
        ]);

    $Event->save();
    $Event->id;

    $id=$Event;
    $users = Auth()->user();

    $users ->eventsAsParticipante()->attach($id);
    $event = Event::findOrFail($id);
   //dd( $request->all());

     //Retorna a view atuaizada

    $users = DB::table('users')->whereNull('deleted_at')->get();
    $events = DB::table('events')->whereNull('deleted_at')->get();
    return redirect('/scaleshud');


    }

}
