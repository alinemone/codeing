@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
        @include('Home.sections.TopHeader')
        @include('Home.sections.ButtomHeader')

        <div class="container-fluid">
            @include('User.Panel.sections.header_userpanel')

            <div class="row">


                <div class="container-fluid">
                    <div class="row pt-md-2 pt-1">
                        <div class="col-md-9 p-1">
                            <div class="bg-f5f5f5 text-center">
                                <h5 class="pt-md-4 pt-2">خـــوش آمدیـــد, شما هنوز فروش خود را آغاز نکرده اید ...</h5>
                                <small class="text-center text-999">با تشکر از شما برای عضویت و استفاده از خدمات ما.</small>

                                <div class="p-4 d-md-flex justify-content-center d-inline">
                                    <div class="card ml-md-2 mt-md-0 mt-2">
                                        <div class="card-body bg-ed text-center">
                                            <div class="h5">
                                                تبدیل شدن به فروشنده
                                            </div>
                                            <P>در صورتی که می خواهید که در یکی از بخش های وبسایت شروع به فروشندگی کرده و کسب درآمد داشته باشید , اقدام به فروشنده شدن کنید</P>
                                            <a href="{{route('join')}}" class="btn btn-ok {{ auth()->user()->store_active === 1 ? "disabled" : "" }}">شروع درآمد</a>
                                        </div>
                                    </div>
                                    <div class="card mr-md-2 mt-md-0 mt-2">
                                        <div class="card-body bg-ed text-center">
                                            <div class="h5">
                                                مشخصات شما
                                            </div>
                                            <P>شما داخل پنل کاربری خود می توانید اطلاعات لازم مربوط به خود را تکمیل کنید. اگر فروشنده باشید لازم است کاربران شما را بهتر بشناسند, همین حالا اقدام کنید</P>
                                            <a href="{{route('profile_edit')}}" class="btn btn-ok">ویرایش اطلاعات نمایه</a>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-999 pt-md-4 pb-md-4 pt-4 pb-4">
                                    با تشکر از شما بابت استفاده از خدمات {{ config('app.name', 'CodiRun') }} , ما تمام سعی خود را خواهیم کرد تا بهترین تجربه خرید اینترنتی را داشته باشید.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 p-1">
                            @can('create_product')
                                <div class="card mb-4">
                                    <div class="card-header text-right bg-333 text-white">
                                        ارسال محصول
                                    </div>
                                    <div class="card-body  text-right">
                                        <form action="{{route('user_create_product')}}" method="get">
                                            <label for="category">دسته بندی محصول را انتخاب کنید</label>
                                            <div class="d-flex">
                                                <select class="form-control form-control-sm select" name="category" id="category">
                                                    @foreach($category as $cat)
                                                        @if($cat->parent_id == null)
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-sm btn-ok mr-2 pb-0" type="submit">انتخاب</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            @endcan
                            <div class="card">
                                <div class="card-header text-right bg-333 text-white">
                                    اطلاعیه ها
                                </div>
                                <div class="card-body  text-right">
                                    <small>تاریخ اطلاعیه</small>
                                    <P>  در این بخش اطلاعیه های ارسالی از نمایش داده می شود.</P>
                                </div>
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
    <script>
        $('.select').select2({
            placeholder: 'موردی انتخاب نشده !',
        });
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#usersidebar").toggleClass("toggled");
        });

    </script>

@endsection

