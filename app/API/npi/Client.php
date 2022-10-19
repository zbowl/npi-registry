<?php

namespace App\API\npi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class Client
{
    public $parameters = [
        'query' => [
            'version'               => '2.1',
            'number'                => '',
            'enumeration_type'      => 'NPI-1', // 'NPI-1' || 'NPI-2' NPI-1 = Individuals, NPI-2 = Organizations
            'taxonomy_description'  => '',
            'first_name'            => 'he*',
            'use_first_name_alias'  => 'false',
            'last_name'             => 'fa*',
            //'organization_name'     => '',
            'address_purpose'       => '',
            'city'                  => '',
            'state'                 => '',
            'postal_code'           => '',
            'limit'                 => '',
            'skip'                  => '',
            'pretty'                => '',
        ]
    ];

    public function client()
    {
        $client = new GuzzleClient([
            //'base_uri' => 'https://npiregistry.cms.hhs.gov/api',
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

        return json_decode($response, true);
    }

    public function testRequest()
    {
        $params = [
            'query' => [
                'version'               => '2.1',
                'number'                => '',
                'enumeration_type'      => 'NPI-1', // 'NPI-1' || 'NPI-2' NPI-1 = Individuals, NPI-2 = Organizations
                'taxonomy_description'  => '',
                'first_name'            => '',
                'use_first_name_alias'  => 'true',
                'last_name'             => '',
                //'organization_name'     => '',
                'address_purpose'       => 'Primary',
                'city'                  => '',
                'state'                 => 'CA',
                'postal_code'           => '95620',
                'country_code'          => 'US',
                //'limit'                 => '',
                //'skip'                  => '',
                //'pretty'                => '',
            ]
        ];
        $client = $this->client();
        $url = '';
        $response = $client->get('https://npiregistry.cms.hhs.gov/api/',$params);
        $response = $response->getBody()->getContents();
        dd(json_decode($response));


    }
}
