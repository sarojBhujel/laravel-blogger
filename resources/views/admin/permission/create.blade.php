@extends('admin.app.layout')
@section('main-content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Permission</li>
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
              <h3 class="card-title">Permission Create Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('permission.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Permission:</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control"  placeholder="Enter Your name" name="name" value="{{old('name')}}">
                 </div>
                </div> 
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">For:</label>
                  <div class="col-sm-10">
                    <select class="form-control " name="for" id="for" value="{{old('for')}}">
                      <option selected disabled>select what the permission is for</option>
                      <option value="post">Post</option>
                      <option value="user">User</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                 </div>
                </div>
             </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right mr-5">Submit</button>
              </div>
            </form>
          </div>
        </section>
      </div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection
