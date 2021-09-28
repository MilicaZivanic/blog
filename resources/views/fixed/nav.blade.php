     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

             <div class="navbar-header">
                  <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                       <span class="icon icon-bar"></span>
                  </button>

                  <!-- lOGO TEXT HERE -->
                  <a href="{{ route('home') }}" class="navbar-brand">Blog Website</a>
             </div>

             <!-- MENU LINKS -->
             <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-nav-first">
                       <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                       <li class="{{ (request()->is('post')) ? 'active' : '' }}"><a href="{{ route('post.index') }}">Blog</a></li>
                       <li class="{{ (request()->is('about-us')) ? 'active' : '' }}"><a href="{{ route('about-us') }}">About Us</a></li>
                       <!-- <li><a href="team.html">Authors</a></li> -->
                       <li class="{{ (request()->is('contact-us')) ? 'active' : '' }}"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-nav-first">
                    @if(!session('user'))
                    <li class="{{ (request()->is('login')) ? 'active' : '' }}"><a href="{{ route('login.index') }}">Login</a></li>
                    <li class="{{ (request()->is('register')) ? 'active' : '' }}"><a href="{{ route('register.index') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ session('user')->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if (session('user')->role->title == "admin")
                                    <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                                        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                    </li>
                                @endif
                                @if (session('user')->role->title != "user")
                                    <li class="{{ (request()->is('post/create')) ? 'active' : '' }}">
                                        <a href="{{ route('post.create') }}">Add new post</a>
                                    </li>
                                    <li class="{{ (request()->is('user/'. session('user')->id .'/posts')) ? 'active' : '' }}">
                                        <a href="{{ route('user_posts', [session('user')->id]) }}">My Posts</a>
                                    </li>
                                @endif
                                <li class="{{ (request()->is('my-profile')) ? 'active' : '' }}">
                                    <a href="{{ route('my-profile') }}">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @endif
               </ul>
             </div>

        </div>
   </section>
