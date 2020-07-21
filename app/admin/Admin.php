<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use App\admin\Role;

class Admin extends Model
{
    protected $fillable=['name','email','password','phone','status'];
    protected $hidden=['password','remember_token'];

    function roles(){
        return $this->belongsToMany(Role::class,'role_admins');
    }
}
