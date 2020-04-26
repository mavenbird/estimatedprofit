<?php 
namespace Mavenbird\EstimatedProfit\Ui\DataProvider\Product; 
class EstimatedProfitFilter implements \Magento\Ui\DataProvider\AddFilterToCollectionInterface 
{ 
    public function addFilter(
        \Magento\Framework\Data\Collection $collection,
        $field,
        $condition = null
    ) 
    { 
        if (isset($condition['like'])) 
        { 
            $collection->getSelect()->where("ROUND(((at_price.`value` - at_".$field.".`value`)*at_qty.`qty`),2) LIKE '".$condition['like']."'");
        } 
    } 
}