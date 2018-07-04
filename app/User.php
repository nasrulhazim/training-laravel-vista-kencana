<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Set the user's name uppercase.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    { 
        $this->attributes['name'] = strtoupper($value);
    }

    // Naming Convention
    // StudlyCase > snake_case
    // IcNumber > ic_number
    // OwnerName > owner_name
    // $user->ic_number = '200120-01-2020';
    // $user->save(); // will store as 200120012020
    public function setIcNumberAttribute($value)
    { // convert to 200120012020 from 200120-01-2020 
        $this->attributes['ic_number'] = str_replace('-','',$value);
    }
    
     // $user->ic_number; // 200120-01-2020
    public function getIcNumberAttribute($value)
    { // convert to 200120-01-2020 from 200120012020
        return $this->ic_number;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
