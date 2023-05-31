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
                  $comment = 'Transacción interna BEATPAY';

                  if ($trans->id_tarjeta_origen == $tarjeta->id) {
                    $type = 'OUT';
                    $comment = 'para ' . $trans->tarjetaOrigen->usuario->nombre_completo() ?? '';
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
