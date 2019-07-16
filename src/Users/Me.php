<?php

namespace Yadahan\GreenInvoice\Users;

use GuzzleHttp\Client;
use Yadahan\GreenInvoice\GreenInvoice;
use GuzzleHttp\Exception\RequestException;

class Me extends GreenInvoice
{
    /**
     * The endpoint for token request.
     *
     * @var string
     */
    protected $endpoint = '/users/me';

    public function __construct(bool $sandbox = false)
    {
        parent::__construct($sandbox);
    }

    public function get()
    {
        return $this->request(null, 'GET');
    }
}
