@extends('Admin.sections.master') @section('content')

    <div id="main-wrapper">

        @include('Admin.sections.header') @include('Admin.sections.sidebar')

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">دسته بندی ها</h4>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 no-wrap table-hover contact-list footable-loaded footable" data-page-size="10">
                                        <thead class="bg-info text-white">
                                        <tr>
                                            <th class="footable-sortable">No<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Name<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Email<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Phone<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Role<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Age<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Joining date<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Salery<span class="footable-sort-indicator"></span></th>
                                            <th class="footable-sortable">Act<span class="footable-sort-indicator"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="footable-even" style="">
                                            <td><span class="footable-toggle"></span>1</td>
                                            <td>
                                                <a href="javascript:void(0)"><img src="../../assets/images/users/4.jpg" alt="user" width="40" class="rounded-circle"> Genelia Deshmukh</a>
                                            </td>
                                            <td>genelia@gmail.com</td>
                                            <td>+123 456 789</td>
                                            <td><span class="label label-danger">Designer</span> </td>
                                            <td>23</td>
                                            <td>12-10-2014</td>
                                            <td>$1200</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="footable-odd" style="">
                                            <td><span class="footable-toggle"></span>2</td>
                                            <td>
                                                <a href="javascript:void(0)"><img src="../../assets/images/users/5.jpg" alt="user" width="40" class="rounded-circle"> Arijit Singh</a>
                                            </td>
                                            <td>arijit@gmail.com</td>
                                            <td>+234 456 789</td>
                                            <td><span class="label label-info">Developer</span> </td>
                                            <td>26</td>
                                            <td>10-09-2014</td>
                                            <td>$1800</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="footable-even" style="">
                                            <td><span class="footable-toggle"></span>3</td>
                                            <td>
                                                <a href="javascript:void(0)"><img src="../../assets/images/users/6.jpg" alt="user" width="40" class="rounded-circle"> Govinda jalan</a>
                                            </td>
                                            <td>govinda@gmail.com</td>
                                            <td>+345 456 789</td>
                                            <td><span class="label label-success">Accountant</span></td>
                                            <td>28</td>
                                            <td>1-10-2013</td>
                                            <td>$2200</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>


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
