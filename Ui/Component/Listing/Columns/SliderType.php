<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_GiftCard
 * @copyright   Copyright (c) 2018 Mageplaza (http://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\Productslider\Ui\Component\Listing\Columns;

use Magento\Ui\Component\Listing\Columns\Column;
use Mageplaza\Productslider\Model\Config\Source\ProductType;

/**
 * Class CommentContent
 * @package Mageplaza\Blog\Ui\Component\Listing\Columns
 */
class SliderType extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$this->getData('name')])) {
                    $productType = $this->getProductType($item[$this->getData('name')]);

                    $item[$this->getData('name')] = '<span>' . $productType . '</span>';
                }
            }
        }

        return $dataSource;
    }

    /**
     * @param $data
     * @return string
     */
    public function getProductType($data)
    {
        $productType = '';
        switch ($data) {
            case ProductType::NEW_PRODUCTS :
                $productType = 'New Products';
                break;
            case ProductType::BEST_SELLER_PRODUCTS :
                $productType = 'Best Seller Products';
                break;
            case ProductType::FEATURED_PRODUCTS :
                $productType = 'Featured Products';
                break;
            case ProductType::MOSTVIEWED_PRODUCTS :
                $productType = 'Most Viewed Products';
                break;
            case ProductType::ONSALE_PRODUCTS :
                $productType = 'OnSale Products';
                break;
            case ProductType::RECENT_PRODUCT :
                $productType = 'Recent Products';
                break;
            case ProductType::WISHLIST_PRODUCT :
                $productType = 'WishList Products';
                break;
            case ProductType::CATEGORYID :
                $productType = 'Select By Category';
                break;
            case ProductType::CUSTOM_PRODUCTS :
                $productType = 'Custom Specific Products';
                break;
        }

        return $productType;
    }
}
