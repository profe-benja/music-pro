@extends('layouts.tarjeta.skeleton')
@section('app')
<div id="wrapper">
  @include('layouts.tarjeta._menu')
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @include('layouts.tarjeta._navbar')
      @yield('content')
    </div>
    @include('layouts.tarjeta._footer')
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
@endsection


