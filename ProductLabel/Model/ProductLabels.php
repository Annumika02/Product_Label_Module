<?php

namespace Inventionstar\ProductLabel\Model;
use Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\CatalogRule\Model\Rule\Condition\CombineFactory;
use Magento\CatalogRule\Model\Rule\Action\CollectionFactory;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Framework\Serialize\Serializer\Json;


#[\AllowDynamicProperties]
class ProductLabels extends \Magento\Rule\Model\AbstractModel implements ProductLabelsInterface
{
    public const STATUS_ENABLED = 1;
    public const STATUS_DISABLED = 0;

    /**
     * @var CombineFactory
     */
    public $condCombineFactory;

    /**
     * @var Magento/CatalogRule/Model/Rule/Action/CollectionFactory
     */
    public $condProdCombineF;

    /**
     * ProductTabs constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param TimezoneInterface $localeDate
     * @param CombineFactory $condCombineFactory
     * @param CollectionFactory $condProdCombineF
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     * @param ExtensionAttributesFactory|null $extensionFactory
     * @param AttributeValueFactory|null $customAttributeFactory
     * @param Json|null $serializer
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        TimezoneInterface $localeDate,
        CombineFactory $condCombineFactory,
        CollectionFactory $condProdCombineF,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = [],
        ExtensionAttributesFactory $extensionFactory = null,
        AttributeValueFactory $customAttributeFactory = null,
        Json $serializer = null
    ) {
        $this->condCombineFactory = $condCombineFactory;
        $this->condProdCombineF = $condProdCombineF;
        parent::__construct($context, $registry, $formFactory, $localeDate, $resource, $resourceCollection, $data, $extensionFactory, $customAttributeFactory, $serializer);
    }

    /**
     * Define resource model
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(\Inventionstar\ProductLabel\Model\ResourceModel\ProductLabels::class);
        $this->setIdFieldName('rule_id');
    }

    /**
     * @param string $formName
     * @return string
     */
    public function getConditionsFieldSetId($formName = '')
    {
        return $formName . 'rule_conditions_fieldset_' . $this->getId();
    }

