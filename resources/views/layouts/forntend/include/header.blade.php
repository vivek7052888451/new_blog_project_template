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
					
					{{--<li><a href="#fashion">About</a></li>--}}
					
                    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                     @if(Auth::user()->role->id=='1')

                    
                       <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{route('admin.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            <a href="{{route('admin.profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                     </li>

                     @elseif(Auth::user()->role->id=='2')
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{route('user.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                     </li>
                     @else
                     null
                     @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
					
				</ul>
			</div>
		</div>
	</nav>
</header>