<?php
/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi Chandy rosmi@cloudmunch.com
 */
namespace CloudMunch;


use CloudMunch\cmDataManager;
use CloudMunch\SSHConnection;

require_once ("CloudmunchConstants.php");
require_once ("AppErrorLogHandler.php");


/**
 *
 * This is a helper class for integration. User can manage integration in cloudmunch using this helper.
 *
*/
class IntegrationHelper{

	private $appContext = null;
	private $cmDataManager = null;
	private $logHelper = null;

	public function __construct($appContext,$logHandler){
		$this->appContext = $appContext;
		$this->logHelper=$logHandler;
		$this->cmDataManager = new cmDataManager($this->logHelper, $this->appContext);
	}
	
	/**
	 *
	 * @param String Integration ID
	 * @param JsonObject Integration Data
	 */
	function  updateIntegration($integrationID,$integrationData){
		$serverurl=$this->appContext->getMasterURL()."/applications/".$this->appContext->getProject()."/integrations/".$integrationID;
	
		$this->cmDataManager->updateDataForContext($serverurl,$this->appContext->getAPIKey(),$integrationData);
	
	}

	
	
	
}
