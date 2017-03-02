<?php
namespace Sergei\ProductUrlRewrite\Plugin;

class ModifyCategoryUrlKeyPlugin
{
    /**
     * This code modify the category URL key attribute after category was saved.
     * In this time magento will create by its observer the category URL rewrite using modified URL key.
     */
    public function beforeExecute(
        \Magento\CatalogUrlRewrite\Observer\CategoryProcessUrlRewriteSavingObserver $subject,
        \Magento\Framework\Event\Observer $observer
    ) {
        $category = $observer->getCategory();
        $id = $category->getId();
        $urlKey = $category->getUrlKey();

        if (rtrim($urlKey, $id) == $urlKey) {
            $category->setUrlKey($urlKey . '_' . $id);
        }
    }
}
