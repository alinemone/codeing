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
                   <div class="col-md-2 p-1">
                       @include('User.Panel.sections.product-sidebar')
                   </div>

                   <div class="col-md-10 p-1" >
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



                               @foreach($userproducts as $product)
                                   @if($product->status->first()->id == 1 || $product->status->first()->id == 3 || $product->status->first()->id == 4)
                                       <tr>
                                           <td>
                                               <a target="_blank" href="#"
                                                  class="screenshot-preview"
                                                  data-preview="{{$product->large_image}}"
                                                  data-titr="{{$product->title}}"
                                                  data-titrsmall="قالب PSD / لایه باز شرکتی"
                                                  data-price="{{$product->price}}"
                                                  title="{{$product->title}}">
                                                   <img class="" src="{{$product->small_image}}" width="40">
                                               </a>
                                           </td>
                                           <td><a href="{{$product->path()}}">{{$product->title}}</a></td>
                                           <td>
                                               <div class="btn-group dir-ltr">
                                                   <button class="btn btn-sm btn-ok">ویرایش</button>
                                                   <button class="btn btn-sm btn-blue">بروزرسانی</button>
                                               </div>


                                           </td>
                                       </tr>
                                   @endif
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


