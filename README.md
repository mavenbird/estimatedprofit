# Magento 2 Module - Mavenbird EstimatedProfit

    ``mavenbird/module-estimatedprofit``


## Main Functionalities
* Add an extra column to the product grid in the backend called "Estimated Profit"
* Estimated profit should be calculated as: (Sales price - Cost prise) X Qty in stock
* if there is no cost price entered, then the estimated profit will be blank



## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Mavenbird`
 - Enable the module by running `php bin/magento module:enable Mavenbird_EstimatedProfit`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require mavenbird/module-estimatedprofit`
 - enable the module by running `php bin/magento module:enable Mavenbird_EstimatedProfit`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration
* Enable (estimated_profit/profit/enable)
