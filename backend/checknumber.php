<?php 
session_start();
$_SESSION["load"] = "13";
include('header.php'); 
 
	
	$searchname = "";
	if(empty($_GET["searchname"])){
		
	}else{
		$searchname = $_GET["searchname"];
	}

	$searchname2 = "";
	if(empty($_GET["searchname2"])){
		
	}else{
		$searchname2 = $_GET["searchname2"];
	}
	

	$status = "";
	if(empty($_GET["status"])){
		
	}else{
		$status = $_GET["status"];
	}

	

?>  
        
	 																		
										
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  เช็คเลขพัสดุปกติ    </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > เช็คเลขพัสดุปกติ    </font>   
                     <div > &nbsp; </div>
             </div> 
             </font> 
             </div>
             
            <div class="row"  >
              <div class=" col-lg-12 "  style="margin-top: -15px;"  > 
                <div class="x_panel"  style="background-color: #FFFFFF;  border-radius: 10px; " > 
                 
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000" class="serif">  เช็คเลขพัสดุปกติ    </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                                          


		<div   class="col-lg-4"  align="left"  > 
		<table width="100%">
			<tr> 
				<td width="40%"> 
				<font color="black" size="3px" class="serif">  ค้นหาเลขพัสดุ    </font>

				<form action="checknumber.php" method="get" >
				<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; ">
				<input class="form-control    "   type="search" style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px;   "    id="searchname" name="searchname" value="<?php echo $searchname; ?>"       autocomplete="off"  >

				<span class="input-group-append">
				  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FAFAFA;" type="submit">
						<img src="images/search.png" style="width: 15px; "> 
				  </button>
				</span>
				</div>
				</form> 

				</td>  
			</tr>
		</table>  
		</div>

 

		  <div class="col-md-12" style="margin-top: 15px;" > 
		  <style>
			 .pagination {
				list-style-type: none; 
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
	</style> 

			<?php											
			$perpage = 20;
			if (isset($_GET['page2'])) {
			$page = $_GET['page2']; 
			} else {
			$page = 1;
			} 

			if (empty($_GET['page2'])) {
			$page = 1;
			}  			
			$start = ($page - 1) * $perpage;


			$addcode = "";
			$addcode2 = "";
			if(empty($_GET["searchname"])){

			}else{
			$addcode = " and  a.numbersend like '%".$searchname."%'   ";
			} 
			if(empty($_GET["searchname2"])){

			}else{
			$addcode2 = " and  ( a.bill_no like '%".$searchname2."%'  or b.name like '%".$searchname2."%') ";
			} 


			$addcode3 = "";
			if(($status == "รอชำระเงิน")){ 
			$addcode3 = "  and  a.status_paymet = '0' "; 

			} else if($status == "ชำระเงินแล้ว"){
			$addcode3 = "  and  a.status_paymet = '1'  ";  

			} else if($status == "ยกเลิก/ไม่ได้ชำระเงินตามที่กำหนด"){
			$addcode3 = "  and  a.status_paymet = '2'  "; 

			} else if($status == "จัดส่งสินค้า"){
			$addcode3 = "   and  a.status_send != '' ";

			}	
			$addcode3 = "  and  a.status_paymet = '1'  ";  



			$sql2 = " SELECT a.*, b.name FROM list_order a
			Inner Join member_all b  On a.create_by = b.pk where a.bill_no != '' and a.noteaddress = 'Product'  and a.create_by = '".$_SESSION["UserID2"]."'
			".$addcode.$addcode2.$addcode3."  
			order by a.pk asc    "; 
 
			$query2 = mysqli_query($objCon, $sql2);
			$total_record = mysqli_num_rows($query2);
			$total_page = ceil($total_record / $perpage);
			?>  
			<?php if (ceil($total_record / $perpage) > 0): ?>
			<ul class="pagination">
					<?php if ($page > 1): ?>
					<li class="prev"><a href="checknumber.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Prev</a></li>
					<?php endif; ?>

					<?php if ($page > 3): ?>
					<li class="start"><a href="checknumber.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">1</a></li>
					<li class="dots">...</li>
					<?php endif; ?>

					<?php if ($page-2 > 0): ?><li class="page"><a href="checknumber.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
					<?php if ($page-1 > 0): ?><li class="page"><a href="checknumber.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

					<li class="currentpage"><a href="checknumber.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

					<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checknumber.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
					<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checknumber.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

					<?php if ($page < ceil($total_record / $perpage)-2): ?>
					<li class="dots">...</li>
					<li class="end"><a href="checknumber.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
					<?php endif; ?>

					<?php if ($page < ceil($total_record / $perpage)): ?>
					<li class="next"><a href="checknumber.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>

			</div>            


		  <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
			<div class="table-responsive"  >
			<table id="key_product"  class=" table    tablemobile  " border="0"    >
			 <thead> 
			 <tr>
				<th width="4%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; border-top-left-radius: 0px; "  ><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    เลขทีทำรายการ    </font></div></th>    
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รายชื่อ  </font></div></th>    
				<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดค่าสินค้า   </font></div></th>    
				<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ค่าขนส่ง     </font></div></th>     
				<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ส่วนลด     </font></div></th>  
				<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ชำระ    </font></div></th>      
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  แจ้งชำระเงิน   </font></div></th>     
				<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะชำระ   </font></div></th>      
				<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะจัดส่ง   </font></div></th>      
				<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ขนส่ง   </font></div></th>     
				<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  เลขพัสดุ   </font></div></th>  
			 </tr>
			</thead>  

			<tbody> 
			<?php 
			$bg = "#F8FAFD";  


			if (empty($_GET['page2'])) { 
				$i = 1;
			}else if (($_GET['page2'] == 1)) { 
				$i = 1;
			}else{

				$i = ( ($_GET["page2"]-1) * 20 ) + 1; 
			}



			$sql = " SELECT a.*, b.name FROM list_order a
				Inner Join customer b  On a.create_by = b.pk
				 where a.bill_no != '' and a.noteaddress = 'Product'  and a.create_by = '".$_SESSION["UserID2"]."'
				".$addcode.$addcode2.$addcode3."    
			Group By a.bill_no order by a.pk desc limit {$start} , {$perpage}   ";    
			$query = mysqli_query($con,$sql); 
			while($objResult = mysqli_fetch_array($query))
			{     
				$discountprice = 0;
				if(!empty($objResult["discountprice"])){
					$discountprice = $objResult["discountprice"];
				}
				$sendprice = 0;
				if(!empty($objResult["sendprice"])){
					$sendprice = $objResult["sendprice"];
				}


				$total1 = 0;
				$sql2 = "SELECT * FROM list_order Where  bill_no = '". $objResult["bill_no"]."' ";   
				$query2 = mysqli_query($objCon,$sql2); 
				while($objResult2 = mysqli_fetch_array($query2))
				{
					$total1 += $objResult2["price"] * $objResult2["total"]; 
				}	
				
				 $timesetart = $objResult["create_date2"]." ".$objResult["create_time"];
				 $chectime = date('Y-m-d H:i');
				 $caltime = DateTimeDiff($timesetart, $chectime)."<br>";
 

				
				if($objResult["status_paymet"] == "0"){ 
				if($caltime > 12){ 
					$strSQL = " Update list_order Set  memberpayment = 'หมดเวลา'  " ;
					$strSQL .=" WHERE bill_no = '".$objResult["bill_no"]."'  ";  
					$objQuery = mysqli_query($objCon, $strSQL);  
				}
				}


				$address = "-";
				$all_address = "-";
				$sql2 = "SELECT * FROM customer Where  pk = '". $objResult["create_by"]."' ";   
				$query2 = mysqli_query($objCon,$sql2); 
				while($objResult2 = mysqli_fetch_array($query2))
				{
					$address1 = $objResult2["address1"];
					$address2 = $objResult2["address2"];
					$address3 = $objResult2["address3"];
					$address4 = $objResult2["address4"];


					$all_address = "";
					$sql_c = "SELECT * FROM country where PROVINCE_ID = '".$address1."'   order by PROVINCE_ID asc  "; 
					$query_c = mysqli_query($objCon,$sql_c);
					while($objResult_c = mysqli_fetch_array($query_c))
					{ 
							$all_address = $all_address." จังหวัด : ".$objResult_c["PROVINCE_NAME"];
					}

					$sql_c = "SELECT * FROM aumpher where PROVINCE_ID = '".$address1."' 
					and AMPHUR_ID = '".$address2."'  order by AMPHUR_ID asc  "; 
					$query_c = mysqli_query($objCon,$sql_c);
					while($objResult_c = mysqli_fetch_array($query_c))
					{ 

							$all_address = $all_address." อำเภอ : ".$objResult_c["AMPHUR_NAME"];
					}
					$sql_c = "SELECT * FROM tumbon where PROVINCE_ID = '".$address1."' 
					and AMPHUR_ID = '".$address2."' and DISTRICT_CODE = '".$address3."'  order by DISTRICT_ID asc  "; 
					$query_c = mysqli_query($objCon,$sql_c);
					while($objResult_c = mysqli_fetch_array($query_c))
					{ 
							$all_address = $all_address." ตำบล : ".$objResult_c["DISTRICT_NAME"];
					}
				}	 



				if($bg == "#FFF"){ 
					$bg = "#F8FAFD"; 
				}else{  
					$bg = "#FFF"; 
				} 


				$totalprice = $total1 + $sendprice - $discountprice;
				
				
			$mgsend = "-";
			$sql2 = "SELECT * FROM typesend Where  pk = '". $objResult["typedatasend"]."' ";   
			$query2 = mysqli_query($objCon,$sql2); 
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$mgsend = $objResult2["name"]; 
			}	
			
 
			?>
			<tr style="background-color: <?php echo $bg ?>; "> 

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["bill_no"]; ?>  </font></div></td> 

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice); ?>  </font></div></td> 


			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 

			<?php if($objResult["memberpayment"] == "หมดเวลา"){ ?> 
			<?php if($objResult["status_paymet"] == 1 ){  ?> 
				<font size="3px" color="#006400" style=" font-size: 13px; " > 
				 ชำระเงินเรียบร้อย
				</font> 
			<?php }else{ ?> 
				<font size="3px" color="#FF0000" style=" font-size: 13px; " > 
				 หมดเวลาแจ้งชำระเงินแล้ว
				</font>
			<?php } ?>
				 
			<?php }else{   ?>
			<?php if($objResult["bank"] == ""){ ?>
			<a href="payment_pre.php?bill_no=<?php echo $objResult["bill_no"];?>" class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;   margin-top: -5px; " >
			<font size="3px" color="#F77369" style=" font-size: 13px; " >  แจ้งชำระเงิน </font></a> 
			<?php }else{   ?> 
				<font size="3px" color="#FF0000" style=" font-size: 13px; " > 
				 แจ้งชำระเงินแล้ว
				</font>
			<?php } ?> 
			<?php } ?>
			</font></div></td> 

			 

			 <?php if($objResult["status_paymet"] == 0 ){ ?>

				<td  >
				<div align="center">
				<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
				 รอแจ้งชำระเงิน
				</font>
				</div>
				</td> 


			<?php }else if($objResult["status_paymet"] == 1 ){  ?>

				<td  >
				<div align="center">
				<font size="3px" color="#006400" style=" font-size: 13px; " > 
				 ชำระเงินเรียบร้อย
				</font>
				</div>
				</td> 

			<?php }else if($objResult["status_paymet"] == 2 ){  ?>

				<td  >
				<div align="center">
				<font size="3px" color="#FF0000" style=" font-size: 13px; " > 
				 ชำระเงินไม่สำเร็จ
				</font>
				</div>
				</td>  
 
			<?php }  ?>  



			  <?php if($objResult["status_send"] == "อยู่ในระหว่างจัดส่ง" ){ ?>

				<td  >
				<div align="center">
				<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
				 อยู่ในระหว่างจัดส่ง
				</font>
				</div>
				</td> 


			<?php }else if($objResult["status_send"] == "" ){  ?>

				<td  >
				<div align="center">
				<font size="3px" color="#006400" style=" font-size: 13px; " > 
				 รอรับสินค้า
				</font>
				</div>
				</td> 

			<?php }else if($objResult["status_send"] == "รับสินค้าเรียบร้อยแล้ว" ){  ?>

				<td  >
				<div align="center">
				<font size="3px" color="#FF0000" style=" font-size: 13px; " > 
				 รับสินค้าเรียบร้อยแล้ว
				</font>
				</div>
				</td>   
					
			<?php }else{   ?>  

				<td  >
				<div align="center">
				<font size="3px" color="#FF0000" style=" font-size: 13px; " > 
				  &nbsp;
				</font>
				</div>
				</td>  


			<?php } ?>

			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $mgsend; ?>  </font></div></td> 
		 
		 
		  
			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["numbersend"]; ?>  </font></div></td> 
		 
		  
		
		
			</tr>  
			<?php } ?>
			 </tbody>


				</table>   
				</div>
			  </div>
                        
                       
                  		   
                   	  <?php } ?>
                   		    
			<div class="col-lg-12">
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				<br><br><br><br><br><br><br><br> 
				 
			</div>    
                   		   
                     
                    
                </div>
              </div>
            </div>
            
             
             
            
             
                   		   
        </div>
 
<?php
include('footer2.php');
?>