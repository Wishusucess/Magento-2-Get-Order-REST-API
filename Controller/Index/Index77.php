<?php
        namespace Agro\NewProductApi\Controller\Index;
        class Index extends \Magento\Framework\App\Action\Action {
      
          /** @var \Magento\Framework\View\Result\PageFactory  */
               
              public function __construct(
                \Magento\Framework\App\Action\Context $context,
                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
                array $data = []
            ) {
                $this->_productCollectionFactory = $productCollectionFactory;        
                $this->catalogProductVisibility = $catalogProductVisibility;
                parent::__construct(
                    $context,
                    $data
                );
            }
            
       public function execute() {
        $visibleProducts = $this->catalogProductVisibility->getVisibleInCatalogIds();
        $collection = $this->_productCollectionFactory->create()->setVisibility($visibleProducts);
        $collection = $this->_addProductAttributesAndPrices($collection)
            ->addAttributeToFilter(
                'news_from_date',
                ['date' => true, 'to' => $this->getEndOfDayDate()],
                'left'
            )
            ->addAttributeToFilter(
                'news_to_date',
                [
                    'or' => [
                        0 => ['date' => true, 'from' => $this->getStartOfDayDate()],
                        1 => ['is' => new Zend_Db_Expr('null')],
                    ]
                ],
                'left'
            )
            ->addAttributeToSort(
                'news_from_date',
                'desc'
            )
            ->addStoreFilter($this->getStoreId())
            ->setPageSize($this->getProductsCount());
        // return $collection;
        print_r($collection);
       die();
              
          }
          
      }