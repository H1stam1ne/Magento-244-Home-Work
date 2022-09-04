<?php
namespace Perspective\HomeworkDeclarativeSchema\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class HomeworkDeclarativeSchema implements ArgumentInterface
{
    /**
     * @var \Perspective\HomeworkDeclarativeSchema\Model\ContactdetailsFactory
     */
    private $_contactdetailsFactory;

    /**
     * @var \Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails\CollectionFactory
     */
    private $_collectionFactory;

    public function __construct(
        \Perspective\HomeworkDeclarativeSchema\Model\ContactdetailsFactory $contactdetailsFactory,
        \Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails\CollectionFactory $collectionFactory
    )
    {
        $this->_contactdetailsFactory = $contactdetailsFactory;
        $this->_collectionFactory = $collectionFactory;
        
    }

    public function getSales($sales,$sales_date){
        $collection = $this->_collectionFactory->create();
        $collection->addFieldToSelect('*')
        ->addFieldToFilter('product_name',['like'=>$sales])
        ->addFieldToFilter('date_of_sale',['eq'=>$sales_date]);
        return $collection;
    }

    public function getSalesWithoutBonus($sales,$sales_date){
        $collection = $this->_collectionFactory->create();
        $collection->addFieldToSelect('*')
        ->addFieldToFilter('product_name',['like'=>$sales])
        ->addFieldToFilter('date_of_sale',['lt'=>$sales_date]);
        return $collection;
    }
}
