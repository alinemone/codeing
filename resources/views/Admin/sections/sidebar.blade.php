<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{auth()->user()->profile_image}}" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{auth()->user()->name}}</h5>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </a>

                                <form id="logout" class="w-25" action="{{route('logout')}}" method="post">
                                    @csrf
                                    <a class="btn btn-circle btn-sm m-r-5" href="javascript:void(0)" onclick="document.getElementById('logout').submit();"><i class="ti-power-off"></i></a>
                                </form>
                            </div>


                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminPanel')}}
                                   " aria-expanded="false">
                        <i class="sl-icon-loop"></i>
                        <span class="hide-menu">داشبرد</span>
                    </a>
                </li>

                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
                                   " aria-expanded="false">
                        <i class="mdi mdi-notification-clear-all"></i>
                        <span class="hide-menu">محصولات</span>
                        <span class="badge badge-success mr-5">{{$Accepted+$vizheh+$StopSelling+$Update}}</span>
                        <span class="badge badge-warning mr-1">{{$NotAccepted}}</span>
                        <span class="badge badge-danger mr-1">{{$trashed}}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{route('product.index')}}" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu">محصولات تایید شده</span>
                                <span class="badge badge-success ml-auto">{{$Accepted+$vizheh+$StopSelling+$Update}}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('product.unverified')}}" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu"> محصولات تایید نشده</span>
                                <span class="badge badge-warning ml-auto">{{$NotAccepted}}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('product.delete')}}" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu"> محصولات حذف شده</span>
                                <span class="badge badge-danger ml-auto">{{$trashed}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('market.sell')}}
                        " aria-expanded="false">
                        <i class="icon-Add-User"></i>
                        <span class="hide-menu">محصولات فروخته شده</span>
                    </a>
                </li>

                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.comments')}}
                        " aria-expanded="false">
                        <i class="ti-comment-alt"></i>
                        <span class="hide-menu">دیدگاه ها</span>
                    </a>
                </li>

                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('category.index')}}
                        " aria-expanded="false">
                        <i class="ti-archive"></i>
                        <span class="hide-menu">دسته بندی ها</span>
                    </a>
                </li>
                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allUsers')}}
                        " aria-expanded="false">
                        <i class="icon-Add-User"></i>
                        <span class="hide-menu">کاربران</span>
                    </a>
                </li>

                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
                                   " aria-expanded="false">
                        <i class="ti-unlock"></i>
                        <span class="hide-menu">نقش های کاربری</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item {{-- active class  for url parameter --}}">
                            <a href="{{route('role.index')}}" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu">نقش ها (Role)</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{-- active class  for url parameter --}}">
                            <a href="{{route('permission.index')}}" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu">دسترسی ها (Permission)</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="sidebar-item {{-- active class  for url parameter --}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)
                                   " aria-expanded="false">
                        <i class="mdi mdi-notification-clear-all"></i>
                        <span class="hide-menu">Multi level dd</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-octagram"></i>
                                <span class="hide-menu"> item 1.1</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
