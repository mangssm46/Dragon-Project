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
			$sql2 = "SELECT * FROM product_list where pk = '".$menuid."'   ";
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$total_check1 = $objResult2["total"];  
				$price = $objResult2["price"];  
				
				
				$checkstatus_loop = $objResult2["statusproduct2"];
				$price1_loop = $objResult2["price"];
				$discountget_loop = $objResult2["discount"];
				
				
				if(empty($checkstatus_loop)){        
					$price  =  "".$price1_loop;
				}else if($checkstatus_loop == "ราคาปกติ"){    
					$price  =  "".$price1_loop;     

				}else if($checkstatus_loop == "ลดราคา"){ 

				$price_cal = $price1_loop;
				$discount_cal = $discountget_loop;

				$newprice_cal = $price_cal * ($discount_cal/100);
				$newprice2_cal = $price_cal  - $newprice_cal ;

				$txtget  =  "".$price1_loop;     
				$price  =  "".$newprice2_cal;     

				}
			} 
			
				
			$sql2 = "SELECT * FROM list_order where menu_id = '".$menuid."'  and status_product = 'Product' ";
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$total_check2 = $objResult2["total"];   
			} 
				
				
			$newtotal = $total_check1 + $total_check2  ;

			if($newtotal < $total){
				$data = array(
				   'ans' => "1" 
				); 
			}else{ 	
				
				
			 
		    $strSQL = "SELECT * FROM list_order WHERE bill_no = '' and menu_id = '".$menuid."'   and create_by = '".$member_user."' and status_product = 'Product'  "; 
			$objQuery = mysqli_query($objCon,$strSQL);
			$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);  
			if(!$objResult)
			{   
		  
				 
				$cal_total = $total_check1 - $total;
				$strSQL = " Update product_list Set total = '".$cal_total."'  " ;
				$strSQL .=" WHERE pk = '". $menuid ."' "; 
				$objQuery = mysqli_query($objCon, $strSQL);
				 
				 
			 	$strSQL = "INSERT INTO list_order (menu_id, total, price, status_paymet, create_by,
				create_date, create_time, slip, update_slip1, update_slip2, bill_no, create_date2, bank, noteaddress, status_product ) VALUES 
				('".$menuid."' ,'".$total."' ,'".$price."' ,'0' ,'".$member_user."',
				'', '', '', '', '', '', '' , '',   'Product',   'Product'  
				)"; 
				$objQuery = mysqli_query($objCon, $strSQL);
				
				$data = array(
				   'ans' => "0" 
				);
 
			 	 
			}
			else
			{
		 
				$sumall = $total;
				
				$cal_total = ($total_check1+$objResult["total"]) - $total;
				$strSQL = " Update product_list Set total = '".$cal_total."'  " ;
				$strSQL .=" WHERE pk = '". $menuid ."' "; 
				$objQuery = mysqli_query($objCon, $strSQL);
				
				
				$strSQL = " Update list_order Set total = '".$sumall."'  "  ;
				$strSQL .=" WHERE bill_no = '' and menu_id = '".$menuid."'    and create_by = '".$member_user."'  and status_product = 'Product' "; 
			 	$objQuery = mysqli_query($objCon, $strSQL); 
				 
				$data = array(
				   'ans' => "0" 
				);
 
				 
			}
			 	  
				 
			}
				
				
			}
echo json_encode($data);
?>