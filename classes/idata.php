<?php

class Idata extends DBclass{
	//function for insert data.
	function insert_data($_sTableName,$_aData){		
		$fld_str='';
		$val_str='';
		if($_sTableName && is_array($_aData) && !empty($_aData))
		{
			$_sSelectQuery="SHOW COLUMNS FROM `$_sTableName`";
			$this->execute_select_query($_sSelectQuery);
			$this->aColoumData = $this->aQueryData;
			$this->iColoumData = $this->iTotalRecords;
			$this->sError = $this->sQueryError;
			$this->sResult = $this->sQueryResult;
			
			for($i=0; $i<$this->iColoumData; $i++)
			{
				$aDataArray[]= $this->aColoumData[$i]['Field'];
			}
						
			foreach($_aData as $key=>$val)
			{	
				if(in_array($key, $aDataArray))
				{
					$fld_str.="$key,";	
					if($val=='now()')
					{	
						$val_str.= trim($val).",";
					}	
					else
					{
						$val_str.="'".trim($val)."',";
					}	
				}
			}

			$fld_str=substr($fld_str,0,-1);
			$val_str=substr($val_str,0,-1);
		      $_sInsertQuery=" INSERT INTO $_sTableName ($fld_str) VALUES ($val_str)";	
					
			$this->execute_select_query($_sInsertQuery);
			$this->sError 		= $this->sQueryError;
			$this->sqlquery 	= $this->sqlstatement;
			 
		}
	}	
	
	function check_duplicate_record($_tablName,$_matchfield,$_rRecordId,$_match_field_old='',$_rRecordId_old='')
	{
		 $selQuery="SELECT * FROM $_tablName WHERE $_matchfield='".$_rRecordId."'";
		if($_match_field_old!='')
		{
			$selQuery.="AND $_match_field_old".$_rRecordId_old;
		}
		// echo  $selQuery; 
		$this->execute_select_query($selQuery);
		  $this->acount = $this->aQueryData;
		$this->icount = $this->iTotalRecords;
	}


	

	function create_table_list($tablename){


		 
		       $selQuery="CREATE TABLE IF NOT EXISTS `".$tablename."` ( `lead_id` int(9) unsigned NOT NULL,  `list_id` bigint(14) unsigned NOT NULL DEFAULT '0', PRIMARY KEY (`lead_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


		 $this->execute_select_query($selQuery);
		$this->acount = $this->aQueryData;
		$this->icount = $this->iTotalRecords; 

	}

	function create_table_list_crm($tablename){

		    $selQuery="CREATE TABLE IF NOT EXISTS `".$tablename."` (`id` int(11) NOT NULL,  `lead_id` int(10) NOT NULL,`list_id` bigint(14) UNSIGNED NOT NULL DEFAULT 0,  PRIMARY KEY (`lead_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


		$this->execute_select_query($selQuery);
		$this->acount = $this->aQueryData;
		$this->icount = $this->iTotalRecords;

	}

	function alter_table($tablename,$field_name,$type,$lenth,$position){

				if($position=='AFTER'){ $position='';} 
 			  $selQuery="ALTER TABLE `".$tablename."` ADD `".$field_name."`".$type."(".$lenth.") NOT NULL ".$position.";";

 		 $this->execute_insert_query($selQuery);
		$this->acount = $this->aQueryData;
		$this->icount = $this->iNewInsertedId;

	}

	 

}

?>