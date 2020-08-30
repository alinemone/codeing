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
                                   <th scope="col">قیمت</th>
                                   <th scope="col">تاریخ</th>
                               </tr>
                               </thead>
                               <tbody class="text-right">

                               @foreach($payments as $peyment)

                                   <tr>
                                       <td>
                                           <a target="_blank" href="{{$peyment->products->path()}}"
                                              class="screenshot-preview"
                                              data-preview="{{$peyment->products->large_image}}"
                                              data-titr="{{$peyment->products->title}}"
                                              data-titrsmall="@foreach($peyment->products->categories as $cat) {{$cat->name .''}} @endforeach"
                                              data-price="{{$peyment->products->price}}"
                                              title="{{$peyment->products->title}}">
                                               <img class="" src="{{$peyment->products->small_image}}" width="40">
                                           </a>
                                       </td>
                                       <td><a href="{{$peyment->products->path()}}">{{$peyment->products->title}}</a></td>
                                       <td>
                                           <p>{{number_format($peyment->price)}} تومان</p>
                                       </td>
                                       <td>
                                           <p>{{jdate($peyment->created_at)->format('Y/m/d')}}</p>
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


