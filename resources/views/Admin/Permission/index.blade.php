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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table no-wrap table-hover contact-list footable-loaded footable" data-page-size="10">
                                        <thead class="bg-info text-white">
                                        <tr>
                                            <th class="footable-sortable">#<span class="footable-sort-indicator"></span></th>

                                            <th class="footable-sortable">دسترسی (Permission)<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">ویرایش<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">حذف<span class="footable-sort-indicator"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 0 ?>
                                        @foreach($permissions as $permission)
                                            <?php $i++ ?>
                                            <tr class="footable-even">
                                                <td><span class="footable-toggle"></span>{{$i}}</td>
                                                <td>{{$permission->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Permission{{$permission->id}}">
                                                        <i class="ti-settings" aria-hidden="true"></i>ویرایش
                                                    </button>
                                                    <!-- Modal Add -->
                                                    <div class="modal fade" id="Permission{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ویرایش :  {{$permission->name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">دسترسی</h4> @include('Admin.sections.error')
                                                                                <form action="{{route('permission.update',$permission->id)}}" method="post">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <input type="text" class="form-control" id="permission" name="permission" value="{{$permission->name}}">
                                                                                    <button class="btn btn-warning mt-3" type="submit">ویرایش
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
                                                <td>
                                                    <form action="{{route('permission.destroy',$permission->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#AddPermission">Add Permission</button>
                                                <!-- Modal Add -->
                                                <div class="modal fade" id="AddPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    افزودن دسترسی (Permission)</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">دسترسی</h4> @include('Admin.sections.error')
                                                                            <form action="{{route('permission.store')}}" method="post">
                                                                                @csrf
                                                                                <input type="text" class="form-control" id="permission" name="permission" placeholder="نام دسترسی خود را به انگلیسی وارد کنید">
                                                                                <button class="btn btn-primary mt-3" type="submit">افزودن
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            </td>

                                            <td colspan="7">
                                                <div class="d-flex justify-content-end">
                                                    {{$permissions->render()}}
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
