<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use App\admin\Permission;

class Role extends Model
{
    protected $fillable=['name'];

    function permissions(){
        return $this->belongsToMany(Permission::class,'permission_roles');
    }
}
