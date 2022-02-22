
   
@extends('layouts.forntend.app')
@section('title')
<title>{{env('APP_NAME')}} |Home</title>
@endsection

@section('content')
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ asset('frontend/img/header-bg.jpg')}}">
  <div class="overlay-bg overlay"></div>
  <div class="container">
    <div class="row fullscreen">
      <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
        <h1>
          A Discount Toner Cartridge <br>
          Is Better Than Ever.
        </h1>
      </div>
      <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
        <div class="col-lg-6 flex-row d-flex meta-left no-padding">
          <p><span class="lnr lnr-heart"></span> 15 Likes</p>
          <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
        </div>
        <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
          <div class="user-meta">
            <h4 class="text-white">Mark wiens</h4>
            <p>12 Dec, 2017 11:21 am</p>
          </div>
          <img class="img-fluid user-img" src="{{ asset('frontend/img/user.jpg')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
@isset($latest_blogs)

<section class="category-area section-gap" id="news">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Latest Post</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row active-cat-carusel">
      @foreach($latest_blogs as $latest_blog)
      <div class="col-sm-4">
      <div class="item single-cat">
        <img src="{{ asset('backend/images/uploads/'.$latest_blog->image)}}" alt="">
        <p class="date">{{$latest_blog->created_at->diffForHumans()}}</p>
        <h4><a href="{{route('post',$latest_blog->slug)}}">{{$latest_blog->title}}</a></h4>
      </div>
    </div>
    @endforeach
     
  </div>
  </div>
</section>
@endisset


<section class="travel-area section-gap" id="travel">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Popular Posts</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($latest_blogs as $latest_blog)
      <div class="col-lg-6 travel-left">
        <div class="single-travel media pb-70">
          <img class="img-fluid d-flex  mr-3" width="350" height="350" src="{{ asset('backend/images/uploads/'.$latest_blog->image)}}" alt="$latest_blog->image">
          <div class="dates">
           
            <p>{{$latest_blog->created_at->diffForHumans()}}</p>
          </div>
          <div class="media-body align-self-center">
            <h4 class="mt-0"><a href="{{route('post',$latest_blog->slug)}}">{{$latest_blog->title}}</a></h4>
            <p>{!! Str :: limit($latest_blog->discription,400) !!}</p>
            <div class="meta-bottom d-flex justify-content-between">
              <p><span class="lnr lnr-heart"></span> 15 Likes</p>
              <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
            </div>
          </div>
        </div>     
      </div>
      @endforeach
    </div>
  </div>

</section>

<section class="team-area section-gap" id="team">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">About  Team</h1>
          <p>Who are in extremely love with eco friendly system.</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center d-flex align-items-center">
      <div class="col-lg-6 team-left">
        <p>
          inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that.
        </p>
        <p>
          inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women.
        </p>
      </div>
      <div class="col-lg-6 team-right d-flex justify-content-center">
        <div class="row active-team-carusel">
          <div class="single-team">
            <div class="thumb">
              <img class="img-fluid" src="{{ asset('frontend/img/team1.jpg')}}" alt="">
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            <div class="meta-text mt-30 text-center">
              <h4>Dora Walker</h4>
              <p>Senior Core Developer</p>
            </div>
          </div>
          <div class="single-team">
            <div class="thumb">
              <img class="img-fluid" src="{{ asset('frontend/img/team2.jpg')}}" alt="">
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            <div class="meta-text mt-30 text-center">
              <h4>Lena Keller</h4>
              <p>Creative Content Developer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
