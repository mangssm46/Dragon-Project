<?php
session_start();
	 
					$_SESSION["UserID"] = "";
					$_SESSION["Status"] = "";
					$_SESSION["User"] = "";
					$_SESSION["Fullname"] = ""; 

	 
					$_SESSION["UserID2"] = "";
					$_SESSION["Status2"] = "";
					$_SESSION["User2"] = "";
					$_SESSION["Fullname2"] = "";
				 
					echo("<script>alert('Login out Sucess !!')</script>");
					echo("<script>window.location = 'index.php';</script>");
					 
?>