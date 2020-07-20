<?php

namespace App\Http\Controllers\admin;
use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
      $data=About::first();
        return view('admin.about.about',compact('data'));
    }
    public function edit($id){
      $edit=About::where('id',$id)->first();
      return view('admin.about.edit',compact('edit'))  ;
    }
    public function update(Request $req,$id)
    {
      $req->validate([
        'aboutMe'=>'required',
      ]);
      $data=About::where('id',$id)->first();
      $data->aboutMe=$req->aboutMe;
      if($req->has('new_image')){

          $file=$req->file('new_image');
          $image=$req->old_image;
          $filename=date('y-m-d-h-i-s').''.$file->getClientOriginalName();
          $file->move('img',$filename);
          $data->img=$filename;
          if($image==null){
            $image='smth';
        }
          $loc=public_path('img/'.$image);
          if(file_exists($loc)){
              unlink($loc);
          }else{
              $req->session()->flash('error','File Not Found');
          }
      }
      $data->update();
      return redirect()->route('about.index')  ;
    }
}
