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
                <form action="{{ route('admin.confirmPasswordRecovery') }}" method="POST">
                {{ csrf_field() }}
                  <div role="tabpanel" class="tab-pane active" id="input-email">
                    @if(Session::has('messages'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('messages')}}
                        </div>
                            
                    @endif
                    <br>
                    <h2 >Recuperar Contraseña</h2>
                    <p>Ingrese su correo y le enviaremos las instrucciones para recuperar su contraseña.</p>
                    <div class="form-group">
                      <label for="email">Correo electrónico</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <br>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary requestCode">Enviar codigo</button>
                    </div>
                    <br>
                  </div>
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