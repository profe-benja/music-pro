<div class="text-center fw-bold">
  Últimos Movimientos
</div>
<hr>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-hover">
      <tbody>
          @foreach ($transacciones as $trans)
              @php
                  $date = $trans->getFechaCreacion()->getDateV3();
                  $money = $trans->getMonto();
                  $type = 'IN';
                  $img = '';
                  $name = $trans->descripcion;
                  $comment = '';

                  if ($trans->nro_tarjeta_origen  == null) {
                    $comment = 'Transacción interna BEATPAY';
                  } else {
                    $comment = 'Transacción por ' . $trans->nro_tarjeta_origen . ' - ' . $trans->code_banco_origen ?? '';
                  }

                  if ($trans->id_tarjeta_origen == $tarjeta->id) {
                    $type = 'OUT';
                    $comment = 'para ' . $trans->nro_tarjeta_destino . ' - ' . $trans->code_banco_destino ?? '';
                  }
              @endphp
              <tr>
                  @component('tarjeta.app._list_pay')
                      @slot('img', $img)
                      @slot('date', $date)
                      @slot('name', $name)
                      @slot('comment', $comment)
                      @slot('type', $type)
                      @slot('money', $money)
                      @slot('isMobile', $isMobile ?? true)
                  @endcomponent
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
