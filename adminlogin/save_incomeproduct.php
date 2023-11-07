<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
	 
	 $create_by = $_SESSION["UserID"];
	 if(empty($_SESSION["UserID"])){
		 //echo("<script>alert('ไม่พบ Username / Passaword Customer นี้ในระบบ!!')</script>");
		 echo("<script>window.location = '../index.php';</script>");
	 
	 } else{
    
  
		$bill_no = $_POST["bill_no"];
		$sql2 = " SELECT * FROM product_list  where bill_no = '".$bill_no."'  order by  pk asc    ";
		$query2 = mysqli_query($objCon,$sql2);
		while($objResult2 = mysqli_fetch_array($query2))
		{ 
  
		$txtsave = "totalG".$objResult2["pk"];
		$check_total = $_POST["".$txtsave];
		echo $check_total . " <br> ";
		
		if(!empty($check_total)){
			$totalcal = $objResult2["total"] + $check_total ;
			
			$strSQL = " Update product_list Set  total  = '".$totalcal."'   " ;
			$strSQL .=" WHERE pk = '". $objResult2["pk"] ."'  ";  
			$objQuery = mysqli_query($objCon, $strSQL); 
			
			
		$strSQL = "INSERT INTO update_real_time (create_date, major, create_date2, create_time, create_by, status, contact, bill_no ) VALUES  ( '".$objResult2["pk"]."', '".$objResult2["pk"]."', '".date('Y-m-d')."', '".date('H:i')."', '".$create_by."', ' เพิ่มจำนวน ".$totalcal." ', '".$bill_no."', '".$bill_no."' )"; 
		$objQuery = mysqli_query($objCon, $strSQL);	
			
		}
		  
		  
		}		 
		
		  echo("<script>window.location = 'incomeproduct.php?product=1';</script>");
		 
	 }
	 
?>