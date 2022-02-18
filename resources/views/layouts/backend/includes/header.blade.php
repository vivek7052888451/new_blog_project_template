
<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <a class="search-trigger"><i class="fa fa-home"></i></a>
                      
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('backend/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                          
                            <img class="user-avatar rounded-circle" src="{{ asset('backend/images/admin.jpg')}}" alt="User Avatar" style="width:100px;">
                            <small class="text-primary">{{ auth()->user()->name }}</small>
                            <small class="text-primary">{{ auth()->user()->email }}</small>
                       
                            
                           <a class="nav-link text-info" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>


                </div>
            </div>

        </header>