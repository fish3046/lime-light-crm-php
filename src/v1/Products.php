<?php

namespace KevinEm\LimeLightCRM\v1;

/**
 * Class Products
 * @package KevinEm/LimeLightCRM/v1
 */
class Products extends AbstractService
{
    public function customerFindActiveProduct(array $data)
    {
        return $this->makeRequest('customer_find_active_product', $data);
    }

    public function productAttributeIndex(array $productIds)
    {
        return $this->makeRequest('product_attribute_index', ['product_id' => $productIds]);
    }

    public function productBundleIndex()
    {
        return $this->makeRequest('product_bundle_index', []);
    }

    public function productBundleView(int $productId)
    {
        return $this->makeRequest('product_bundle_view', ['product_id' => $productId]);
    }

    public function productCopy(array $data)
    {
        return $this->makeRequest('product_copy', $data);
    }

    public function productCreate(array $data)
    {
        return $this->makeRequest('product_create', $data);
    }

    public function productDelete(int $productId)
    {
        return $this->makeRequest('product_delete', ['product_id' => $productId]);
    }

    public function productIndex(array $data)
    {
        return $this->makeRequest('product_index', $data);
    }

    public function productUpdate(array $data)
    {
        return $this->makeRequest('product_update', $data);
    }
}
