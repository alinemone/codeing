<nav class="navbar navbar-home navbar-expand-lg navbar-light bg-darker pt-0 pr-0 pl-0">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-fff">
            <i class="fas fa-user"></i>
        </button>
        <a href="{{ config('app.url', 'CodiRun') }}"><img alt="{{ config('app.name', 'CodiRun') }}" src="{{asset('img/bn-logo.png')}}" height=40px></a>

        <button type="button" id="sidebarLeftCollapse" class="btn btn-fff">
            <i class="fas fa-align-left"></i>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                @cannot('create_product')
                <li class="nav-item active p-1">
                    <a class="nav-link" href="{{route('join')}}">شروع درآمد</a>
                </li>
                @endcannot
                <li class="nav-item active bg-333 p-1">
                    <a class="nav-link " href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </li>
                @if(auth()->check())
                        <div class="navs user_navs">
                            <ul class="p-0">
                                <li class="nav-item active bg-333 p-1">
                                    <a class="nav-link m-0 p-2"><i class="fa fa-user-circle" aria-hidden="true"></i> {{auth()->user()->name}} </a>
                                    <ul class="global_menu">
                                        <li><a class="disabled">سلام ,  {{auth()->user()->name}} !</a></li>
                                        @can('super_user')
                                            <li><a href="{{route('AdminPanel')}}">ادمین پنل</a></li>
                                        @endcan
{{--                                            user Menu--}}
                                        <li><a href="{{route('UserPanel')}}">ناحیه کاربری</a></li>

                                        @can('create_product')
                                            <li><a href="{{route('user_create_product')}}">ارسال محصول</a></li>
                                            <li><a href="{{route('user.products')}}">محصولات شما</a></li>
                                        @endcan
                                        <li><a href="{{route('user.products.purchased')}}">محصولات خریداری شده</a></li>

                                        <form id="logout" action="{{route('logout')}}" method="post">
                                            @csrf
                                            <li class="border-top"> <a class="dropdown-item text-dark" href="javascript:{}" onclick="document.getElementById('logout').submit();"> <i class="fa fa-power-off m-r-5 m-l-5"></i>  خروج</a></li>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @else
                        <li class="nav-item active bg-333 p-1">
                            <a class="nav-link" href="{{route('login')}}"><i class="fa fa-user-circle" aria-hidden="true"></i> ورود </a>
                        </li>

                    @endif




            </ul>
        </div>
    </div>
</nav>
