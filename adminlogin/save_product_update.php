<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
	 $create_by = $_SESSION["UserID"];
	 if(empty($_SESSION["UserID"])){
		 //echo("<script>alert('ไม่พบ Username / Passaword Customer นี้ในระบบ!!')</script>");
		 echo("<script>window.location = '../index.php';</script>");
	 
	 } else{
    
		
			$update_img11 = "";
			if(isset($_FILES["picupload"]))
			{
				 
					foreach($_FILES['picupload']['tmp_name'] as $key => $val)
					{
						$update_img11 = "";
						$file_name = $_FILES['picupload']['name'][$key];
						$file_size =$_FILES['picupload']['size'][$key];
						$file_tmp =$_FILES['picupload']['tmp_name'][$key];
						$file_type=$_FILES['picupload']['type'][$key];   


						if(!empty($file_name)){
							 	  
							$check_image11 = "FREGrimg".rand(1,999)."img".rand(110000,999999).".png"; 
							move_uploaded_file($file_tmp,"../img/".$check_image11);
							$update_img11  =  $check_image11 ; 

 
							$strSQL = "INSERT INTO product_img ( img, bill_no   ) VALUES 
							( '".$update_img11."',  '".$_POST["bill_no"]."'   )"; 
							$objQuery = mysqli_query($objCon, $strSQL);
							
							 
						}

					}  
			}
	  
		
				$strSQL = "Update product Set      
				 name = '".$_POST["name"]."',        
				 detail = '".$_POST["detail"]."',        
				 typedata = '".$_POST["typedata"]."', 
				 typedata2 = '".$_POST["typedata2"]."' " ;
				$strSQL .=" WHERE pk = '". $_POST["idupdate"]."' ";  
				$objQuery = mysqli_query($objCon, $strSQL); 
		 
		
		
		
			$strSQL = "INSERT INTO update_real_time (create_date, major, create_date2, create_time, create_by, status, contact, bill_no ) VALUES  ( '".$_POST["bill_no"]."', '".$_POST["bill_no"]."', '".date('Y-m-d')."', '".date('H:i')."', '".$_SESSION["UserID"]."', 
			' อัพเดต ', '".$_POST["bill_no"]."', '".$_POST["bill_no"]."' )"; 
			$objQuery = mysqli_query($objCon, $strSQL);
 
		 echo("<script>window.location = 'product_edit.php?CusID=".$_POST["idupdate"]."';</script>");
	}
?>