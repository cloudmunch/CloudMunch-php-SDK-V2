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
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/ServerHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/datamanager/CMDataManager.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/NotificationHandler.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/EnvironmentHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/InsightHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/RoleHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/CloudmunchService.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/AssetHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/helper/IntegrationHelper.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../src/CloudMunch/integrations/IntegrationDataHelper.php';

define('APPABSTRACT', 'AppAbstract');

define('GET_LOG_HANDLER', 'getLogHandler');
define('DESTRUCT', '__destruct');

class AppAbstractTest extends PHPUnit_Framework_TestCase
{
	private $appAbstract=null;
	

	function __construct()
	{
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getInput
	 */
	public function test_getInput(){
		
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$stepdetails=array('id'=>'id','name'=>'stepname','reports_location'=>'reportloc',
				'log_level'=>'INFO','tier'=>'tier1');
		$varinput=array('{master_url}'=>'masterurl','{domain}'=>'mydomain','{application}'=>'application',
				'{environment_id}'=>'environmentid','{ci_job_name}'=>'job1','{workspace}'=>'workspace',
				'{archive_location}'=>'archiveloc','{server}'=>'server','{run}'=>'1','{api_key}'=>'api123',
				'target'=>'2','stepdetails'=>json_encode($stepdetails)
		);
		
		
		$_SERVER ['argv']=array("-jsoninput"=>json_encode(array()),'-variables'=>json_encode($varinput));
		
		
		
		$this->assertTrue($this->appAbstract->getInput());
		
		
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::createLogHandler
	 */
	public function test_createLogHandler(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
		
		
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
				->getMock();
		
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::getLogHandler
	 */
	public function test_getLogHandler(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$loghandler=$this->appAbstract->getLogHandler();
		$this->assertNotNull($loghandler);
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::setAppContext
	 */
	public function test_setAppContext(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getAppContext
	 */
	public function test_getAppContext(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$actual=$this->appAbstract->getAppContext();
		$this->assertEquals($appcontext,$actual);
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchServerHelper
	 */
	public function test_getCloudmunchServerHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchServerHelper();
		
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchEnvironmentHelper
	 */
	public function test_getCloudmunchEnvironmentHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchEnvironmentHelper();
	
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchInsightHelper
	 */
	public function test_getCloudmunchInsightHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchInsightHelper();
	
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchRoleHelper
	 */
	public function test_getCloudmunchRoleHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchRoleHelper();
	
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchAssetHelper
	 */
	public function test_getCloudmunchAssetHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchAssetHelper();
	
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchIntegrationHelper
	 */
	public function test_getCloudmunchIntegrationHelper(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchIntegrationHelper();
	
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::getCloudmunchService
	 */
	public function test_getCloudmunchService(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getCloudmunchService();
	
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::getNotificationHandler
	 */
	public function test_getNotificationHandler(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		$actual=$this->appAbstract->getNotificationHandler();
	
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::setParameterObject
	 */
	public function test_setParameterObject(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
	
		$this->appAbstract->setParameterObject("params");
	
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::getParameterObject
	 */
	public function test_getParameterObject(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$this->appAbstract->setParameterObject("params");
		$actual=$this->appAbstract->getParameterObject();
		$this->assertEquals("params",$actual);
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::initialize
	 */
	public function test_initialize(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$this->appAbstract->initialize();
		
	}
	/**
	* @covers CloudMunch\AppAbstract::getProcessInput
	*/
	public function test_getProcessInput(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
		
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
		
		$this->appAbstract->getProcessInput();
	
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::performAppcompletion
	 */
	public function test_performAppcompletion(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
	
		$this->appAbstract->initialize();
		
		$this->appAbstract->performAppcompletion();
	}
	
	
	/**
	 * @covers CloudMunch\AppAbstract::outputPipelineVariables
	 */
	public function test_outputPipelineVariables(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
	
		$this->appAbstract->initialize();
	
		$this->appAbstract->outputPipelineVariables("varname", "varvalue");
	}
	
	/**
	 * @covers CloudMunch\AppAbstract::outputPipelineVariablesArray
	 */
	public function outputPipelineVariablesArray(){
		$this->appAbstract = $this->getMockBuilder("CloudMunch\AppAbstract")
		->setMethods(array( DESTRUCT))
		->getMockForAbstractClass();
	
		$appcontext = $this->getMockBuilder("CloudMunch\AppContext")
		->getMock();
	
		$this->appAbstract->setAppContext($appcontext);
		$this->appAbstract->createLogHandler();
	
		$this->appAbstract->initialize();
	
		$this->appAbstract->outputPipelineVariablesArray(array("varname"=> "varvalue"));
	}
	
	
}