@extends('Admin.sections.master')
@section('content')

    <div id="main-wrapper">

        @include('Admin.sections.header') @include('Admin.sections.sidebar')

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ویرایش دسته بندی</h4>
                                <form class="m-t-20" action="{{ route('category.update' ,  $category->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" value="{{$category->name}}">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="">بدون دسته مادر</option>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" {{ $cat->id == $cat->parent_id ? 'selected' : '' }}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="Category Title Seo" value="{{$category->seo_title}}">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="seo_description" rows="3" placeholder="Category Description Seo">{{$category->seo_description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">ویرایش
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tree well">
                            <h5 class="text-right pb-2 border-bottom">دسته بندی ها</h5>
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline-flex">
                                        @method('delete')
                                        @csrf
                                        <div class="btn-group btn-group-xs dir-ltr">
                                            <button type="submit" class="btn btn-sm btn-danger btn-rounded">حذف <i class="mdi mdi-delete"></i></button>
                                            <a href="{{ route('category.edit' ,  $category->id) }}"  class="btn btn-sm btn-warning btn-rounded">ویرایش <i class=" mdi mdi-pencil"></i></a>
                                        </div>
                                    </form>
                                    <a href="{{route('category.show',$category->slug)}}">{{$category->name }}</a>

                                    <ul class="ml-4">
                                        @foreach($subcategories as $subcategory)
                                            @if($subcategory->parent_id == $category->id)
                                        <li>
                                            <form action="{{ route('category.destroy',$subcategory->id) }}" method="post" class="d-inline-flex">
                                                @method('delete')
                                                @csrf
                                                <div class="btn-group btn-group-xs dir-ltr">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-rounded">حذف <i class="mdi mdi-delete"></i></button>
                                                    <a href="{{ route('category.edit' ,  $subcategory->id) }}"  class="btn btn-sm btn-warning btn-rounded">ویرایش <i class=" mdi mdi-pencil"></i></a>
                                                </div>
                                            </form>
                                            <a href="{{route('category.show',$subcategory->slug)}}">{{$subcategory->name }}</a>
                                        </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
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

@section('script')
    <script>
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
@endsection
