@extends('blog.app.layout')
@section('menu-title',$menu->title)
@section('photo',asset('img/'.$menu->image))
@section('intro',$menu->intro)
@section('title',$blog->title)
@section('created_at',$blog->created_at->diffForHumans())
@section('main-content')
<div class="main-wrapper">

    <article class="blog-post px-3 py-5 p-md-5">
        <div class="container">
            <header class="blog-post-header">
                <h2 class="title mb-2">@yield('title')</h2>
                <div class="meta mb-3"><span class="date">@yield('created_at')</span><span class="time">5 min read</span>
                    @foreach ($blog->categories as $c)
                <span class="float-right time">
                        {{$loop->last ? '':','}}
                        {{$c->name}}
                    </span>
                    @endforeach
                </div>
                
            </header>

            <div class="blog-post-body">
                <figure class="blog-banner">
                 <img class="img-fluid" src="{{asset('img/'.$blog->image)}}" alt="image">
                </figure>
                {!! htmlspecialchars_decode($blog->body) !!}

            </div>

            <nav class="blog-nav nav nav-justified my-5">
              <a class="nav-link-prev nav-item nav-link rounded-left" href="index.html">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
              <a class="nav-link-next nav-item nav-link rounded-right" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
            </nav>

            <div class="blog-comments-section">
                <div id="disqus_thread"></div>
                @foreach ($blog->tags as $t)
                    {{$t->name}}
                @endforeach
                {{-- Insert facebook comment in near future --}}
            </div><!--//blog-comments-section-->

        </div><!--//container-->
    </article>


</div><!--//main-wrapper-->

@endsection
