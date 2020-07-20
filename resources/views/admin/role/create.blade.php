@extends('admin.app.layout')
@section('main-content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Role</li>
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
              <h3 class="card-title">Role Create Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('role.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-form-label col-sm-1">Role :</label>
                  <input type="text" class="form-control col-sm-11"  placeholder="Enter Your name" name="name" value="{{old('name')}}">
                </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label class="col-form-label">Post Permissions</label>
                      @foreach ($permissions as $permission)
                          @if ($permission->for=='post')
                             <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}">
                          {{$permission->name}}
                        </label>
                      </div> 
                          @endif
                      
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <label class="col-form-label">User Permissions</label>
                      @foreach ($permissions as $permission)
                          @if ($permission->for=="user")
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}">
                                  {{$permission->name}}
                                </label>
                              </div>
                          @endif
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <label class="col-form-label">Others Permissions</label>
                      @foreach ($permissions as $permission)
                          @if ($permission->for=='other')
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="permissions[]" id="" value="{{$permission->id}}" >
                                  {{$permission->name}}
                                </label>
                              </div>
                          @endif
                      @endforeach
                    </div>
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
