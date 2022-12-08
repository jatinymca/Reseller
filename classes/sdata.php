<?php
#date^2017-12-25
#Puneet Singh
#This class contain all data insert related function.
class Sdata extends DBclass{
	public $aResult = array();
	public $iResult = 0;
	public $sError = '';
	public $sResult = '';			

	function __construct() 
   	{
		parent::__construct();
		$aResult = array();
		$iResult = 0;
		$sError = '';
		$sResult = '';
	}	

	function __destruct() 
   	{
		parent::__destruct();
   	}	
	
	//get region table data
	function getregion($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}	
	
	//get crm fields data
	function getCrmData($table='',$target='',$cfield='', $caccount_id=''){  

	        if ($cfield > 0)
	     { 
//$sSqlSelect = "SELECT acct, res_add1,res_add2, res_city FROM  rbl_upload WHERE mobile1 = '$cfield' ORDER BY created_date DESC LIMIT 1";
  $sSqlSelect = "SELECT ".$target." FROM ".$table." WHERE mobile1 = '$cfield' ORDER BY id DESC LIMIT 1";
//$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE mobile1 = '".$cfield."' OR emp_ph2 = '".$cfield."' OR perm_ph = '".$cfield."' OR mobile2 = '".$cfield."' ORDER BY created_date DESC";
		
		// $sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE mobile1 = '".$cfield."' and created_date = (select max(created_date) from   rbl_upload WHERE  mobile1 = '8527480256')";
		 }  //elseif($caccount_id!=''){
		 // $sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 AND acct = '".$caccount_id."' ORDER BY created_date DESC";
			// }elseif($caccount_id!='' && $cfield > 0){
		 // $sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 AND acct = '".$caccount_id."' AND mobile1 = '".$cfield."' ORDER BY created_date DESC";
			// }
			
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}	


	//get crm fields data
	function getCrmDataManualLogin($table='',$target='',$cfield='', $caccount_id=''){   
			 
			if($cfield > 0){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE mobile1 = '".$cfield."' ORDER BY created_date DESC";
			}elseif($caccount_id > 0){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE acct = '".$caccount_id."' ORDER BY created_date DESC ";
			}
			
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}	
	
	
	
	//get state region dropdown data	
	function stateregiondropdown($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get state table data	
	function getstate($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get state table data	
	function getdesp($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE status = 'Y' ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get unique city table data	
	function getuniquecity($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get unique city dropdown data	
	function uniquecitydropdown($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get map-city table data	
	function getmapcity($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get map-city table data	
	function mapcitydropdown($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get agenct dropdown data
	function agencydropdown($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get user(agent) data.
	function getagentdata($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 order by login_id asc ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get supervisor data from user table.
	function getsuperdata($table='',$target=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 AND role = 'Supervisor' order by user_name asc ";
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
	
	//get CAS data
	function getcasdata($table='',$target='',$cfield=''){
			$sSqlSelect = "SELECT ".$target." FROM  ".$table." WHERE 1 = 1 ";
			if($cfield!=''){
				$sSqlSelect.= " AND agency_code = '".$cfield."'";
			}		
			$this->execute_select_query($sSqlSelect);
			$this->aResults 	= $this->aQueryData;
			$this->iResults 	= $this->iTotalRecords;
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
	}
}
?>