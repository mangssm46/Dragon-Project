<?php 
session_start(); 
include('../database.php');
 

$sql2 = "SELECT * FROM list_order where  bill_no != '' and memberpayment = ''  Group By bill_no order by pk desc  "; 
$query2 = mysqli_query($objCon,$sql2);
while($objResult2 = mysqli_fetch_array($query2))
{    

$timesetart = $objResult2["create_date2"]." ".$objResult2["create_time"];
$chectime = date('Y-m-d H:i');
$caltime = DateTimeDiff($timesetart, $chectime);



if($caltime > 1){


	$strSQL = " Update list_order Set  memberpayment = 'หมดเวลา'  " ;
	$strSQL .=" WHERE bill_no = '".$_GET["bill_no"]."'  ";  
	$objQuery = mysqli_query($objCon, $strSQL); 
 
}
}
						 
					
			 	  
?> 
      