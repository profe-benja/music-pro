<?php

namespace App\Services\Integrations;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

class ApiClient
{
  protected $baseUrl;
  protected $client;

  public function __construct()
  {
    // Define la URL base de la API que deseas conectar
    // $this->baseUrl = 'https://api.example.com/';

    // Inicializa el cliente GuzzleHttp
    $this->client = new Client([
      'base_uri' => $this->baseUrl,
      'timeout' => 10,
      'headers' => [
        'Accept' => 'application/json',
      ],
    ]);
  }

  protected function get($endpoint, $params = [])
  {
    return $this->sendRequest('GET', $endpoint, ['query' => $params]);
  }

  protected function post($endpoint, $data)
  {
    return $this->sendRequest('POST', $endpoint, ['json' => $data]);
  }

  protected function put($endpoint, $data)
  {
    return $this->sendRequest('PUT', $endpoint, ['json' => $data]);
  }

  protected function patch($endpoint, $data)
  {
    return $this->sendRequest('PATCH', $endpoint, ['json' => $data]);
  }

  protected function delete($endpoint)
  {
    return $this->sendRequest('DELETE', $endpoint);
  }

  protected function sendRequest($method, $endpoint, $options = [])
  {
    try {
      $response = $this->client->request($method, $endpoint, $options);
      return $this->handleResponse($response);
    } catch (ClientException $e) {
      // Error de cliente (4xx)
      return $e;
      abort($e->getCode(), 'Error en la solicitud a la API: ' . $e->getMessage());
    } catch (ServerException $e) {
      // Error de servidor (5xx)
      return $e;
      abort($e->getCode(), 'Error en la solicitud a la API: ' . $e->getMessage());
    }
  }

  protected function handleResponse(ResponseInterface $response)
  {
    $body = (string)$response->getBody();
    return json_decode($body, true);
  }
}
