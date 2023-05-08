<div class="col-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/rewards/" . $a->id . "/send"]) }}" href="{{ route('admin.accion.send', $a->id) }}">
      Entrega QR
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/rewards/" . $a->id . "/users"]) }}" href="{{ route('admin.accion.users', $a->id) }}">
      Entrega por usuario
      </a>
    </li>

  </ul>
</div>
