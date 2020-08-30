@extends('Admin.sections.master')

@section('content')

    <div id="main-wrapper">


        @include('Admin.sections.header')

        @include('Admin.sections.sidebar')


        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">کاربران</h4>
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
                            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <from class="form-horizontal form-material">
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Type name"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Email"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Phone"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Designation"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Age"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Date of joining"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"
                                                               placeholder="Salary"></div>
                                                    <div class="col-md-12 m-b-20">
                                                        <div
                                                            class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                            <span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                            <input type="file" class="upload"></div>
                                                    </div>
                                                </div>
                                            </from>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect"
                                                    data-dismiss="modal">Save
                                            </button>
                                            <button type="button" class="btn btn-default waves-effect"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <table id="demo-foo-addrow"
                                   class="table m-t-2 no-wrap table-hover contact-list footable-loaded footable"
                                   data-page-size="10">
                                <thead class="bg-info text-white">
                                <tr>
                                    <th class="footable-sortable">#<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">نام<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">ایمیل<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">Phone<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">نقش کاربری<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">تاریخ عضویت<span
                                            class="footable-sort-indicator"></span></th>
                                    <th class="footable-sortable">تنظیمات<span
                                            class="footable-sort-indicator"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ?>
                                @foreach($users as $user)
                                    <?php $i++ ?>
                                    <tr class="footable-even" style="">
                                        <td><span class="footable-toggle"></span>{{ $i}}</td>
                                        <td>
                                            <a href="javascript:void(0)"><img src="{{$user->profile_image}}"
                                                                              alt="user" width="40"
                                                                              class="rounded-circle">
                                                {{$user->name}}
                                            </a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td class="dir-ltr">{{$user->phone}}</td>
                                        <td>
                                            <span class="label {{ $user->getRoleNames() == '["Admin"]' ? 'label-success' : ($user->getRoleNames() == '["Seller"]' ? 'label-info' : 'd-none')}}">
                                                     {{str_replace(array('[',']','"'), '', $user->getRoleNames())}}
                                            </span>
                                        </td>
                                        <td>{{jdate($user->created_at)->format('%d %B، %Y')}}</td>
                                        <td>







                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Modal{{$user->id}}">
                                                <i class="ti-settings" aria-hidden="true"></i> Role Setting
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                نقش کاربری برای :
                                                                {{$user->name }}<p class="text-danger"> {{$user->email}} </p>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                {{--افزودن نقش کاربری--}}
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">انتخاب نقش کاربری</h4>
                                                                        <form action="{{route('roleAddToUser')}}" method="post">
                                                                            @csrf

                                                                            <div class="form-row">
                                                                                <div class="col-md-12 mb-3">
                                                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                                    <select class="custom-select" name="role" id="role">
                                                                                        @foreach($roles as $role)
                                                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary" type="submit">افزودن</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                {{--حذف نقش کاربری--}}
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">حذف نقش کاربری</h4>
                                                                        <form action="{{route('roleDeleteToUser')}}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                            <div class="form-row">
                                                                                <div class="col-md-12 mb-3">
                                                                                    <select class="custom-select" name="role" id="role">
                                                                                        @foreach($user->roles as $role)
                                                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-danger" type="submit">حذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>











                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-info btn-rounded"
                                                data-toggle="modal" data-target="#add-contact">Add New Contact
                                        </button>
                                    </td>

                                    <td colspan="7">
                                        <div class="d-flex justify-content-end">
                                            {{$users->render() }}
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
