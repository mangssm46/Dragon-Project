<meta charset="utf-8">
<?php
session_start(); 
header('Content-Type: application/json');
include('../database.php');
	
	$input = file_get_contents('php://input');
	$obj = json_decode($input); 
 
	$numbersend = $_POST["data1"];   
	$pkupdate = $_POST["data2"];   /// จำนวน  
	$member_user = $_SESSION["UserID"];
    
	 if(empty($member_user)){
		 
	 
	 } else{
	   
		$strSQL = " Update list_order Set numbersend = '".$numbersend."'  " ;
		$strSQL .=" WHERE bill_no = '". $pkupdate ."' "; 
		$objQuery = mysqli_query($objCon, $strSQL); 
		 
	 }


	$data = array(
	   'ans' => "0" 
	);


echo json_encode($data);
 
?>