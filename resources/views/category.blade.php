@extends('layouts.forntend.app')
@section('title')
<title>{{env('APP_NAME')}} | Category</title>
@endsection



@section('content')
<section class="top-section-area section-gap">
	<div class="container">
		<div class="row justify-content-between align-items-center d-flex">
			<div class="col-lg-8 top-left">
				<h1 class="text-white mb-20">All Category</h1>
				<ul>
					<li><a href="index-2.html">Home</a><span class="lnr lnr-arrow-right"></span></li>
					<li><a href="category.html">All Category</a></li>

				</ul>
			</div>
		</div>
	</div>
</section>


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
		<div class="active-cat-carusel">
		@isset($latest_categorys)
		  @foreach($latest_categorys as $latest_category)

			<div class="item single-cat">
				<img src="{{asset('backend/images/category/'.$latest_category->category_icon)}}" alt="">
				<p class="date">10 Jan 2018</p>
				<h4><a href="{{route('category-list',$latest_category->slug)}}">{{$latest_category->category_name}}</a></h4>
			</div>
			@endforeach
			@endisset
		</div>
	</div>
</section>


<section class="travel-area section-gap" id="travel">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">All Categroy</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($latest_categorys as $latest_category)
			<div class="col-lg-6 travel-right">
				
				<div class="single-travel media">
					<img class="img-fluid d-flex  mr-3" width="250" height="250"  src="{{asset('backend/images/category/'.$latest_category->category_icon)}}" alt="">
					<div class="dates">
						<span>20</span>
						<p>Dec</p>
					</div>
					<div class="media-body align-self-center">
						<h4 class="mt-0"><a href="{{route('category-list',$latest_category->slug)}}">{{$latest_category->category_name}}</a></h4>
						<p>inappropriate behavior Lorem ipsum dolor sit amet, consectetur.</p>
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



@endsection