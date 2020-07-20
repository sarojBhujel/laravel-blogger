@extends('blog.app.layout')
@section('menu-title',$menu->title)
@section('photo',asset('img/'.$menu->image))
@section('intro',$menu->intro)
@section('main-content')
<div class="main-wrapper">
    <section class="cta-section theme-bg-light py-5">
        <div class="container text-center">
            <h2 class="heading">Lorem ipsum dolor sit</h2>
            <div class="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id consequatur beatae tenetur odit, nemo dolorem.</div>
        </div><!--//container-->
    </section>
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            @foreach ($home as $h)
            <div class="item mb-5">
                <div class="media">

                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{asset('img/'.$h->image)}}" alt="image">
                    <div class="media-body">
                        <h3 class="title mb-1"><a href="{{route('blog.post',$h->slug)}}">{{$h->title}}</a></h3>
                        <div class="meta mb-1"><span class="date">Created</span><span class="time">{{$h->created_at}}</span><span class="comment">
                            <a href="#">8 comments</a></span></div>
                        <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
                        <a class="more-link" href="{{route('blog.post',$h->slug)}}">Read more &rarr;</a>
                    </div><!--//media-body-->
                </div><!--//media-->
            </div><!--//item-->
            @endforeach

            <nav class="blog-nav nav nav-justified my-5">
              <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
              <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
            </nav>

        </div>
    </section>


</div><!--//main-wrapper-->
@endsection
