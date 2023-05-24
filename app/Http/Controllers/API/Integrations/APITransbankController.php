<?php

namespace App\Http\Controllers\API\Integrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class APITransbankController extends Controller
{
  public function __construct() {
    WebpayPlus::configureForTesting();
  }

  public function pagar(Request $request) {
    $id = $request->input('id');
    $session_id = time();
    $monto = $request->input('monto');
    $url_return = route('pago.callback');

    $t = (new Transaction)->create(
      $id, //buy_order
      $session_id, //session_id
      $monto, //amount
      $url_return //return_url
    );

    $url = $t->getUrl() . '?token_ws=' . $t->getToken();

    return redirect($url);
  }


  public function callback(Request $request) {

    $token = $_GET['token_ws'];

    $confirmacion = (new Transaction)->commit($token);

    $id = $confirmacion->buyOrder;

    $confirmacion->isApproved();

    return $confirmacion;
  }
}
