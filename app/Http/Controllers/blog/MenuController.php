<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function menu(){
        $menu=Menu::first();
        return view('blog.app.header',compact('menu'));
    }
}
