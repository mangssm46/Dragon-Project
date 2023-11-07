<?php   
include("database.php");
   
	$strSQL = "SELECT * FROM customer WHERE username = '".($_POST['username'])."' ";
	$objQuery = mysqli_query($objCon, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			 echo("<script>alert('Username ซ้ำกับในระบบ!!')</script>");
			 echo("<script>window.location = 'register.php';</script>");
	}
	else
	{	 
		 
		$check_image11 = $_FILES["newAvatar"]["name"]; 
		$update_img11 = "";

		if(empty($check_image11)){
			$check_image11 = "";
		}else{
			$check_image11 = "Grimg".rand(1,999)."img".rand(110000,999999).".png";
			if(move_uploaded_file($_FILES["newAvatar"]["tmp_name"],"img/".$check_image11))
			{
				$update_img11  =  $check_image11 ;
			} 
		}
		
		
			$update_img11 = ""; 
			$strSQL = "INSERT INTO customer (name, address,
				telphone, line, 
				password, status,
				username, img, address1, address2, address3, address4) VALUES 
				('".$_POST["name"]."','".$_POST["address"]."', 
				'".$_POST["telphone"]."','".$_POST["line"]."', 
				'".$_POST["password"]."','M', 
				'".$_POST["username"]."',  '".$update_img11."',
				'".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["address3"]."','".$_POST["address4"]."'
				)"; 
				$objQuery = mysqli_query($objCon, $strSQL);
	 
				//echo $strSQL;
				echo("<script>alert(' สมัครสมาชิกเรียบร้อย!! ')</script>"); 
				echo("<script>window.location = 'login.php'; </script>"); 
	}
?>