<?php
/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi Chandy rosmi@cloudmunch.com 09-Feb-2015
 */
namespace CloudMunch\Integrations;
use CloudMunch\loghandling\LogHandler;

/**
 * This helper file process the cloudproviders input to get the selected provider details.
 * @author rosmi
 *
 */
  class IntegrationDataHelper{
  	private $logHelper=null;
  	
  	/**
  	 * This method process plugin input to retreive the provider details.
  	 * @param  $jsonParams Input parameters to the plugin in json format.
  	 * @return array $integrationdetails Array containing credentials to connect to the provider.
  	 *         
  	 */
 	
  	
  	public function __construct($logHandler){
  	 $this->logHelper=	$logHandler;
  	}
 	function getService($jsonParams){
 		
 		$arg10 = 'cloudproviders';
		$cloudproviders = $jsonParams-> $arg10;
		$cloudproviders=json_decode($cloudproviders);
		$arg1 = 'providername';
		$provname = $jsonParams-> $arg1;
		
	    $provtype="providerType";
	    
	   
	    if(($provname != null) && (strlen(trim($provname))>0)){
	    $regfields=$cloudproviders->$provname;
	    
	  
	   $integrationdetails=array();
	    foreach ($regfields as $key=>$value){
	    	$integrationdetails[$key]=$value;
	    	
	    }
	  return $integrationdetails;
	    }else{
	    	return null;
	    }
 		
 	}
 	
 	function getIntegration($jsonParams,$integrations){
 		$arg1 = 'providername';
 		$provname = $jsonParams-> $arg1;
 		
 	
 		if(($provname != null) && (strlen(trim($provname))>0)){
 			
 			$conf="configuration";
 			
 			$regfields=$integrations->$provname->$conf;
 			$integrationdetails=array();
 			foreach ($regfields as $key=>$value){
 				$integrationdetails[$key]=$value;
 			
 			}
 			return $integrationdetails;
 		
 		}else{
 			return null;
 		}
 		
 	}
 	
 	function getIntegrationData($cloudmunchservice,$jsonParams){
 		$arg1 = 'providername';
 		$provname = $jsonParams-> $arg1;
 		$contextArray = array('integrations' => $provname);
 		$data = $cloudmunchservice->getCustomContextData($contextArray, null);
 		if ($data->configuration){
 			$regfields= $data->configuration;
 			$integrationdetails=array();
 			foreach ($regfields as $key=>$value){
 				$integrationdetails[$key]=$value;
 		
 			}
 			return $integrationdetails;
 		} else {
 			return null;
 		}
 	}
 }
?>
