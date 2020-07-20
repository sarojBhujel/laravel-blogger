@extends('admin.app.layout')

@section('headContent')
<link rel="stylesheet" href="{{asset('adminAssets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('main-content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Users</h3>
              <a href="{{route('user.create')}}" class="btn btn-info offset-md-4" >Add new</a>
            </div>
            <div class="card-body">
                <table id="userTables" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>User</th>
                    <th>Roles</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                          <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$user->name}}</td>
                              <td>
                                @foreach ($user->roles as $role)
                                    {{$role->name}}
                                @endforeach  
                              </td>
                              <td><a href="{{route('user.edit',$user->id)}}"><i class="fas fa-edit fa-lg"></a></i></td>
                              <td>
                                  <form action="{{route('user.destroy',$user->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                  </form>
                                  <a href=""><i class="fas fa-trash fa-lg"></a></i></td>
                          </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.N.</th>
                    <th>User</th>
                    <th>Roles</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footerContent')
<script src="{{asset('adminAssets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
      $(function () {
        $("#userTables").DataTable();
        
      });
    </script>
@endsection