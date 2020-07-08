<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{   
    use AuthenticableTrait;
    public $timestamps = false;
    use Notifiable;
    protected $table = "users";
    protected $fillable = [
        'user_account','user_name', 'user_email', 'user_phone', 'user_add','role_id', 'user_password',

    ];

    protected $hidden = [
        'user_password', 'remember_token'
    ];

}
