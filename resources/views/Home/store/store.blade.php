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
                    <div class="row pt-md-4 pt-3 pb-md-4 pb-3">
                        <div class="col-md-8 d-flex align-items-center">
                            <img class="rounded-circle" src="{{$user->profile_image}}"/>
                            <div class="w-100 text-right pr-3 d-flex flex-column">
                                <h2 class="h18 font-weight-bold text-white">{{$user->store_name}}</h2>
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

                    </div>
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
                        {{--    store --}}
                        <div class="tab-pane fade show {{ active('userStore') }}">

                            <div class="row bg-f5f5f5">
                                @foreach($products as $product)
                                    @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                                    <div class="col-md-2 col-sm-3 col-4 pt-4">
                                        <div class="wr-item">
                                            <a href="{{$product->path()}}"
                                               class="screenshot-preview"
                                               data-preview="{{str_replace(' ', '%20', $product->large_image)}}"
                                               data-titr="{{$product->title}}"
                                               data-titrsmall="@foreach($product->categories as $cat) {{$cat->name .''}} @endforeach"
                                               data-price="{{number_format($product->price)}}"
                                               title="{{$product->title}}">
                                                <img class="" src="{{str_replace(' ', '%20', $product->small_image)}}" width="80px" height="80px"/>
                                            </a>
                                        </div>
                                        <h3 class="h7 text-center text-truncate">{{$product->title}}</h3>
                                    </div>


                                    @endif
                                @endforeach
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

