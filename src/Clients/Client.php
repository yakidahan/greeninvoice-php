<?php

namespace Yadahan\GreenInvoice\Clients;

use Yadahan\GreenInvoice\GreenInvoice;

class Client extends GreenInvoice
{
    /**
     * The client name.
     *
     * @var string
     */
    protected $name;

    /**
     * Is the client currently active or not.
     *
     * @var bool
     */
    protected $active;

    /**
     * The client department.
     *
     * @var string
     */
    protected $department;

    /**
     * The client tax ID.
     *
     * @var string
     */
    protected $taxId;

    /**
     * The client accounting key.
     *
     * @var string
     */
    protected $accountingKey;

    /**
     * The client payment term.
     *
     * @var int
     */
    protected $paymentTerms = 0;

    /**
     * The client bank name.
     *
     * @var string
     */
    protected $bankName;

    /**
     * The client bank branch number.
     *
     * @var string
     */
    protected $bankBranch;

    /**
     * The client bank account number.
     *
     * @var string
     */
    protected $bankAccount;

    /**
     * The client address.
     *
     * @var string
     */
    protected $address;

    /**
     * The client city.
     *
     * @var string
     */
    protected $city;

    /**
     * The client zip code.
     *
     * @var string
     */
    protected $zip;

    /**
     * 2-letter ISO client country code.
     *
     * @var string
     */
    protected $country = 'IL';

    /**
     * The category this client is related to.
     *
     * @var int
     */
    protected $category;

    /**
     * The sub category this client is related to.
     *
     * @var int
     */
    protected $subCategory;

    /**
     * The client phone number.
     *
     * @var string
     */
    protected $phone;

    /**
     * The client fax number.
     *
     * @var string
     */
    protected $fax;

    /**
     * The client mobile number.
     *
     * @var string
     */
    protected $mobile;

    /**
     * Client remarks for self use.
     *
     * @var string
     */
    protected $remarks;

    /**
     * The client contact person name.
     *
     * @var string
     */
    protected $contactPerson;

    /**
     * Emails.
     *
     * @var array
     */
    protected $emails = [];

    /**
     * Labels.
     *
     * @var array
     */
    protected $labels = [];

    public function __construct(string $name, bool $sandbox = false)
    {
        parent::__construct($sandbox);

        $this->name = $name;
    }

    /**
     * Sets the client country code
     *
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * Sets email row
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        array_push($this->emails, $email);
    }

    /**
     * Convert the class to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_filter([
            'name' => $this->name,
            'active' => $this->active,
            'department' => $this->department,
            'taxId' => $this->taxId,
            'accountingKey' => $this->accountingKey,
            'paymentTerms' => $this->paymentTerms,
            'bankName' => $this->bankName,
            'bankBranch' => $this->bankBranch,
            'bankAccount' => $this->bankAccount,
            'address' => $this->address,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'category' => $this->category,
            'subCategory' => $this->subCategory,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'mobile' => $this->mobile,
            'remarks' => $this->remarks,
            'contactPerson' => $this->contactPerson,
            'emails' => $this->emails,
            'labels' => $this->labels,
        ], function($value) {
            return !is_null($value);
        });
    }
}
