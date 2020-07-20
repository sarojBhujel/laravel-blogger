<?php

namespace App\Http\Controllers\blog;
use App\Http\Controllers\Controller;
use App\About;
use App\Menu;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $about=About::first();
        $menu=Menu::first();
        return view('blog.about',compact('about','menu'));
    }
}
