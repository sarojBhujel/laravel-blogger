<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['name','for'];
}
