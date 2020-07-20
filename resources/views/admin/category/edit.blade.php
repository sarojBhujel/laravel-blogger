@extends('admin.app.layout')
@section('headContent')
@endsection

@section('main-content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create New Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Post</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('category.update',$edit->id)}}" method="POST">
              @csrf
              @method('patch')
              <div class="card-body">
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" class="form-control"  placeholder="category name" name="name" value="{{$edit->name}}">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" class="form-control" placeholder="slug" name="slug" value="{{$edit->slug}}">
                </div>  
                  </div>
             </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
   </div><!-- /.container-fluid -->
    <!-- /.content -->
 
@endsection
