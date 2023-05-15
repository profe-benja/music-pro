@extends('layouts.transporte.skeleton')
@section('app')




<div id="wrapper">
  @include('layouts.transporte._menu')
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @include('layouts.transporte._navbar')
      @yield('content')
    </div>
    @include('layouts.transporte._footer')
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
@endsection


