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
}