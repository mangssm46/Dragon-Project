<?php 
session_start();  
include('../database.php');
 	  
				$strSQL = "Update typesize Set  name  = '".$_POST["name"]."'   "  ;
				$strSQL .=" WHERE pk = '". $_POST["idupdate"]."' "; 

				$objQuery = mysqli_query($objCon, $strSQL); 
				
				 //echo("<script>alert(' ข้อมูลอัพเดตเรียบร้อย !! ')</script>");
				 echo("<script>window.location = 'typesize.php?CusID=". $_POST["idupdate"]."&page=';</script>");
?>