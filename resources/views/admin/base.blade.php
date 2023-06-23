@extends('admin.layout')


@section('main-content')

    <div class="wrapper">

        @include('admin.layouts.header')

        @include('admin.layouts.sidebar')

        <main class="page-content">
            @yield('content')
        </main>

        {{-- @include('admin.layouts.footer') --}}

    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
@endsection