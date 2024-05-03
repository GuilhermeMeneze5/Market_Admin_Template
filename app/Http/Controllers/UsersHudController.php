<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Charge;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UsersHudController extends Controller
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

     public function Usershudfun()
    {
        $rules =  DB:: table('roles')->get();
        $users = DB::table('users')->get();
        $groups = DB::table('groups')->get();
        $charges = DB:: table('charges')->get();

        return view('usershud')
        ->with(['users'=>$users])
        ->with(['groups'=>$groups])
        ->with(['rules'=>$rules])
        ->with(['charges'=>$charges])
        ;
    }
    public function storeuser(Request $request)
    {
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        ]);
        return redirect ('/usershud');
    }
    public function storegroup(Request $request)
    {
        Group::create([
            'name'=>$request->name_group,
            'description'=>$request->desc_group,
            'charge_id'=>$request->charge_id,
            'permition_id'=>"0",
            'blocked'=>"1"
        ]);
        return redirect ('/usershud');


    }

    public function storecharge(Request $request)
    {

        Charge::create([
            'name_workload'=>$request->name_workload,
            'description_workload'=>$request->description_workload,
            'hrIni'=>$request->hrIni,
            'hrF'=>$request->hrF,
            'IniBreak1'=>$request->IniBreak1,
            'fimBreak1'=>$request->fimBreak1,
            'IniBreak2'=>$request->fimBreak1,
            'fimBreak2'=>$request->fimBreak2,
            'IniBreak3'=>$request->IniBreak3,
            'fimBreak3'=>$request->fimBreak3,
            'Period'=>$request->Period,
            'dom'=>$request->dom,
            'seg'=>$request->seg,
            'ter'=>$request->ter,
            'qua'=>$request->qua,
            'qui'=>$request->qui,
            'sex'=>$request->sex,
            'sab'=>$request->sab,
            'numdaywork'=>$request->numdaywork,
            'numdayvacation'=>$request->numdayvacation,
            'sc_ir_days_work'=>$request->sc_ir_days_work,
            'sc_ir_days_vac'=>$request->sc_ir_days_vac,
            'tolerance_mark'=>$request->tolerance_mark,
            'tolerance_work'=>$request->tolerance_work,

             //analytics
               'STATUS'=>"1",
              'total_break_day'=>"01:00",
              'total_work_day'=>"09:30",
              'time_work_week'=>"41:00",
              'num_days_reg_scale'=>"1",
              'total_work_day_ireg'=>"0",
              'timetolerancepoint'=>"10:00",
              'timetolerance'=>"10:00"

        ]);
        return redirect ('/usershud');



    }
    public function storepermition(Request $request)
    {
        Role::create([
            'role_name'=>$request->name_access,
            'role_description'=>$request->desc_access,
            'Messages'=>$request->Messages,
            'Reports'=>$request->Reports,
            'Scales'=>$request->Scales,
            'Officermen'=>$request->Officermen,
            'Register'=>$request->Register,
            'Settings'=>$request->Settings,
            'Request'=>$request->Request,
            'STATUS'=>"1"
        ]);
        return redirect ('/usershud');
    }

    public function userdestroy($id){
        User::findOrFail($id)->delete();
        return redirect ('/usershud')->with('msg','Usuario Excluido com sucesso!');

    }
    public function groupdestroy($id){
        Group::findOrFail($id)->delete();
        return redirect ('/usershud')->with('msg','Grupo Excluido com sucesso!');
    }
    public function chargedestroy($id){
        Charge::findOrFail($id)->delete();
        return redirect ('/usershud')->with('msg','Carga Excluido com sucesso!');
    }
    public function permitiondestroy($id){
        Role::findOrFail($id)->delete();
        return redirect ('/usershud')->with('msg','Permissão Excluido com sucesso!');
    }
}
