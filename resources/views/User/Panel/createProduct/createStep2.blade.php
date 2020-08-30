@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
        @include('Home.sections.TopHeader')
        @include('Home.sections.ButtomHeader')

        <div class="container">
            <div class="row">

                    <div class="col-md-12 mt-md-4 mt-2">
                        <div class="card mb-4 bg-f5f5f5">
                            <div class="card-body text-center text-right">
                                <div class="h5">باگذاری تصاویر و فایل محصول</div>
                                <div class="card bg-fa mt-md-5 mt-3">
                                    <div class="card-body text-right">
                                        <h5 class="card-title text-muted h6">مواردی که لازم است برای بارگذاری تصاویر و فایل محصول رعایت کنید:</h5>
                                           <ol>
                                                <li class="card-text text-muted h6"><p>تصویر کوچک محصول می بایست به فرم مربعی شکل بوده تا به درستی نمایش داده شود</p></li>
                                                <li class="card-text text-muted"><p>تصویر بزرگ محصول تصویری است که شکل کلی محصول را نشان می دهد و باید به شکل مستطیل شکل باشد.</p></li>
                                                <li class="card-text text-muted"><p class="text-danger"> فایل محصول حتما باید با فرمت ZIP باشد.</p></li>
                                                <li class="card-text text-muted"><p class="text-danger"> فایل محصول نباید بیشتر از 250 مگابایت باشد.</p></li>
                                                <li class="card-text text-muted"><p class="text-danger bg-warning"> ترتیب قرار دادن فایل ها مهم بوده و باید از سمت راست ابتدا تصویر کوچک ، بزرگ و در انتها فایل محصول را قرار دهید. درصورت اشتباه انجام دادن، محصول شما تایید نخواهد شد.</p></li>
                                            </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                             @foreach($products as $product)
                                <thead>
                                <tr>
                                    <th class="text-center bg-turquoise" scope="col" colspan="3">{{$product->title}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="text-right"> 1.تصویر کوچک</div>

                                        <form id="smallImage" action="{{route('user.upload.small.image',$product->id)}}" class="dropzone" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                        </form>
                                    </td>
                                    <td>
                                        <div class="text-right">2.تصویر بزرگ</div>
                                        <form id="largeImage" action="{{route('user.upload.large.image',$product->id)}}" class="dropzone" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                        </form>
                                    </td>
                                    <td>
                                        <div class="text-right">3.فایل محصول با فرمت ZIP</div>
                                        <form id="zipfile" action="{{route('user.upload.file',$product->id)}}" class="dropzone" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                        </form>
                                    </td>
                                </tr>

                                </tbody>

                        @endforeach
                        </table>
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

<script src="{{asset('js/product-setting.js')}}"></script>
<script>


        Dropzone.options.smallImage = {
            paramName: "smallImage", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            maxFiles: 1,
            timeout:300000,
            uploadMultiple:false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",

        };

        Dropzone.options.largeImage = {
            paramName: "largeImage", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            maxFiles: 1,
            timeout:300000,
            uploadMultiple:false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",

        };

        Dropzone.options.zipfile = {
            paramName: "zipfile", // The name that will be used to transfer the file
            maxFilesize: 250, // MB
            maxFiles: 1,
            timeout:300000,
            uploadMultiple:false,
            acceptedFiles: ".zip",
            success: function (data) {
                window.location =" {{route('user_create_product')}}";
            },

        };



</script>



@endsection

