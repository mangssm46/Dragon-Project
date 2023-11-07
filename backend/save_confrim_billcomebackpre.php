<?php  
session_start();
include('../database.php');
   
	$create_by = $_SESSION["UserID2"];   
	if(empty($create_by)){
		 echo("<script>alert(' กรุณาล็อกอิน ')</script>");
		 echo("<script>window.location = '../index.php';</script>");
		
	}else{
	 
		$bill_no = ""; 
		$GGyear= date('Y')+543 ; 
		$sql2 = "SELECT count(pk) as total FROM run_billcomebackpre  ";
		$query2 = mysqli_query($objCon,$sql2);
		while($objResult2 = mysqli_fetch_array($query2))
		{
			$total = $objResult2["total"] + 1;  
		} 
 
		$bill_no =  "DDTP".date('Ymd')."-".$total; 
		$strSQL = "INSERT INTO run_billcomebackpre (bill_no) VALUES  ('".$bill_no."')";  
		$objQuery = mysqli_query($objCon, $strSQL);
 
		$billsave = $_POST["bill_no"];
		$note = $_POST["detail"];
		
		
	
		 
		$strSQL = " Update list_order Set  
					pasy_bill = '".$bill_no."' ,             
					pasy_note = '".$note."' ,             
					pasy_status = 'อยู่ในระหว่างการตรวจสอบ' ,             
					pasy_createdate = '".date('d-m-Y')."' ,
					pasy_createdate2 = '".date('Y-m-d')."' ,
					pasy_createtime = '".date('H:i')."'   " ;
		$strSQL .=" where  bill_no != ''  and pasy_onoff = 'ON' and pasy_bill = '' and bill_no = '".$billsave."'  order by pk asc "; 

		$objQuery = mysqli_query($objCon, $strSQL); 
		
		
		
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


				$check_image11 = "CCDDT".rand(1,9999999)."img".rand(110000,999999).".png"; 
				move_uploaded_file($file_tmp,"../img/".$check_image11);
				$update_img11  =  $check_image11 ; 


				$strSQL = "INSERT INTO product_img ( img, bill_no   ) VALUES 
				( '".$update_img11."',  '".$bill_no."'  )"; 
				$objQuery = mysqli_query($objCon, $strSQL);
				} 	


			} 
		}
	 
		 
		
		
		
		 //echo $strSQL;
		// echo("<script>alert(' ส่งเรื่องให้แอดมินเรียบร้อย ')</script>");
		 echo("<script>window.location = 'checkcomebackpre.php';</script>");
		/// echo("<SCRIPT LANGUAGE='JavaScript'> window.open('print_list_pasy.php?pasy_bill=".$bill_no."'); </script>"); 

	}
?>
  

 


