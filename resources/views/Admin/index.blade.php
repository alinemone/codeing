@extends('Admin.sections.master')

@section('content')

<div id="main-wrapper">


    @include('Admin.sections.header')

    @include('Admin.sections.sidebar')


    <div class="page-wrapper">


        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card">
                        <a href="{{route('product.index')}}" class="text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                                    </div>
                                    <div>
                                        <h6 class="m-b-0 font-light">محصولات تایید شده</h6>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="m-b-0 font-light">{{$Accepted}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Card -->
                </div>

                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card">
                        <a href="{{route('product.unverified')}}" class="text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span class="btn btn-circle btn-lg bg-warning">
                                            <i class="ti-clipboard text-white"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="m-b-0 font-light">محصولات تایید نشده</h6>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="m-b-0 font-light">{{$NotAccepted}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Card -->
                </div>
                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card">
                        <a href="{{route('market.sell')}}" class="text-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span class="btn btn-circle btn-lg bg-primary">
                                            <i class="mdi mdi-currency-usd text-white"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="m-b-0 font-light">درآمد</h6>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="m-b-0 font-light">{{number_format($AdminIncome)}} تومان</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Card -->
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

@include('Admin.sections.Footer')

    </div>

</div>

@endsection
