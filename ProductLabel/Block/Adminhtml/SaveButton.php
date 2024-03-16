<?php

namespace Inventionstar\ProductLabel\Block\Adminhtml;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;



#[\AllowDynamicProperties]
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Save Button
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'on_click' => sprintf("location.href = '%s';", $this->getUrl('inventionstar_product_label/index/save')),
            'data_attribute' => [
                'mage-init' => ['button' => ['product_label' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
