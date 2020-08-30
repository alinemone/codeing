@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
        @include('Home.sections.TopHeader')
        @include('Home.sections.ButtomHeader')

        <div class="container-fluid">
            <div class="row">
                 @if( !request('category') == null)
                    <div class="col-md-8 mt-md-4 mt-2">

                        <div class="card mb-4 bg-f5f5f5">
                            <div class="card-body text-center text-right">
                                <div class="h5">سلام, قبل از ارسال محصول به نکات زیر دقت کنید ...</div>
                                <div class="card bg-fa mt-md-5 mt-3">
                                    <div class="card-body text-right">
                                        <h5 class="card-title text-muted h6">مواردی که لازم است برای ارسال محصول رعایت کنید:</h5>
                                           <ol>
                                                <li class="card-text text-muted h6"><p>استاندارد های ارسال محصول را حتما رعایت کنید.</p></li>
                                                <li class="card-text text-muted"><p>اطلاعات لازم در رابطه با پشتیبانی , فایل راهنمای و مواردی که لازم است را در توضیحات مشخص کنید.</p></li>
                                                <li class="card-text text-muted"><p>فایل ارسالی شما برای فروش باید شامل تمامی مستندارت لازم بوده و با فرمت ZIP بارگذاری شود.</p></li>
                                            </ol>

