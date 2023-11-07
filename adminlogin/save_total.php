<?php
header('Content-Type: application/json');
include('../database.php');
	 

/*
var int1 = Savedata;          
var int2 = $("#colorG"+Savedata).val();    
var int3 = $("#sizeG"+Savedata).val();    
var int4 = $("#priceG"+Savedata).val();     
var int5 = $("#totalG"+Savedata).val();     
var int6 = $("#discount"+Savedata).val();     
var int7 = $("#statusproduct"+Savedata).val();    
*/
	$id = $_POST["data1"];  
	$colorG = $_POST["data2"];    
	$sizeG = $_POST["data3"];    
	$priceG = $_POST["data4"];      
	$totalG = $_POST["data5"];      
	$discount = $_POST["data6"];      
	$statusproduct = $_POST["data7"];      
	$statusproduct2 = $_POST["data8"];      

     
	 
		$strSQL = " Update product_list Set 
		color = '".$colorG."', 
		size = '".$sizeG."', 
		price = '".$priceG."', 
		discount = '".$discount."', 
		statusproduct = '".$statusproduct."', 
		statusproduct2 = '".$statusproduct2."', 
		total = '".$totalG."'   
		"  ;
		$strSQL .=" WHERE  pk = '".$id."'   ";
		$objQuery = mysqli_query($objCon, $strSQL); 

		$data = array(
				'ans' => "0" 
		);
	 
		  	 
	
	
echo json_encode($data);
?>