@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="stepperForm" class="bs-stepper ">
                        <div class="bs-stepper-header dir-ltr" role="tablist">
                            <div class="step" data-target="#join-1">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="join-1">
                                    <span class="bs-stepper-circle">1</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#join-2">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="join-2">
                                    <span class="bs-stepper-circle">2</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#join-3">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="join-3">
                                    <span class="bs-stepper-circle">3</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#join-4">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger4" aria-controls="join-4">
                                    <span class="bs-stepper-circle">4</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#join-5">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger5" aria-controls="join-5">
                                    <span class="bs-stepper-circle">5</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form class="needs-validation" action="{{route('information_user_join')}}" method="post"  novalidate>
                                @csrf
                                <div id="join-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                                    <div class="row">
                                        <div class="col-md-6 bg-fa ">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('img/logo-dark.png')}}" alt="{{ config('app.name', 'CodiRun') }}">
                                            </div>
                                            @if (count($errors) > 0)
                                                <div class="col-md-12">
                                                    <ul class="list-group list-group-flush text-center p-0">
                                                        @foreach ($errors->all() as $error)
                                                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="text-right p-md-2 p-2">
                                                <h3 class="pt-md-4 pt-4"><strong>خــــوش آمدیـــــد</strong></h3>
                                                <p class="text-dark">چند قدم تا کسب و کار و درآمد میلیونی</p>

                                                <strong class="h3">بدونه سرمایه گذاری درآمد میلیونی داشته باشید</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    {{ config('app.name', 'CodiRun') }} این شرایط را برای افراد خلاق فراهم کرده است تا با ایده ها و خلاقیت های خود بدون هیچگونه سرمایه گذاری اولیه , جهانی شده و کسب درآمد داشته باشند. فروشندگان زیادی از طریق کدیران درآمد های میلیونی کسب کرده اند.
                                                </p>
                                                <strong class="h3">کارهایی که دوست دارید را انجام دهید</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    ما بر این باور هستیم که شما می توانید کارهایی که دوست دارید و به آنها علاقمند هستید را انجام دهید. با عشق و علاقه خود به کارهایتان جان ببخشید و از این راه ثروتمند شوید.
                                                </p>
                                                <strong class="h3">فرصتی برای جهانی شدن ایده های شما</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    هر فردی مستحق این فرصت است تا ایده های خود را شکوفا کند , اینک کدیران این فرصت را پیش پای شما گذاشته است.
                                                </p>
                                                <button type="button" class="btn btn-ok btn-next-form">برای کسب درآمد و پولدار شدن آماده اید</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                <img class="w-100 h-100" src="{{asset('img/getseler.svg')}}" alt="ایجاد فروشگاه">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="join-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                                    <div class="row">
                                        <div class="col-md-6 bg-fa ">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('img/logo-dark.png')}}" alt="{{ config('app.name', 'CodiRun') }}">
                                            </div>
                                            <div class="text-right p-md-4 p-2">
                                                <h3 class="pt-md-4 pt-4"><strong>شروع به فروشندگی!</strong></h3>
                                                <p class="text-dark">سه نکته مهم که باید درباره فروشندگی در {{ config('app.name', 'CodiRun') }} بدانید.</p>

                                                <strong class="h3">ارائه محصولات با کیفیت و با اصالت.</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    همه میتوانند در {{ config('app.name', 'CodiRun') }} به فروشنده تبدیل شده و همه محصولات خود یا خارجی به صورت فارسی شده یا نال شده را با هر نوع قیمتی را قرار دهند .
                                                </p>
                                                <strong class="h3">فروش بهتر با معرفی واضح ، روشن و به زیبایی</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    نحوه ارائه محصول , توضیحات محصول و تصاویر آن تاثیر بسزایی در فروش شما می تواند داشته باشد. فروشندگانی که این موارد را رعایت کرده باشند فروش فوق العاده ای خواهند داشت.
                                                </p>
                                                <strong class="h3">دریافت امتیاز بالا از پشتیبانی عالی سرچشمه میگیرد.</strong>
                                                <p class="text-dark text-justify line-height-2">
                                                    مشتریان شما ممکن است از شما سوالاتی داشته داشته باشند و یا اینکه نیاز به راهنمایی داشته باشند. برای دریافت امیتاز عالی و قرار گرفتن در لیست فروشندگان ویژه پشتیبانی عالی داشته باشید.
                                                </p>
                                                <div class="form-group">

                                                    <input id="inputCheckForm" name="checkBoxRoules" type="checkbox" class="form-check-input" required="">
                                                    <label for="inputCheckForm" class="form-check-label mr-4">همه قوانین و شرایط را مطالعه کردم و می پذیرم <span class="text-danger font-weight-bold">*</span></label>
                                                    <div class="invalid-feedback">قبول قوانین و شرایط ضروری است!</div>
                                                </div>
                                                <div class="row">
                                                    <button type="button"  class="btn btn-ok btn-next-form">گام بعدی</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                <img class="w-100 h-100" src="{{asset('img/getseler.svg')}}" alt="ایجاد فروشگاه">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="join-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger3">
                                    <div class="row">
                                        <div class="col-md-6 bg-fa ">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('img/logo-dark.png')}}" alt="{{ config('app.name', 'CodiRun') }}">
                                            </div>
                                            <div class="text-right p-md-4 p-2">
                                                <h3 class="pt-md-4 pt-4"><strong>انتخاب اسم و آدرس فروشگاه</strong></h3>
                                                <h5 class="pt-md-4 pt-4"><strong>نام فروشگاه برای چیست ؟</strong></h5>
                                                <p class="text-dark">شما می توانید یک نام منحصر بفرد برای فروشگاه خود انتخاب کنید. مشتریان و کاربران شما را با این اسم و برند میشناسند. سعی کنید یک اسم منحصر بفر انتخاب کنید.</p>

                                                <h3 class="pt-md-2 pt-2"><strong>آدرس فروشگاه برای چیست ؟</strong></h3>
                                                <p class="text-dark line-height-2">
                                                    بعد از انتخاب نام . شما باید آدرس صفحه مربوط به فروشگاه خود را انتخاب کنید. کافیست نام فروشگاه انتخابی را به انگلیسی برای آدرس خود قرار دهید. آدرس فروشگاه به این شکل {{ config('app.url', 'CodiRun') }}/store/shop خواهد شد.
                                                </p>
                                                <h3 class="pt-md-2 pt-2"><strong>چرا باید نام و آدرس فروشگاه را انتخاب کنیم؟</strong></h3>

                                                <p class="text-dark text-justify line-height-2">
                                                    اگر آدرس فروشگاه را به دلخواه خود انتخاب نکنید قادر به ایجاد فروشگاه نیستید. این آدرس امکان تغییر ندارد و همیشه ثابت خواهد بود. همچنین کلیه محصولات شما در این آدرس نمایش داده می شود. نام و برند انتخابی برای فروشگاه معرف شما برای مشتریان است.
                                                </p>
                                                <div class="form-group col-md-8">
                                                    <input id="inputNameForm" name="store_name" type="text" class="form-control" placeholder="نام فروشگاه مثلا : نام برند"  required>
                                                    <small class="form-text text-muted">نام فروشگاه می بایست به صورت فارسی نوشته شود</small>
                                                    <input id="inputUrlForm" name="store_url" type="text" class="form-control mt-2" placeholder="آدرس فروشگاه مثلا : Brand-name"  required>
                                                    <small class="form-text text-muted">آدرس فروشگاه می بایست به صورت انگلیسی نوشته شود</small>
                                                </div>
                                                <div class="row">
                                                    <button type="button"  class="btn btn-ok btn-next-form">گام بعدی</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                <img class="w-100 h-100" src="{{asset('img/getseler.svg')}}" alt="ایجاد فروشگاه">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="join-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger4">
                                    <div class="row">
                                        <div class="col-md-6 bg-fa ">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('img/logo-dark.png')}}" alt="{{ config('app.name', 'CodiRun') }}">
                                            </div>
                                            <div class="text-right p-md-4 p-2">
                                                <h3 class="pt-md-4 pt-4"><strong>چگونه فعالیت می کنید ؟</strong></h3>
                                                <p class="text-dark">چند قدم تا کسب و کار و درآمد میلیونی</p>

                                                <h3 class="pt-md-2 pt-2"><strong>فقط در {{ config('app.name', 'CodiRun') }} فعالیت می کنم</strong></h3>
                                                <p class="text-dark line-height-2">
                                                    من قصد دارم ایده ها و طرح های خود را فقط از طریق {{ config('app.name', 'CodiRun') }} به فروش برسانم. بجز {{ config('app.name', 'CodiRun') }} در هیچ کجای دیگری این فایل ها به فروش نمیرسد.
                                                </p>
                                                <h3 class="pt-md-2 pt-2"><strong>من سایت دارم!</strong></h3>

                                                <p class="text-dark text-justify line-height-2">
                                                    من یک وب سایت شخصی دارم و فایل هایی که در {{ config('app.name', 'CodiRun') }} برای فروش قرار داده ام را در سایت خود نیز به فروش میرسانم.
                                                </p>
                                                <h3 class="pt-md-2 pt-2"><strong>مشخص کنید شما به چه شکلی فعالیت می کنید</strong></h3>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="radioIsCodi" id="exampleRadios1" value="your_site" checked>
                                                        <label class="form-check-label mr-4" for="radioIsCodi">
                                                            فقط در {{ config('app.name', 'CodiRun') }} محصولاتم را میفروشم.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="radioIsCodi" id="exampleRadios2" value="my_site">
                                                        <label class="form-check-label mr-4" for="radioIsCodi">
                                                            در {{ config('app.name', 'CodiRun') }} و سایت خودم محصولات را میفروشم.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button type="button"  class="btn btn-ok btn-next-form">گام بعدی</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                <img class="w-100 h-100" src="{{asset('img/getseler.svg')}}" alt="ایجاد فروشگاه">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="join-5" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger5">
                                    <div class="row">
                                        <div class="col-md-6 bg-fa " style="height: 100vh;">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('img/logo-dark.png')}}" alt="{{ config('app.name', 'CodiRun') }}">
                                            </div>

                                            <div class="text-right p-md-4 p-2">
                                                <h3 class="pt-md-4 pt-4"><strong>تـــبریـــک میگم!</strong></h3>
                                                <p class="text-dark">شما همه گام های فروشنده شدن را پشت سر گذاشتید!</p>

                                                <h3 class="pt-md-2 pt-2"><strong>پیش به سوی کسب درآمد و ثروتمند شدن</strong></h3>
                                                <div class="row">
                                                    <button type="submit" class="btn btn-ok">پیش به سوی کسب درآمد</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none d-md-block d-lg-block d-xl-block d-sm-block">
                                            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                <img class="w-100 h-100" src="{{asset('img/getseler.svg')}}" alt="ایجاد فروشگاه">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="overlay"></div>

