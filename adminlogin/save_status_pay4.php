<?php
session_start();
include('../database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$status = $obj->{'status'}; 
			$bill_no = $obj->{'bill_no'}; 
 
 
				$strSQL = " Update list_order Set pasy_status = '".$_GET["status"]."'  " ;
				$strSQL .=" WHERE pasy_bill = '". $_GET["bill_no"]."' "; 

				$objQuery = mysqli_query($objCon, $strSQL);  
		  
			
?>