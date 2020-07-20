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
            <h1>Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Permission</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('admin.includes.message')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Permissions</h3>
              <a href="{{route('permission.create')}}" class="btn btn-info offset-md-4" >Add new</a>
            </div>
            <div class="card-body">
                <table id="permissionTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Permission</th>
                    <th>For</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$permission->name}}</td>
                          <td>{{$permission->for}}</td>
                          <td>
                            <a href="{{route('permission.edit',$permission->id)}}"><i class="fas fa-edit fa-lg ml-5"></i>edit</a>
                            <form action="{{route('permission.destroy',$permission->id)}}" method="post" id="delete-{{$permission->id}}" style="display:none;">
                              @csrf
                              @method('delete')
                            </form>
                            <a href=""
                            onclick="
                              if(confirm('delete the Permission')){
                                event.preventDefault();
                                document.getElementById('delete-{{$permission->id}}').submit();
                              }else{
                                event.preventDefault();
                              }
                              "
                            ><i class="fas fa-trash fa-lg ml-5"></i>delete</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.N.</th>
                    <th>Permission</th>
                    <th>For</th>
                    <th>Action</th>
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
        $("#permissionTable").DataTable();
        
      });
    </script>
@endsection