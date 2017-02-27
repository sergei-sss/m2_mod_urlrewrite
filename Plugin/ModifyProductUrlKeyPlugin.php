<?php
namespace Sergei\ProductUrlRewrite\Plugin;

class ModifyProductUrlKeyPlugin
{
    /**
     * This code modify the product URL key attribute after product was saved.
     * In this time magento will create by its observer the product URL rewrite using modified URL key.
     */
    public function beforeExecute(
        \Magento\CatalogUrlRewrite\Observer\ProductProcessUrlRewriteSavingObserver $subject,
        \Magento\Framework\Event\Observer $observer
    ) {
        $product = $observer->getProduct();
        $id = $product->getId();
        $urlKey = $product->getUrlKey();

        if (rtrim($urlKey, $id) == $urlKey) {
            $product->setUrlKey($urlKey . '_' . $id);
        }
    }
}