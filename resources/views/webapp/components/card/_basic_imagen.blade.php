<div id="cardItem{{ !empty($id) ? $id : '' }}" class="card mb-3 shadow cursor position-relative anim-border animate__animated"
    style="max-width: 540px; {{ !empty($className) ? $className : '' }}"
    {{ !empty($link) ? "onclick=location.href='".$link."'" : '' }}
    {{ !empty($onclick_func) ? "onclick=" . $onclick_func : '' }}
  >
  @if (!empty($status))
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
      <div class="fa fa-check"></div>
    </span>
  @endif
  <div class="row g-0">
    @if ($img ?? null)
    <div class="col-4 align-self-center">
      <img src="{{ $img }}" class="brillo img-fluid p-2" width="100px" alt="...">
    </div>
    @endif
    <div class="{{ ($img ?? false) ? 'col-8' : 'col-12' }} align-self-center">
      <div class="card-body">
        <h5 class="card-title fw-bold d-none d-md-block">
          {{ $title ?? '' }}
        </h5>
        <h3 class="card-title fw-bold d-md-none">
          {{ $title ?? '' }}
        </h3>
        <p class="card-text">
          <small class="text-muted">{{ $text ?? '' }}</small>
        </p>
      </div>
    </div>
  </div>
</div>
