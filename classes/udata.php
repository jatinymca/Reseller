<?php
class Udata extends DBClass{

	function update_data($_sTableName, $_sMatchFld, $_aData, $_iRecId, $md5='', $ANDQuery='') 
		{			


			$fld_str = "";
			$val_str = "";

			if($_sTableName && is_array($_aData))
			{				
				  $_sSelectQuery = "SHOW COLUMNS FROM `$_sTableName`";
				$this->execute_select_query($_sSelectQuery);
				$this->aColoumData = $this->aQueryData;
				$this->iColoumData = $this->iTotalRecords;
				$this->sError = $this->sQueryError;
				$this->sResult = $this->sQueryResult;
				for($i=0; $i<$this->iColoumData; $i++)
				{
					$aDataArray[] = $this->aColoumData[$i]['Field'];
				}
				foreach($_aData as $key=>$val)
				{	
					if(in_array($key, $aDataArray))
					{
						$fld_str.="$key,";	
						if($val=='now()')
						{	
							 $val_str.= "$key=".trim($val).",";
						}	
						else
						{
							 $val_str.="$key='".trim($val)."',";
						}	
					}
				}
				$val_str=substr($val_str,0,-1);
				if($md5!='') $_sMatchFld='MD5('.$_sMatchFld.')';
				    $_sUpdateQuery = "UPDATE $_sTableName SET $val_str WHERE ".$_sMatchFld." IN (".$_iRecId.") ".$ANDQuery;
				  $_sUpdateQuery = str_replace("'on'", "'1'", $_sUpdateQuery);
				 $this->execute_update_query($_sUpdateQuery);
				 $this->sqlquery 	=  $_sUpdateQuery;
			//	return mysqli_affected_rows();
			}
		}
		
		
	function delete_record($_tablName,$_matchfield,$_rRecordId, $ANDQuery='')
	{
		  $delQuery="DELETE FROM $_tablName WHERE $_matchfield ='".$_rRecordId."'".$ANDQuery;
		$this->execute_delete_query($delQuery);
		$this->sqlquery 	= $this->sqlstatement;
		$this->sResult = $this->sQueryResult ;
	}

	function ALTER_delete($_tablName,$field)
	{
		$delQuery="ALTER TABLE `$_tablName` DROP `$field`";

		$this->execute_delete_query($delQuery);
		$this->sqlquery 	= $this->sqlstatement;
		$this->sResult =$this->sQueryResult ;
	}			
}

?>