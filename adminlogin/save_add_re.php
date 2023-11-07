<?php 
session_start(); 
header('Content-Type: application/json');
include('../database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$bill_no = $_GET["bill_no"] ;    
			$member = $_SESSION["UserID"] ;         
 
 

			if(!empty($member)){ 
			 
 
				$strSQL = "INSERT INTO product_list ( bill_no, color, size, price,  total, create_by, discount, statusproduct ) 
				VALUES  ( '".$bill_no."', '', '', '', '', '".$member."', '', ''  )"; 
				$objQuery = mysqli_query($objCon, $strSQL);
 
			}




		$data = array(
			'ans' => "1" 
		); 


echo json_encode($data);	  
?>