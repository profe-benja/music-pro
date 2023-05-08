@extends('layouts.admin.skeleton')
@section('app')




<div id="wrapper">
  @include('layouts.admin._menu')
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @include('layouts.admin._navbar')
      @yield('content')
    </div>
    @include('layouts.admin._footer')
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

{{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger" href="{{ route('logout') }}">Cerrr sesión</a>
      </div>
    </div>
  </div>
</div> --}}
@endsection