    /**
     * Get Stores
     *
     * @return array
     */
    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : (array)$this->getData('store_id');
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(self::NAME);
    }

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive()
    {
        // TODO: Implement isActive() method.
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Get Sort Order
     *
     * @return string|null
     */
    public function getSortOrder()
    {
        // TODO: Implement getSortOrder() method.
        return $this->getData(self::SORT_ORDER);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        // TODO: Implement getCreationTime() method.
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get updation time
     *
     * @return string|null
     */
    public function getUpdationTime()
    {
        // TODO: Implement getUpdationTime() method.
        return $this->getData(self::UPDATION_TIME);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setIsActive($isActive)
    {
        // TODO: Implement setIsActive() method.
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Set Sort Order
     *
     * @param $sortorder
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setSortOrder($sortorder)
    {
        // TODO: Implement setSortOrder() method.
        return $this->setData(self::SORT_ORDER, $sortorder);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setCreationTime($creationTime)
    {
        // TODO: Implement setCreationTime() method.
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set updation time
     *
     * @param $updationTime
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setUpdationTime($updationTime)
    {
        // TODO: Implement setUpdationTime() method.
        return $this->setData(self::UPDATION_TIME, $updationTime);
    }

    /**
     * Get Label
     *
     * @return string|null
     */
    public function getLabel()
    {
        // TODO: Implement getLabel() method.
        return $this->getData(self::LABEL);
    }

    /**
     * Get PRODUCT LABEL
     *
     * @return string|null
     */
    public function getProductLabel()
    {
        return $this->getData(self::PRODUCT_LABEL);
    }

    /**
     * Get product_label_background_color
     *
     * @return string|null
     */
    public function getProductLabelBackgroundColor()
    {
        return $this->getData(self::PRODUCT_LABEL_BACKGROUND_COLOR);
    }

    /**
     * Get product_label_background_color
     *
     * @return string|null
     */
    public function getProductLabelColor()
    {
        return $this->getData(self::PRODUCT_LABEL_COLOR);
    }

    /**
     * Get product_label_background_color
     *
     * @return string|null
     */
    public function getProductLabelSelect()
    {
        return $this->getData(self::PRODUCT_LABEL_SELECT);
    }

    /**
     * Get product_label_background_color
     *
     * @return string|null
     */

    public function getProductLabelShape()
    {
        return $this->getData(self::PRODUCT_LABEL_SHAPE);
    }


    public function getProductLabelImage()
    {
        return $this->getData(self::PRODUCT_LABEL_IMAGE);
    }

    /**
     * Get From Date
     *
     * @return string|null
     */
    public function getFromDate()
    {
        // TODO: Implement getFromDate() method.
        return $this->getData(self::FROM_DATE);
    }

    /**
     * Get To Date
     *
     * @return string|null
     */
    public function getToDate()
    {
        // TODO: Implement getToDate() method.
        return $this->getData(self::TO_DATE);
    }

    /**
     * Get Priority
     *
     * @return string|null
     */
    public function getPriority()
    {
        // TODO: Implement getPriority() method.
        return $this->getData(self::PRIORITY);
    }


    /**
     * Set product_label
     *
     * @param $product_label
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabel($product_label)
    {
        return $this->setData(self::PRODUCT_LABEL, $product_label);
    }

    /**
     * Set product_label_background_color
     *
     * @param $product_label_background_color
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelBackgroundColor($product_label_background_color)
    {
        return $this->setData(self::PRODUCT_LABEL_BACKGROUND_COLOR, $product_label_background_color);
    }

    /**
     * Set product_label_color
     *
     * @param $product_label_color
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelColor($product_label_color)
    {
        return $this->setData(self::PRODUCT_LABEL_COLOR, $product_label_color);
    }

    /**
     * Set product_label_select
     *
     * @param $product_label_select
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelSelect($product_label_select)
    {
        return $this->setData(self::PRODUCT_LABEL_SELECT, $product_label_select);
    }

    /**
     * Set product_label_image
     *
     * @param $product_label_image
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelShape($product_label_shape)
    {
        return $this->setData(self::PRODUCT_LABEL_SHAPE, $product_label_shape);
    }

    /**
     * Set product_label_image
     *
     * @param $product_label_image
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelImage($product_label_image)
    {
        return $this->setData(self::PRODUCT_LABEL_IMAGE, $product_label_image);
    }

    /**
     * Set From Date
     *
     * @param $fromdate
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setFromDate($fromdate)
    {
        // TODO: Implement setFromDate() method.
        return $this->setData(self::FROM_DATE, $fromdate);
    }

    /**
     * Set To Date
     *
     * @param $todate
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setToDate($todate)
    {
        // TODO: Implement setToDate() method.
        return $this->setData(self::TO_DATE, $todate);
    }

    /**
     * Set Priority
     *
     * @param $priority
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setPriority($priority)
    {
        // TODO: Implement setPriority() method.
        return $this->setData(self::PRIORITY, $priority);
    }


    /**
     * Set Condition
     *
     * @param $condition
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setConditionsSerialized($condition)
    {
        // TODO: Implement setCondition() method.
        return $this->setData(self::CONDITIONS_SERIALIZZED, $condition);
    }


    /**
     * Get Condition
     *
     * @return string|null
     */
    public function getConditionsSerialized()
    {
        // TODO: Implement getCondition() method.
        return $this->getData(self::CONDITIONS_SERIALIZZED);
    }

    /**
     * Get Type
     *
     * @return string|null
     */
    public function getType()
    {
        // TODO: Implement getType() method.
        return $this->getData(self::TYPE);
    }


    /**
     * Set Label
     *
     * @param $description
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setLabel($label)
    {
        // TODO: Implement setLabel() method.
        return $this->setData(self::LABEL, $label);
    }

    /**
     * Set Type
     *
     * @param $type
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setType($type)
    {
        // TODO: Implement setType() method.
        return $this->setData(self::TYPE, $type);
    }

    /**
     * Getter for rule combine conditions instance
     *
     * @return \Magento\Rule\Model\Condition\Combine
     */
    public function getConditionsInstance()
    {
        // TODO: Implement getConditionsInstance() method.
        return $this->condCombineFactory->create();
    }

    /**
     * Getter for rule actions collection instance
     *
     * @return \Magento\Rule\Model\Action\Collection
     */
    public function getActionsInstance()
    {
        // TODO: Implement getActionsInstance() method.
        return $this->condProdCombineF->create();
    }
}
