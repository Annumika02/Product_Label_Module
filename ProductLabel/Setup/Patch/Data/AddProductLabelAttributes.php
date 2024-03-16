<?php

namespace Inventionstar\ProductLabel\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetup;
use Magento\Catalog\Model\ResourceModel\Product as ResourceProduct;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class AddProductLabelAttributes implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var ResourceProduct
     */
    private $resourceProduct;
    /**
     * @var AttributeSet
     */
    private $attributeSet;

    /**
     * AddProductLabelAttributes constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     * @param ResourceProduct $resourceProduct
     * @param AttributeSet $attributeSet
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        ResourceProduct $resourceProduct,
        AttributeSet $attributeSet
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->resourceProduct = $resourceProduct;
        $this->attributeSet = $attributeSet;
    }

    /**
     * @return AddProductLabelAttributes|void
     */
    public function apply()
    {
        $setup = $this->moduleDataSetup->getConnection()->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label_select',
            [
                'type' => 'varchar',
                'input' => 'select',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Label Type',
                'group' => 'General',
                'source' => \Inventionstar\ProductLabel\Model\Config\Source\LabelOptions::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'used_for_promo_rules' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'filterable' => true,
                'used_in_product_listing' => true
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label',
            [
                'type' => 'varchar',
                'input' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Label',
                'group' => 'General',
                'visible' => true,
                'used_for_promo_rules' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'filterable' => false,
                'used_in_product_listing' => true

            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label_background_color',
            [
                'type' => 'varchar',
                'input' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Label Background Color',
                'group' => 'General',
                'visible' => true,
                'used_for_promo_rules' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'filterable' => false,
                'default' => '#ff0000',
                'used_in_product_listing' => true

            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label_color',
            [
                'type' => 'varchar',
                'input' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Label Color',
                'group' => 'General',
                'visible' => true,
                'used_for_promo_rules' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'filterable' => false,
                'default' => '#ffffff',
                'used_in_product_listing' => true

            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label_shape',
            [
                'type' => 'varchar',
                'input' => 'select',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Label Shape',
                'group' => 'General',
                'source' => \Inventionstar\ProductLabel\Model\Config\Source\ShapeOptions::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'used_for_promo_rules' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'filterable' => true,
                'used_in_product_listing' => true
            ]
        );

        $eavSetup->addAttribute(
            Product::ENTITY,
            'product_label_image',
            [
                'group' => 'Product Details',
                'type' => 'varchar',
                'label' => 'Product Label Image',
                'input' => 'image',
                'backend' => \Inventionstar\ProductLabel\Model\Product\Attribute\Backend\File::class,
                'frontend' => '',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'unique' => false,
                'used_in_product_listing' => true
            ]
        );

        $entityType = $this->resourceProduct->getEntityType();
        $attributeSetCollection = $this->attributeSet->setEntityTypeFilter($entityType);
        foreach ($attributeSetCollection as $attributeSet) {
            $eavSetup->addAttributeToSet(
                "catalog_product",
                $attributeSet->getAttributeSetName(),
                "General",
                "product_label_image"
            );
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }
}
