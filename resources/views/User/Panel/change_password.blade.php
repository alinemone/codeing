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
                                <form action="{{route('save_change_password',auth()->user()->id)}}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label >رمز عبور</label>
                                        <div class="input-group mb-3" dir="ltr">
                                            <div class="input-group-prepend">
                                                <button toggle="#password-field" class="btn btn-sm btn-outline-secondary toggle-password" type="button" >
                                                    <i class=" far fa-eye"></i>
                                                </button>
                                            </div>
                                            <input type="password" class="form-control text-right form-control-sm @error('password') is-invalid @enderror" name="password" placeholder="" id="password-field" >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label >تایید رمز عبور</label>
                                        <div class="input-group mb-3" dir="ltr">
                                            <div class="input-group-prepend">
                                                <button toggle="#password-confirm" class="btn btn-sm btn-outline-secondary toggle-password" type="button" >
                                                    <i class=" far fa-eye"></i>
                                                </button>
                                            </div>
                                            <input type="password" class="form-control text-right form-control-sm @error('password') is-invalid @enderror" name="password_confirmation" placeholder="" id="password-confirm" >
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
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


