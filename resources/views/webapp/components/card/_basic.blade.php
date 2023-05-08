<div class="col-md-4 col-12 mb-3">
  <div class="card mb-2 shadow cursor bg-gray" style="max-width: 540px;" onclick="location.href='{{ $card['route'] }}'">
    <div class="row g-0">
      <div class="col-4 align-self-center">
        <img src="{{ $card['img'] }}" class="img-fluid rounded-start p-2" alt="...">
      </div>
      <div class="col-8 align-self-center">
        <div class="card-body">
          <h3 class="card-title fw-bold">
            {{ $card['name'] }}
          </h3>
          {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
          <p class="card-text">
            {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
