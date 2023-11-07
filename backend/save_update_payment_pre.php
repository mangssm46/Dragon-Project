<meta charset="UTF-8">
<?php
session_start();
include('../database.php'); 
	
	  		 
				 
			$check_image11 = $_FILES["newAvatar"]["name"];
			$check_type = $_FILES["newAvatar"]["type"];
			$update_img11 = ""; 
 
			if(empty($check_image11)){
				$check_image11 = "";
			}else{
				$check_image11 = "Slip".rand(1,9999)."jpg";
				if(move_uploaded_file($_FILES["newAvatar"]["tmp_name"],"../img/".$check_image11))
				{
					 $update_img11  =  ",slip = '".$check_image11."'" ;
				} 
			}


				$strSQL = " Update list_order Set 
				 bank = '".$_POST["banksave"]."', 
				 update_slip1 = '".date('d-m-Y')."', 
				 update_slip2 = '".date('H:i')."' " . $update_img11 ;
				$strSQL .=" WHERE bill_no = '". $_POST["billsave"]."' "; 

				$objQuery = mysqli_query($objCon, $strSQL); 

				
				 echo("<script>alert(' รอแอดมินตรวจสอบ !! ')</script>");
				 echo("<script>window.location = 'index.php';</script>");
		 
	 
?>