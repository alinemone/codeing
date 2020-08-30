@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">

    @include('Home.sections.TopHeader')
    @include('Home.sections.ButtomHeader')
    <!-- body -->
    @include('Home.SearchBox')
    @include('Home.Products')

    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection


