<?php
namespace Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'perspective_homeworkdeclarativeschema_contactdetails_collection';
    protected $_eventObject = 'contactdetails_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Perspective\HomeworkDeclarativeSchema\Model\Contactdetails', 'Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails');
    }
}
