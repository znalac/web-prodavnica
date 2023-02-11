<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Ellen Ra Linde


        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  @if ($categories->isNotEmpty())
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                      Shop
                    </a>

                    <div class="dropdown-menu">
                      @foreach ($categories as $category)
                      <a class="dropdown-item" href="/category/{{$category->id}}/products">{{$category->name}}</a>
                      @endforeach
                     
                   
                      </div>
                   
                  </li>
                  @endif
                  <li class="nav-item">
                    <a class="nav-link" href="/henna-tatoo">Henna tattoo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about-contact">Contact & About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/dj">DJ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/privacy-policy">Privacy policy</a>
                  </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/cart">
                                My cart
                         </a>
                         <a class="dropdown-item" href="/orders">
                            My orders
                     </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                          
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="/delete-account/{{Auth::id()}}" class="dropdown-item">Delete account</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>