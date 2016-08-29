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
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/EnvironmentHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/RoleHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/datamanager/CMDataManager.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/NotificationHandler.php';
use CloudMunch\helper\EnvironmentHelper;
class EnvironmentHelperTest extends PHPUnit_Framework_TestCase
{

	function __construct()
	{
	}

	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::getExistingEnvironments
	 */
	public function test_getExistingEnvironments(){


		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();

		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
		$actual=$environmenthelper->getExistingEnvironments("filterdata");
		$this->assertFalse($actual);

	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::getEnvironment
	 */
	public function test_getEnvironment(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
		$actual=$environmenthelper->getEnvironment("envid","filterdata");
		$this->assertFalse($actual);
	
	}
	
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::addEnvironment
	 */
	public function test_addEnvironment(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
		$actual=$environmenthelper->addEnvironment("envname", "status",array());
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::setStage
	 */
	public function test_setStage(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
		
		$actual=$environmenthelper->setStage(array('stage'=>'dev'));
		
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::getStage
	 */
	public function test_getStage(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$actual=$environmenthelper->getStage("name",'dev');
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateEnvironment
	 */
	public function test_updateEnvironment(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->updateEnvironment("envid",array(),'comment');
		
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateEnvironmentURL
	 */
	public function test_updateEnvironmentURL(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->updateEnvironmentURL("envid","url");
	
	
	}
	
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateEnvironmentBuildVersion
	 */
	public function test_updateEnvironmentBuildVersion(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->updateEnvironmentBuildVersion("envid","12");
	
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateAsset
	 */
	public function test_updateAsset(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->updateAsset("envid",array(),null);
	
	
	}
	
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateVariables
	 */
	public function test_updateVariables(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->updateVariables("envid","variables");
	
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::updateStatus
	 */
	public function test_updateStatus(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$actual=$environmenthelper->updateStatus("envid","status");
		$this->assertFalse($actual);
	
	}
	
	/**
	 * @covers CloudMunch\helper\EnvironmentHelper::checkIfEnvironmentExists
	 */
	public function test_checkIfEnvironmentExists(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$actual=$environmenthelper->checkIfEnvironmentExists("envid");
		$this->assertFalse($actual);
	
	}
	
	
	 /**
	 * @covers CloudMunch\helper\EnvironmentHelper::getAssets
	 */
/*	public function test_getAssets(){
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$loghandler = $this->getMockBuilder("CloudMunch\loghandling\LogHandler")
		->setConstructorArgs(array($appcontext))
		->getMock();
		
		$environmenthelper = $this->getMockBuilder("CloudMunch\helper\EnvironmentHelper")
		->setConstructorArgs(array($appcontext,$loghandler))
		->setMethods(array('getEnvironment'))
		->getMock();
		$tierarray=array("tiers"=>array("assets"=>array('assets1','assets2')));
		$tiers=json_encode($tierarray);
		$environmenthelper->expects($this->any())
		->method('getEnvironment')
		->will($this->returnValue(json_decode($tiers)));
		//$environmenthelper=new EnvironmentHelper($appcontext,$loghandler);
	
		$environmenthelper->getAssets("envid");
		
	
	} */
}