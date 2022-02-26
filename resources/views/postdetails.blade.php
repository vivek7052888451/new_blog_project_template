@extends('layouts.forntend.app')
@section('title')
<title>{{env('APP_NAME')}} | Post Datails</title>
@endsection

@section('content')

<section class="top-section-area section-gap">
  <div class="container">
    <div class="row justify-content-between align-items-center d-flex">
      <div class="col-lg-8 top-left">
        <h1 class="text-white mb-20">Post Details</h1>
        <ul>
          <li><a href="index-2.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
          <li><a href="category.html">Post Details</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</section>


<div class="post-wrapper pt-100">

  <section class="post-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="single-page-post">
            <img class="img-fluid" src="{{ asset('backend/images/uploads/'.$posts->image)}}" alt="">
            <div class="top-wrapper ">
              <div class="row d-flex justify-content-between">
                <h2 class="col-lg-8 col-md-12 text-uppercase">
                 {!!$posts->title!!}
                </h2>
                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                  <div class="desc">
                    <h2>Mark wiens</h2>
                    <h3>{{$posts->created_at->diffForHumans()}}</h3>
                  </div>
                  <div class="user-img">
                    <img src="img/xuser.jpg.pagespeed.ic.KzuN75gNLV.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            
            <div class="single-post-content">
             <p>{!! Str :: limit($posts->discription,800) !!}</p>
              </div>
              <div class="bottom-wrapper">
                <div class="row">
                  <div class="col-lg-4 single-b-wrap col-md-12">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    lily and 4 people like this
                  </div>
                  <div class="col-lg-4 single-b-wrap col-md-12">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> 06 comments
                  </div>
                  <div class="col-lg-4 single-b-wrap col-md-12">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              

              <section class="comment-sec-area pt-80 pb-80">
                <div class="container">
                  <div class="row flex-column">
                    <h5 class="text-uppercase pb-80">05 Comments</h5>
                    <br>
                    @isset($comments)
                    @foreach($comments as $comment)
                    <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                          <div class="thumb">
                            <img src="img/asset/c1.jpg" alt="">
                          </div>
                          <div class="desc">
                            <h5><a href="#">{{$comment->username}}</a></h5>
                            <p class="date">{{$comment->created_at->diffForHumans()}}</p>
                            <p class="comment">
                              {{$comment->comment}}
                            </p>
                          </div>
                        </div>
                        <div class="reply-btn">
                          <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endisset
                   
                   
                  </div>
                </div>
              </section>


              <section class="commentform-area  pb-120 pt-80 mb-100">
                <div class="container">
                  <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                  <div class="row flex-row d-flex">
                    
                    <div class="col-lg-12">
                      <form id="comment_data">
                        @csrf
                      <input type="hidden" name="blog_id" value="{{$posts->id}}">
                      <textarea class="form-control mb-10" name="comment" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
                      
                      <button class="primary-btn mt-20" type="submit">Comment</button>
                    </form>
                    </div>
                  </div>
                </div>
              </section>

            </div>
          </div>
          <div class="col-lg-4 sidebar-area ">
            <div class="single_widget search_widget">
              <div id="imaginary_container">
                <form action="{{route('search')}}" method="get">
                
                <div class="input-group stylish-input-group">
                <input type="text" class="form-control"name="search" placeholder="Search">
                <span class="input-group-addon">
                  <button type="submit">
                    <span class="lnr lnr-magnifier"></span>
                  </button>
                </span>
              </div>
              </form>
              </div>
            </div>
          
            <div class="single_widget cat_widget">
              <h4 class="text-uppercase pb-20">post categories</h4>
              <ul>
                @isset($Posts_categorys)
                @foreach($Posts_categorys as $posts_category)
                @php
               $total = App\Models\Admin\Blog::where('category_id', $posts_category->id)->get()->count();
              @endphp 
                <li>
                 <a href="{{route('category-list',$posts_category->slug)}}">{{$posts_category->category_name}}<span>{{$total ?? '0'}}</span></a>
                </li>
                @endforeach
                @endisset
                
              </ul>
            </div>
            <div class="single_widget recent_widget">
            <h4 class="text-uppercase pb-20">Recent Posts</h4>
            <div class="active-recent-carusel">
             
                @isset($latest_threes)
                @foreach($latest_threes as $latest_three)
                  <div class="item">
                    <img src="{{ asset('backend/images/uploads/'.$latest_three->image)}}" width="200" height="200" alt="">
                   <a href="{{route('post',$latest_three->slug)}}"> <p class="mt-20 title text-uppercase">{{$latest_three->title}}</p></a>
                    <p>{{$latest_three->created_at->diffForHumans()}} <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                      06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span></p>
                    </div>
                    @endforeach
                    @endisset

                  </div>
                </div>
              
              </div>
            </div>
          </div>
            </div>
          </section>

        </div>

        @endsection

         @section('custom')
    
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
if ($("#comment_data").length > 0) {
$("#comment_data").validate({
rules: {
comment: {
required: true,
},   
},
messages: {
comment: {
required: "Please enter comment",
},

},
 submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                   $.ajax({
                    type: 'POST',
                    url: '{{ route("post-comment") }}',
                    
                    data: new FormData($("#comment_data")[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                       
                         // $('.blog_add_btn').html('Submit');
                         // $('.blog_add_btn').prop('disabled', false);
                       
                        document.getElementById("comment_data").reset();
                        location.reload();    
                    },
                    error: function (error) {
                       
                    }
                });
         
            }
})
}
</script>
    @endsection