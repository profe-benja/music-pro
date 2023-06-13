<?php

namespace App\Services\Integrations;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ApiConnection
{
  protected $client;
  protected $baseUrl;

  public function __construct()
  {
    $this->client = new Client();
    // $this->client = new Client([
    //   // 'headers' => [ 'Content-Type' => 'application/json' ]
    // ]);

  }

  protected function sendRequest($method, $endpoint, $data = []) {
    $url = $this->baseUrl . $endpoint;

    try {
      $response = $this->client->request($method, $url, [
        'json' => $data,
      ]);

      // return $response;

      return [
        'code' => $response->getStatusCode(),
        'data' => $response->getBody()
      ];
    } catch (\Throwable $e) {

      return $e;
      return [
        'code' => $e->getCode(),
        'error' => $e->getMessage(),
        'a' => $e->getTrace()
      ];
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

  protected function sendRequestHttpGET($url) {
    try {
      return Http::get($url);
    } catch (\Throwable $th) {
      //throw $th;
      return $th;
    }
  }
}
