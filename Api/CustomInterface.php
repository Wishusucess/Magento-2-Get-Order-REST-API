<?php
/**
 * Developer: Hemant Singh Magento 2x Developer
 * Category:  Wishusucess_GetOrders 
 * Website:   http://www.wishusucess.com/
 */
namespace Wishusucess\GetOrders\Api;

interface CustomInterface
{
    /**
     * GET for Post api
     * @return boolean|array
     * @param string $orderid order id.
     */

    public function getPost($orderid);
}