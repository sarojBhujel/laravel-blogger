@extends('blog.app.layout')
@section('menu-title',$menu->title)
@section('photo',asset('img/'.$menu->image))
@section('intro',$menu->intro)
    
@section('main-content')

<div class="main-wrapper">

    <article class="about-section py-5">
        <div class="container">
            <h2 class="title mb-3">About Me</h2>

						<figure><img class="img-fluid" src="{{asset('img/'.$about->img)}}" alt="image"></figure>
                {!! htmlspecialchars_decode($about->aboutMe)!!}


        </div>
    </article><!--//about-section-->



</div><!--//main-wrapper-->

@endsection
