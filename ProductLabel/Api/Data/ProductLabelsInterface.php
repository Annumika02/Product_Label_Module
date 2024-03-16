<?php

namespace Inventionstar\ProductLabel\Api\Data;


interface ProductLabelsInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    public const RULE_ID= 'rule_id';
    public const NAME = 'name';
    public const LABEL = 'label';
    public const IS_ACTIVE     = 'is_active';
    public const SORT_ORDER = 'sort_order';
    public const TYPE = 'type';
    public const PRODUCT_LABEL = 'product_label';
    public const PRODUCT_LABEL_BACKGROUND_COLOR = 'product_label_background_color';
    public const PRODUCT_LABEL_COLOR = 'product_label_color';
    public const PRODUCT_LABEL_SELECT = 'product_label_select';
    public const PRODUCT_LABEL_SHAPE = 'product_label_shape';
    public const PRODUCT_LABEL_IMAGE = 'product_label_image';
    public const FROM_DATE                 = 'from_date';
    public const TO_DATE                   = 'to_date';
    public const PRIORITY                   = 'priority';
    public const CONDITIONS_SERIALIZZED = 'conditions_serialized';
    public const CREATION_TIME = 'creation_time';
    public const UPDATION_TIME   = 'updation_time';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Get Label
     *
     * @return string|null
     */
    public function getLabel();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Get Sort Order
     *
     * @return string|null
     */
    public function getSortOrder();

    /**
     * Get Product Label
     *
     * @return string|null
     */
    public function getProductLabel();

    /**
     * Get Product Backgroundcolor
     *
     * @return string|null
     */

    public function getProductLabelBackgroundColor();

    /**
     * Get Product Label color
     *
     * @return string|null
     */
    public function getProductLabelColor();

    /**
     * Get Product Label Select type
     *
     * @return string|null
     */
    public function getProductLabelSelect();

   /**
    * Get Product Label Select shape
    *
    * @return string|null
    */

    public function getProductLabelShape();

   /**
    * Get Product Label Image
    *
    * @return string|null
    */
    public function getProductLabelImage();

    /**
     * Get the from date.
     *
     * @return string|null
     */
    public function getFromDate();

    /**
     * Set the from date.
     *
     * @param string $fromDate
     * @return $this
     */
    public function setFromDate($fromDate);

    /**
     * Get the to date.
     *
     * @return string|null
     */
    public function getToDate();

    /**
     * Set the to date.
     *
     * @param string $toDate
     * @return $this
     */
    public function setToDate($toDate);

    /**
     * Get the priority.
     *
     * @return string|null
     */
    public function getPriority();

    /**
     * Set the priority.
     *
     * @param string $priority
     * @return $this
     */
    public function setPriority($priority);

    /**
     * Get Condition
     *
     * @return string|null
     */
    public function getConditionsSerialized();

    /**
     * Get Type
     *
     * @return string|null
     */
    public function getType();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get updation time
     *
     * @return string|null
     */
    public function getUpdationTime();

    /**
     * Set ID
     *
     * @param int $id
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setId($id);

    /**
     * Set Name
     *
     * @param string $name
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setName($name);

    /**
     * Set Label
     *
     * @param string $label
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setLabel($label);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setIsActive($isActive);

    /**
     * Set Sort Order
     *
     * @param int $sortorder
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setSortOrder($sortorder);

    /**
     * Set Type
     *
     * @param string $type
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setType($type);

    /**
     * Set Condition
     *
     * @param string $condition
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setConditionsSerialized($condition);

    /**
     * Set Product Label
     *
     * @param string $product_label
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabel($product_label);

    /**
     * Set Product Label Backgourd color
     *
     * @param string $product_label_background_color
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelBackgroundColor($product_label_background_color);

    /**
     * Set Product Label Color
     *
     * @param string $product_label_color
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelColor($product_label_color);

    /**
     * Set Product Label select type
     *
     * @param string $product_label_select
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelSelect($product_label_select);

    /**
     * Set Product Label image
     *
     * @param string $product_label_shape
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelShape($product_label_shape);

    /**
     * Set Product Label image
     *
     * @param string $product_label_image
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setProductLabelImage($product_label_image);

    /**
     * Set creation time
     *
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set updation time
     *
     * @return \Inventionstar\ProductLabel\Api\Data\ProductLabelsInterface
     */
    public function setUpdationTime($updationTime);
}
