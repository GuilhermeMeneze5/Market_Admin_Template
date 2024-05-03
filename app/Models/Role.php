<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'role_name',
        'role_description',
        'Messages',
        'Reports',
        'Scales',
        'Officermen',
        'Register',
        'Settings',
        'Request',
    ];
}