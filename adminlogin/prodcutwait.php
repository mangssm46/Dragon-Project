<?php 
session_start();
$_SESSION["load"] = "5";
include('header.php'); 



	$searchname = date('d/m')."/".(date('Y'));
	if(empty($_GET["searchname"])){
		
		$cut = explode("/",$searchname);
		$date_income = $cut[0]."-".$cut[1]."-".($cut[2]);  
		$daystart_load = date("d-m-Y", strtotime($date_income)); 
	}else{
		$searchname = $_GET["searchname"];
		
		
		
		$cut = explode("/",$searchname);
		$date_income = $cut[0]."-".$cut[1]."-".($cut[2]);  
		
		$daystart_load = date("d-m-Y", strtotime($date_income)); 
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
                     <font size="4px" color="#FF6633" class="serif"> ข้อมูลรายการสินค้า (พรีออเด้อร์) - ยอดรายการยอดเงินมัดจำสินค้า </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > ข้ข้อมูลรายการสินค้า (พรีออเด้อร์) - ยอดรายการยอดเงินมัดจำสินค้า </font>   
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
                     <font size="4px" color="#000000" class="serif"> ข้อมูลรายการสินค้า (พรีออเด้อร์) - ยอดรายการยอดเงินมัดจำสินค้า   </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                         
                    	  <div class="col-lg-12" align="left"   > 
						  <div class="form-group">     

						 <?php
							$btn1 = " background-color: #FFF; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btn2 = " background-color: #FFF; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btn3 = " background-color: #FFF; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btn4 = " background-color: #FFF; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; "; 

							$btxt1 = "#FF6633";							 
							$btxt2 = "#FF6633";							 
							$btxt3 = "#FF6633";							 
							$btxt4 = "#FF6633";							 

							if(($status == "รอชำระเงิน")){ 
							$btn1 = " background-color: #FF6633; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btxt1 = "#FFF";	
							} else if($status == "ชำระเงินแล้ว"){
							$btn2 = " background-color: #FF6633; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btxt2 = "#FFF";	
							} else if($status == "ยกเลิก/ไม่ได้ชำระเงินตามที่กำหนด"){
							$btn3 = " background-color: #FF6633; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btxt3 = "#FFF";	
							} else if($status == "จัดส่งสินค้า"){
							$btn4 = " background-color: #FF6633; border-radius: 5px;   height: 40px; border-color: #FF6633; border: 1px solid  #FF6633;  margin-top: 15px; ";
							$btxt4 = "#FFF";	

							}							 

						 ?>

						  <a href="prodcutwait.php?status=รอชำระเงิน">

						  <button type="button" class="btn btn-sm btn-primary" style=" <?php echo $btn1; ?>  "> <font color="<?php echo $btxt1; ?>" size="2px" class="serif1" >  รอชำระเงิน  </font> </button> 

						  </a>
						  <a href="prodcutwait.php?status=ชำระเงินแล้ว">

						  <button type="button" class="btn btn-sm btn-primary" style=" <?php echo $btn2; ?>   "> <font color="<?php echo $btxt2; ?>" size="2px" class="serif1" >  ชำระเงินแล้ว  </font> </button> 

						  </a>
						  <a href="prodcutwait.php?status=ยกเลิก/ไม่ได้ชำระเงินตามที่กำหนด">

						  <button type="button" class="btn btn-sm btn-primary" style=" <?php echo $btn3; ?>   "> <font color="<?php echo $btxt3; ?>" size="2px" class="serif1" >  ยกเลิก/ไม่ได้ชำระเงินตามที่กำหนด  </font> </button> 

						  </a>
						  <a href="prodcutwait.php?status=จัดส่งสินค้า">

						  <button type="button" class="btn btn-sm btn-primary" style=" <?php echo $btn4; ?>   "> <font color="<?php echo $btxt4; ?>" size="2px" class="serif1" >  จัดส่งสินค้า  </font> </button> 

						  </a> 

						  </div> 
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
							$addcode = " and  a.create_date = '".$daystart_load."'   ";
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



							$sql2 = " SELECT a.*, b.name FROM list_order a
							Inner Join member_all b  On a.create_by = b.pk where a.bill_no != '' and a.noteaddress = 'Productpre'
							".$addcode.$addcode2.$addcode3."  
							order by a.pk asc    "; 

							$query2 = mysqli_query($objCon, $sql2);
							$total_record = mysqli_num_rows($query2);
							$total_page = ceil($total_record / $perpage);
							?>  
							<?php if (ceil($total_record / $perpage) > 0): ?>
							<ul class="pagination">
									<?php if ($page > 1): ?>
									<li class="prev"><a href="prodcutwait.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Prev</a></li>
									<?php endif; ?>

									<?php if ($page > 3): ?>
									<li class="start"><a href="prodcutwait.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">1</a></li>
									<li class="dots">...</li>
									<?php endif; ?>

									<?php if ($page-2 > 0): ?><li class="page"><a href="prodcutwait.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
									<?php if ($page-1 > 0): ?><li class="page"><a href="prodcutwait.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

									<li class="currentpage"><a href="prodcutwait.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

									<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="prodcutwait.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
									<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="prodcutwait.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

									<?php if ($page < ceil($total_record / $perpage)-2): ?>
									<li class="dots">...</li>
									<li class="end"><a href="prodcutwait.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
									<?php endif; ?>

									<?php if ($page < ceil($total_record / $perpage)): ?>
									<li class="next"><a href="prodcutwait.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
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
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ที่อยู่ลูกค้า     </font></div></th> 
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดค่าสินค้า   </font></div></th>    
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ค่าขนส่ง     </font></div></th>   
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวม   </font></div></th>      
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  มัดจำ   </font></div></th>     
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สลิป   </font></div></th>    
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะชำระ   </font></div></th>   
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  มัดจำคงเหลือ   </font></div></th>   
				<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
				<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะจัดส่ง   </font></div></th>  
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
			where a.bill_no != ''  and a.noteaddress = 'Productpre'
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
			$typedatasend = $objResult["typedatasend"];
		?>
		<tr style="background-color: <?php echo $bg ?>; "> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["bill_no"]; ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


		<td style=" border-left: 0px solid #F2F2F2; "><div align="left"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $all_address; ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice/2); ?>  </font></div></td> 

    

		<td class="table-action">
		<div align="center">
		<a class=" btn  btn-sm" style=" background-color: #D92B2B; border-radius: 5px;  border-color: #F8741D; border: 1px solid  #D92B2B;  border-radius: 5px; cursor: pointer; margin-top: -5px;  " data-toggle="modal" data-target="#myEodal2<?php echo $objResult["bill_no"];?>" data-id="" >
		<font color="White" size="2px" class="serif2"> ดูข้อมูล </font> </a> 
		</div></td>
		
		
		<!-- modal small -->
		<div class="modal fade" id="myEodal2<?php echo $objResult["bill_no"]; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="smallmodalLabel"> ดูข้อมูล </h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		 <?php if(empty($objResult["slip"])){ }else{ ?>
		 <img src="../img/<?php echo $objResult["slip"]; ?>" width="100%">
		 <?php } ?>
		</div> 
		</div>
		</div>
		</div>
		
		
		<td class="table-action">
		 <?php if($objResult["status_paymet"] == 0 ){ ?>

			<select class="form-control " style="background-color: #FF8C00; color: white; font-size: 13px; margin-top: -5px; " id="status_payment<?php echo $objResult["pk"]; ?>" name="status_payment<?php echo $objResult["pk"]; ?>" onChange="showUser<?php echo $objResult["pk"]; ?>(this.value)"  > 
				<option value="0/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รอการตรวจสอบ </font> </option> 
				<option value="1/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> ชำระเงินเรียบร้อย </font> </option> 
				<option value="2/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> ชำระเงินไม่สำเร็จ </font> </option>   
			</select>  

		<?php }else if($objResult["status_paymet"] == 1 ){  ?>

			<select class="form-control " style="background-color: green; color: white;  font-size: 13px; margin-top: -5px;" id="status_payment<?php echo $objResult["pk"]; ?>" name="status_payment<?php echo $objResult["pk"]; ?>" onChange="showUser<?php echo $objResult["pk"]; ?>(this.value)"  >   
				<option value="1/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> ชำระเงินเรียบร้อย </font></optio> </option>   
			</select>    

		<?php }else if($objResult["status_paymet"] == 2 ){  ?>

			<select class="form-control " style="background-color: red; color: white;  font-size: 13px; margin-top: -5px; " id="status_payment<?php echo $objResult["pk"]; ?>" name="status_payment<?php echo $objResult["pk"]; ?>" onChange="showUser<?php echo $objResult["pk"]; ?>(this.value)"  >   
				<option value="2/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> ชำระเงินไม่สำเร็จ </font></optio> </option>   </option>   
			</select>     

		<?php }  ?> 		 
		</td>	

		<script>
		function 
			showUser<?php echo $objResult["pk"]; ?>(str) {

				var cut_data = str.split("/"); 
				var jsonString = "{\"status\":"+cut_data[0]+",\"bill_no\":"+cut_data[1]+"}"; 

				var check_status = cut_data[0];
				var check_status_save = "";
				if(check_status==0){ 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.backgroundColor = "#FF8C00";

					check_status_save = "0";
				}else if(check_status==1){ 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.backgroundColor = "green"; 

					check_status_save = "1"; 
				}else if(check_status==2){ 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_payment<?php echo $objResult["pk"]; ?>").style.backgroundColor = "red"; 

					check_status_save = "2";  
				} 

				$.ajax({
				type: "POST",
				url: "save_status_pay.php?status="+check_status_save+"&bill_no="+cut_data[1],
				contentType: 'application/json',
				data: jsonString,
				success: function(result) {
				//alert(result);
				}
				});

			}
		</script>
		

 
		<td class="table-action">
		 <?php if($objResult["status_send"] == "อยู่ในระหว่างจัดส่ง" ){ ?>

			<select class="form-control " style="background-color: #FF8C00; color: white; font-size: 13px; margin-top: -5px; " id="status_send<?php echo $objResult["pk"]; ?>" name="status_send<?php echo $objResult["pk"]; ?>" onChange="showUser_status<?php echo $objResult["pk"]; ?>(this.value)"  > 
				<option value="อยู่ในระหว่างจัดส่ง/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> อยู่ในระหว่างจัดส่ง </font> </option> 
				<option value="รอรับสินค้า/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รอรับสินค้า </font>  </option> 
				<option value="รับสินค้าเรียบร้อยแล้ว/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รับสินค้าเรียบร้อยแล้ว </font></option> 
			</select>  
		<?php }else if($objResult["status_send"] == "" ){  ?>
			<select class="form-control " style="background-color: #FF8C00; color: white; font-size: 13px; margin-top: -5px; " id="status_send<?php echo $objResult["pk"]; ?>" name="status_send<?php echo $objResult["pk"]; ?>" onChange="showUser_status<?php echo $objResult["pk"]; ?>(this.value)"  > 
				<option value="อยู่ในระหว่างจัดส่ง/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> อยู่ในระหว่างจัดส่ง </font> </option> 
				<option value="รอรับสินค้า/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รอรับสินค้า </font>  </option> 
				<option value="รับสินค้าเรียบร้อยแล้ว/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รับสินค้าเรียบร้อยแล้ว </font></option> 
			</select>  
			

		<?php }else if($objResult["status_send"] == "รอรับสินค้า" ){  ?>

			<select class="form-control " style="background-color: #FF0000; color: white;  font-size: 13px; margin-top: -5px;" id="status_send<?php echo $objResult["pk"]; ?>" name="status_send<?php echo $objResult["pk"]; ?>" onChange="showUser_status<?php echo $objResult["pk"]; ?>(this.value)"  >   
				<option value="รอรับสินค้า/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รอรับสินค้า </font>  </option> 
				<option value="อยู่ในระหว่างจัดส่ง/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> อยู่ในระหว่างจัดส่ง </font> </option>  
				<option value="รับสินค้าเรียบร้อยแล้ว/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รับสินค้าเรียบร้อยแล้ว </font></option>   
			</select>    

		<?php }else if($objResult["status_send"] == "รับสินค้าเรียบร้อยแล้ว" ){  ?>

			<select class="form-control " style="background-color: #006400; color: white;  font-size: 13px; margin-top: -5px; " id="status_send<?php echo $objResult["pk"]; ?>" name="status_send<?php echo $objResult["pk"]; ?>" onChange="showUser_status<?php echo $objResult["pk"]; ?>(this.value)"  >     
				<option value="รับสินค้าเรียบร้อยแล้ว/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รับสินค้าเรียบร้อยแล้ว </font></option> 
				<option value="อยู่ในระหว่างจัดส่ง/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> อยู่ในระหว่างจัดส่ง </font> </option> 
				<option value="รอรับสินค้า/<?php echo $objResult["bill_no"]; ?>" ><font size="2px" class="serif2"> รอรับสินค้า </font>  </option>  
			</select>     

		<?php }  ?> 		 
		</td>	
		<script>
		function 
			showUser_status<?php echo $objResult["pk"]; ?>(str) {

				var cut_data = str.split("/"); 
				var jsonString = "{\"status\":"+cut_data[0]+",\"bill_no\":"+cut_data[1]+"}"; 

				var check_status = cut_data[0];
				var check_status_save = "";
				if(check_status=="อยู่ในระหว่างจัดส่ง"){ 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.backgroundColor = "#FF8C00";

					check_status_save = "อยู่ในระหว่างจัดส่ง";
				}else if(check_status=="รอรับสินค้า"){ 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.backgroundColor = "#FF0000"; 

					check_status_save = "รอรับสินค้า"; 
				}else if(check_status=="รับสินค้าเรียบร้อยแล้ว"){ 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.color = "White"; 
					document.getElementById("status_send<?php echo $objResult["pk"]; ?>").style.backgroundColor = "#006400"; 

					check_status_save = "รับสินค้าเรียบร้อยแล้ว";  
				} 

				$.ajax({
				type: "POST",
				url: "save_status_pay2.php?status="+check_status_save+"&bill_no="+cut_data[1],
				contentType: 'application/json',
				data: jsonString,
				success: function(result) {
				//alert(result);
				}
				});

			}
		</script>
		
		<td class="table-action">
		  
			<select class="form-control " style="background-color: #FFF; color: #000; font-size: 13px; margin-top: -5px; " id="status_sentype<?php echo $objResult["pk"]; ?>" name="status_sentype<?php echo $objResult["pk"]; ?>" onChange="showUser_statustype<?php echo $objResult["pk"]; ?>(this.value)"  >
				 <?php if(empty($typedatasend)){ ?>
					<option value=""> เลือกขนส่ง </option> 
				 <?php } ?> 
				<?php 
				$sql_p = "SELECT * FROM typesend where pk = '".$typedatasend."' order by pk asc  "; 
				$query_p = mysqli_query($objCon,$sql_p);
				while($objResult_p = mysqli_fetch_array($query_p))
				{ 
				?>
					<option value="<?php echo $objResult_p["pk"]."/".$objResult["bill_no"]; ?>"><?php echo $objResult_p["name"]; ?></option> 
				<?php  
					}
				?>   
				<?php 
				$sql_p = "SELECT * FROM typesend where pk != '".$typedatasend."' order by pk asc  "; 
				$query_p = mysqli_query($objCon,$sql_p);
				while($objResult_p = mysqli_fetch_array($query_p))
				{ 
				?>
					<option value="<?php echo $objResult_p["pk"]."/".$objResult["bill_no"]; ?>"><?php echo $objResult_p["name"]; ?></option> 
				<?php  
					}
				?>    
			</select>  
			
			<script>
				function 
					showUser_statustype<?php echo $objResult["pk"]; ?>(str) {

						var cut_data = str.split("/"); 
						var jsonString = "{\"status\":"+cut_data[0]+",\"bill_no\":"+cut_data[1]+"}"; 

						var check_status = cut_data[0];

						
						 
						$.ajax({
						type: "POST",
						url: "save_status_pay3.php?status="+check_status+"&bill_no="+cut_data[1],
						contentType: 'application/json',
						data: jsonString,
						success: function(result) {
						//alert(result);
						}
						});

					}
				</script>
		  
		</td>	
		
		
		</tr>  
		<?php } ?>
		 </tbody>			 
										 
  
										 
							</table>  
							</div>
						  </div>
                       
                        
                  		   
                   	  <?php } ?>
                   		    
                   		
                   		        <div class="col-lg-12">
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        </div>    
                   		   
                </div>
              </div>
            </div>
            
             
             
            
             
                   		   
        </div>
 
<?php
include('footer2.php');
?>