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

        $base = match (self::$apiBase) {
            'https://sandbox.d.greeninvoice.co.il/api/' => 'https://api.sandbox.morning.dev/idp/v1/oauth/token',
            default => 'https://api.morning.co/idp/v1/oauth/token',
        };

        try {
            $response = $client->request('POST', $base, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => self::$apiKey,
                    'client_secret' => self::$secret,
                ],
            ]);
        } catch (RequestException $e) {
            $response = $e->getResponse();
        }

        $data = json_decode($response->getBody(), 1);
        $data['token'] = $data['accessToken'] ?? null;

        return $data;
    }
}
