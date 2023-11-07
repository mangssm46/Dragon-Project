<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
   
	$strSQL = "SELECT * FROM codenumber WHERE codeno = '".($_POST['codeno'])."' ";
	$objQuery = mysqli_query($objCon, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			 echo("<script>alert(' โค้ดส่วนลด ซ้ำกับในระบบ!!')</script>");
		echo("<script>window.location = 'createcode_data.php';</script>");
	}
	else
	{	 
	 
		$strSQL = "INSERT INTO codenumber ( codeno, price, status ) VALUES ( '".$_POST["codeno"]."', '".$_POST["price"]."', 'ยังไม่ได้ใช้งาน'  )"; 
		$objQuery = mysqli_query($objCon, $strSQL);
		  
		//echo $strSQL;
		//echo("<script>alert('สมัครสมาชิกเรียบร้อย!!')</script>");
		echo("<script>window.location = 'createcode_data.php';</script>");
		
		
	}
	 
	 
?>