@endsection
@section('script')
    <script >
        document.addEventListener('DOMContentLoaded', function () {
            var stepperFormEl = document.querySelector('#stepperForm')
            window.stepperForm = new Stepper(stepperFormEl, {
                animation: true
            })

            var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
            var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'))
            var inputNameForm = document.getElementById('inputNameForm')
            var inputCheckForm = document.getElementById('inputCheckForm')
            var inputUrlForm = document.getElementById('inputUrlForm')
            var form = stepperFormEl.querySelector('.bs-stepper-content form')

            btnNextList.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    window.stepperForm.next()
                })
            })

            stepperFormEl.addEventListener('show.bs-stepper', function (event) {
                form.classList.remove('was-validated')
                var nextStep = event.detail.indexStep
                var currentStep = nextStep

                if (currentStep > 0) {
                    currentStep--
                }

                var stepperPan = stepperPanList[currentStep]

                if ((stepperPan.getAttribute('id') === 'join-2' && !inputCheckForm.checked) ||
                    (stepperPan.getAttribute('id') === 'join-3' && !inputNameForm.value.length)||
                    (stepperPan.getAttribute('id') === 'join-3' && !inputUrlForm.value.length)) {
                    event.preventDefault()
                    form.classList.add('was-validated')
                }
            })
        })
    </script>
    @endsection