{{--                                        @include('Admin.sections.error')--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <form action="{{route('user_store_product')}}" method="post" enctype="multipart/form-data" onSubmit="return etbarsangy();">
                            @csrf


                            <div class="card mb-4 bg-fa">
                                <div class="card-body ">
                                    <div class="h5 text-center">عنوان و توضیحات</div>

                                    <div class="form-group text-right">
                                        <label for="product_title">عنوان محصول</label>
                                        <input type="text"  class="form-control form-control-sm @error('product_title') is-invalid @enderror"  name="product_title" id="product_title" value="{{ old('product_title') }}" MaxLength="80" onkeyup="Count()">
                                        <small class="form-text text-muted"><span id="pro_title" >80</span> کارکتر دیگر میتوانید تایپ کنید</small>
                                        @error('product_title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group text-right">
                                        <label>توضیحات محصول</label>
                                        <textarea class="@error('product_descriptions') is-invalid @enderror" name="product_descriptions" id="editor" cols="30" rows="10">{{ old('product_descriptions') }}</textarea>
                                        <small  class="form-text text-danger">توضیحات باید 100% اختصاصی باشد. در غیر اینصورت محصول تایید نخواهد شد.</small>
                                        <small  class="form-text text-muted">سعی کنید تمامی موارد لازم برای بهینه سازی را رعایت کنید. توضیحات کاملی به صورت صادقانه در رابطه با محصول خود بنویسید. هر چقد محتوای شما بهینه و سئو شده باشد شانس ظاهر شدن در نتایج جستوجو بیشتر شده و سبب افزایش فروش شما خواهد شد. سعی کنید بیش از 1000 واژه برای محصول خود توضیحات ذکر کنید این امر می تواند تاثیر خوبی در نتایج موتور جستوجوهایی مثل گوگل داشته باشد.</small>
                                        @error('product_descriptions')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card mb-4 bg-fa">
                                <div class="card-body ">
                                    <div class="h5 text-center">سئو و بهینه سازی محصول</div>

                                    <div class="form-group text-right">
                                        <label>عنوان سئو (فارسی)</label>
                                        <input type="text"  class="form-control form-control-sm @error('seo_title_fa') is-invalid @enderror"  name="seo_title_fa" id="seo_title_fa" value="{{ old('seo_title_fa') }}" MaxLength="60" onkeyup="Count()">
                                        <small class="form-text text-muted"><span id="seo_fa" >60</span> کارکتر دیگر میتوانید تایپ کنید</small>
                                        @error('seo_title_fa')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <label>عنوان سئو (انگلیسی)</label>
                                        <input type="text"  class="form-control form-control-sm @error('seo_title_en') is-invalid @enderror"  name="seo_title_en" id="seo_title_en" value="{{ old('seo_title_en') }}" MaxLength="60" onkeyup="Count()">
                                        <small class="form-text text-muted"><span id="seo_en" >60</span> کارکتر دیگر میتوانید تایپ کنید</small>
                                        @error('seo_title_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <label>توضیحات سئو</label>
                                        <textarea class="w-100 form-control @error('seo_descriptions') is-invalid @enderror" name="seo_descriptions" id="seo_descriptions"  rows="3" MaxLength="120" onkeyup="Count()">{{ old('seo_descriptions') }}</textarea>
                                        <small class="form-text text-muted"><span id="des_fa" >120</span> کارکتر دیگر میتوانید تایپ کنید</small>
                                        @error('seo_descriptions')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card mb-4 bg-fa">
                                <div class="card-body ">
                                    <div class="h5 text-center">تکمیل دسته بندی و جزئیات محصول</div>


                                    <div class="form-group text-right">
                                        <label  for="">انتخاب دسته بندی</label>
                                        <select class="form-control form-control-sm  @error('subcategories') is-invalid @enderror" name="subcategories[]" id="subcategories" >
                                            @foreach($allcategory as $cat)
                                                @if($cat->parent_id == request('category'))
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="category" value="{{request('category')}}">
                                        <small class="text-muted d-flex pt-1">شما دسته بندی
                                            @foreach($allcategory as $cat)
                                                @if($cat->id == request('category'))
                                                    {{$cat->name}}
                                                @endif
                                            @endforeach
                                            را انتخاب کرده اید میتوانید زیر شاخه مربوط به محصول خود را انتخاب نمایید</small>
                                        @error('subcategories')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right d-flex">
                                        <label for="product_title">فایل راهنما</label>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="help" id="helpno" value="0" checked>
                                            <label class="form-check-label mr-3" >
                                               ندارد
                                            </label>
                                            <input class="form-check-input" type="radio" name="help" id="helpyes" value="1">
                                            <label class="form-check-label mr-3" >
                                                دارد
                                            </label>

                                        </div>
                                    </div>

                                    <div class="form-group text-right d-flex">
                                        <label for="product_title">پشتیبانی</label>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="support" id="supportno" value="0" checked>
                                            <label class="form-check-label mr-3" >
                                                ندارد
                                            </label>
                                            <input class="form-check-input" type="radio" name="support" id="supportyes" value="1" >
                                            <label class="form-check-label mr-3" >
                                                دارد
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group text-right">
                                        <label>مرورگر های سازگار</label>
                                        <select class="form-control form-control-sm  @error('browsers') is-invalid @enderror" name="browsers[]" id="browsers" multiple>
                                            @foreach($browsers as $browser)
                                                    <option value="{{$browser->id}}">{{$browser->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('browsers')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <label>طراحی محصول</label>
                                        <select class="form-control form-control-sm  @error('file_products') is-invalid @enderror" name="file_products[]" id="file_products" multiple="multiple">
                                            @foreach($designs as $design)
                                                <option value="{{$design->id}}">{{$design->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('file_products')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <label>فایل های همراه</label>
                                        <select class="form-control form-control-sm  @error('designs') is-invalid @enderror" name="designs[]" id="designs" multiple>
                                            @foreach($filewithproducts as $file)
                                                <option value="{{$file->id}}">{{$file->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('designs')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <label>ایجاد شده با</label>
                                        <select class="form-control form-control-sm  @error('creates') is-invalid @enderror" name="creates[]" id="creates" multiple>
                                            @foreach($creates as $create)
                                                <option value="{{$create->id}}">{{$create->name}}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted d-flex pt-1">مشخص کنید که محصول شما با چه سیستمی ایجاده شده و کار می کند</small>
                                        @error('creates')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <label>لینک پیش نمایش</label>
                                        <input type="text" class="form-control form-control-sm @error('demo_site') is-invalid @enderror"  name="demo_site" id="demo_site" placeholder="مثلا: http://site.com/demo" value="{{ old('demo_site') }}">
                                        <small class="text-muted d-flex pt-1">یک پیشنمایش برای محصول خود ایجاد کرده و لینک آن را اینجا قرار دهید .</small>
                                        @error('demo_site')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right d-none">
                                        <label>پشتیبانی محصول</label>
                                        <input type="text"  class="form-control form-control-sm"  name="support_default" id="support_default" placeholder="40,000 تومان"  onkeyup="separateNum(this.value,this);" value="{{ old('support_default') }}">
                                        <small class="text-muted d-flex pt-1">مبلغی که در قبال پشتیبانی بیشتر از 6 ماه در نظر دارید از خریدارن دریافت کنید را در این فیلد وارد نمایید. این مبلغ برای 6 ماه می باشد.</small>
                                        <small class="text-danger d-flex pt-1">مبلغ پشنهادی در صورت وارد نکردن ، 40,000 تومان است شما میتوانید مبلغ درخواستی خود را وارد نمایید. </small>
                                    </div>

                                </div>
                            </div>

                            <div class="card mb-4 bg-fa">
                                <div class="card-body ">
                                    <div class="h5 text-center">ایجاد برچسب برای محصول</div>
                                    <div class="form-group text-right">
                                        <label for="product_title">برچسب ها</label>
                                        <input type="text" class="@error('tags') is-invalid @enderror"  name="tags" id="form-tags-4" value="{{ old('tags') }}">
                                        <small class="form-text text-muted font-weight-bold">حداقل 3 و حداکثر 10 برچسب وارد کنید و با , آنها را از هم جدا کنید.</small>
                                        @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 bg-fa border-right-3-danger">
                                <div class="card-body">
                                    <div class="h5 text-center">تعیین وضعیت محصول</div>
                                    <div class="text-center p-md-4 p-2 border-bottom"><p>در این بخش می توانید مشخص کنید که این محصول را به صورت رایگان می خواهید ارائه کنید یا غیر رایگان.</p></div>
                                    <div class="form-group text-right d-flex justify-content-around">
                                        <label>وضعیت فروش</label>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input priceproduct" type="radio" name="CashorFree" id="priceCash" value="1" onchange="freeorprice()" checked>
                                            <label class="form-check-label mr-4" >
                                               <p> این یک محصول رایگان نیست</p>
                                            </label>
                                            <input class="form-check-input freeproduct" type="radio" name="CashorFree" id="priceFree" value="0" onchange="freeorprice()">
                                            <label class="form-check-label mr-4" >
                                               <p> این یک محصول رایگان است</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <div id="pricetype">
                               <div class="card mb-4 bg-fa border-right-3-info" >
                                   <div class="card-body">
                                       <div class="h5 text-center">تعیین وضعیت فروش این محصول</div>
                                       <div class="text-center p-md-4 p-2 border-bottom"><p>شما باید مشخص کنید که این محصول فقط در {{config('app.name')}} به فروش میرسد و یا اینکه در سایر سایت ها نیز این محصول را برای فروش قرار داده اید.</p></div>
                                       <div class="form-group text-right d-flex justify-content-around">
                                           <label>وضعیت فروش</label>
                                           <div class="form-check mr-3">
                                               <input class="form-check-input" type="radio" name="selltype" id="selltypeinsite" value="1" >
                                               <label class="form-check-label mr-4 ml-2" >
                                                   <p> فقط در {{config('app.name')}} میفروشم</p>
                                               </label>
                                               <input class="form-check-input" type="radio" name="selltype" id="selltypeothersite" value="0" checked>
                                               <label class="form-check-label mr-4" >
                                                   <p> در سایر سایت ها هم میفروشم </p>
                                               </label>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="card mb-4 bg-fa" id="price">
                                   <div class="card-body">
                                       <div class="h5 text-center">تعیین قیمت پیشنهادی برای محصول</div>
                                       <div class="text-center p-md-4 p-2 border-bottom"><p>قیمتی که برای محصول خود در نظر دارید را در کادر زیر وارد کنید.</p></div>
                                       <div class="form-group text-right d-flex justify-content-around">
                                           <div class="form-group text-right w-100">
                                               <label>قیمت محصول</label>
                                               <input type="text"  class="form-control form-control-sm @error('product_price') is-invalid @enderror"  name="product_price" id="product_price" placeholder="مثال : 10,000 تومان" onkeyup="separateNum(this.value,this);" value="{{ old('product_price') }}">
                                               <small class="form-text text-muted"> قیمت را به تومان لحاظ فرمایید</small>
                                               @error('product_price')
                                               <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>

                                       </div>
                                   </div>
                               </div>
                           </div>

                            <div class="form-group text-right w-100">
                                <button type="submit" class="btn btn-ok mr-2 pb-0">ارسال محصول</button>
                            </div>

                        </form>

                    </div>
                    <div class="col-md-4 mt-md-4 mt-2">
{{--                        sidebar create product--}}
                        <div class="card mb-4">
                            <div class="card-header text-right bg-333 text-white">
                                تغیر دسته بندی
                            </div>
                            <div class="card-body  text-right">
                                <form action="{{route('user_create_product')}}" method="get">
                                    <p for="category" class="text-danger">توجه داشته باشید در صورتی که محتوا برای محصول خود وارد کرده باشید با تغییر دسته بندی کلیه تغییرات شما در این صفحه از بین خواهد رفت</p>
                                    <div class="d-flex">
                                        <select class="form-control form-control-sm  w-100" name="category" id="category">
                                            @foreach($allcategory as $cat)
                                                @if($cat->parent_id == null)
                                                    <option value="{{$cat->id}}"{{ $cat->id == request('category') ? "selected" : "" }}>{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button class="btn btn-sm btn-ok mr-2 pb-0" type="submit">تغییر</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                 @else
                    {{--if without category --}}
                     <div class="col-md-12 p-md-5 p-2">
                         <div class="d-flex justify-content-center flex-column align-items-center">
                             <div class="h4 text-center mb-md-4 mb-2">دسته بندی محصول خود را انتخاب کنید</div>
                             <div class="col-md-8 bg-f5f5f5 p-md-5 p-2 border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{route('user_create_product')}}" method="get">
                                            <div class="form-group d-flex flex-column">
                                                <select class="form-control w-100" name="category" id="category">
                                                    @foreach($allcategory as $cat)
                                                        @if($cat->parent_id == null)
                                                            <option value="{{$cat->id}}"{{ $cat->id == request('category') ? "selected" : "" }}>{{$cat->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-ok mt-2">انتخاب</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6 border-right">
                                       <p class="text-md-right text-center line-height-2"> اگر دسته بندی مورد نظر شما در این لیست موجود نمی باشد. جهت افزودن دسته بندی از قسمت تیکت ها درخواست ارسال فرمایید.</p>
                                    </div>
                                </div>
                             </div>
                         </div>
                     </div>
                 @endif
            </div>
        </div>

    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection

@section('script')
@include('ckfinder::setup')

<script src="{{asset('js/product-setting.js')}}"></script>
<script>
    @if (count($errors) > 0)
    swal.fire({
        icon: 'warning',
        title: 'دقت کنید',
        text: 'بعضی از فیلد ها به درستی تکمیل نشده اند مجدد سعی کنید',
    })
    @endif
        // input tags
    $(function() {
        $('#form-tags-4').tagsInput();
    });

</script>



@endsection

