<ul class="nav navs-userpanel flex-column p-0 text-right bg-fa mt-2 border rounded">
    <li class="nav-item">
        <a class="nav-link {{active(route('account_edit'))}}" href="{{route('account_edit')}}">اطلاعات شخصی</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{active(route('change_password'))}}" href="{{route('change_password')}}">تغییر رمز عبور</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{active(route('profile_edit'))}}" href="{{route('profile_edit')}}">تصاویر و درباره من</a>
    </li>

</ul>
