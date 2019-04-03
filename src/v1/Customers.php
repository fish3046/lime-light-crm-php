<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Customers
 *
 * @package KevinEm/LimeLightCRM/v1
 */
class Customers extends AbstractService
{
    /**
     * @param array $data
     * @return array
     */
    public function customerFind(array $data)
    {
        return $this->makeRequest('customer_find', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function customerFindActiveProduct(array $data)
    {
        return $this->makeRequest('customer_find_active_product', $data);
    }

    /**
     * @param $customerId
     * @return array
     */
    public function customerView($customerId)
    {
        return $this->makeRequest('customer_view', ['customer_id' => $customerId]);
    }
}