@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
        @include('Home.sections.TopHeader')
        @include('Home.sections.ButtomHeader')

        <div class="container-fluid">
            @include('User.Panel.sections.header_userpanel')

            <div class="container">
                <div class="row">
                    <div class="col-md-2 p-1">
                        @include('User.Panel.sections.setting-sidebar')
                    </div>

                    <div class="col-md-10 p-1">
                        <div class="card m-md-2 m-0 border">
                            <div class="card-header bg-white text-center">
                                حساب کاربری عمومی
                            </div>
                            <div class="card-body  text-right">
                                <form action="{{route('save_profile_edit',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="file">تصویر آواتار</label>
                                        <small id="avatar_help" class="form-text text-muted">بارگذاری تصویری که در آوتار حساب شما نمایش داده می شود.</small>
                                        <input type="file" accept="image/*" class="form-control-file @error('avatar') is-invalid @enderror" onchange="validate(this,1)" name="avatar" id="avatar"  value="{{ auth()->user()->avatar }}" >
                                        <small id="avatar_help" class="form-text text-muted">فرمت تصویر باید jpg - png باشد.</small>
                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                             </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="file">تصویر صفحه اصلی</label>
                                        <small id="avatar_help" class="form-text text-muted">بارگذاری تصویری که در صفحه اصلی حساب شما نمایش داده می شود.</small>
                                        <input type="file" accept="image/*" class="form-control-file" onchange="validate(this,1)" id="store_img" name="store_img" value="{{ auth()->user()->store_img }}">
                                        <small id="avatar_help" class="form-text text-muted">فرمت تصویر باید jpg - png باشد و اندازه عکس 590 * 250 پیکسل باشد.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="myinfo">درباره من</label>
                                        <textarea id="editor" name="store_info">{{auth()->user()->store_info}}</textarea>
                                        <small id="avatar_help" class="form-text text-muted">
                                            متنی که در این قسمت وارد می کنید در صفحه حساب کاربری شما نمایش داده خواهد شد. این متن می تواند در باره شما و اطلاعاتی در رابطه با کار شما باشد.
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-ok">ویرایش</button>
                                </form>
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
@section('script')
    @include('ckfinder::setup')
@endsection

