@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
    @include('Home.sections.TopHeader')
    @include('Home.sections.ButtomHeader')
    <!-- body -->
        <div class="container-fluid ">
            <div class="row bg-f5f5f5">
                <div class="col-md-12">
                    {{ Breadcrumbs::render('post',$product) }}
                </div>
                <div class="col-md-12">
                    <h1 class="d-flex justify-content-center product-title">{{$product->title}}</h1>


                    <div class="d-block d-sm-none mb-3 p-3">
                        <form action="{{route('payment')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button class="btn btn-ok w-100">  <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{number_format($product->price)}} تومان   </button>
                        </form>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="container p-0">
                        <ul class="nav nav-tabs p-0">
                            <li class="nav-item">
                                <a href="{{route('Product.single',$product->slug)}}" class="nav-link text-dark {{ active('Product.single') }}">توضیحات محصول</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Product.single.comments',$product->slug)}}" class="nav-link text-dark {{ active('Product.single.comments') }}">دیدگاه ها</a>
                            </li>
                            @can('super_user')
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{route('product.edit',$product->id)}}" >ویرایش</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content mt-3" >
{{--  توضیحات محصول --}}
                            <div class="tab-pane {{ active('Product.single','fade show active') }}">
                                <div class="card mb-3">
                                    <img src="{{$product->large_image}}" class="card-img-top p-2" alt="{{$product->title}}">
                                    <div class="card-body">

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="ck-content card-body text-right">
                                        {!! $product->body !!}
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center flex-column pt-4 text-center">
                                    <h4 class="pb-3 border-bottom"> آخرین محصولات {{$user->store_name}}</h4>



                                    <ul class="list-unstyled">
                                        <div class="d-flex justify-content-righte">
                                            <div class="Grid">
                                                @foreach($lastProducts as $lastProduct)
                                                    @if($lastProduct->status->first()->id == 1 || $lastProduct->status->first()->id == 3 || $lastProduct->status->first()->id == 4)
                                                        <li class="p-0 list-unstyled w-fit">
                                                            <div class="wr-item">
                                                                <a href="{{$lastProduct->path()}}"
                                                                   class="screenshot-preview"
                                                                   data-preview="{{str_replace(' ', '%20', $lastProduct->large_image)}}"
                                                                   data-titr="{{$lastProduct->title}}"
                                                                   data-titrsmall="@foreach($product->categories as $cat) {{$cat->name .''}} @endforeach"
                                                                   data-price="{{number_format($lastProduct->price)}}"
                                                                   title="{{$lastProduct->title}}">
                                                                    <img class="" src="{{str_replace(' ', '%20', $lastProduct->small_image)}}" width="80px" height="80px"/>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </ul>

                                    <a href="{{$user->store()}}" class="btn btn-sm btn-ok w-fit mb-2"> نمایش همه محصولات {{$user->store_name}} </a>

                                </div>
                            </div>

{{--  کامنت ها --}}
                            <div id="application" class="tab-pane {{ active('Product.single.comments','fade show active') }}">
                                <comment-component
                                    product="{{$product->id}}"
                                    authCheck="{{auth()->check()}}"
                                    authid="@if(auth()->check()){{auth()->user()->id}} @endif"
                                />
                            </div>
                        </div>
                    </div>

{{--  ستون کناری سمت چپ --}}
                    <div class="col-md-4">
                        <div class="card mt-3 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <p class=" text-dark m-0">قیمت محصول  </p>
                                <p class="text-dark m-0 font-weight-bold">{{number_format($product->price)}} تومان</p>
                            </div>
                            <div class="card-body p-2">
                                <nav class="nav flex-column text-right">
                                    <p class="nav-link m-0 p-0 h7"><i class="fas fa-check text-ok"></i> بررسی کیفیت محصول </p>
                                    <p class="nav-link m-0 p-0 h7"><i class="fas fa-check text-ok"></i> به روزرسانی های آینده </p>
                                    @if($product->product_support == 1)
                                        <p class="nav-link m-0 p-0 h7"><i class="fas fa-check text-ok"></i> شش ماه پشتیبانی رایگان توسط
                                            {{$product->user->store_name}} </p>
                                    @endif
                                </nav>
                                <p class="text-dark m-0 p-3 text-right h7 font-weight-bold"> قیمت ها به تومان است <i class="fas fa-dollar-sign text-success"></i> </p>

                                <form action="{{route('payment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button class="btn btn-ok w-100">  <i class="fa fa-shopping-cart" aria-hidden="true"></i> پرداخت و دانلود   </button>
                                </form>

                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">

                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="border-0 p-1 text-right w-50">ساخته شده</td>
                                        <td class="border-0 p-1 text-right w-50">{{jdate($product->created_at)->format('Y/m/d')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 p-1 text-right">آخرین بروزرسانی</td>
                                        <td class="border-0 p-1 text-right">{{jdate($product->created_at)->ago()}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 p-1 text-right">سازگار با مرورگر</td>
                                        <td class="border-0 p-1 text-right">@foreach($product->browsers as $browser)<a>{{$browser->name}}</a>@endforeach</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 p-1 text-right">فایل های همراه</td>
                                        <td class="border-0 p-1 text-right">@foreach($product->filewithproduct as $files)<a>{{$files->name}}</a>@endforeach</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 p-1 text-right">نوع طراحی</td>
                                        <td class="border-0 p-1 text-right">@foreach($product->designs as $design)<a>{{$design->name}}</a>@endforeach</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 p-1 text-right">برچسب ها</td>
                                        <td class="border-0 p-1 text-right">

                                            @foreach($product->tags as $tag)<a href="/tag/{{$tag->slug}}">{{$tag->title}}</a>  , @endforeach
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>
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


