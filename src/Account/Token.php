<?php

namespace Yadahan\GreenInvoice\Account;

use GuzzleHttp\Client;
use Yadahan\GreenInvoice\GreenInvoice;
use GuzzleHttp\Exception\RequestException;

class Token extends GreenInvoice
{
    /**
     * The endpoint for token request.
     *
     * @var string
     */
    protected $endpoint = '/account/token';

    /**
     * The GreenInvoice API key to be used for authentication requests.
     *
     * @var string
     */
    public static $apiKey;

    /**
     * The GreenInvoice secret to be used for authentication requests.
     *
     * @var string
     */
    public static $secret;

    public function __construct(bool $sandbox = false)
    {
        parent::__construct($sandbox);
    }

    /**
     * Sets the API key to be used for authentication requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey(string $apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * Sets the secret to be used for authentication requests.
     *
     * @param string $secret
     */
    public static function setSecret(string $secret)
    {
        self::$secret = $secret;
    }

    public function get()
    {
        $client = new Client();

        try {
            $response = $client->request('POST', self::$apiBase.self::$apiVersion.$this->endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Authorization-Bearer' => 'JWT',
                ],
                'json' => [
                    'id' => self::$apiKey,
                    'secret' => self::$secret,
                ],
            ]);
        } catch (RequestException $e) {
            $response = $e->getResponse();
        }

        return json_decode($response->getBody(), 1);
    }
}
