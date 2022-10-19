<?php

namespace App\API\npi;

use App\API\Npi\Resources\Npi;
use App\Api\Npi\Resources\NpiCollection;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;

class Client
{
    public function client()
    {
        $client = new GuzzleClient([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest'
            ],
            'verify' => false
        ]);
        return $client;
    }

    /**
     * @throws GuzzleException
     */
    public function getData(array $parameters)
    {
        $client = $this->client();

        $response = $client->get('https://npiregistry.cms.hhs.gov/api/', [
            'query' => $parameters
        ])
            ->getBody()
            ->getContents();
        $data = json_decode($response, true);

        if (isset($data['Errors'])) {
            return $data;
        } else {
            return NpiCollection::make($data['results'])->resolve();
        }

    }
}
