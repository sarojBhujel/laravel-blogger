<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\menu;
class MenuController extends Controller
{
    public function index(){
        $data=Menu::first();
        return  view('admin.menu.menu',compact('data'));
    }

    public function edit($id){
        $edit=Menu::where('id',$id)->first();
        return view('admin.menu.edit',compact('edit'));
    }

    public function update(Request $req,$id){

        $req->validate([
            'title'=>'required|max:50',
            'intro'=>'required',
        ]);
        $data=Menu::where('id',$id)->first();
        $data->title=$req->title;
        $data->intro=$req->intro;
        if($req->has('new_image')){

            $file=$req->file('new_image');
            $image=$req->oldImage;
            $filename=date('y-m-d-h-i-s').''.$file->getClientOriginalName();
            $file->move('img',$filename);
            $data->image=$filename;
            if($image==null){
                $image='smth';
            }
            $loc=public_path('img/'.$image);
            // dd($loc);
            if(file_exists($loc)){
                unlink($loc);
            }else{
                $req->session()->flash('error','File Not Found');
            }
        }
        $data->update();
        return redirect()->route('menu.index')->with('success',"Menu Updated");
    }
}
