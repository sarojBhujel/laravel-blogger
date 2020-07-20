{{-- header content is here --}}
<header class="header text-center">	    
    <h1 class="blog-name pt-lg-4 mb-0"><a href="{{route('blog.index')}}">@yield('menu-title')</a></h1>
    
    <nav class="navbar navbar-expand-lg navbar-dark" >
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navigation" class="collapse navbar-collapse flex-column" >
            <div class="profile-section pt-3 pt-lg-0">
                <img class="profile-image mb-3 rounded-circle mx-auto" src="@yield('photo')" alt="image" >			
                
                <div class="bio mb-3">
                    @yield('intro')
                    <br><a href="{{route('about')}}">Find out more about me</a></div><!--//bio-->
                <ul class="social-list list-inline py-3 mx-auto">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fab fa-github-alt fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
                </ul><!--//social-list-->
                <hr> 
            </div><!--//profile-section-->
            
            <ul class="navbar-nav flex-column text-left">
                <li class="nav-item {{'index'==request()->path()? 'active':''}} ">
                    <a class="nav-link" href="{{route('blog.index')}}"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item {{'blog/*'==request()->path()? 'active':''}}">
                    <a class="nav-link" href="{{route('blog.post','slug')}}"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
                </li>
                <li class="nav-item {{'about'==request()->path()? 'active':''}} ">
                    <a class="nav-link" href="{{route('about')}}"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
                </li>
            </ul>
            
            <div class="my-2 my-md-3">
                <a class="btn btn-primary" href="#" target="_blank">Get in Touch</a>
            </div>
        </div>
    </nav>
</header>