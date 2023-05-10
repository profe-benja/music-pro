@extends('layouts.bodega.skeleton')
@section('app')




<div id="wrapper">
  @include('layouts.bodega._menu')
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @include('layouts.bodega._navbar')
      @yield('content')
    </div>
    @include('layouts.bodega._footer')
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
@endsection


