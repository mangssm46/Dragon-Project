<meta charset="UTF-8">
 <?php
session_start();  
include('database.php'); 

	  
				$bill_no = "";
				$sql2 = "SELECT count(pk) as total FROM run_bill_pre  ";
				$query2 = mysqli_query($objCon,$sql2);
				while($objResult2 = mysqli_fetch_array($query2))
				{
					$total = $objResult2["total"] + 1; 
					$bill_no = "BJ".date('dmY')."-".$total; 
				} 

				$strSQL = "INSERT INTO run_bill_pre (bill_no) VALUES  ('".$bill_no."')"; 
				$objQuery = mysqli_query($objCon, $strSQL);


				$strSQL = " Update list_order Set 
							create_date = '".date('d-m-Y')."',
							create_date2 = '".date('Y-m-d')."',
							bill_no = '".$bill_no."' ,      
							sendprice = '100' ,      
							create_time = '".date('H:i')."'  " ;
				$strSQL .=" WHERE create_by = '". $_SESSION["UserID2"] ."' and bill_no = '' and noteaddress  =  'Productpre' ";  
				$objQuery = mysqli_query($objCon, $strSQL); 

				if(!empty($_GET["codeno"])){
					 
					$codebill = $_GET["codeno"];
					$pricdiscount =   $_GET["pricediscount"];

					if(!empty($codebill)){

					$strSQL = " Update list_order Set discount = '".$codebill."',  discountprice = '".$pricdiscount."'   " ;
					$strSQL .=" WHERE bill_no = '".$bill_no."' ";  
					$objQuery = mysqli_query($objCon, $strSQL); 


					$strSQL = " Update codenumber Set status = 'ใช้งานแล้ว'     " ;
					$strSQL .=" WHERE codeno = '".$codebill."' ";  
					$objQuery = mysqli_query($objCon, $strSQL); 

					}

				}
 
				 echo("<script>alert(' กรุณาทำการแจ้งชำระเงิน บิลเลขที่ ".$bill_no." ')</script>");
				 echo("<script>window.location = 'payment.php';</script>");
		 
?>
 
