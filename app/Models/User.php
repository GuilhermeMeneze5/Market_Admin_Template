<?php

namespace App\Models;

use  Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
       /* 'XTAG_Access',
        'XID_Environment',
        'XID_Token',*/
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];
/**
 * The roles that belong to the User
 *
 * @return
 */

public function eventsAsParticipante(): BelongsToMany
{
    return $this->belongsToMany('App\Models\Event');
}

public function messagesAsUser(): BelongsToMany
{
    return $this->belongsToMany('App\Models\Message');
}
public function environmentsAsUser(): BelongsToMany
{
    return $this->belongsToMany('App\Models\Environment');
}
public function chargeAsUser(): BelongsToMany
{
    return $this->belongsToMany('App\Models\Charge');
}

}
