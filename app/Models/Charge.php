<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Charge extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name_workload',
        'description_workload',
        'hrIni',
        'hrF',
        'IniBreak1',
        'fimBreak1',
        'IniBreak2',
        'fimBreak2',
        'IniBreak3',
        'fimBreak3',
        'Period',
        'dom',
        'seg',
        'ter',
        'qua',
        'qui',
        'sex',
        'sab',
        'numdaywork',
        'numdayvacation',
        'sc_ir_days_work',
        'sc_ir_days_vac',
        'tolerance_mark',
        'tolerance_work',
        'STATUS',
        'total_break_day',
        'total_work_day',
        'time_work_week',
        'num_days_reg_scale',
        'total_work_day_ireg',
        'timetolerancepoint',
        'timetolerance',


    ];
    public function u_charges(){
        return $this->belongsToMany('App\Models\User');

    }
}
