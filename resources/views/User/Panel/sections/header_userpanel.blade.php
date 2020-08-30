<div class="row">
    <div class="col-md-12 d-flex justify-content-around align-items-center bg-fa">
        <div class="pt-md-4 pt-2 pb-md-4 pb-2 d-flex align-items-center">
            <img class="rounded-circle" src="{{auth()->user()->profile_image}}" alt="{{auth()->user()->name}}">
            <div class="text-right  pr-3 ">
                <a class="text-dark h3 m-3" href="@if(auth()->user()->store_active){{auth()->user()->store()}}@endif"><strong>{{auth()->user()->name}}</strong></a>
                <p class="text-dark m-3">عضو شده از تاریخ : {{jdate(auth()->user()->created_at)->format('%Y/%m/%d')}}</p>
            </div>
        </div>
        <div class="pt-md-4 pt-2 pb-md-4 pb-2 d-none d-md-block d-lg-block d-xl-block d-sm-block">
            @can('create_product')
                <p> درآمد:</p>
                <strong>{{number_format($userIncome)}} تومان</strong>
            @endcan
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 p-0">
       @include('User.Panel.sections.navbar-userpanel')
    </div>
</div>
