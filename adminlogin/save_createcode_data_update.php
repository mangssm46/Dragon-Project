<?php 
session_start();  
include('../database.php');
 	  



		 $strSQL = "Update codenumber Set  price  = '".$_POST["price"]."'   "  ;
		 $strSQL .=" WHERE pk = '". $_POST["idupdate"]."' "; 

		 $objQuery = mysqli_query($objCon, $strSQL); 

		 //echo("<script>alert(' ข้อมูลอัพเดตเรียบร้อย !! ')</script>");
		 echo("<script>window.location = 'createcode_data.php?CusID=". $_POST["idupdate"]."&page=2';</script>");



?>