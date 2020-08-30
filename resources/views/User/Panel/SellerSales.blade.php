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


                   <div class="col-md-12 mt-3">
                       <div class="card-deck text-right">
                           <div class="card text-white bg-success mb-3">
                               <div class="card-header">تعداد فروش</div>
                               <div class="card-body">
                                   <h5 class="card-title">{{$sales->count()}} محصول </h5>
                               </div>
                           </div>
                           <div class="card text-white bg-danger mb-3">
                               <div class="card-header">کل درآمد از زمان شروع فعالیت</div>
                               <div class="card-body">
                                   <h5 class="card-title">{{number_format($userIncome)}} تومان </h5>

                               </div>
                           </div>
                           <div class="card text-white bg-primary mb-3">
                               <div class="card-header">تعداد کل محصولات شما</div>
                               <div class="card-body">
                                   <h5 class="card-title">{{$productCount}} محصول </h5>

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


