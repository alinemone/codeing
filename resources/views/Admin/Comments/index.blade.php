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
                        <h4 class="page-title">دیدگاه ها</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">آخرین دیدگاه ها</h4>
                            </div>
                            <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:560px;" data-ps-id="301d5a67-356b-b007-eee2-cba4e74c1dae">
                                @foreach($commentsActive as $comment)
                                    <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <img src="{{\App\User::findOrFail($comment->user_id)->profile_image}}" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text active w-100">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6 class="font-medium">نویسنده : {{\App\User::findOrFail($comment->user_id)->name}}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="font-medium">محصول : <a href="{{\App\Product::findOrFail($comment->product_id)->path()}}">{{\App\Product::findOrFail($comment->product_id)->title}}</a> </h6>
                                            </div>
                                        </div>
                                        <span class="m-b-15 d-block">
                                            {{$comment->comment}}
                                        </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"> {{jdate($comment->created_at)->format('Y/m/d')}}</span>
                                            <span class="label label-success label-rounded">Approved</span>
                                            <span class="action-icons active">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="icon-close"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart text-danger"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
