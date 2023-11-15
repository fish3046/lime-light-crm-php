<?php

namespace KevinEm\LimeLightCRM\Exceptions;

class LimeLightCRMTransactionException extends LimeLightCRMException
{
    public function __construct(int $code, \Exception $previous = null, array $response = [])
    {
        parent::__construct($this->getExceptionMessage($code), $code, $previous, $response);
    }

    public function getExceptionMessage(int $code): string
    {
        // @codeCoverageIgnoreStart
        return match ($code) {
            101 => '',
            200 => 'Invalid login credentials',
            201 => 'three_d_redirect_url is required',
            303 => 'Invalid upsell product Id of (XXX) found',
            304 => 'Invalid first name of (XXX) found',
            305 => 'Invalid last name of (XXX) found',
            306 => 'Invalid shipping address1 of (XXX) found',
            307 => 'Invalid shipping city of (XXX) found',
            308 => 'Invalid shipping state of (XXX) found',
            309 => 'Invalid shipping zip of (XXX) found',
            310 => 'Invalid shipping country of (XXX) found',
            311 => 'Invalid billing address1 of (XXX) found',
            312 => 'Invalid billing city of (XXX) found',
            313 => 'Invalid billing state of (XXX) found',
            314 => 'Invalid billing zip of (XXX) found',
            315 => 'Invalid billing country of (XXX) found',
            316 => 'Invalid phone number of (XXX) found',
            317 => 'Invalid email address of (XXX) found',
            318 => 'Invalid credit card type of (XXX) found',
            319 => 'Invalid credit card number of (XXX) found',
            320 => 'Invalid expiration date of (XXX) found',
            321 => 'Invalid IP address of (XXX) found',
            322 => 'Invalid shipping id of (XXX) found',
            323 => 'CVV is required for tranType \'Sale\' ',
            324 => 'Supplied CVV of (XXX) has an invalid length',
            325 => 'Shipping state must be 2 characters for a shipping country of US',
            326 => 'Billing state must be 2 characters for a billing country of US',
            327 => 'Invalid payment type of XXX',
            328 => 'Expiration month of (XXX) must be between 01 and 12',
            329 => 'Expiration date of (XXX) must be 4 digits long',
            330 => 'Could not find prospect record',
            331 => 'Missing previous OrderId',
            332 => 'Could not find original order Id',
            333 => 'Order has been black listed',
            334 => 'The credit card number or email address has already purchased this product(s)',
            335 => 'Invalid Dynamic Price Format',
            336 => 'checkRoutingNumber must be passed when checking is the payment type is checking or eft_germany',
            337 => 'checkAccountNumber must be passed when checking is the payment type is checking or eft_germany',
            338 => 'Invalid campaign to perform sale on.  No checking account on this campaign.',
            339 => 'tranType missing or invalid',
            340 => 'Invalid employee username of (XXX) found',
            341 => 'Campaign Id (XXX) restricted to user (XXX)',
            342 => 'The credit card has expired',
            400 => 'Invalid campaign Id of (XXX) found',
            411 => 'Invalid subscription field',
            412 => 'Missing subscription field',
            413 => 'Product is not subscription based',
            414 => 'The product that is being purchased has a different subscription type than the next recurring product',
            415 => 'Invalid subscription value',
            600 => 'Invalid product Id of (XXX) found',
            666 => 'User does not have permission to use this method',
            667 => 'This user account is currently disabled',
            668 => 'Unauthorized IP Address',
            669 => 'Unauthorized to access campaign',
            700, 1002 => 'Invalid method supplied',
            705 => 'Order is not 3DS related',
            800 => 'Transaction was declined',
            900 => 'SSL is required to run a transaction',
            901 => 'Alternative payment payer id is required for this payment type',
            902 => 'Alternative payment token is required for this payment type',
            1000 => 'Could not add record',
            1001 => 'Invalid login credentials supplied',
            default => 'Unknown exception',
        };
        // @codeCoverageIgnoreEnd
    }
}
