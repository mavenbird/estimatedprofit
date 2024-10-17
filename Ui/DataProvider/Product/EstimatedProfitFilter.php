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

class EstimatedProfitFilter implements \Magento\Ui\DataProvider\AddFilterToCollectionInterface
{

    /**
     * Add Filters
     *
     * @param \Magento\Framework\Data\Collection $collection
     * @param mixed $field
     * @param mixed $condition
     * @return void
     */
    public function addFilter(
        \Magento\Framework\Data\Collection $collection,
        $field,
        $condition = null
    ) {
        if (isset($condition['like'])) {
            $collection->getSelect()->where("ROUND(((at_price.`value` - at_".$field.".`value`)*at_qty.`qty`),2) LIKE '".$condition['like']."'");
        }
    }
}
