<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/encomienda"]) }}" href="{{ route('transporte.encomienda.index') }}">Todas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/encomienda/en_proceso"]) }}" href="{{ route('transporte.encomienda.en_proceso') }}">Pendientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/encomienda/en_camino"]) }}" href="{{ route('transporte.encomienda.en_camino') }}">En Camino</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/encomienda/entregado"]) }}" href="{{ route('transporte.encomienda.entregado') }}">Entregado</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('transporte.encomienda.create') }}">Nuevo</a>
  </li>
</ul>
