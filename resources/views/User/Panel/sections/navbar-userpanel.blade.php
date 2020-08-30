<nav class="navbar-userpanel navbar navbar-expand-sm navbar-light bg-fa pb-0 pr-2 pl-2 ">

    <button class="d-md-none d-lg-none  btn btn-sm" type="button" data-toggle="collapse" data-target="#userpanel" aria-controls="userpanel" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="userpanel">
        <ul class="navbar-nav pr-0 text-right">
            <li class="nav-item {{active(route('UserPanel'))}} pl-2">
                <a class="nav-link" href="{{route('UserPanel')}}"><i class="fas fa-house-user"></i>  داشبرد </a>
            </li>
            @can('create_product')
                <li class="nav-item {{ active(route('user.products')) }} {{ active(route('user.products.disapproved')) }} pl-2">
                    <a class="nav-link" href="{{route('user.products')}}">محصولات</a>
                </li>
            @endcan
            <li class="nav-item pl-2 pr-2 {{ active(route('user.products.purchased')) }}">
                <a class="nav-link" href="{{route('user.products.purchased')}}">دانلود</a>
            </li>
            <li class="nav-item pl-2">
                <a class="nav-link {{active(route('profile_edit'))}}{{active(route('account_edit'))}} {{active(route('change_password'))}}" href="{{route('account_edit')}}">تنظیمات</a>
            </li>
            <li class="nav-item pl-2 pr-2 ">
                <a class="nav-link" href="{{route('user.payments')}}">پرداخت ها</a>
            </li>
            <li class="nav-item pl-2 pr-2 ">
                <a class="nav-link" href="">تیکت ها</a>
            </li>
            @can('create_product')
            <li class="nav-item pl-2 pr-2 {{active(route('seller.income'))}}">
                <a class="nav-link" href="{{route('seller.income')}}">درآمد ها</a>
            </li>
            <li class="nav-item pl-2 pr-2 {{active(route('seller.sales'))}}">
                <a class="nav-link" href="{{route('seller.sales')}}">آمار کلی</a>
            </li>
            @endcan
        </ul>
    </div>
</nav>
