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


                   <div class="col-md-12 p-0">
                       <div class="table-responsive pt-2">
                           <table class="table dir-rtl">
                               <thead class="text-right bg-ok">
                               <tr>
                                   <th scope="col">تصویر</th>
                                   <th scope="col">نام محصول</th>
                                   <th scope="col">امکانات</th>
                               </tr>
                               </thead>
                               <tbody class="text-right">



                               @foreach($products as $product)

                                   <tr>
                                       <td>
                                           <a target="_blank" href="{{$product->path()}}"
                                              class="screenshot-preview"
                                              data-preview="{{$product->large_image}}"
                                              data-titr="{{$product->title}}"
                                              data-titrsmall="@foreach($product->categories as $cat) {{$cat->name .''}} @endforeach"
                                              data-price="{{$product->price}}"
                                              title="{{$product->title}}">
                                               <img class="" src="{{$product->small_image}}" width="40">
                                           </a>
                                       </td>
                                       <td><a href="{{$product->path()}}">{{$product->title}}</a></td>
                                       <td>
                                           <a href="{{$product->download()}}" class="btn btn-sm btn-ok">دانلود</a>
                                       </td>
                                   </tr>

                               @endforeach


                               </tbody>
                           </table>
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


