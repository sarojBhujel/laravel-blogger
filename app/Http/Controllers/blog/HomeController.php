<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Menu;


class HomeController extends Controller
{
    public function blog(){
        $home=Post::all();
        $menu=Menu::first();
        return view('blog.index',compact('home','menu'));
    }
}
