<section class="credit-card shadow d-flex flex-column justify-content-between mx-auto">
  <div class="mt-5">
    <p class="text-white mt-3 font-number size-card-number" id="card-number-output">
      <strong>{{ current_tarjeta_user()->me_card()->getNro() ?? 'XXXXXXXXXX' }}</strong>
    </p>
  </div>
  <div class="d-flex  text-white font-barlow-sc text-uppercase">
    <div>
      <p>titular de la tarjeta</p>
      <p>
        {{ current_tarjeta_user()->nombre_completo() }}
      </p>
    </div>
  </div>
</section>
