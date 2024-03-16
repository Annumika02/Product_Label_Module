<?php

namespace Inventionstar\ProductLabel\Model;


#[\AllowDynamicProperties]
class RuleConfig
{
    /**
     * @var Magento/Customer/Model/Session
     */
    private $customerSesion; 
    protected $collectionFactory; 
    protected $storeManager; 
    protected $model; 
    protected $productLabels; 

    /**
     * RuleConfig constructor.
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     * @param Session $customerSesion
     * @param ProductLabels $model
     * @param ProductLabelsFactory $productLabels
     */
    public function __construct(
        \Inventionstar\ProductLabel\Model\ResourceModel\ProductLabels\CollectionFactory $collectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Model\Session $customerSesion,
        ProductLabels $model,
        ProductLabelsFactory $productLabels
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
        $this->customerSesion = $customerSesion;
        $this->model = $model;
        $this->productLabels = $productLabels;
    }

    /**
     * Get Product Tabs
     * @param $_product
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getLastAppiledRuleId($_product)
    {
        $ruleCollection = $this->collectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('from_date', ['lteq' => date("Y-m-d H:i:s")])
            ->addFieldToFilter('to_date', [['null' => true], ['gteq' => date("Y-m-d H:i:s")]])
            ->addFieldToFilter('is_active', ['eq' => 1])
            ->setOrder(
                'priority',
                'asc'
            );

        $ruleId = 0;
        if (!empty($_product)) {
            foreach ($ruleCollection as $rule) {
                $matchedProductIds = [];
                if (!empty($rule->getConditionsSerialized())) {
                    $matchedProductId = $this->productLabels->create()->setData('conditions_serialized', $rule->getConditionsSerialized());

                    if ($matchedProductId->getConditions()->validate($_product)) {
                        $matchedProductIds[] = $_product->getId();
                    }
                } else {
                    $matchedProductIds[] = $_product->getId();
                }

                if (!empty($matchedProductIds) && in_array($_product->getId(), $matchedProductIds)) {

                    $ruleCollection->addFieldToSelect('rule_id')->addStoreFilter($rule->getId());
                    $ruleCollection->addFieldToSelect('rule_id')->addCustomerGroupFilter($rule->getId());

                    if (!empty($rule->getData('store_id'))) {
                        if (in_array($this->storeManager->getStore()->getId(), $rule->getData('store_id')) || in_array("0", $rule->getData('store_id'))) {
                            if (!empty($rule->getData('customer_group_id')) && in_array($this->getCustomerGroup(), $rule->getData('customer_group_id'))) {
                                $ruleId = $rule->getId();
                                break;
                            } else {
                                $ruleId = 0;
                            }
                        } else {
                            $ruleId = 0;
                        }
                    }
                }
            }
        }
        return $ruleId;
    }

    /**
     * Get Customer Group
     *
     * @return int
     */
    public function getCustomerGroup()
    {
        if ($this->customerSesion->getCustomer()->getGroupId()) {
            return $this->customerSesion->getCustomer()->getGroupId();
        } else {
            return 0;
        }
    }

    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabelSelect($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label_select');
        }
    }

    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabel($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label');
        }
    }

    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabelImage($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label_image');
        }
    }

    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabelShape($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label_shape');
        }
    }


    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabelBackgroundColor($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label_background_color');
        }
    }


    /**
     * @param $rule_id
     * @return mixed|null
     */
    public function getProductLabelColor($rule_id)
    {
        if (isset($rule_id) & !empty($rule_id)) {
            $this->model->load($rule_id);
            return $this->model->getData('product_label_color');
        }
    }
}
