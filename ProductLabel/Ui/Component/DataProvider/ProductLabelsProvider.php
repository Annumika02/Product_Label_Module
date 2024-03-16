<?php

namespace Inventionstar\ProductLabel\Ui\Component\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Inventionstar\ProductLabel\Model\ResourceModel\ProductLabels\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;



#[\AllowDynamicProperties]
class ProductLabelsProvider extends AbstractDataProvider
{
    /**
     * @var \Inventionstar\ProductLabel\Model\ResourceModel\ProductLabels\Collection
     */
    protected $collection;

    /**
     * LoadedData
     *
     * @var array
     */
    protected $loadedData;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * ProductLabelsProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $pageCollectionFactory
     * @param StoreManagerInterface $storeManager
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $pageCollectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $pageCollectionFactory->create();
        $this->storeManager = $storeManager;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Prepares Meta
     *
     * @param array $meta meta
     *
     * @return array
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = [];
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            if ($model->getProductLabelImage()) {
                $m['product_label_image'][0]['name'] = $model->getProductLabelImage();
                $m['product_label_image'][0]['url'] = $this->getMediaUrl().$model->getProductLabelImage();
                $fullData = $this->loadedData;
                $this->loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
            }
        }
        return $this->loadedData;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'inventionstar/product_label_image/';
        return $mediaUrl;
    }
}
