<?php
session_start(); 
header('Content-Type: application/json');
include('database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$codecustomer = $_POST["data1"];    
			
		    $strSQL = "SELECT * FROM codenumber WHERE  codeno = '".$codecustomer."'  and status = 'ยังไม่ได้ใช้งาน'    "; 
			$objQuery = mysqli_query($objCon,$strSQL);
			$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);  
			if(!$objResult)
			{     
				$data = array(
				   'ans' => "0", 
				   'price' => "0"
				); 
			}
			else
			{  
				$data = array(
				   'ans' => "1", 
				   'price' => $objResult["price"] 
				); 
			}
 
echo json_encode($data);
?>