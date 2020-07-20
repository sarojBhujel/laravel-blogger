<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Laravel Blog</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    @include('blog.app.head')
    

</head> 

<body>
    @include('blog.app.header')
    @section('main-content')
                @show
    @include('blog.app.footer')  
    

</body>
</html> 

