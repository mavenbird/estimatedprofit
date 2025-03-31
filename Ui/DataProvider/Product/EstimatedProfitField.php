<?php 
namespace Mavenbird\EstimatedProfit\Ui\DataProvider\Product;
 
use Magento\Framework\App\ResourceConnection;
 
class EstimatedProfitField implements \Magento\Ui\DataProvider\AddFieldToCollectionInterface 
{ 
    /**
     * @var ResourceConnection
     */
    private $resourceConnection;
 
    /**
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        ResourceConnection $resourceConnection
    ) {
        $this->resourceConnection = $resourceConnection;
    }
 
    public function addField(
        \Magento\Framework\Data\Collection $collection,
        $field,
        $alias = null
    ) 
    { 
        $connection = $this->resourceConnection->getConnection();
        $productDecimalTable = $this->resourceConnection->getTableName('catalog_product_entity_decimal');
 
        $collection->joinField(
             "price", 
             $productDecimalTable, 
             "value",
             "entity_id = entity_id",
             "at_price.attribute_id = 77",
             "left" 
        );
 
        $collection->getSelect()->joinLeft(
            ['at_estimated_profit' => $productDecimalTable],
            'at_estimated_profit.`entity_id` = e.`entity_id` AND at_estimated_profit.`attribute_id`=81',
            ['ROUND(((at_price.`value` - at_estimated_profit.`value`)*at_qty.`qty`),2) AS estimated_profit']
        );
    }
}