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

class EstimatedProfitField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface
{

    /**
     * Add Fields
     *
     * @param \Magento\Framework\Data\Collection $collection
     * @param mixed $field
     * @param mixed $alias
     * @return void
     */
    public function addField(
        \Magento\Framework\Data\Collection $collection,
        $field,
        $alias = null
    ) {
        $collection->joinField(
            "price",
            "catalog_product_entity_decimal",
            "value",
            "entity_id = entity_id",
            "at_price.attribute_id = 77",
            "left"
        );

        $collection->getSelect()->joinLeft(
            ['at_estimated_profit'=>'catalog_product_entity_decimal'],
            'at_estimated_profit.`entity_id` = e.`entity_id` AND at_estimated_profit.`attribute_id`=81',
            ['ROUND(((at_price.`value` - at_estimated_profit.`value`)*at_qty.`qty`),2) AS estimated_profit']
        );
    }
}
