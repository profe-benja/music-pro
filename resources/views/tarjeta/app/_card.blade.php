<section class="credit-card shadow d-flex flex-column justify-content-between mx-auto">
  <div class="text-right">
    {{-- <img src="{{ asset('assets/visa-icon.png')}}" alt="logo visa" class="logo-visa"> --}}
    {{-- <img src="{{ asset('assets/visa')}}" alt="logo visa" class="logo-visa"> --}}
  </div>
  <div class="mt-5">
    <p class="text-white mt-3 font-number size-card-number" id="card-number-output">
      <strong>{{ current_tarjeta_user()->me_card()->nro ?? 'XXXXXXXXXX' }}</strong>
    </p>
  </div>
  <div class="d-flex justify-content-between text-white font-barlow-sc text-uppercase">
    <div>
      <p class="size-card-info">titular de la tarjeta</p>
      <p class="size-card-user" id="card-name-output">
        {{ current_tarjeta_user()->nombre_completo() }}
      </p>
    </div>
    <div>
      <p class="size-card-info">fecha vto</p>
      <p class="size-card-user text-right">99/99</p>
    </div>
  </div>
</section>
