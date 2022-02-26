@extends('layouts.forntend.app')
@section('title')
<title>{{env('APP_NAME')}} |Home</title>
@endsection

@section('content')
<section class="top-section-area section-gap">
	<div class="container">
		<div class="row justify-content-between align-items-center d-flex">
			<div class="col-lg-8 top-left">
				<h1 class="text-white mb-20">All Posts</h1>
				<ul>
					<li><a href="index-2.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
					<li><a href="index-2.html">Categoty</a><span class="lnr lnr-arrow-right"></span></li>
					<li><a href="category.html">All Posts</a></li>
					
				</ul>
			</div>
		</div>
	</div>
</section>


<div class="post-wrapper pt-100">

	<section class="post-area">
		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-8">
					

					<div class="top-posts pt-50">
						<div class="container">
							<div class="row justify-content-center">
								@isset($category_datas)
								@if($category_datas->count() >0)
								@foreach($category_datas as $category_data)
								<div class="single-posts col-lg-6 col-sm-6">
									<img class="img-fluid" src="{{ asset('backend/images/uploads/'.$category_data->image)}}" alt="">
									<div class="date mt-20 mb-20">10 Jan 2018</div>
									<div class="detail">
										<a href="{{route('post',$category_data->slug)}}"><h4 class="pb-20"> 
										{{$category_data->title}}</h4></a>
										<p>
											{!!$category_data->discription!!}
										</p>
										<p class="footer pt-20">
											<i class="fa fa-heart-o" aria-hidden="true"></i>
											<a href="#">06 Likes</a> <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a href="#">02 Comments</a>
										</p>
									</div>
								</div>
								@endforeach
								@else
								<h1>Post Not Found</h1>
								@endif
								@endisset
								
								<div class="justify-content-center d-flex">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 sidebar-area">
					
					
					<div class="single_widget cat_widget">
						<h4 class="text-uppercase pb-20">post categories</h4>
						<ul>
							@isset($latest_category)
			                @foreach($latest_category as $posts_category)
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
										<img src="{{ asset('backend/images/uploads/'.$latest_three->image)}}" alt="">
										<a href="{{route('post',$latest_three->slug)}}"> <p class="mt-20 title text-uppercase">{{$latest_three->title}}</p></a>
										<p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
											06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span></p>
										</div>
										@endforeach
										@endisset

									</div>
								</div>
							
							</div>
						</div>
					</div>
				</section>

			</div>

			@endsection