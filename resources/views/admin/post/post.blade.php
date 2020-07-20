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
            <h1>Blog Post</h1>
          </div>
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div>
        </div>
        
         @include('admin.includes.message')
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Blog Posts</h3>
              <a href="{{route('post.create')}}" class="btn btn-info offset-md-4" >Add new</a>
            </div>
            <div class="card-body">
                <table id="postTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($post as $k)
                        <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$k->title}}</td>
                          <td>{{$k->slug}}</td>
                          <td>
                            <a href="{{route('post.edit',$k->id)}}"><i class="fas fa-edit"></i></a>
                          </td>
                          <td>
                            <form action="{{route('post.destroy',$k->id)}}" method="post" id="delete-form-{{$k->id}}" style="display: none;">
                              @csrf
                              @method('delete')
                            </form>
                            <a href="{{route('post.destroy',$k->id)}}" onclick="
                            if(confirm('Delete The Post??')){

                              event.preventDefault();
                              document.getElementById('delete-form-{{$k->id}}').submit();
                            }else{
                              event.preventDefault();
                            }
                              ">
                              <i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                    @endforeach
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Slug</th>
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
        $("#postTable").DataTable();
        
      });
    </script>
@endsection