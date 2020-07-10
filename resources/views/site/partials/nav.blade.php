<nav class="navigation">
    <ul>
        {{--<li>
            <div class="header-search">
                <form>
                    <input type="text" value="أبحث هنا ..." onfocus="if(this.value=='أبحث هنا ...')this.value='';"
                           onblur="if(this.value=='')this.value='أبحث هنا ...';"
                           style="width: 200px;">
                    <button type="submit" class="search-submit"></button>
                </form>
            </div>
        </li>--}}
        <li><a href="{{route('welcome')}}">الرئيسية</a></li>
        <li><a href="{{route('categories')}}">التصنيفات</a></li>
        <li><a href="{{route('authors.index')}}">المؤلفون</a></li>
        <li><a href="{{route('contactus')}}">اتصل بنا</a></li>
        <li><a href="{{route('aboutus')}}">من نحن</a></li>
        @auth()
            <li style="    margin-right: 15px">
                <a href="{{route('books.index',['favorite'=>1])}}" style="background: none;">
                    <span class="icon-heart icon-2x icon-l" style="color: white;"></span>
                </a>
                    <span class=""
                                 style="color: white; position: absolute; top: 0; right: 3px; padding: 3px;  border-radius: 50px ;background-color: #0B90C4"
                                 id="nav__fav-count"
                                 data-fav-count="{{auth()->user()->books_count}}"
                           >
                                {{auth()->user()->books_count > 9 ? '+9':auth()->user()->books_count }}
                            </span>

            </li>
           {{-- <li class="nav-item mr-2">
                <a href="--}}{{--{{route('movies.index',["favorite"=>1])}}--}}{{--" class="nav-link text-white" style="position: relative">
                    <i class="fa fa-heart"></i>
                    <span class="bg-primary text-white d-flex justify-content-center align-items-center"
                          style="position: absolute; top: 0; right: -15px; width: 30px; height: 20px; border-radius: 50px"
                          id="nav__fav-count"
                          data-fav-count="--}}{{--{{auth()->user()->movies_count}}--}}{{--"
                    >
                              9+  --}}{{--{{auth()->user()->movies_count > 9 ? '+9':auth()->user()->movies_count }}--}}{{--
                            </span>
                </a>
            </li>--}}
        @endauth
        @auth
            <li><a>{{ Auth::user()->name }}</a>
                <ul>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </a>
                    </li>
                    @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                        <li>

                            <a class="dropdown-item" href="{{ route('dashboard.welcome') }}">
                                <i class="fa fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @else
            <li><a href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a></li>
        @endauth




        {{--        <li>@auth()
                    <a href="{{route('login')}}">تسجيل دخول</a></li>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                    {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </a>--}}
    </ul>
</nav>
