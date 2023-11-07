<?php
session_start(); 
header('Content-Type: application/json');
include('database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
 
			$menuid = $_GET["savepk"];    
			$total = $_GET["total"];    
			$member_user = $_SESSION["UserID2"];

		 	
		 	
			if(empty($member_user)){
				
			}else{ 
		 	/// เช็คจำนวนคงเหลือก่อน ว่าเหลือพอ เท่าจำนวนที่สั่งซื้อหรือไม่ ///
			$price = 0; 
			$total_check1 = 0;
			$total_check2 = 0;
			$bill_no = "";
			$sql2 = "SELECT * FROM product_list_pre where pk = '".$menuid."'  ";
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$total_check1 = $objResult2["total"];   
				$bill_no = $objResult2["bill_no"];  
				
				
				if(!empty($objResult2["price"])){
				$price1 = $objResult2["price"];	
				} 
			 
				if(!empty($objResult2["total"])){
				$total1 = $objResult2["total"];	
				} 

				if(!empty($objResult2["img"])){
				$imgshow = $objResult2["img"];	
				} 

				if(!empty($objResult2["discount"])){
				$discountget = $objResult2["discount"];	
				} 
				
				$checkstatus2 = $objResult2["statusproduct2"];
				
				 if(empty($checkstatus2)){
				   $price = $price1;     

				 }else if($checkstatus2 == "ราคาปกติ"){  
				   $price = $price1;      

				 }else if($checkstatus2 == "ลดราคา"){ 

					$price = $price1;
					$discount = $discountget;

					$newprice = $price * ($discount/100);
					$newprice2 = $price  - $newprice ;
					$price = $newprice2;    
				}
					
			} 
				
			$caltime = 0;
			$caltime2 = 0;
			$sql2 = "SELECT * FROM product_pre where bill_no = '".$bill_no."'  ";
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{
				 
				 $timesetart = $objResult2["newstart"]." ".$objResult2["timeend"];
				 $chectime = date('Y-m-d H:i');
				 $caltime = DateTimeDiff($timesetart, $chectime); 
							
				
				
				 $timesetart2 = $objResult2["newend"]." ".$objResult2["timeend2"];
				 $chectime2 = date('Y-m-d H:i');
				 $caltime2 = DateTimeDiff($timesetart2, $chectime2); 
			} 
			
				  

			if($caltime < 0){
				$data = array(
				   'ans' => "1" 
				); 
				
				
			}else  if($caltime2 > 0){
				$data = array(
				   'ans' => "2" 
				); 
				
			}else{ 	
				
				
			 
		    $strSQL = "SELECT * FROM list_order WHERE bill_no = '' and menu_id = '".$menuid."'   and create_by = '".$member_user."' and status_product = 'Productpre'  "; 
			$objQuery = mysqli_query($objCon,$strSQL);
			$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);  
			if(!$objResult)
			{   
		  
				 /*
				$cal_total = $total_check1 - $total;
				$strSQL = " Update product_list Set total = '".$cal_total."'  " ;
				$strSQL .=" WHERE pk = '". $menuid ."' "; 
				$objQuery = mysqli_query($objCon, $strSQL);
				 */
				 
			 	$strSQL = "INSERT INTO list_order (menu_id, total, price, status_paymet, create_by,
				create_date, create_time, slip, update_slip1, update_slip2, bill_no, create_date2, bank, noteaddress, status_product ) VALUES 
				('".$menuid."' ,'".$total."' ,'".$price."' ,'0' ,'".$member_user."',
				'', '', '', '', '', '', '' , '',   'Productpre',   'Productpre'  
				)"; 
				$objQuery = mysqli_query($objCon, $strSQL);
				
				$data = array(
				   'ans' => "0" 
				);
 
			 	 
			}
			else
			{
		 
				$sumall = $total;
				
				/*
				$cal_total = ($total_check1+$objResult["total"]) - $total;
				$strSQL = " Update product_list Set total = '".$cal_total."'  " ;
				$strSQL .=" WHERE pk = '". $menuid ."' "; 
				$objQuery = mysqli_query($objCon, $strSQL);
				*/
				
				$strSQL = " Update list_order Set total = '".$sumall."'  "  ;
				$strSQL .=" WHERE bill_no = '' and menu_id = '".$menuid."'    and create_by = '".$member_user."'  and status_product = 'Productpre' "; 
			 	$objQuery = mysqli_query($objCon, $strSQL); 
				 
				$data = array(
				   'ans' => "0" 
				);
 
				 
			}
			 	  
				 
			}
				
				
			}
echo json_encode($data);
?>



<?php
 function DateDiff($strDate1,$strDate2)
 {
			return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
 }
 function TimeDiff($strTime1,$strTime2)
 {
			return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }
 function DateTimeDiff($strDateTime1,$strDateTime2)
 {
			return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }
 
?>