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
                        <h4 class="page-title">نقش های کاربری</h4>
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
                        <table id="demo-foo-addrow" class="table m-t-2 no-wrap table-hover contact-list footable-loaded footable" data-page-size="12">
                            <thead class="bg-info text-white">
                            <tr>
                                <th class="footable-sortable">#<span class="footable-sort-indicator"></span></th>
                                <th class="footable-sortable">نام<span class="footable-sort-indicator"></span></th>
                                <th class="footable-sortable">تنظیمات<span class="footable-sort-indicator"></span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($roles as $role)
                                <?php $i++ ?>
                                <tr class="footable-even" style="">
                                    <td><span class="footable-toggle"></span>{{ $i}}</td>

                                    <td><span class="footable-toggle"></span>{{ $role->name}}</td>

                                    <td>

                                        <div class="btn-group">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addPermissions{{$role->id}}">
                                                <i class="ti-settings" aria-hidden="true"></i> افزودن دسترسی
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#edit-{{$role->id}}">
                                                <i class="ti-settings" aria-hidden="true"></i> ویرایش
                                            </button>

                                            <form action="{{route('role.destroy',$role->id)}}" method="post">
                                                @csrf @method('delete')

                                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                                <button type="submit" class="btn btn-sm btn-danger mr-2" onclick="executeExample('warningConfirm')">
                                                    <i class="ti-close" aria-hidden="true"></i> حذف
                                                </button>
                                            </form>
                                        </div>
                                        <!-- Modal Add -->
                                        <div class="modal fade" id="addPermissions{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            دسترسی برای نقش : {{$role->name}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">انتخاب
                                                                        دسترسی</h4>
                                                                    <form action="{{route('AddPermissionsToRole')}}" method="post">
                                                                        @csrf

                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3">
                                                                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                                                                <select class="custom-select" name="permission" id="permission">
                                                                                    @foreach($permisions as $permission)
                                                                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-primary" type="submit">افزودن
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">حذف
                                                                        دسترسی</h4>
                                                                    <form action="{{route('DeletePermissionsToRole')}}" method="post">
                                                                        @csrf

                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3">
                                                                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                                                                <select class="custom-select" name="permission" id="permission">
                                                                                    @foreach($role->permissions as $permission)
                                                                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-danger" type="submit">حذف
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit-->
                                        <div class="modal fade" id="edit-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ویرایش : {{$role->name}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">تغییر نام </h4>
                                                                    <form action="{{route('role.update',$role->id)}}" method="post">
                                                                        @csrf @method("PATCH")
                                                                        <div class="form-row">
                                                                            <div class="col-md-12 mb-3">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="hidden" name="role_id" value="{{$role->id}}">
                                                                                    <span class="bg-info p-2 text-white"><i
                                                                                            class="ti-pencil"></i></span>
                                                                                    <input type="text" class="form-control" name="role_name" placeholder="" value="{{$role->name}}" aria-label="" aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-warning" type="submit">ویرایش
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                        </button>
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
                                <td colspan="4">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Button trigger modal -->

                                            <button type="button" class="btn  btn-primary btn-rounded" data-toggle="modal" data-target="#CreateRole">
                                                <i class="ti-unlock" aria-hidden="true"></i> افزودن نقش کاربری (Role)
                                            </button>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end">

                                            {{$roles->render() }}

                                        </div>
                                    </div>

                                    <!-- Create Roles -->
                                    <div class="modal fade" id="CreateRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> نقش
                                                        کاربری جدید</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">نام نقش</h4> @include('Admin.sections.error')
                                                                <form action="{{route('role.store')}}" method="post">
                                                                    @csrf
                                                                    <input type="text" class="form-control" id="role" name="role" placeholder="نقش کاربری">
                                                                    <button class="btn btn-primary mt-3" type="submit">افزودن
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
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
