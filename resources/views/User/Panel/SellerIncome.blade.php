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
                                   <th scope="col">خریدار</th>
                                   <th scope="col">درآمد</th>
                                   <th scope="col">تاریخ</th>
                               </tr>
                               </thead>
                               <tbody class="text-right">


                               @foreach($incomes as $income)

                                   <tr>
                                       <td>
                                           <a target="_blank" href="{{$income->products->path()}}"
                                              class="screenshot-preview"
                                              data-preview="{{$income->products->large_image}}"
                                              data-titr="{{$income->products->title}}"
                                              data-titrsmall="@foreach($income->products->categories as $cat) {{$cat->name .''}} @endforeach"
                                              data-price="{{$income->products->price}}"
                                              title="{{$income->products->title}}">
                                               <img class="" src="{{$income->products->small_image}}" width="40">
                                           </a>
                                       </td>
                                       <td><a href="{{$income->products->path()}}">{{$income->products->title}}</a></td>
                                       <td>
                                           <p>{{Auth::user()->findOrFail($income->user_id)->name }}</p>
                                       </td>
                                       <td>
                                           <p>{{number_format($income->userIncome)}} تومان</p>
                                       </td>
                                       <td>
                                           <p>{{jdate($income->created_at)->format('Y/m/d')}}</p>
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


