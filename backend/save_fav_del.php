<?php
session_start(); 
header('Content-Type: application/json');
include('../database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$menuid = $_POST["data1"];    
			$total = 1;    
			$member_user = $_SESSION["UserID2"];

		 	
		  	$strSQL = " Delete From list_order_fav  ";
			$strSQL .=" WHERE menu_id = '".$menuid."' and   create_by = '".$member_user."' ";
			$objQuery = mysqli_query($objCon,$strSQL); 


			$data = array(
			   'ans' => "0" 
			);
 
			 	  
echo json_encode($data);
?>