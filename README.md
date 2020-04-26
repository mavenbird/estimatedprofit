# Magento 2 Module - Mavenbird EstimatedProfit

    ``mavenbird/module-estimatedprofit``

Overview - 
------------
This module is developed for showing estimated profit on `catalog - products` section.

Main Functionalities -
----------------------

* Extra column added to the Catalog -> product grid in the backend called "Estimated Profit"
* Estimated profit is calculated as: (Sales price - Cost prise) X Qty in stock
* If there is no cost price entered, then the "Estimated profit" will be blank

Installation
------------
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Mavenbird`
 - Enable the module by running `php bin/magento module:enable Mavenbird_EstimatedProfit`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Install the module composer by running 
 ```
composer config repositories.estimatedprofit git git@github.com:mavenbird/estimatedprofit 
composer require mavenbird/module-estimatedprofit:dev-master
```
 - enable the module by running `php bin/magento module:enable Mavenbird_EstimatedProfit`
 - apply database updates by running `php bin/magento setup:upgrade`
 - Flush the cache by running `php bin/magento cache:flush`

