<?php
/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi rosmi@cloudmunch.com, Aug-28-2016
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/AppContext.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/loghandling/LogHandler.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/AssetHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/datamanager/CMDataManager.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/NotificationHandler.php';
use CloudMunch\helper\AssetHelper;
class AssetHelperTest extends PHPUnit_Framework_TestCase
{

	function __construct()
	{
	}

	/**
	 * @covers CloudMunch\helper\AssetHelper::getAsset
	 */
	public function test_getAsset(){

		
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();

		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$actual=$assethelper->getAsset("assetid","filterdata");
		$this->assertFalse($actual);

	}
	
	
	/**
	 * @covers CloudMunch\helper\AssetHelper::addAsset
	 */
	public function test_addAsset(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$actual=$assethelper->addAsset("asset","type","status",null,array());
		
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\helper\AssetHelper::updateAsset
	 */
	public function test_updateAsset(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$actual=$assethelper->updateAsset("assetid",array());
	
		$this->assertNull($actual);
	
	}
	
	/**
	 * @covers CloudMunch\helper\AssetHelper::deleteAsset
	 */
	public function test_deleteAsset(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$assethelper->deleteAsset("assetid");
	
	
	}
	
	/**
	 * @covers CloudMunch\helper\AssetHelper::updateStatus
	 */
	public function test_updateStatus(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$assethelper->updateStatus("assetid","status");
	
	
	}
	
	/**
	 * @covers CloudMunch\helper\AssetHelper::checkIfAssetExists
	 */
	public function test_checkIfAssetExists(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$assethelper=new AssetHelper($appcontext,$loghandler);
		$actual=$assethelper->checkIfAssetExists("assetid");
		$this->assertFalse($actual);
		
	
	}
}
