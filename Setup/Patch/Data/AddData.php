<?php
namespace Perspective\HomeworkDeclarativeSchema\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Perspective\HomeworkDeclarativeSchema\Model\ContactdetailsFactory;
Use Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails;
class AddData implements DataPatchInterface, PatchVersionInterface
{
  private $_contactDetailsFactory;
  private $_contactDetailsResource;
  private $_moduleDataSetup;
  public function __construct(
    ContactdetailsFactory $contactDetailsFactory,
    Contactdetails $contactDetailsResource,
    ModuleDataSetupInterface $moduleDataSetup
  )
  {
    $this->_contactDetailsFactory = $contactDetailsFactory;
    $this->_contactDetailsResource = $contactDetailsResource;
    $this->_moduleDataSetup=$moduleDataSetup;
  }
  public function apply()
  {
    //Install data row into contact_details table
    $this->_moduleDataSetup->startSetup();
    $contactDTO=$this->_contactDetailsFactory->create();
        $contactDTO
        ->setProductName('Hoodie')
        ->setProductQuantity('8')
        ->setBonus('0.4');
    $this->_contactDetailsResource->save($contactDTO);
    $this->_moduleDataSetup->endSetup();
  }
  public static function getDependencies()
  {
    return [];
  }
  public static function getVersion()
  {
    return '1.0.1';
  }
  public function getAliases()
 
  {
    return [];
  }
}