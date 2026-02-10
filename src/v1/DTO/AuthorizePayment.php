<?php

namespace KevinEm\LimeLightCRM\v1\DTO;

class AuthorizePayment extends AbstractDTO
{
    protected $billingFirstName;
    protected $billingLastName;
    protected $billingAddress1;
    protected $billingAddress2;
    protected $billingCity;
    protected $billingState;
    protected $billingZip;
    protected $billingCountry;
    protected $phone;
    protected $email;
    protected $creditCardType;
    protected $creditCardNumber;
    protected $expirationDate;
    protected $CVV;
    /**
     * @var string
     */
    protected $ipAddress;
    /**
     * @var int
     */
    protected $productId;
    /**
     * @var int
     */
    protected $campaignId;
    /**
     * @var string
     */
    protected $auth_amount;
    /**
     * @var bool
     */
    protected $cascade_enabled = true;
    /**
     * @var bool
     */
    protected $save_customer = false;
    /**
     * @var bool
     */
    protected $validate_only_flag = false;
    /**
     * @var bool
     */
    protected $void_flag = true;

    /**
     * Digital wallet token for Apple Pay or Google Pay payments.
     * When using Apple Pay, set creditCardType to 'applepay' and pass the token here.
     *
     * @var string|null
     */
    protected $wallet_token = null;

    /**
     * @return mixed
     */
    public function getBillingFirstName()
    {
        return $this->billingFirstName;
    }

    /**
     * @param mixed $billingFirstName
     * @return AuthorizePayment
     */
    public function setBillingFirstName($billingFirstName)
    {
        $this->billingFirstName = $billingFirstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingLastName()
    {
        return $this->billingLastName;
    }

    /**
     * @param mixed $billingLastName
     * @return AuthorizePayment
     */
    public function setBillingLastName($billingLastName)
    {
        $this->billingLastName = $billingLastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress1()
    {
        return $this->billingAddress1;
    }

    /**
     * @param mixed $billingAddress1
     * @return AuthorizePayment
     */
    public function setBillingAddress1($billingAddress1)
    {
        $this->billingAddress1 = $billingAddress1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress2()
    {
        return $this->billingAddress2;
    }

    /**
     * @param mixed $billingAddress2
     * @return AuthorizePayment
     */
    public function setBillingAddress2($billingAddress2)
    {
        $this->billingAddress2 = $billingAddress2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @param mixed $billingCity
     * @return AuthorizePayment
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * @param mixed $billingState
     * @return AuthorizePayment
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }

    /**
     * @param mixed $billingZip
     * @return AuthorizePayment
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = $billingZip;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @param mixed $billingCountry
     * @return AuthorizePayment
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return AuthorizePayment
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return AuthorizePayment
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardType()
    {
        return $this->creditCardType;
    }

    /**
     * @param mixed $creditCardType
     * @return AuthorizePayment
     */
    public function setCreditCardType($creditCardType)
    {
        $this->creditCardType = $creditCardType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param mixed $creditCardNumber
     * @return AuthorizePayment
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = $creditCardNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     * @return AuthorizePayment
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCVV()
    {
        return $this->CVV;
    }

    /**
     * @param mixed $CVV
     * @return AuthorizePayment
     */
    public function setCVV($CVV)
    {
        $this->CVV = $CVV;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return AuthorizePayment
     */
    public function setIpAddress(string $ipAddress): AuthorizePayment
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return AuthorizePayment
     */
    public function setProductId(int $productId): AuthorizePayment
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId(): int
    {
        return $this->campaignId;
    }

    /**
     * @param int $campaignId
     * @return AuthorizePayment
     */
    public function setCampaignId(int $campaignId): AuthorizePayment
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthAmount(): string
    {
        return $this->auth_amount;
    }

    /**
     * Amount to authorize. Defaults to 1.00 if not supplied or invalid
     *
     * @param string $auth_amount
     * @return AuthorizePayment
     */
    public function setAuthAmount(string $auth_amount): AuthorizePayment
    {
        $this->auth_amount = $auth_amount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCascadeEnabled(): bool
    {
        return $this->cascade_enabled;
    }

    /**
     * If enabled, allows the authorization to follow a cascade profile
     *
     * @param bool $cascade_enabled
     * @return AuthorizePayment
     */
    public function setCascadeEnabled(bool $cascade_enabled): AuthorizePayment
    {
        $this->cascade_enabled = $cascade_enabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSaveCustomer(): bool
    {
        return $this->save_customer;
    }

    /**
     * If enabled, saves temporary customer data
     *
     * @param bool $save_customer
     * @return AuthorizePayment
     */
    public function setSaveCustomer(bool $save_customer): AuthorizePayment
    {
        $this->save_customer = $save_customer;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValidateOnlyFlag(): bool
    {
        return $this->validate_only_flag;
    }

    /**
     * If passed as 1, the card will be validated. If passed as 0, the card will be authorized at the auth_amount.
     *
     * @param bool $validate_only_flag
     * @return AuthorizePayment
     */
    public function setValidateOnlyFlag(bool $validate_only_flag): AuthorizePayment
    {
        $this->validate_only_flag = $validate_only_flag;

        return $this;
    }

    /**
     * @return bool
     */
    public function isVoidFlag(): bool
    {
        return $this->void_flag;
    }

    /**
     * If passed as 1, the authorization will be immediately voided. If passed as 0, the authorization will remain.
     *
     * @param bool $void_flag
     * @return AuthorizePayment
     */
    public function setVoidFlag(bool $void_flag): AuthorizePayment
    {
        $this->void_flag = $void_flag;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWalletToken(): ?string
    {
        return $this->wallet_token;
    }

    /**
     * Set the digital wallet token for Apple Pay or Google Pay.
     * When using Apple Pay, also set creditCardType to 'applepay'.
     *
     * @param string $wallet_token
     * @return AuthorizePayment
     */
    public function setWalletToken(string $wallet_token): AuthorizePayment
    {
        $this->wallet_token = $wallet_token;

        return $this;
    }
}
