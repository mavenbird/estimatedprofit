<?php

/**
 * Mavenbird Technologies Private Limited
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://mavenbird.com/Mavenbird-Module-License.txt
 *
 * =================================================================
 *
 * @category   Mavenbird
 * @package    Mavenbird_EstimatedProfit
 * @author     Mavenbird Team
 * @copyright  Copyright (c) 2018-2024 Mavenbird Technologies Private Limited ( http://mavenbird.com )
 * @license    http://mavenbird.com/Mavenbird-Module-License.txt
 */
namespace Mavenbird\EstimatedProfit\Ui\DataProvider\Product;

use Magento\Framework\App\ResourceConnection;

class EstimatedProfitField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface
{
    private $resource;
    private $connection;

    public function __construct(ResourceConnection $resource) 
    {
        $this->resource = $resource;
        $this->connection = $resource->getConnection();
    }

    public function addField(\Magento\Framework\Data\Collection $collection, $field, $alias = null)
    {
        $decimalTable = $this->resource->getTableName('catalog_product_entity_decimal');
        $stockItemTable = $this->resource->getTableName('cataloginventory_stock_item');

        // Join for stock quantity
        $collection->getSelect()->joinLeft(
            ['stock_qty' => $stockItemTable], // Changed alias from 'at_qty' to 'stock_qty'
            'stock_qty.product_id = e.entity_id AND stock_qty.stock_id = 1',
            ['qty']
        );

        // Join for price attribute
        $collection->getSelect()->joinLeft(
            ['product_price' => $decimalTable], // Changed alias from 'at_price' to 'product_price'
            'product_price.entity_id = e.entity_id AND product_price.attribute_id = 77',
            ['price' => 'product_price.value']
        );

        // Join for estimated profit attribute
        $collection->getSelect()->joinLeft(
            ['estimated_profit_attr' => $decimalTable], // Changed alias from 'at_estimated_profit' to 'estimated_profit_attr'
            'estimated_profit_attr.entity_id = e.entity_id AND estimated_profit_attr.attribute_id = 81',
            ['estimated_profit' => new \Zend_Db_Expr('ROUND(((product_price.value - estimated_profit_attr.value) * stock_qty.qty), 2)')]
        );
    }
}