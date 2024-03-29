<?php

namespace Inventionstar\ProductLabel\Helper;

use Inventionstar\ProductLabel\Model\RuleConfig;


#[\AllowDynamicProperties]
class ProductLabelHelper extends \Magento\Framework\Url\Helper\Data
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var RuleConfig
     */
    private $rules;

    /**
     * ProductLabelHelper constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param RuleConfig $rules
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        RuleConfig $rules
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
        $this->rules = $rules;
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductLabel($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label'))) {
            return $product->getData('product_label');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabel($ruleId))) {
                return  $this->rules->getProductLabel($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductLabelColor($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label_color'))) {
            return $product->getData('product_label_color');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabelColor($ruleId))) {
                return  $this->rules->getProductLabelColor($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }
    /**
     * @param $product
     * @return string
     */
    public function getProductLabelBackgroundColor($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label_background_color'))) {
            return $product->getData('product_label_background_color');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabelBackgroundColor($ruleId))) {
                return  $this->rules->getProductLabelBackgroundColor($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductLabelShape($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label_shape'))) {
            return $product->getData('product_label_shape');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabelShape($ruleId))) {
                return  $this->rules->getProductLabelShape($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductLabelImage($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label_image'))) {
            return $product->getData('product_label_image');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabelImage($ruleId))) {
                return  $this->rules->getProductLabelImage($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductMediaUrl()
    {
        $mediaUrl = $this->storeManager
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl."inventionstar/product_label_image/";
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductLabelType($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        if (!empty($product->getData('product_label_select'))) {
            return $product->getData('product_label_select');
        } elseif ($ruleId) {
            if (!empty($this->rules->getProductLabelSelect($ruleId))) {
                return  $this->rules->getProductLabelSelect($ruleId);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

     /**
      * @param $product
      * @return string
      */
    public function getIsProductLabelEnabled($product)
    {
        $ruleId =$this->rules->getLastAppiledRuleId($product);
        return $ruleId;
    }
}
