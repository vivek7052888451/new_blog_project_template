@extends('layouts.forntend.app')
@section('title')
<title>{{env('APP_NAME')}} |Home</title>
@endsection

@section('content')
<section class="top-section-area section-gap">
	<div class="container">
		<div class="row justify-content-center align-items-center d-flex">
			<div class="col-lg-8">
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
				<p class="mt-20 text-center text-white">169 results found for “Addictionwhen gambling”</p>
			</div>
		</div>
	</div>
</section>


<div class="post-wrapper pt-100">

	<section class="post-area">
		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-8">
					<div class="post-lists search-list">
						@isset($posts)
						@if($posts->count() >0)
						@foreach($posts as $post)
						<div class="single-list flex-row d-flex">
							<div class="thumb">
								<div class="date">
									<span>20</span><br>Dec
								</div>
								<img src="{{asset('backend/images/uploads/'.$post->image)}}" alt="" width="400px" height="200px">
							</div>
							<div class="detail">
								<a href="{{route('post',$post->slug)}}"><h4 class="pb-20">{{$post->title}}</h4></a>
								<p>
									inappropriate behavior Lorem ipsum dolor sit amet, consecteturinapprop riate behavior Lorem ipsum dolor sit amet, consectetur.
								</p>
								<p class="footer pt-20">
									<i class="fa fa-heart-o" aria-hidden="true"></i>
									<a href="#">06 Likes</a> <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a href="#">02 Comments</a>
								</p>
							</div>
						</div>
						@endforeach
						@else
						<h1>Result Not Found</h1>
						@endif
						@endisset

						<div class="justify-content-center d-flex">
							{{-- add paginate--}}
						</div>
					</div>
				</div>
				<div class="col-lg-4 sidebar-area">
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
							<li>
								<a href="#">Technology <span>37</span></a>
							</li>
							<li>
								<a href="#">Lifestyle <span>37</span></a>
							</li>
							<li>
								<a href="#">Fashion <span>37</span></a>
							</li>
							<li>
								<a href="#">Art <span>37</span></a>
							</li>
							<li>
								<a href="#">Food <span>37</span></a>
							</li>
							<li>
								<a href="#">Architecture <span>37</span></a>
							</li>
							<li>
								<a href="#">Adventure <span>37</span></a>
							</li>
						</ul>
					</div>
					<div class="single_widget recent_widget">
						<h4 class="text-uppercase pb-20">Recent Posts</h4>
						<div class="active-recent-carusel">
							
								@isset($latest_threes)
								@foreach($latest_threes as $latest_three)
									<div class="item">
										<img src="{{asset('backend/images/uploads/'.$latest_three->image)}}" alt="">
										<a href="{{route('post',$latest_three->slug)}}"> <p class="mt-20 title text-uppercase">{{$latest_three->title}}</p></a>
										<p>{{$latest_three->created_at->diffForHumans()}}<span> <i class="fa fa-heart-o" aria-hidden="true"></i>
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