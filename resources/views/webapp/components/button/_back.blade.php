<div class="row">
  <h1 class="lead">
    @if (!empty($route))
    <a href="{{ $route }}" class="text-{{ $color ?? 'dark' }} align-middle"><i class="fas fa-arrow-circle-left fa-lg"></i></a>
    @endif
    <i class="{{ $icon ?? '' }}"></i>{!! $body !!}
  </h1>
</div>
