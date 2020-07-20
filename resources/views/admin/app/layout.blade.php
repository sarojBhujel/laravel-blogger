<!DOCTYPE html>
<html>
<head>
      @include('admin.app.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('admin.app.header')
      
      @include('admin.app.sidebar')

      @section('main-content')
        @show

      @include('admin.app.footer')
    </div>
<!-- ./wrapper -->

</body>
</html>
