<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\Input;


class TransbankController extends Controller
{
  public function __construct() {
    WebpayPlus::configureForTesting();
  }

  public function pagar(Request $request) {
    return $this->build_url_transbank();
  }

  public function build_url_transbank() {
    $id = 1;
    $session_id = 1;
    $total = 1000;
    $url_return = route('pago.callback');

    $t = (new Transaction)->create(
      $id, //buy_order
      $session_id, //session_id
      $total, //amount
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
