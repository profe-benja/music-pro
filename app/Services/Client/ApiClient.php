<?php

namespace App\Services\Client;

use GuzzleHttp\Client;

class ApiClient
{
    protected $client;

    public function __construct($url = null)
    {
      $this->client = new Client([
        'base_uri' => $url,
        'headers' => [
          // 'Authorization' => 'Bearer ' . config('api.token'),
          'Accept' => 'application/json',
        ],
      ]);
    }

    public function getData()
    {
        $response = $this->client->get('/endpoint');

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            return $data;
        }

        return null;
    }
}
