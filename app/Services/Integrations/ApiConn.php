<?php

namespace App\Services\Integrations;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ApiConn
{
  protected $baseUrl;

  public function __construct()
  {
    // Define la URL base de la API que deseas conectar
    $this->baseUrl = 'https://api.example.com/';
  }

  protected function get($endpoint, $params = [])
  {
    $response = Http::get($this->baseUrl . $endpoint, $params);
    return $this->handleResponse($response);
  }

  protected function post($endpoint, $data)
  {
    $response = Http::post($this->baseUrl . $endpoint, $data);
    return $this->handleResponse($response);
  }

  protected function put($endpoint, $data)
  {
    $response = Http::put($this->baseUrl . $endpoint, $data);
    return $this->handleResponse($response);
  }

  protected function patch($endpoint, $data)
  {
    $response = Http::patch($this->baseUrl . $endpoint, $data);
    return $this->handleResponse($response);
  }

  protected function delete($endpoint)
  {
    $response = Http::delete($this->baseUrl . $endpoint);
    return $this->handleResponse($response);
  }

  protected function handleResponse(Response $response)
  {
    if ($response->successful()) {
      return $response->json();
    } else {
      abort($response->status(), 'Error en la solicitud a la API');
    }
  }
}
