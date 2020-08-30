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
                    {{ Breadcrumbs::render('tags',$tag) }}
                </div>
            </div>
            <div class="row">

                @foreach($products as $product)
                    @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                    <div class="col-lg-3 col-md-3 col-12 pt-3 pb-3">
                        <div class="card text-right">
                            <a href="{{$product->path()}}">
                            <div class="cart-image">
                                <img src="{{$product->large_image}}" alt="Avatar" class=" image card-img-top">
                                <div class="like"><i class="fas fa-heart"></i></div>
                            </div>
                            </a>
                            <div class="card-body">
                                <h6 class="card-title"><a class="text-dark" href="{{$product->path()}}">{{$product->title}}</a> </h6>
                                <div class="row justify-content-between pr-3 pl-3">
                                    <p> توسط : {{$product->user->store_name}}<p>
                                    <span> {{number_format($product->price)}} تومان </span>
                                </div>
                                <div class="row justify-content-between pr-3 pl-3">
                                    <p> فروش : 0<p>
                                        <a href="{{$product->path()}}" class="btn btn-sm btn-outline-ok"> نمایش</a>
                                        <a href="#" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 dir-ltr d-flex justify-content-center">
                    {{$products->render()}}
                </div>
            </div>
        </div>



    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection

