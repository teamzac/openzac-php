<?php

namespace TeamZac\OpenZac;

use GuzzleHttp\Client as Guzzle;

class OpenZac
{
    /** @var GuzzleHttp\Client */
    protected $http;

    public function __construct($apiKey)
    {
        $this->http = new Guzzle([
            'base_uri' => 'https://open.zactax.com/api/',
            'timeout' => 10.0,
            'debug' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);
    }

    public function get($path, $params = [])
    {
        $response = $this->http->get(ltrim($path, '/'), [
            'query' => $params,
        ]);

        $json = json_decode($response->getBody());

        if (data_get($json, 'links')) {
            return ResourceCollection::fromJson($json);
        }
        return new Resource(data_get($json, 'data'));
    }
}
