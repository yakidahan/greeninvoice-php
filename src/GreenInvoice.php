<?php

namespace Yadahan\GreenInvoice;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class GreenInvoice.
 */
class GreenInvoice
{
    /**
     * The base URL for the GreenInvoice API.
     *
     * @var string
     */
    public static $apiBase = 'https://api.greeninvoice.co.il/api/';

    /**
     * The sandbox URL for the GreenInvoice API.
     *
     * @var string
     */
    public static $sandboxBase = 'https://sandbox.d.greeninvoice.co.il/api/';

    /**
     * The version of the GreenInvoice API to use for requests.
     *
     * @var string
     */
    public static $apiVersion = 'v1';

    /**
     * The GreenInvoice token to be used for requests.
     *
     * @var string
     */
    public static $token;

    public function __construct(bool $sandbox = false)
    {
        self::$apiBase = $sandbox ? self::$sandboxBase : self::$apiBase;
    }

    /**
     * Sets the api base url to be used for requests.
     *
     * @param string $apiBase
     */
    public static function setApiBase($apiBase)
    {
        self::$apiBase = $apiBase;
    }

    /**
     * Sets the token to be used for requests.
     *
     * @param string $token
     */
    public static function setToken($token)
    {
        self::$token = $token;
    }

    /**
     * Get the url to be used for requests.
     */
    public function getUrl()
    {
        return self::$apiBase.self::$apiVersion.$this->endpoint;
    }

    public function request($body = null, $method = 'POST')
    {
        $client = new Client();

        try {
            $response = $client->request($method, $this->getUrl(), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.self::$token,
                ],
                'json' => $body,
            ]);
        } catch (RequestException $e) {
            $response = $e->getResponse();
        }

        return json_decode($response->getBody(), 1);
    }

    /**
     * Convert the class to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
