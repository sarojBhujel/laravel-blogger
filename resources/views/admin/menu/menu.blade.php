
@extends('admin.app.layout')
@section('headContent')
    {{-- <link rel="stylesheet" href="{{asset('assets\css\theme-1.css')}}"> --}}
@endsection
@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <a href="{{route('menu.edit',$data->id)}}" class="btn btn-info offset-md-4" >Edit Menu</a>
        <h1 class="blog-name pt-lg-4 mb-0">{{$data->title}}</h1>
        <div class="profile-section pt-3 pt-lg-0">
            <img class="profile-image mb-3 rounded-circle mx-auto" style="width:400px" src="{{asset('img/'.$data->image)}}" alt="image" >			
            
            <div class="bio mb-3">{!! htmlspecialchars_decode($data->intro) !!}</div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
