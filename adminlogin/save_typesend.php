<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
   
	 
		$strSQL = "INSERT INTO typesend ( name ) VALUES ( '".$_POST["name"]."'  )"; 
		$objQuery = mysqli_query($objCon, $strSQL);
		  
		//echo $strSQL;
		//echo("<script>alert('สมัครสมาชิกเรียบร้อย!!')</script>");
		echo("<script>window.location = 'typesend.php';</script>");
		
	 
	 
?>