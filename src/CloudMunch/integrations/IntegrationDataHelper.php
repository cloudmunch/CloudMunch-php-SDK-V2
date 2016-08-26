<?php
/**
 *  (c) CloudMunch Inc.
 *  All Rights Reserved
 *  Un-authorized copying of this file, via any medium is strictly prohibited
 *  Proprietary and confidential
 *
 *  Rosmi Chandy rosmi@cloudmunch.com 09-Feb-2015
 */
namespace CloudMunch\integrations;
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
     $this->logHelper=  $logHandler;
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
