<nav class="d-lg-none navbar fixed-bottom navbar-dark bg-dark justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 60px !important;">
  <a class="navbar-brand ps-3 pe-2" href="{{ route('webapp.index') }}" title="Home"><i class="fa fa-qrcode {{ activeTab(['webapp/home']) ? 'fa-lg' : '' }}"></i></a>
  <a class="navbar-brand ps-5 pe-2" href="{{ route('webapp.historial') }}" title="Historial"><i class="fa fa-list {{ activeTab(['webapp/historial']) ? 'fa-lg' : '' }}"></i></a>
  <a class="navbar-brand ps-5 pe-3" href="{{ route('webapp.canjear') }}" title="Canjees"><i class="fa fa-store {{ activeTab(['webapp/canjear']) ? 'fa-lg' : '' }}"></i></a>
</nav>
