<meta charset="utf-8">
<?php  
session_start();
include("../database.php");
 

	$strSQL = "SELECT * FROM member_all WHERE username = '".$_POST['username']."' 
			and password = '".$_POST['password']."' ";
			$objQuery = mysqli_query($objCon,$strSQL);
			$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC); 
			if(!$objResult)
			{  
					  
				 echo("<script>alert('ตรวจสอบ user และ password อีกครั้ง !!')</script>");
				 echo("<script>window.location = 'index.php';</script>");

			}
			else
			{ 
				$_SESSION["CHKStatus"] = $objResult["status"]; 
				 
				
				if($_SESSION["CHKStatus"] == "A"){
						 
						 
					$_SESSION["UserID"] = $objResult["pk"];
					$_SESSION["Status"] = $objResult["status"];
					$_SESSION["User"] = $objResult["username"];
					$_SESSION["Fullname"] = $objResult["name"];
					$_SESSION["Major"] = "";
						 
						setcookie("UserID", $_SESSION["UserID"], time()+12800);
						setcookie("Status", $_SESSION["Status"], time()+12800);
						setcookie("User", $_SESSION["User"], time()+12800);
						setcookie("Fullname", $_SESSION["Fullname"], time()+12800); 
						setcookie("Major", $_SESSION["Major"], time()+12800);  
					
					echo("<script>window.location = '../adminlogin/index.php';</script>");
					
				}else if($_SESSION["CHKStatus"] == "ST"){
						 
						 
					$_SESSION["UserID"] = $objResult["pk"];
					$_SESSION["Status"] = $objResult["status"];
					$_SESSION["User"] = $objResult["username"];
					$_SESSION["Fullname"] = $objResult["name"];
					$_SESSION["Major"] = "";
						 
						setcookie("UserID", $_SESSION["UserID"], time()+12800);
						setcookie("Status", $_SESSION["Status"], time()+12800);
						setcookie("User", $_SESSION["User"], time()+12800);
						setcookie("Fullname", $_SESSION["Fullname"], time()+12800); 
						setcookie("Major", $_SESSION["Major"], time()+12800);  
					
					echo("<script>window.location = '../adminlogin/index.php';</script>");
					
					
					 
				}else{
					
				 echo("<script>alert('ตรวจสอบ user และ password อีกครั้ง !!')</script>");
				 echo("<script>window.location = 'index.php';</script>");
				}
				
			}
			
?>
 

<?php
				function DateThai($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strDay";
				}
				function DateThai2($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strMonthThai $strYear";
				}   
				function DateThai3($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strMonthThai ";
				}  
				function DateThai4($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return " $strYear";
				}  
	?>
	