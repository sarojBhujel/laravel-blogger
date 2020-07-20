<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Category::all();
        $category=Tag::all();
        $post=Post::all();
        return view('admin.post.post',compact('post','category','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $tags=Tag::all();

        return view('admin.post.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);
        unset($data->image);
        $file=$request->image;
        $filename=date('y-m-d-h-i-s').''.$file->getClientOriginalName();
        $file->move('img',$filename);
        $data['image']=$filename;
        $store=Post::create($data);
        $store->categories()->sync($request->category);
        $store->tags()->sync($request->tags);
        return redirect()->route('post.index')->with('success','New Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::all();
        $tag=Tag::all();
        $edit=Post::with('categories','tags')->where('id',$id)->first();
        return view('admin.post.edit',compact('edit','category','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);
        $update=Post::where('id',$id)->first();
        $update->title=$request->title;
        $update->slug=$request->slug;
        $update->body=$request->body;
        if($request->has('new_image')){

            $file=$request->file('new_image');
            $image=$request->old_image;
            $filename=date('y-m-d-h-i-s').''.$file->getClientOriginalName();
            $file->move('img',$filename);
            $update->image=$filename;
            $loc=public_path('img/'.$image);
            if(file_exists($loc)){
                unlink($loc);
            }else{
                $request->session()->flash('error','File Not Found');
            }
        }
        $update->categories()->sync($request->category);
        $update->tags()->sync($request->tags);
        $update->update();
        return redirect()->route('post.index')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=Post::where('id',$id)->first()->image;
        $delete=public_path('img/'.$file);
        if(file_exists($delete)){
            unlink($delete);
        }else{
            $request->session()->flash('error','No file found');

        }
        Post::destroy($id);
        return redirect()->route('post.index')->with('success','Post Deleted');
    }
}
