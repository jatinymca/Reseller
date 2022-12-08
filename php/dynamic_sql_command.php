<?php


function insert_data($_sTableName,$_aData,$conn){		
 
		if($_sTableName)
		{
		   	$smtp="SHOW COLUMNS FROM `$_sTableName`";
			$rst=mysqli_query($conn,$smtp);
			$ColoumData =mysqli_num_rows($rst);
			 
			
			while($aColoumData=mysqli_fetch_array($rst))
			{	
				 
				$aDataArray[]= $aColoumData['Field'];
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
				//echo $_sInsertQuery;
			 return mysqli_query($conn,$_sInsertQuery);
			 
		}
	}

################################################################
##################### update ##################################
################################################################

function update_data($_sTableName,$_aData, $conn, $_sMatchFld,$_iRecId, $md5='', $ANDQuery='') 
		{			
 			$fld_str = "";
			$val_str = "";
			if($_sTableName && is_array($_aData))
			{				
			$smtp="SHOW COLUMNS FROM `$_sTableName`";
			$rst=mysqli_query($conn,$smtp);
			$ColoumData =mysqli_num_rows($rst);

				while($aColoumData=mysqli_fetch_array($rst))
			{	
				 
				$aDataArray[]= $aColoumData['Field'];
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
			               $_sUpdateQuery = "UPDATE $_sTableName SET $val_str WHERE ".$_sMatchFld."='".$_iRecId."' ".$ANDQuery;
				 
			  return mysqli_query($conn,$_sUpdateQuery);
				 
			}
		}	

function get_column_value($_sTableName,$colomn, $conn, $_sMatchFld,$_iRecId, $ANDQuery='') {

                 $smtp="SELECT $colomn FROM $_sTableName WHERE ".$_sMatchFld."='".$_iRecId."' ".$ANDQuery;
                 $res=mysqli_query($conn,$smtp);
                 $row=mysqli_fetch_array($res);

                 return $row[$colomn];

}

function get_column_match($_sTableName,$colomn, $conn, $_sMatchFld,$_iRecId, $ANDQuery='') {

                 $smtp="SELECT $colomn FROM $_sTableName WHERE ".$_sMatchFld." LIKE '%".$_iRecId."%' ".$ANDQuery;
                 $res=mysqli_query($conn,$smtp);
                 $row=mysqli_fetch_array($res);

                 return $row[$colomn];

}

 

?>