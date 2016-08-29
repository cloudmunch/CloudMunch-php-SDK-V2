<?php
/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi rosmi@cloudmunch.com, Aug-28-2016
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/AppAbstract.php';

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/AppContext.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/loghandling/LogHandler.php';

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/datamanager/CMDataManager.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/NotificationHandler.php';

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/CloudmunchService.php';

use CloudMunch\CloudmunchService;



class CloudmunchServiceTest extends PHPUnit_Framework_TestCase
{
	
	function __construct()
	{
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::sendNotification
	 */
	public function test_sendNotification(){
		
		
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
		
		 $loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock(); 
		
		/* $loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->getMock(); */
		
		$cmservice=new CloudmunchService($appcontext,$loghandler);
		$actual=$cmservice->sendNotification("test","1","2","test","test");
		$this->assertFalse($actual);
		
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::updateCustomContextData
	 */
	public function test_updateCustomContextData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
		$params =  array(
				'resources'   => "insightid",
				'datastores' => "dsid",
				'extracts'   => "extrid",
		);
		
		$actual=$cmservice->updateCustomContextData($params,null,'PATCH');
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::getCustomContextData
	 */
	public function test_getCustomContextData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
		$params =  array(
				'resources'   => "insightid",
				'datastores' => "dsid",
				'extracts'   => "extrid",
		);
	
		$actual=$cmservice->getCustomContextData($params,null);
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::getCloudmunchData
	 */
	public function test_getCloudmunchData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
		
	
		$actual=$cmservice->getCloudmunchData("context","contextid",null);
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::updateCloudmunchData
	 */
	public function test_updateCloudmunchData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
	
	
		$actual=$cmservice->updateCloudmunchData("context","contextid",null);
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::addCloudmunchData
	 */
	public function test_addCloudmunchData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
	
	
		$actual=$cmservice->addCloudmunchData("context","contextdata");
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::deleteCloudmunchData
	 */
	public function test_deleteCloudmunchData(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
	
	
		$actual=$cmservice->deleteCloudmunchData("context","contextid");
		$this->assertFalse($actual);
	
	}
	
	
	/**
	 * @covers CloudMunch\CloudmunchService::downloadGCRKeys
	 */
	public function test_downloadGCRKeys(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
	
	
		$actual=$cmservice->downloadGCRKeys("keyfile","context","contextid");
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\CloudmunchService::downloadKeys
	 */
	public function test_downloadKeys(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$cmservice=new CloudmunchService($appcontext,$loghandler);
	
	
		$actual=$cmservice->downloadKeys("keyfile","context","contextid");
		
	
	}
	
	
}