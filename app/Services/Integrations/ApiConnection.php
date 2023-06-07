<?php

namespace App\Services\Integrations;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ApiConnection
{
  protected $client;
  protected $baseUrl;

  public function __construct($baseUrl)
  {
    $this->client = new Client();
    $this->baseUrl = $baseUrl;
  }

  protected function sendRequest($method, $endpoint, $data = []) {
    $url = $this->baseUrl . $endpoint;

    try {
      $response = $this->client->request($method, $url, [
        'json' => $data,
      ]);

      return json_decode($response->getBody(), true);
    } catch (\Throwable $e) {
      // Manejar el error de la manera que mejor se adapte a tu aplicación
      // Por ejemplo, lanzar una excepción personalizada, registrar el error, etc.
      // throw $e;

      return $e;
    }
  }

  protected function sendRequestHttp($url, $params) {
    try {
      return Http::post($url, $params);
    } catch (\Throwable $th) {
      //throw $th;
      return $th;
    }
  }
}
