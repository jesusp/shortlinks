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
                <form action="{{ route('admin.passwordVerificationCode') }}" method="POST">
                {{ csrf_field() }}
                  <input type="text" class="form-control" name="email" id="email" @if($email) value="{{ $email }}" @else value="{{ old('email') }}" @endif hidden>
                  @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                  @enderror
                  <div class="mb-3">
                    <label for="code" class="form-label">Codigo de verificación</label>
                    <input type="text" class="form-control" id="verificationCode" aria-describedby="textHelp" name="code" value="{{ old('code') }}" required>
                    @if(Session::has('code'))
                      <div class="alert alert-danger" role="alert">
                        {{Session::get('code')}}
                      </div>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control"  id="password" name="password" required>
                    @error('password')
                      <div class="alert alert-danger" role="alert">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="passwordConfirm" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
                    @error('passwordConfirm')
                      <div class="alert alert-danger" role="alert">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Cambiar contraseña</button>
                  
                </form>
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