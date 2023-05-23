<?php

namespace App\Services;

use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankServices
{
  public function __construct() {
    WebpayPlus::configureForTesting();
  }

  public function getUrl($id, $monto, $session_id, $url_return) {
    try {
      $t = (new Transaction)->create(
        $id, //buy_order
        $session_id, //session_id
        $monto, //amount
        $url_return //return_url
      );

      $url = $t->getUrl() . '?token_ws=' . $t->getToken();

      return $url;
    } catch (\Throwable $th) {
      return 'error';
    }
  }

  public function getCallback($token) {
    $response = (new Transaction)->commit($token);

    $resp = [
      'AccountingDate' => $response->getAccountingDate() ?? '',
      'BuyOrder' => $response->getBuyOrder() ?? '',
      // 'CardDetail' => $response->getCardDetail() ?? '',
      // 'CardNumber' => $response->getCardDetail()->getCardNumber() ?? '',
      // 'CommerceCode' => $response->getCommerceCode(),
      'InstallmentsAmount' => $response->getInstallmentsAmount() ?? '',
      'InstallmentsNumber' => $response->getInstallmentsNumber() ?? '',
      // 'PaymentCodeType' => $response->getPaymentCodeType() ?? '',
      'ResponseCode' => $response->getResponseCode() ?? '',
      'SessionId' => $response->getSessionId() ?? '',
      'TransactionDate' => $response->getTransactionDate() ?? '',
      'VCI' => $response->getVCI() ?? '',
      'Amount' => $response->getAmount() ?? '',
      'auth' => $response->getAuthorizationCode() ?? '',
      'status' => $response->isApproved()
    ];

    return $resp;
  }
}

