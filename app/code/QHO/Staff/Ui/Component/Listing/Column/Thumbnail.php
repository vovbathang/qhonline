<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 28/11/2018
 * Time: 16:59

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace QHO\Staff\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

/**
 * @api
 * @since 100.0.2
 */
class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $_storeManager;
    const NAME = 'thumbnail';

    const ALT_FIELD = 'name';

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param \Magento\Catalog\Helper\Image $imageHelper
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
        $this->_storeManager=$storeManager;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        /*if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $product = new \Magento\Framework\DataObject($item);
                $imageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail');
                $item[$fieldName . '_src'] = $imageHelper->getUrl();
                $item[$fieldName . '_alt'] = $this->getAlt($item) ?: $imageHelper->getLabel();
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    'catalog/product/edit',
                    ['id' => $product->getEntityId(), 'store' => $this->context->getRequestParam('store')]
                );
                $origImageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail_preview');
                $item[$fieldName . '_orig_src'] = $origImageHelper->getUrl();
            }
        }
            */
        if(isset($dataSource['data']['items'])){
            $fieldName= $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item){
                $urlMedia= $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                $item[$fieldName.'_src']=$urlMedia.$item[$fieldName];
                $item[$fieldName.'_alt']=$item['name'];
                $item[$fieldName.'_link']=$this->urlBuilder->getUrl('staff/index/edit', ['id'=>$item['id']]);
                $item[$fieldName.'_orig_src']=$urlMedia.$item[$fieldName];
            }
        }
        return $dataSource;
    }

    /**
     * @param array $row
     *
     * @return null|string
     */
    protected function getAlt($row)
    {
        $altField = $this->getData('config/altField') ?: self::ALT_FIELD;
        return isset($row[$altField]) ? $row[$altField] : null;
    }
}
