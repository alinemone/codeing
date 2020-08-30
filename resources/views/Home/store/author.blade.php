@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
    @include('Home.sections.TopHeader')
    @include('Home.sections.ButtomHeader')
    <!-- body -->
        <div class="container-fluid bg-store-head">
            <div class="row p-0 img-store">

                <div class="container">
                    <dv class="row pt-md-4 pt-3 pb-md-4 pb-3">
                        <div class="col-md-8 d-flex align-items-center">
                            <img class="rounded-circle" src="{{$user->profile_image}}"/>
                            <div class="w-100 text-right pr-3 d-flex flex-column">
                                <h2 class="h18 font-weight-bold text-white">{{$user->name}}</h2>
                                <span class="text-white mt-2"> عضو شده از {{jdate($user->created_at)->ago()}}</span>
                                <a class="btn btn-sm btn-ok w-fit mt-2" href="{{route('userStore',$user->store_url)}}">نمایش نمونه کارها</a>
                            </div>
                        </div>
                        <div class="col-md-4 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                            <div class=" d-flex justify-content-center align-items-center ">
                                <div class="m-2">
                                    <p class="text-white">امتیاز طراح</p>
                                    <small class="text-white">5 امتیاز</small>
                                </div>
                                <div class="m-2">
                                    <p class="text-white">تعداد فروش</p>
                                    <small class="text-white">5 امتیاز</small>
                                </div>
                            </div>
                        </div>

                    </dv>
                </div>


                <div class="container">
                    <ul class="nav nav-tabs border-bottom-0 p-0 store-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ active('author') }}"  href="{{route('author',$user->username)}}">حساب کاربری</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active('userStore') }}" href="{{route('userStore',$user->store_url)}}" >نمونه کارها</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-3">




                <div class="col-md-8">
                    <div class="tab-content" id="myTabContent">
                        {{--  User Info  --}}
                        <div class="tab-pane fade show {{ active('author') }}">
                            <div class="card">
                                <img class="card-img" src="{{str_replace(' ', '%20', $user->store_image)}}" alt="{{$user->store_name}}">
                            </div>

                            <div class="ck-content text-right dir-rtl">
                                {!! $user->store_info !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-f5f5f5 d-flex align-items-center">
                           <img src="{{asset('img/logo-single.png')}}" height="60px" />
                            <span>{{$user->products->count()}} محصول در {{config('app.name')}}</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>



    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection

