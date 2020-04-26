<?php 
namespace Mavenbird\EstimatedProfit\Ui\DataProvider\Product;
class EstimatedProfitField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface 
{ 
    public function addField(
        \Magento\Framework\Data\Collection $collection,
        $field,
        $alias = null
    ) 
    { 
        $collection->joinField(
             "price", 
             "catalog_product_entity_decimal", 
             "value",
             "entity_id = entity_id",
             "at_price.attribute_id = 77",
             "left" 
        );

        $collection->getSelect()->joinLeft(
            array('at_estimated_profit'=>'catalog_product_entity_decimal'),
            'at_estimated_profit.`entity_id` = e.`entity_id` AND at_estimated_profit.`attribute_id`=81',
            array('ROUND(((at_price.`value` - at_estimated_profit.`value`)*at_qty.`qty`),2) AS estimated_profit')
        );

    }
}