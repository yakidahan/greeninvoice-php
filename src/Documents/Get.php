<?php

namespace Yadahan\GreenInvoice\Documents;

use GuzzleHttp\Client;
use Yadahan\GreenInvoice\GreenInvoice;
use GuzzleHttp\Exception\RequestException;

class Get extends GreenInvoice
{
    /**
     * The endpoint for token request.
     *
     * @var string
     */
    protected $endpoint = '/documents/{id}';

    public function __construct(string $id, bool $sandbox = false)
    {
        parent::__construct($sandbox);

        $this->endpoint = '/documents/'.$id;
    }

    public function get()
    {
        return $this->request(null, 'GET');
    }
}
