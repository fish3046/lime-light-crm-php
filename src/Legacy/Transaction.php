<?php

namespace KevinEm\LimeLightCRM\Legacy;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;

/**
 * Class Transaction
 *
 * @package KevinEm\LimeLightCRM\Legacy
 */
class Transaction
{
    public function __construct(protected LimeLightCRM $limeLightCRM)
    {
    }

    public function getTransactionUrl(): string
    {
        return $this->limeLightCRM->getBaseUrl() . '/admin/transact.php';
    }

    /**
     * NOTE: Account for LimeLight's inconsistent response camel/snake case
     *
     * @param array $response
     * @throws LimeLightCRMTransactionException
     */
    public function checkResponse(array $response): void
    {
        $exception = $responses = null;

        if (isset($response['responseCode'])) {
            $responses = explode(',', $response['responseCode']);
        }

        if (isset($response['response_code'])) {
            $responses = explode(',', $response['response_code']);
        }

        if (isset($responses)) {
            foreach ($responses as $code) {
                if (!in_array($code, [100])) {
                    $exception = new LimeLightCRMTransactionException((int)$code, $exception, $response);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }
    }

    public function newOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('NewOrder', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function newOrderCardOnFile(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('NewOrderCardOnFile', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function newOrderWithProspect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('NewOrderWithProspect', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function authorizePayment(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('authorize_payment', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function newProspect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('NewProspect', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function threeDRedirect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('three_d_redirect', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}
