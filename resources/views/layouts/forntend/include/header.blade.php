<header class="default-header">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="index-2.html">
				<img src="{{ asset('frontend/img/logo.png')}}" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li><a href="{{route('home')}}">Home</a></li>
					<li><a href="{{route('allblog')}}">Post</a></li>
					<li><a href="{{route('category')}}">Category</a></li>
					
					<li><a href="#fashion">About</a></li>
					

					<li class="dropdown">
						<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							Pages
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="single.html">Single</a>
							<a class="dropdown-item" href="category.html">Category</a>
							
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>