<meta charset='utf-8'>
<?php  
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../database.php');
   
	$create_by = $_SESSION["UserID2"];   
	if(empty($create_by)){
		 echo("<script>alert(' กรุณาล็อกอิน ')</script>");
		 echo("<script>window.location = '../index.php';</script>");
		
	}else{
	   
	 
  
		
		$billsave = $_POST["bill_no"];
		$bill_no = $_POST["bill_no"];
		$note = $_POST["detail"];
		$rating = $_POST["rating"];
		 

		$check = array('/ไอ้/', '/บ้า/','/มึง/', '/ว่ะ/','/fuck/', '/แม่ง/', '/เลว/', '/ฟาย/', '/สัส/', '/สัด/', '/ฉิหาย/');  //กำหนดคำหยาบที่จะตรวจสอบ ยิ่งเพิ่มเยอะยิ่งดี

		for ($i=0; $i<count($check); $i++)  //เช็คแบบวนซ้ำ
		{
			$note = preg_replace($check[$i], '***', $note);  //ค้นหาและแทนที่ข้อความคำหยาบด้วย *** หรือใส่อะไรก้ได้แล้วแต่เราครับ 
		}
 
		 
		$strSQL = " Update list_order Set  star = '".$rating."' ,   reviewnote = '".$note."',   c_date = '".date('Y-m-d')."' ,   c_time = '".date('H:i')."'      " ;
		$strSQL .=" where  bill_no != ''  and bill_no = '".$billsave."'  order by pk asc "; 

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
	 
		 
		
		
		 
		
		 //echo $strSQL 
		 echo("<script>window.location = 'billcomebackpre.php';</script>");
		/// echo("<SCRIPT LANGUAGE='JavaScript'> window.open('print_list_pasy.php?pasy_bill=".$bill_no."'); </script>"); 

	}
?>

  


