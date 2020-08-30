<footer>
    <div class="container-fluid">
        <div class="row bg-333 pt-4 pb-4">
            <div class="h6 col-md-12 text-right">
                <p class="text-white">محبوب ترین دسته بندی ها</p>
            </div>
            {{--     Loop   --}}
            @foreach($categories as $category)
            <div class="col-md-3 col-6 text-md-right text-center ">
                <a href="{{route('viewCategory',$category->slug)}}" class="text-white ">{{$category->name}}</a>
            </div>
            @endforeach
            {{--     Loop   --}}

        </div>

        <div class="row bg-darker pt-5 pb-4">

            {{--     Loop   --}}
            <div class="col-md-3 col-6 text-md-right text-center">


                <ul class=" list-unstyled ">
                    <li class="text-white list-unstyled pl-2">
                        <a href="#" class=" text-white">شرایط و قوانین</a>
                    </li>
                    <li class="text-white list-unstyled">
                        <a href="#" class=" text-white">سوالات متداول</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-6 text-md-right text-center">
                <ul class=" list-unstyled ">
                    <li class="text-white list-unstyled pl-2">
                        <a href="#" class=" text-white">تماس با ما</a>
                    </li>
                    <li class="text-white list-unstyled">
                        <a href="#" class=" text-white">کسب درامد</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 text-right"></div>

            <div class="col-md-3 text-center pt-2">
                <a href="{{route('index')}}"><img src="{{asset('img/logo.png')}}" alt="" height="40"></a>
                <ul class="list-brand list-unstyled text-center justify-content-center pt-4">
                    <li class="text-white list-unstyled pl-2">
                        <span>{{$Accepted+$vizheh+$StopSelling+$Update}}<br></span> محصول آماده
                    </li>
                    <li class="text-white list-unstyled">
                        <span>{{$userCount}}<br></span> کاربر
                    </li>
                </ul>
            </div>
            {{--     Loop   --}}

         </div>
        <div class="row bg-darker pt-2 pb-4 border-top border-lights">

            <div class="col-md-6">

                <ul class="nav list-unstyled">
                    <li class="nav-item ">
                        <a class="nav-link active text-white" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Link</a>
                    </li>
                </ul>
                <div class="text-right">
                    <p>کلیه قیمت ها در مارکت به واحد هزار تومان می باشد</p>
                    <p> تمامی حقوق آثار و محصولات برای صاحبان اثر محفوظ می باشد.</p>
                </div>
            </div>

            <div class="col-md-6 col-12 text-center text-md-left text-sm-left text-lg-left">
                <ul class="list-brand list-unstyled justify-content-center  justify-content-sm-end justify-content-md-end justify-content-lg-end pt-4">
                    <li class="text-white list-unstyled pl-2">
                        <img src="/img/twitter.svg" alt="" height="40">
                    </li>
                    <li class="text-white list-unstyled pl-2">
                        <img src="/img/youtube.svg" alt="" height="40">
                    </li>
                    <li class="text-white list-unstyled pl-2">
                        <img src="/img/facebook.svg" alt="" height="40">
                    </li>
                    <li class="text-white list-unstyled pl-2">
                        <img src="/img/instagram.svg" alt="" height="40">
                    </li>
                    <li class="text-white list-unstyled pl-2">
                        <img src="/img/pinterest.svg" alt="" height="40">
                    </li>
                </ul>

                <a class="btn btn-DMCA" href="{{route('dmca')}}">Digital Millennium Copyright Act (DMCA)</a>
            </div>
        </div>

    </div>
</footer>
