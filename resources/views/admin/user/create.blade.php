@extends('admin.app.layout')
@section('main-content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">User</li>
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
              <h3 class="card-title">User Create Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('user.store')}}" method="POST">
              @csrf
              <div class="card-body offset-2">
                <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label">{{ __('User Name') }}:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror "  placeholder="Enter Your name" name="name"required value="{{old('name')}}">
                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">{{ __('Email') }}:</label>
                    <div class="col-md-6">
                      <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="email address" name="email" required value="{{old('email')}}">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}:</label>
                    <div class="col-md-6">
                      <input type="number" class="form-control @error('phone') is-invalid @enderror " placeholder="Phone Number" name="phone"required value="{{old('phone')}}">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}:</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  value="{{old('password')}}">

                        
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 col-form-label">{{ __('Confirm Password') }}:</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-md-2 col-form-label">{{ __('Status') }}:</label>
                  <input  type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" style="display: none;">
                </div>

              <div class="card-footer float-right mr-5">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
      </div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection
@section('footerContent')
<script src="{{asset('adminAssets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script>
  $(function () {
    

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@endsection
