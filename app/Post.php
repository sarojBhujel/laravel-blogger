<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Category;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['title','slug','image','body'];
    protected $hidden=['password','remember_token'];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_post')->withTimeStamps();
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag')->withTimeStamps();
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
