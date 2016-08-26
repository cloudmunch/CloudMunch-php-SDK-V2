<?php

/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi Chandy rosmi@cloudmunch.com
 */
namespace CloudMunch\helper;


use CloudMunch\datamanager\CMDataManager;
use CloudMunch\AppContext;
use CloudMunch\loghandling\LogHandler;
use Cloudmunch\CloudmunchConstants;




/**
 * 
 * This is a helper class for assets. User can manage assets in cloudmunch using this helper.
 *
 */
class AssetHelper{
	const APPLICATIONS="/applications/";
	const ASSETS="/assets/";
	private $appContext = null;
	private $cmDataManager = null;
	private $logHelper = null;
	
	public function __construct($appContext,$logHandler){
		$this->appContext = $appContext;
		$this->logHelper=$logHandler;
		$this->cmDataManager = new CMDataManager($this->logHelper, $this->appContext);
	
	}
	/**
	 * 
	 * @param String  $assetID
	 * $param Json Object $filerdata In the format {"filterfield":"=value"}
	 * @return  json object assetdetails
	 * 
	 */
function getAsset($assetID,$filerdata){
	$querystring="";
	if($filerdata !== null){
		$querystring="filter=".json_encode($filerdata);
	}
	$serverurl=$this->appContext->getMasterURL().APPLICATIONS.$this->appContext->getProject().ASSETS.$assetID;
	
	$assetArray = $this->cmDataManager->getDataForContext($serverurl, $this->appContext->getAPIKey(),$querystring);
	if(is_bool ($assetArray) && !$assetArray){
		$this->logHelper->log ( ERROR, "Could not retreive data from cloudmunch");
		return false;
	}
	
	
	$assetdata=$assetArray->data;
	if($assetdata == null){
		$this->logHelper->log ( ERROR, "Asset does not exist");
		return null;
	}
	return $assetdata;
}

/**
 * 
 * @param string $assetname Name of the asset
 * @param string $assettype Type of asset
 * * @param string $assetStatus Asset status ,valid values are STATUS_RUNNING,STATUS_STOPPED,STATUS_NIL
 * @param array $assetData Array of asset properties
 */
function  addAsset($assetname,$assettype,$assetStatus,$assetExternalRef,$assetData){
	if(empty($assetname)||(empty($assettype))||(empty($assetStatus))){
		$this->logHelper->log ( ERROR, "Asset name ,status and type need to be provided");
		return false;
	}
	$statusconArray = array(STATUS_RUNNING,STATUS_STOPPED,STATUS_NIL);
	if(!in_array ( $assetStatus ,$statusconArray )){
		
	
		$this->logHelper->log ( ERROR, "Invalid status sent. Allowed values " . STATUS_RUNNING,STATUS_STOPPED,STATUS_NIL);
		return false;
	}
	
	$assetData[name]=$assetname;
	$assetData[type]=$assettype;
	$assetData[status]=$assetStatus;
	$assetData[external_reference]=$assetExternalRef;
	$serverurl=$this->appContext->getMasterURL().APPLICATIONS.$this->appContext->getProject().ASSETS;
	$retArray=$this->cmDataManager->putDataForContext($serverurl,$this->appContext->getAPIKey(),$assetData);
	
	if($retArray===false){
		return false;
	}
	
	
	return $retArray->data;;
	
}

/**
 * 
 * @param String Asset ID
 * @param JsonObject Asset Data
 */
function  updateAsset($assetID,$assetData){
	$serverurl=$this->appContext->getMasterURL().APPLICATIONS.$this->appContext->getProject().ASSETS.$assetID;
	
	$this->cmDataManager->updateDataForContext($serverurl,$this->appContext->getAPIKey(),$assetData);

}

/**
 * 
 * @param String Asset ID
 */
function deleteAsset($assetID){
	$serverurl=$this->appContext->getMasterURL().APPLICATIONS.$this->appContext->getProject().ASSETS.$assetID;
	
	$this->cmDataManager->deleteDataForContext($serverurl,$this->appContext->getAPIKey());
}

/**
 * 
 * @param String Asset ID
 * @param String Asset status
 */
function updateStatus($assetID,$status){
	$statusconArray=array(STATUS_RUNNING,STATUS_STOPPED,STATUS_NIL);
	if(!in_array ( $status ,$statusconArray )){
	
		$this->logHelper->log (ERROR, "Invalid status");
		return false;
	}
	$statusArray=array("status"=>$status);
	$this->updateAsset($assetID,$statusArray);
}

/**
 * Checks if Asset exists in cloudmunch.
 * @param string $assetID
 * @return boolean
 */
function checkIfAssetExists($assetID){
	$serverurl=$this->appContext->getMasterURL().APPLICATIONS.$this->appContext->getProject().ASSETS.$assetID;
	
	$assetArray = $this->cmDataManager->getDataForContext($serverurl, $this->appContext->getAPIKey(),"");
	if($assetArray === false){
		return false;
	}
	
	$assetArray = json_decode($assetArray);
	$assetdata=$assetArray->data;
	if($assetdata == null){
		$this->logHelper->log(INFO,"Asset does not exist");
		return false;
	}
	return true;
}
}