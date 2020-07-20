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
            <h1>Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Roles</li>
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
              <h3 class="card-title"> Roles</h3>
              <a href="{{route('role.create')}}" class="btn btn-info offset-md-4" >Add new</a>
            </div>
            <div class="card-body">
                <table id="roleTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Roles</th>
                    <th>Permission</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                        <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$role->name}}</td>
                          <td>
                            @foreach ($role->permissions as $permission)
                                @if ($permission->id==$permission->id)
                                {{$loop->first?'':','}}
                                    {{$permission->name}}
                                @endif
                            @endforeach
                          </td>
                          <td><a href="{{route('role.edit',$role->id)}}"><i class="fas fa-edit fa-lg ml-2"></i></a>
                            <form action="{{route('role.destroy',$role->id)}}" method="post" style="display: none;" id="delete-{{$role->id}}">
                              @csrf
                              @method('delete')
                            </form>
                            <a href="" onclick="
                            if(confirm('Delete the Role permanently???')){
                              event.preventDefault();
                              document.getElementById('delete-{{$role->id}}').submit();
                            }else{
                              event.preventDefault();
                            }
                            
                            "
                            ><i class="fas fa-trash fa-lg ml-4"></a></td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.N.</th>
                    <th>Roles</th>
                    <th>Permission</th>
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
        $("#roleTable").DataTable();
        
      });
    </script>
@endsection