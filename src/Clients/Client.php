<?php

namespace Yadahan\GreenInvoice\Clients;

use Yadahan\GreenInvoice\GreenInvoice;

class Client extends GreenInvoice
{
    /**
     * The client id.
     *
     * @var string
     */
    protected $id;

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
     * Sets the client id
     *
     * @param string $id
     */
    public function id(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getTaxId(): string
    {
        return $this->taxId;
    }

    /**
     * @param string $taxId
     */
    public function setTaxId(string $taxId)
    {
        $this->taxId = $taxId;
    }

    /**
     * @return int
     */
    public function getPaymentTerms(): int
    {
        return $this->paymentTerms;
    }

    /**
     * @param int $paymentTerms
     */
    public function setPaymentTerms(int $paymentTerms)
    {
        $this->paymentTerms = $paymentTerms;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName(string $bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankBranch(): string
    {
        return $this->bankBranch;
    }

    /**
     * @param string $bankBranch
     */
    public function setBankBranch(string $bankBranch)
    {
        $this->bankBranch = $bankBranch;
    }

    /**
     * @return string
     */
    public function getBankAccount(): string
    {
        return $this->bankAccount;
    }

    /**
     * @param string $bankAccount
     */
    public function setBankAccount(string $bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getSubCategory(): int
    {
        return $this->subCategory;
    }

    /**
     * @param int $subCategory
     */
    public function setSubCategory(int $subCategory)
    {
        $this->subCategory = $subCategory;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getRemarks(): string
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     */
    public function setRemarks(string $remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * @return array
     */
    public function getEmails(): array
    {
        return $this->emails;
    }

    /**
     * @param array $emails
     */
    public function setEmails(array $emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels(array $labels)
    {
        $this->labels = $labels;
    }

    /**
     * Sets the client accounting key
     *
     * @param string $accountingKey
     */
    public function setAccountingKey(string $accountingKey)
    {
        $this->accountingKey = $accountingKey;
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
     * Sets the client mobile
     *
     * @param string $mobile
     */
    public function setMobile(string $mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Sets the client contact person
     *
     * @param string $contactPerson
     */
    public function setContactPerson(string $contactPerson)
    {
        $this->contactPerson = $contactPerson;
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
            'id' => $this->id,
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
