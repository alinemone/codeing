@extends('Admin.sections.master') @section('content')

    <div id="main-wrapper">

        @include('Admin.sections.header') @include('Admin.sections.sidebar')

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">بروزرسانی محصول</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <nav>
                            <div class="product nav nav-tabs border-0" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link text-dark active" id="nav-home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">اطلاعات محصول</a>
                                <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">سئو</a>
                                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#user-info" role="tab" aria-controls="user-info" aria-selected="false">اطلاعات فروشنده</a>
                                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#off" role="tab" aria-controls="off" aria-selected="false">تخفیف</a>
                                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="false">برچسب ها</a>
                                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">فایل ها</a>
                                <a class="nav-item nav-link text-dark" id="nav-contact-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">وضعیت محصول</a>
                            </div>
                        </nav>
                        <div class="tab-content p-md-2 p-1 border bg-f5f5f5" id="nav-tabContent">
{{--                        info       --}}
                            <div class="tab-pane fade show active " id="info" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label class="control-label" >نام محصول </label>
                                        <input type="text" name="title" class="form-control " value="{{$product->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >لینک محصول</label>
                                        <input type="text" name="slug" class="form-control " value="{{$product->slug}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >توضیحات محصول</label>
                                        <textarea class="form-control" rows="3" id="editor" name="product_descriptions">{{$product->body}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >لینک دمو</label>
                                        <input type="text" name="demoUrl" class="form-control " value="{{$product->demoUrl}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">فایل راهنما</label>
                                                <select class="form-control" name="product_help"  tabindex="1">
                                                    <option value="1" {{ $product->product_help == 1 ? 'selected' : '' }}>دارد</option>
                                                    <option value="0" {{ $product->product_help == 0 ? 'selected' : '' }}>ندارد</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">پشتیبانی</label>
                                                <select class="form-control" name="product_support" tabindex="1">
                                                    <option value="1" {{ $product->product_support == 1 ? 'selected' : '' }}>دارد</option>
                                                    <option value="0" {{ $product->product_support == 0 ? 'selected' : '' }}>ندارد</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">وضعیت فروش</label>
                                                <select class="form-control" name="sell_status" data-placeholder="نوع فروش را انتخاب کنید." tabindex="1">
                                                    <option value="0" {{ $product->sell_status == 0 ? 'selected' : '' }}>رایگان</option>
                                                    <option value="1" {{ $product->sell_status == 1 ? 'selected' : '' }}>غیررایگان</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">وضعیت فروش</label>
                                                <select class="form-control" name="sell_status_which" data-placeholder="نوع فروش در سایت را انتخاب کنید." tabindex="1">
                                                    <option value="1" {{ $product->sell_status_which == 1 ? 'selected' : '' }}>فقط در {{config('app.name')}}</option>
                                                    <option value="0" {{ $product->sell_status_which == 0 ? 'selected' : '' }}>در دیگر سایت ها</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" >قیمت محصول</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="price" class="form-control " value="{{$product->price}}">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" >پشتیبانی</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="productSupportPrice" class="form-control " value="{{$product->productSupportPrice}}">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">دسته بندی ها</label>
                                                <select class="form-control" name="category" data-placeholder="دسته بندی را انتخاب کنید." tabindex="1">
                                                    <option value="">دسته بندی را انتخاب کنید.</option>
                                                    @foreach($allcategory as $category)
                                                        @if($category->parent_id == null)
                                                             <option value="{{$category->id}}" @foreach($product->categories as $productCat){{ $productCat->id == $category->id ? 'selected' : '' }} @endforeach>{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">زیر دسته ها</label>
                                                <select class="form-control" name="subcategory" data-placeholder="زیر دسته را انتخاب کنید." tabindex="1">
                                                    <option value="" disabled>زیر دسته را انتخاب کنید.</option>
                                                    @foreach($allcategory as $category)
                                                        @if($category->parent_id == null)
                                                            <optgroup label="{{$category->name}}" class="control-label">
                                                                @foreach($allcategory as $subcat)
                                                                    @if($subcat->parent_id == $category->id)
                                                                      <option value="{{$subcat->id}}" @foreach($product->categories as $productCat){{ $productCat->id == $subcat->id ? 'selected' : '' }} @endforeach>{{$subcat->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> بروزرسانی</button>
                                    </div>

                                </form>
                            </div>
{{--                        seo        --}}
                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="{{route('product.seo.update',$product->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" >عنوان سئو (فارسی) </label>
                                        <input type="text" name="seoTitleFa" class="form-control " value="{{$product->seoTitleFa}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >عنوان سئو (انگلیسی)</label>
                                        <input type="text" name="seoTitleEn" class="form-control " value="{{$product->seoTitleEn}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" >توضیحات سئو</label>
                                        <textarea class="form-control" rows="3"  name="seoDescription">{{$product->seoDescription}}</textarea>
                                    </div>

                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> بروزرسانی</button>
                                    </div>
                                </form>
                            </div>
{{--                        userinfo   --}}
                            <div class="tab-pane fade" id="user-info" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="w-25 border-0">نام ایجاد کننده </td>
                                            <td class="border-0"> {{$product->user->name}} </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0">نام فروشگاه </td>
                                            <td class="border-0"> {{$product->user->store_name}} </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0">زمان ثبت نام</td>
                                            <td class="border-0"> {{jdate($product->user->created_at)->format('%A, %d %B %y')}} </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0">فروش های این محصول</td>
                                            <td class="border-0"> به زودی </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0">کل فروش این فروشنده </td>
                                            <td class="border-0"> به زودی </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
{{--                        off        --}}
                            <div class="tab-pane fade" id="off" role="tabpanel" aria-labelledby="nav-contact-tab">
                               تخفیف به زودی
                            </div>
{{--                        tags       --}}
                            <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <form action="{{route('product.tags.update',$product->id)}}" method="post">
                                    @csrf
                                    <div class="form-group text-right">
                                        <input id="form-tags-4" name="tags" type="text" value=" @foreach($product->tags as $tag)  {{$tag->title.','}}@endforeach ">
                                    </div>
                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> بروزرسانی</button>
                                    </div>
                                </form>
                            </div>
{{--                        files      --}}
                            <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-bordered td-padding">
                                            <thead class="bg-success">
                                            <tr>
                                                <th class="text-white" scope="col">فایل ها</th>
                                                <th class="text-white" scope="col">اقدامات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="w-auto">
                                                    <img src="{{$product->small_image}}">
                                                </td>
                                                <td>
                                                    <form action="{{route('product.file.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                                      @csrf
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <label class="custom-file-label" for="small_image">انتخاب تصویر</label>
                                                                <input type="file" class="custom-file-input" id="small_image" name="small_image" required>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-success" type="submit">آپلود</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="{{$product->large_image}}">
                                                </td>
                                                <td>
                                                    <form action="{{route('product.file.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <label class="custom-file-label" for="large_image">انتخاب تصویر</label>
                                                                <input type="file" class="custom-file-input" id="large_image" name="large_image" required>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-success" type="submit">آپلود</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" value="{{storage_path($product->fileUrl)}}"">
                                                </td>
                                                <td>
                                                    <form action="{{route('product.file.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <label class="custom-file-label" for="file">انتخاب فایل</label>
                                                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-success" type="submit">آپلود</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{{--                        status     --}}
                            <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <form action="{{route('product.status.update',$product->id)}}" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>وضعیت فعلی محصول : </label>
                                            @foreach($product->productstatuse as $sta)
                                                <span class="btn {{ $sta->id == 1 ? 'btn-success' : ($sta->id == 2 ? 'btn-danger' : ($sta->id == 3 ? 'btn-warning' : ($sta->id == 4 ? 'btn-dark' : ($sta->id == 5 ? 'btn-info' : '')))) }}">  {{$sta->name}} </span>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">پیام مدیریت برای کاربر</label>
                                            <textarea name="message" class="form-control text-right" rows="3">{{$product->message}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="control-label"> وضعیت محصول</label>
                                            <select class="form-control" name="status" tabindex="1">
                                               @foreach($status as $state)
                                                    @foreach($product->productstatuse as $sta)
                                                        <option value="{{$state->id}}" {{ $state->id == $sta->id ? 'selected' : '' }} >{{$state->name}}</option >
                                                    @endforeach
                                               @endforeach
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                    <div class="form-actions m-t-20">
                                        <button type="submit" class="btn btn-success"> <svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg><!-- <i class="fa fa-check"></i> --> بروزرسانی</button>
                                    </div>
                                </form>
                            </div>
                        </div>







                    </div>
                    <!-- Column -->
                </div>

            </div>
        </div>

    </div>



@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        $('#form-tags-4').tagsInput();
    });
</script>
@endsection
