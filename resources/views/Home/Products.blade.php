<div class="bg-f5f5f5">
    <div class="container-fluid container-sm container-md container-lg container-xl pt-5 pb-5 bg-f5f5f5">
        <div class="row">
            <div class="col-md-12">
                <div class="h4 font-weight-bold text-center">
                    محصولات ویژه هفته اخیر را دنبال کنید
                </div>
                <p class=" text-center"> {{ config('app.name', 'CodiRun') }} هر هفته بهترین طرح ها را کشف کرده و در
                    اینجا به نمایش میگذارد.</p>
                <p class=" text-center"> این محصولات به نوبه خود در لیست بهترین های مارکت قرار گرفته اند.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pr-1 pl-1">
                <ul class="list-unstyled">
                    <div class=" d-flex ">
                        <div class="Grid">
                            @foreach($products as $product)

                                @if($product->status->first()->id == 3)
                                    <li class="pl-1 list-unstyled">
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
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </ul>
            </div>
        </div>



    </div>
</div>

<div class="bg-white">
    <div class="container-fluid container-sm container-md container-lg container-xl pt-5 pb-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="  text-center">
                    <h2 class="h4 font-weight-bold t-heading -size-l"> جدیدترین قالب ها و
                        تم های ما را بررسی کنید</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3 p-0 product-navs" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="p-1 nav-link active" data-toggle="pill" href="#allProducts" role="tab">همه محصولات</a>
                    </li>
                    @foreach($CatProducts as $category)
                        <li class="nav-item">
                            <a class="p-1 nav-link" data-toggle="pill" href="#id{{$category->id}}" role="tab">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    {{--          all Products          --}}
                    <div class="tab-pane fade show active" id="allProducts" role="tabpanel">
                        <ul class="list-unstyled">
                            <div class=" d-flex ">
                                <div class="Grid">
                                    @foreach($products as $product)
                                        @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                                            @if($product->sell_status == 1)
                                            <li class="pl-1 list-unstyled">
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
                                            </li>
                                             @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </div>
                    {{--   Product to category  --}}
                    @foreach($CatProducts as $category)
                        <div class="tab-pane fade" id="id{{$category->id}}" role="tabpanel">
                            <ul class="list-unstyled">
                                <div class="d-flex justify-content-righte">
                                    <div class="Grid">
                                        @foreach($category->products as $product)
                                            @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                                                 @if($product->sell_status == 1)
                                                    <li class="p-0 list-unstyled w-fit">
                                                        <div class="wr-item">
                                                            <a href="{{$product->path()}}"
                                                               class="screenshot-preview"
                                                               data-preview="{{str_replace(' ', '%20', $product->large_image)}}"
                                                               data-titr="{{$product->title}}"
                                                               data-titrsmall="@foreach($product->categories as $cat) {{$cat->name .''}} @endforeach"
                                                               data-price="{{number_format($product->price)}}"
                                                               title="{{$product->title}} ">
                                                                <img class="" src="{{str_replace(' ', '%20', $product->small_image)}}" width="80px" height="80px"/>
                                                            </a>
                                                        </div>
                                                    </li>
                                                 @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </ul>
                        </div>
                    @endforeach
                </div>



            </div>
        </div>


    </div>
</div>



<div class="bg-white border-top">
    <div class="container-fluid container-sm container-md container-lg container-xl pt-5 pb-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="  text-center">
                    <h4 class="h4 font-weight-bold t-heading -size-l">آیتم های رایگان را دانلود کنید</h4>
                    <p class=" text-center">{{ config('app.name', 'CodiRun') }} همیشه فایل های رایگان را برای شما آماده کرده است. شما می توانید آیتم هایی که به صورت رایگان توسط طراحان ارائه می شوند را به صورت کاملا رایگان دریافت کنید. </p>
                    <p class=" text-center">برخی طراحان و افراد برای معرفی و جهانی کردن خدمات خود فایل های با کیفیتی را به صورت رایگان ارائه می کنند.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 pr-1 pl-1">
                <ul class="list-unstyled">
                    <div class=" d-flex ">
                        <div class="Grid">
                            @foreach($products as $product)

                                @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                                     @if($product->sell_status == 0)
                                    <li class="pl-1 list-unstyled">
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
                                    </li>

                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </ul>
            </div>
        </div>


    </div>
</div>
