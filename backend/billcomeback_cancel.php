<?php
session_start();  
include('../database.php');
	    
			$bill_no = $_GET["bill_no"];       
			$member_user = $_SESSION["UserID"];

		  
			  
			if(empty($member_user)){ 
				 
			}else{ 
				
				
					$strSQL2 = "  SELECT *  FROM list_order 
					where  bill_no != ''  and bill_no = '".$bill_no."'  and pasy_bill = '' 
					order by pk asc   ";    
					$objQuery2 = mysqli_query($objCon, $strSQL2);
					while($objResult_c = mysqli_fetch_array($objQuery2))
					{ 			 
						$menuid_del = $objResult_c["pk"];
						 
						$strSQL = " Update list_order Set  pasy_onoff = ''   " ;
						$strSQL .=" WHERE pk  = '".$menuid_del."' ";  
						$objQuery = mysqli_query($objCon, $strSQL); 
						 
					} 
			}	 
				 
 
		echo("<script>window.location = 'billcomeback.php?page=claim&bill_no=".$bill_no."&searchname3=&searchname4=&searchname4=';</script>");
			 	  
?>