<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
    
	$strSQL = "SELECT * FROM member_all WHERE username = '".($_POST['username'])."' ";
	$objQuery = mysqli_query($objCon, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		echo("<script>alert(' Username ซ้ำกับในระบบ!!')</script>");
		echo("<script>window.location = 'staff.php';</script>");
	}
	else
	{	
		  
		 $strSQL = "INSERT INTO member_all (
		 name, username, password, status,  address,     
		 address1, address2, address3,
		 address4, telphone, line  
		 ) VALUES (
		  '".$_POST["name"]."',  '".$_POST["username"]."', '".$_POST["password"]."', 'ST',  '".$_POST["address"]."',   
		  '".$_POST["address1"]."', '".$_POST["address2"]."',  '".$_POST["address3"]."',  
		  '".$_POST["address4"]."',  '".$_POST["telphone"]."', '".$_POST["line"]."' 
		)"; 
		$objQuery = mysqli_query($objCon, $strSQL);
			
		
		 echo("<script>window.location = 'staff.php';</script>");
		 
	}
?>