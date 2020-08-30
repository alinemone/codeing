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
                        <h4 class="page-title">محصولات</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                           <table id="demo-foo-addrow" class="table m-t-30 no-wrap table-hover contact-list footable-loaded footable" data-page-size="10">
                                <thead>
                                <tr>
                                    <th class="footable-sortable">نام محصول<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">نام فروشنده<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">قیمت<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">خریدار<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">درآمد مدیریت<span class="footable-sort-indicator"></span></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($sellProducts as $sell)


                                <tr class="footable-even" style="">
                                    <td>
                                        <a href="{{$sell->products->path()}}">
                                            <img src="{{asset($sell->products->small_image)}}" alt="user" width="40" class="img-circle">
                                            {{$sell->products->title}}
                                        </a>
                                    </td>
                                    <td>{{$sell->products->user->name}}</td>
                                    <td>{{number_format($sell->products->price)}} تومان </td>
                                    <td>
                                        {{\App\User::findOrFail($sell->user_id)->name}}
                                    </td>
                                    <td>{{number_format($sell->adminIncome)}} تومان </td>
                                </tr>


                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New Contact</button>
                                    </td>

                                    <td colspan="7">
                                        <div class="">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination float-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
                                            </nav>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
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
