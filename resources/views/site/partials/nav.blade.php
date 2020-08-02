<nav class="navigation">
    <ul>
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

        @endauth
        @auth
            <li><a>{{ Auth::user()->name }}</a>
                <ul>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                            {{ __('تسجيل خروج') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </a>
                    </li>
                    @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                        <li>

                            <a class="dropdown-item" href="{{ route('dashboard.welcome') }}">
                                <i class="fa fa-tachometer-alt"></i>
                                {{ __('لوحة التحكم') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @else
            <li><a href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a></li>
        @endauth
</nav>
