
  @extends('admin.app.layout')
  @section('headContent')
  <link rel="stylesheet" href="{{asset('adminAssets/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('adminAssets//plugins/select2/css/select2.min.css')}}">
  @endsection

  @section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit About Me</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">About</li>
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
                <h3 class="card-title">Post Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('about.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">

                   <div class="col-md-6">

                        <div class="form-group">
                          <label>Change Image??</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="new_image">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label >Original Image</label>
                      <input name="old_image" type="hidden" class="form-control" value="{{$edit->img}}">
                      <img class="img-fluid" src="{{asset('img/'.$edit->img)}}"/>
                    </div>
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Write the Post body
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                  title="Collapse">
                            <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                  title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor" name="aboutMe">
                                    {!!$edit->aboutMe!!}
                                  </textarea>
                        </div>
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
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection
  @section('footerContent')
  {{-- <script src="{{asset('adminAssets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
  </script> --}}
  <script src="{{asset('adminAssets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <script src="{{asset('adminAssets/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace('editor');
    $(document).ready(function () {
      $('.select2').select2();
    bsCustomFileInput.init();
  });
    </script>
  @endsection
