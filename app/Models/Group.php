<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'permition_id',
        'status',
        'charge_id',
];

}
