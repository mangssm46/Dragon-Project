<?php
session_start(); 
header('Content-Type: application/json');
include('database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$menuid = $_POST["data1"];    
			$total = 1;    
			$member_user = $_SESSION["UserID2"];

		 	
		 	
			if(empty($member_user)){
				
			}else{ 
		 	/// เช็คจำนวนคงเหลือก่อน ว่าเหลือพอ เท่าจำนวนที่สั่งซื้อหรือไม่ ///
		 
		 
			 	$strSQL = "INSERT INTO list_order_fav ( menu_id, create_by, typedata  ) VALUES 
				( '".$menuid."' , '".$member_user."', 'product' )"; 
				$objQuery = mysqli_query($objCon, $strSQL);
				
				$data = array(
				   'ans' => "0" 
				);
   
			}




echo json_encode($data);
?>