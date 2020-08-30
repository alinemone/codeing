<ul class="wrapper m-0" id="app">
    <!-- Sidebar  -->
    <nav id="sidebar">
        @if (Route::has('login'))
            <ul class="list-unstyled components">
                @auth
                    <li>
                        <a href="{{ url('/') }}">صفحه خانه</a>
                    </li>
                    @can('super_user')
                        <li><a href="{{route('AdminPanel')}}">ادمین پنل</a></li>
                    @endcan
                    <li><a href="{{route('UserPanel')}}">ناحیه کاربری</a></li>
                    @can('create_product')
                        <li><a href="{{route('user_create_product')}}">ارسال محصول</a></li>
                    @endcan
                @else
                   <li>
                       <a href="{{ route('login') }}">ورود</a>
                   </li>

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">ثبت نام</a>
                        </li>
                    @endif
                @endauth
            </ul>
        @endif
    </nav>



    <nav id="sidebarLeft">
        <ul class="list-unstyled components">
            <li class="d-flex justify-content-center"><img src="{{asset('img/logo.png')}}" height=40px/></li>
            <div class="input-group p-1">
                <input type="text" class="form-control" placeholder="جستجو" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            @foreach($categories as $category)
            <li class="subnav">
                <a href="{{route('viewCategory',$category->slug)}}" data-toggle="collapse" aria-expanded="false" class="d-flex justify-content-between align-content-center">{{$category->name}}  <i class="fas fa-caret-down"></i></a>
                <ul class="collapse list-unstyled" >
                    @foreach($subcategories as $subCat)
                        @if($subCat->parent_id == $category->id)
                    <li>
                        <a href="/category/{{$category->slug}}/{{$subCat->slug}}">{{$subCat->name}}</a>
                    </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
</ul>

