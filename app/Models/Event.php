<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
                'name_event',
                'allday',
                'start',
                'end',
                'vehicles',
                'users',
                'destination',
                'description',


    ];

    public function users(){
        return $this->belongsToMany('App\Models\User');

    }
}
