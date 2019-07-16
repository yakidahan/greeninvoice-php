<?php

namespace Yadahan\GreenInvoice\Documents;

use Yadahan\GreenInvoice\GreenInvoice;
use Yadahan\GreenInvoice\Clients\Client;

class Document extends GreenInvoice
{
    /**
     * The endpoint for document request.
     *
     * @var string
     */
    protected $endpoint = '/documents';

    /**
     * Document's description.
     *
     * @var string
     */
    protected $description;

    /**
     * Document's remarks.
     *
     * @var string
     */
    protected $remarks;

    /**
     * Texts appearing in footer.
     *
     * @var string
     */
    protected $footer;

    /**
     * Custom extra text appearing in email sent to customer.
     *
     * @var string
     */
    protected $emailContent;

    /**
     * Document type.
     *
     * @var int
     */
    protected $type;

    /**
     * Document date in the format YYYY-MM-DD.
     *
     * @var string
     */
    protected $date;

    /**
     * Document payment due date in the format YYYY-MM-DD.
     *
     * @var string
     */
    protected $dueDate;

    /**
     * Primary language.
     *
     * @var string
     */
    protected $lang;

    /**
     * Primary currency.
     *
     * @var string
     */
    protected $currency;

    /**
     * Vat type for that document.
     *
     * @var int
     */
    protected $vatType = 0;

    /**
     * Discount information.
     *
     * @var obj
     */
    protected $discount;

    /**
     * Round the amounts?
     *
     * @var bool
     */
    protected $rounding;

    /**
     * Digital sign the document?
     *
     * @var bool
     */
    protected $signed = true;

    /**
     * Attach the document in the email sent to recipient?
     *
     * @var bool
     */
    protected $attachment;

    /**
     * @var obj
     */
    // protected $paymentRequestData;

    /**
     * Client information.
     *
     * @var obj
     */
    protected $client;

    /**
     * Income rows.
     *
     * @var array
     */
    protected $income = [];

    /**
     * Payment rows.
     *
     * @var array
     */
    protected $payment = [];

    /**
     * Linked document IDs.
     * allows you to state the related / relevant documents, e.g.: when creating a receipt,
     * attach your original invoice document ID as one of the ids in the linkedDocumentIds -
     * this in turn will automatically close the original invoice if needed.
     *
     * @var array
     */
    protected $linkedDocumentIds = [];

    /**
     * Linked payment ID (valid for document type 305 only).
     * allows you to define the paymentId that the document is going to be relevant to,
     * this can be attached only to invoice documents (type 305).
     *
     * @var string
     */
    protected $linkedPaymentId;

    /**
     * Reference type (applicable only when using linkedDocumentIds)
     *
     * @var string
     */
    protected $linkType;

    public function __construct(int $type, string $lang = 'he', string $currency = 'ILS', bool $sandbox = false)
    {
        parent::__construct($sandbox);

        $this->type = $type;
        $this->lang = $lang;
        $this->currency = $currency;
    }

    /**
     * Sets the document's description.
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Sets the document's remarks.
     *
     * @param string $remarks
     */
    public function setRemarks(string $remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * Sets the texts appearing in footer.
     *
     * @param string $footer
     */
    public function setFooter(string $footer)
    {
        $this->footer = $footer;
    }

    /**
     * Sets the custom extra text appearing in email sent to customer.
     *
     * @param string $emailContent
     */
    public function setEmailContent(string $emailContent)
    {
        $this->emailContent = $emailContent;
    }

    /**
     * Sets the document date in the format YYYY-MM-DD.
     *
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * Sets the document payment due date in the format YYYY-MM-DD.
     *
     * @param string $dueDate
     */
    public function setDueDate(string $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * Sets the vat type for that document.
     *
     * @param int $vatType
     */
    public function setVatType(int $vatType)
    {
        $this->vatType = $vatType;
    }

    /**
     * Sets the discount information.
     *
     * @param float $amount
     * @param string $type
     */
    public function setDiscount(float $amount, string $type = 'sum')
    {
        $this->discount = [
            'amount' => $amount,
            'type' => $type
        ];
    }

    /**
     * Sets round the amounts?
     *
     * @param bool $rounding
     */
    public function setRounding(bool $rounding)
    {
        $this->rounding = $rounding;
    }

    /**
     * Sets digital sign the document?
     *
     * @param bool $signed
     */
    public function setSigned(bool $signed)
    {
        $this->signed = $signed;
    }

    /**
     * Sets attach the document in the email sent to recipient?
     *
     * @param bool $attachment
     */
    public function setAttachment(bool $attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * Sets attach the document in the email sent to recipient?
     *
     * @param Client $client
     * @param bool $add
     * @param bool $self
     */
    public function setClient(Client $client, bool $add = false, bool $self = false)
    {
        $this->client = array_merge($client->toArray(), [
            'add' => $add,
            'self' => $self,
        ]);
    }

    /**
     * Sets payment row
     *
     * @param Payment $payment
     */
    public function setPayment(Payment $payment)
    {
        array_push($this->payment, $payment->toArray());
    }

    /**
     * Sets income row
     *
     * @param array $income
     */
    public function setIncome(array $income)
    {
        array_push($this->income, $income);
    }

    /**
     * Sets linked document IDs
     *
     * @param string $id
     */
    public function setLinkedDocumentIds(string $id)
    {
        array_push($this->linkedDocumentIds, $id);
    }

    /**
     * Sets reference type.
     *
     * @param string $linkType
     */
    public function setLinkType(string $linkType)
    {
        $this->linkType = $linkType;
    }

    public function get()
    {
        return $this->request($this->toArray(), 'POST');
    }

    /**
     * Convert the class to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_filter([
            'description' => $this->description,
            'remarks' => $this->remarks,
            'footer' => $this->footer,
            'emailContent' => $this->emailContent,
            'type' => $this->type,
            'date' => $this->date,
            'dueDate' => $this->dueDate,
            'lang' => $this->lang,
            'currency' => $this->currency,
            'vatType' => $this->vatType,
            'discount' => $this->discount,
            'rounding' => $this->rounding,
            'signed' => $this->signed,
            'attachment' => $this->attachment,
            'client' => $this->client,
            'income' => $this->income,
            'payment' => $this->payment,
            'linkedDocumentIds' => $this->linkedDocumentIds,
            'linkedPaymentId' => $this->linkedPaymentId,
            'linkType' => $this->linkType,
        ], function($value) {
            return !is_null($value);
        });
    }
}
