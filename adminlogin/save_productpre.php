<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
	 
	 $create_by = $_SESSION["UserID"];
	 if(empty($_SESSION["UserID"])){
		 //echo("<script>alert('ไม่พบ Username / Passaword Customer นี้ในระบบ!!')</script>");
		 echo("<script>window.location = '../index.php';</script>");
	 
	 } else{
    
  
		$bill_nocount = 1;
		$sql2 = " SELECT * FROM run_productpre   order by pk asc   ";
		$query2 = mysqli_query($objCon,$sql2);
		while($objResult2 = mysqli_fetch_array($query2))
		{
			$bill_nocount ++;  
		}
 
		$total2 = $bill_nocount;  
		if($total2 > 0 && $total2 <= 9){ 
			$bill_no = "P00".$total2; 

		}else if($total2 > 9 && $total2 <= 99){ 
			$bill_no = "P0".$total2; 

		}else{
			$bill_no = "P".$total2; 

		}   
		
		$strSQL = "INSERT INTO run_productpre ( bill_no ) VALUES  ( '".$bill_no."'  )"; 
		$query2 = mysqli_query($objCon,$strSQL);
		 
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
					
						
					$check_image11 = "Grimg".rand(1,9999999)."img".rand(110000,999999).".png"; 
					move_uploaded_file($file_tmp,"../img/".$check_image11);
					$update_img11  =  $check_image11 ; 


					$strSQL = "INSERT INTO product_img ( img, bill_no   ) VALUES 
					( '".$update_img11."',  '".$bill_no."'  )"; 
					$objQuery = mysqli_query($objCon, $strSQL);
					} 	
					 
					
				} 
			}
	 
		 
		$cut = explode("/",$_POST["startdate"]);
		$date_income = $cut[0]."-".$cut[1]."-".($cut[2]);  
			
		$cut2 = explode("/",$_POST["enddate"]);
		$date_income2 = $cut2[0]."-".$cut2[1]."-".($cut2[2]); 
			
			
		$daystart = date("Y-m-d", strtotime($date_income)); 
		$dayend = date("Y-m-d", strtotime($date_income2)); 
		 
		 
		 
		$strSQL = "INSERT INTO product_pre ( 
		name, typedata, typedata2,  detail, bill_no, startdate, timeend, enddate, timeend2, newstart, newend  ) 
		VALUES 
		(  '".$_POST["name"]."', '".$_POST["typedata"]."', '".$_POST["typedata2"]."', '".$_POST["detail"]."', '".$bill_no."', '".$_POST["startdate"]."', '".$_POST["timeend"]."',  '".$_POST["enddate"]."', '".$_POST["timeend2"]."', '".$daystart."', '".$dayend."'       )"; 
		$objQuery = mysqli_query($objCon, $strSQL);
		//echo $strSQL;
			 
		 
		$strSQL = " Update product_list_pre Set  bill_no  = '".$bill_no."'   " ;
		$strSQL .=" WHERE create_by = '". $_SESSION["UserID"] ."' and bill_no = '' ";  
		$objQuery = mysqli_query($objCon, $strSQL); 
		 
		  
		$strSQL = "INSERT INTO update_real_time (create_date, major, create_date2, create_time, create_by, status, contact, bill_no ) VALUES  ( '".$bill_no."', '".$bill_no."', '".date('Y-m-d')."', '".date('H:i')."', '".$create_by."', ' เพิ่มสินค้าพรีออเดอร์ ', '".$bill_no."', '".$bill_no."' )"; 
		$objQuery = mysqli_query($objCon, $strSQL);	
					 
		
		echo("<script>window.location = 'productpre.php';</script>");
		 
	 }
	 
?>