<ul class="nav navs-userpanel flex-column p-0 text-right bg-fa mt-2 border rounded">
    <li class="nav-item">
        <a class="nav-link {{active(route('user.products'))}}" href="{{route('user.products')}}">محصولات تایید شده</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{active(route('user.products.disapproved'))}}" href="{{route('user.products.disapproved')}}">محصولات تایید نشده</a>
    </li>

</ul>
