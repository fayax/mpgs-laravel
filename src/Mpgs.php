<?php

namespace MpgsLaravel;

use GuzzleHttp\Client;

class Mpgs
{
    protected $client;
    protected $apiUrl;
    protected $merchantId;
    protected $apiUsername;
    protected $apiPassword;

    public function __construct($apiUrl, $merchantId, $apiUsername, $apiPassword)
    {
        $this->client = new Client();
        $this->apiUrl = trim($apiUrl, '/');
        $this->merchantId = $merchantId;
        $this->apiUsername = $apiUsername;
        $this->apiPassword = $apiPassword;
    }

    
    public function createSession()
    {
        $url = "{$this->apiUrl}/merchant/{$this->merchantId}/session";
        $response = $this->client->post($url, [
            'auth' => [$this->apiUsername, $this->apiPassword],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function initiatePayment($sessionId, $amount, $currency, $orderId)
    {
        $url = "{$this->apiUrl}/merchant/{$this->merchantId}/order";
        $body = [
            'apiOperation' => 'CREATE_CHECKOUT_SESSION',
            'order' => [
                'amount' => $amount,
                'currency' => $currency,
            ],
            'session' => [
                'id' => $sessionId,
            ]
        ];
        $responsse = $this->client->post($url, [
            'auth' => [$this->apiUsername, $this->apiPassword],
            'json' => $body,
        ]);
        return json_decode($responsse->getBody()->getContents(), true);
    }


}