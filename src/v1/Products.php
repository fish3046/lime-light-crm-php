<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Products
 * @package KevinEm/LimeLightCRM/v1
 */
class Products extends AbstractService
{
    /**
     * @param array $data
     * @return array
     */
    public function customerFindActiveProduct(array $data)
    {
        return $this->makeRequest('customer_find_active_product', $data);
    }

    /**
     * @param array $productIds
     * @return array
     */
    public function productAttributeIndex(array $productIds)
    {
        return $this->makeRequest('product_attribute_index', ['product_id' => $productIds]);
    }

    /**
     * @return array
     */
    public function productBundleIndex()
    {
        return $this->makeRequest('product_bundle_index', []);
    }

    /**
     * @param $productId
     * @return array
     */
    public function productBundleView($productId)
    {
        return $this->makeRequest('product_bundle_view', ['product_id' => $productId]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function productCopy(array $data)
    {
        return $this->makeRequest('product_copy', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function productCreate(array $data)
    {
        return $this->makeRequest('product_create', $data);
    }

    /**
     * @param $productId
     * @return array
     */
    public function productDelete($productId)
    {
        return $this->makeRequest('product_delete', ['product_id' => $productId]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function productIndex(array $data)
    {
        return $this->makeRequest('product_index', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function productUpdate(array $data)
    {
        return $this->makeRequest('product_update', $data);
    }
}