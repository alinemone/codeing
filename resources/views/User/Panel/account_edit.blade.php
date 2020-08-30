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
                        @include('User.Panel.sections.setting-sidebar')
                    </div>

                    <div class="col-md-10 p-1">
                        <div class="card m-md-2 m-0 border">
                            <div class="card-header bg-white text-center">
                                اطلاعات حساب کاربری
                            </div>
                            <div class="card-body  text-right">
                                <form action="{{route('save_account_edit',auth()->user()->id)}}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label >نام و نام خانوادگی</label>
                                        <input class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{auth()->user()->name}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >نام کاربری</label>
                                        <input class="form-control form-control-sm " type="text" value="{{auth()->user()->username}}"disabled>
                                    </div>
                                    <div class="form-group">
                                        <label >ایمیل</label>
                                        <input class="form-control form-control-sm " type="text" value="{{auth()->user()->email}}"disabled>
                                    </div>
                                    <div class="form-group">
                                        <label >شماره تلفن</label>
                                        <input class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" type="text" value="{{auth()->user()->phone}}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-ok">بروزرسانی</button>
                                </form>
                            </div>
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


