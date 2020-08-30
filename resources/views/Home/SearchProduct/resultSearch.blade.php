@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
    @include('Home.sections.TopHeader')
    @include('Home.sections.ButtomHeader')
    <!-- body -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ Breadcrumbs::render('search',request('search')) }}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if($products->count() == 0)
                    <div class="col-md-12 d-flex justify-content-center align-items-center h-50vh">
                        <h4>هیچ محصولی یافت نشد مجدد سعی کنید!</h4>
                    </div>
                @endif
                @foreach($products as $product)
                    @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)

                        <div class="card mb-3 w-100 items">
                            <div class="row no-gutters">
                                <div class="col-md-4">

                                    <div class="cart-image">
                                        <a href="{{$product->path()}}"><img src="{{$product->large_image}}" alt="{{$product->title}}" class=" image card-img"></a>
                                        <div class="like"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8 text-right">
                                    <div class="card-body">
                                        <div class="row p-0">
                                            <div class="col-md-9">
                                                <h5 class="card-title"><a class="text-dark" href="{{$product->path()}}">{{$product->title}}</a> </h5>
                                                <div class="row justify-content-between pr-3 pl-3">
                                                    <p class="card-text">فروشنده <a href="{{$product->user->store()}}">{{$product->user->store_name}}</a></p>

                                                    {{-- dispaly mobile --}}
                                                    <div class="text-left d-block d-sm-none">
                                                        <span class="font-weight-bold"> {{number_format($product->price)}} تومان </span>
                                                    </div>
                                                </div>
                                                {{-- dispaly desktop --}}
                                                <div class="d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                                    @if($product->product_help == 1)
                                                        <smal>فایل راهنما : دارد</smal>
                                                    @else
                                                        <small>فایل راهنما : ندارد</small>
                                                    @endif
                                                </div>
                                                <div class="d-block d-sm-none ">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{$product->path()}}" class="btn btn-sm btn-outline-ok ml-2"> نمایش</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- dispaly desktop --}}
                                            <div class="col-md-3 border-right d-none d-md-block d-lg-block d-xl-block d-sm-block ">
                                                <div class="text-left pb-5">
                                                    <span class="font-weight-bold"> {{number_format($product->price)}} تومان </span>
                                                </div>
                                                <p class="card-text"><small class="text-muted">بروزرسانی {{jdate($product->updated_at)->ago()}}</small></p>

                                                <div>
                                                    <a href="{{$product->path()}}" class="btn btn-sm btn-outline-ok ml-2"> نمایش</a>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 dir-ltr d-flex justify-content-center">
{{--                    {{$products->render()}}--}}
                </div>
            </div>
        </div>


    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection

