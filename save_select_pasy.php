<?php
session_start(); 
header('Content-Type: application/json');
include('../database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
      
			$bill_save = $_POST["bill_save"];     
			$member_user = $_SESSION["UserID"];

		  
			  
			if(empty($member_user)){ 
				$data = array(
				   'ans' => "2" 
				);
			}else{ 
				   
					$strSQL = "SELECT * FROM list_order WHERE pk = '".$bill_save."' and pasy_onoff = '' and pasy_bill = '' ";
					$objQuery = mysqli_query($objCon, $strSQL);
					$objResult = mysqli_fetch_array($objQuery);
					if($objResult)
					{ 
						$strSQL = " Update list_order Set  pasy_onoff = 'ON'    " ;
						$strSQL .=" WHERE pk = '".$bill_save."' ";  
						$objQuery = mysqli_query($objCon, $strSQL); 
						
						$data = array(
						   'ans' => "0" 
						);
		  
					}else{
						
						$data = array(
						   'ans' => "1" 
						);
					}
			}	 
				 
 
			 	 
			  
echo json_encode($data);
?>