<?php


namespace Inventionstar\ProductLabel\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;


#[\AllowDynamicProperties]
class Data extends AbstractHelper
{
    /**
     * Path to configuration
     */
    public const CONFIG_MODULE_PATH = 'inventionstar_product_label/';

    /**
     * Get system configuration value
     *
     * @param $field
     * @param $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
