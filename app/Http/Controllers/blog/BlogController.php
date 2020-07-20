<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Menu;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(Post $blog)
    {
        // return $blog;
        $menu=Menu::first();
        return view('blog.blog',compact('blog','menu'));
    }

}
