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
@isset($blog_categorys)

<section class="category-area section-gap" id="news">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Latest News from all categories</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row active-cat-carusel">
      @foreach($blog_categorys as $blog_category)
      <div class="col-sm-4">
      <div class="item single-cat">
        <img src="{{ asset('backend/images/category/'.$blog_category->category_icon)}}" alt="">
        <p class="date">10 Jan 2018</p>
        <h4><a href="{{route('category-list',$blog_category->slug)}}">It S Hurricane Season Visiting Hilton</a></h4>
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
          <h1 class="mb-10">Hot topics from Travel Section</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($latest_blogs as $latest_blog)
      <div class="col-lg-6 travel-left">
        <div class="single-travel media pb-70">
          <img class="img-fluid d-flex  mr-3" src="{{ asset('backend/images/uploads/'.$latest_blog->image)}}" alt="">
          <div class="dates">
            <span>20</span>
            <p>Dec</p>
          </div>
          <div class="media-body align-self-center">
            <h4 class="mt-0"><a href="{{route('post',$latest_blog->slug)}}">Addiction When Gambling
            Becomes A Problem</a></h4>
            <p>inappropriate behavior Lorem ipsum dolor sit amet, consectetur.</p>
            <div class="meta-bottom d-flex justify-content-between">
              <p><span class="lnr lnr-heart"></span> 15 Likes</p>
              <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
            </div>
          </div>
        </div>     
      </div>
      @endforeach
      
      <a href="#" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
    </div>
  </div>
</section>


<section class="fashion-area section-gap" id="fashion">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Fashion News This Week</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" src="{{ asset('frontend/img/f1.jpg')}}" alt="">
        <p class="date">10 Jan 2018</p>
        <h4><a href="#">Addiction When Gambling
        Becomes A Problem</a></h4>
        <p>
          inappropriate behavior ipsum dolor sit amet, consectetur.
        </p>
        <div class="meta-bottom d-flex justify-content-between">
          <p><span class="lnr lnr-heart"></span> 15 Likes</p>
          <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" src="{{ asset('frontend/img/f2.jpg')}}" alt="">
        <p class="date">10 Jan 2018</p>
        <h4><a href="#">Addiction When Gambling
        Becomes A Problem</a></h4>
        <p>
          inappropriate behavior ipsum dolor sit amet, consectetur.
        </p>
        <div class="meta-bottom d-flex justify-content-between">
          <p><span class="lnr lnr-heart"></span> 15 Likes</p>
          <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" src="{{ asset('frontend/img/f3.jpg')}}" alt="">
        <p class="date">10 Jan 2018</p>
        <h4><a href="#">Addiction When Gambling
        Becomes A Problem</a></h4>
        <p>
          inappropriate behavior ipsum dolor sit amet, consectetur.
        </p>
        <div class="meta-bottom d-flex justify-content-between">
          <p><span class="lnr lnr-heart"></span> 15 Likes</p>
          <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 single-fashion">
        <img class="img-fluid" src="{{ asset('frontend/img/f4.jpg')}}" alt="">
        <p class="date">10 Jan 2018</p>
        <h4><a href="#">Addiction When Gambling
        Becomes A Problem</a></h4>
        <p>
          inappropriate behavior ipsum dolor sit amet, consectetur.
        </p>
        <div class="meta-bottom d-flex justify-content-between">
          <p><span class="lnr lnr-heart"></span> 15 Likes</p>
          <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
        </div>
      </div>
      <a href="#" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
    </div>
  </div>
</section>


<section class="team-area section-gap" id="team">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">About Blogger Team</h1>
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