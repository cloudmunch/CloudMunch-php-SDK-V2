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
	 * @covers AppAbstract::getInput
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
}