  
@extends('admin.layout')


@section('main-content')  
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                <div class="card-body">
                    <div class="logo text-center">
                        <h1><a href="/"><span>Short</span>Links</a></h1>
                    </div>
                    <form method="post">
                    {{ csrf_field() }}
                        @if(Session::has('messages'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('messages')}}
                            </div>   
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>    
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password" required>
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                Remeber this Device
                            </label>
                            </div>
                            <a class="text-primary fw-bold" href="{{ route('admin.passwordRecovery') }}">Forgot Password ?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-bold">New to ShortLinks?</p>
                            <a class="text-primary fw-bold ms-2" href="{{ route('admin.register') }}">Create an account</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="../assets_bak/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets_bak/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
@stop