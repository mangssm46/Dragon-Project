<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
   
 
	$strSQL = "SELECT * FROM customer WHERE username = '".($_POST['username'])."' and pk != '".$_POST["idupdate"]."'    ";
	$objQuery = mysqli_query($objCon, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		 echo("<script>alert(' เลขที่บัตรประชาชน ซ้ำกับในระบบ!!')</script>");
		 echo("<script>window.location = 'profile.php?CusID=".$_POST["idupdate"]."';</script>");
	}
	else
	{	
		 
			$strSQL = "Update customer Set           
				 username = '".$_POST["username"]."',                       
				 password = '".$_POST["password"]."',                       
				 name = '".$_POST["name"]."',                       
				 address = '".$_POST["address"]."',         
				 address1 = '".$_POST["address1"]."',         
				 address2 = '".$_POST["address2"]."',         
				 address3 = '".$_POST["address3"]."',         
				 address4 = '".$_POST["address4"]."',          
				 telphone = '".$_POST["telphone"]."'  " ;
				$strSQL .=" WHERE pk = '". $_POST["idupdate"]."' ";  
				$objQuery = mysqli_query($objCon, $strSQL); 
		 
		
		  echo("<script>window.location = 'profile.php?CusID=".$_POST["idupdate"]."';</script>");
	   
	}
?>