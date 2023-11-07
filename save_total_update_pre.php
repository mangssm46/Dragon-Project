<?php
session_start(); 
header('Content-Type: application/json');
include('database.php'); 
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$id = $obj->{'id'} ; 
			$total = $obj->{'total'};
			$menuid = $obj->{'menuid'};
			$member_user = $_SESSION["UserID2"];
 
			 
		 	//// สินค้าคงเหลือ ////
			$total_check = 0; 
			/// สินค้าที่ซื้อไปก่อนหน้า ///
			$total_check2 = 0; 
			$sql2 = "SELECT * FROM list_order where pk = '".$id."'  ";
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$total_check2 = $objResult2["total"];   
			} 
			
			 
			$sumall = $new_check_total - $total;  
				
			$strSQL = " Update list_order Set total = '".$total."'  "  ;
			$strSQL .=" WHERE  pk = '".$id."'   and create_by = '".$member_user."'  ";
			$objQuery = mysqli_query($objCon, $strSQL); 
				
				$data = array(
				   'ans' => "0" 
				);
		    
			 


echo json_encode($data);
?>