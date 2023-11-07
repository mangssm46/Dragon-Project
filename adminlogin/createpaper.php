<?php 
session_start();
$_SESSION["load"] = "13";
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
                     <font size="4px" color="#FF6633" class="serif">  พิมพ์ใบปะสินค้าปกติ    </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > พิมพ์ใบปะสินค้าปกติ    </font>   
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
                     <font size="4px" color="#000000" class="serif">  พิมพ์ใบปะสินค้าปกติ    </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                        
                        
		<link href='calenthai/css/jquery-ui-1.8.10.custom.css' rel='stylesheet' type='text/css'/>

		<script type="text/javascript" src="calenthai/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="calenthai/js/jquery.datepick.js"></script>

		<script type="text/javascript"> 
							$(document).ready(function() {
								var d = new Date();
								d.setDate(d.getDate());
								var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear()); 

								$(".current").datepicker({    
								changeMonth: true, 
								changeYear: true, 
								dateFormat: 'dd/mm/yy', 
								isBuddhist: false, 
								defaultDate: toDay, 
								dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
								yearRange: "+0:+5",
									  dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
									  monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
									  monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
									});
							}); 
							</script>


		<div   class="col-lg-4"  align="left"  > 
		<table width="100%">
			<tr> 
				<td width="40%"> 
				<font color="black" size="3px" class="serif">  เลือกวันที่ค้นหา    </font>

				<form action="createpaper.php" method="get" >
				<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; ">
				<input class="form-control  current "   type="text" style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px;   "    id="searchname" name="searchname" value="<?php echo $searchname; ?>"  readonly    autocomplete="off"  >

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



		<div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
		<font size="3px" color="#000000">     ประจำวันที <?php echo DateThai($daystart_load)." ".DateThai2($daystart_load); ?>  เวลาอัพเดทล่าสุด <?php echo date('H:i'); ?> น  </font>   
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
										 
		$addcode3 = "  and  a.status_paymet = '1'  ";  
										 
 
		$sql2 = " SELECT a.*, b.name FROM list_order a
		Inner Join member_all b  On a.create_by = b.pk where a.bill_no != '' and a.noteaddress = 'Product'
		".$addcode.$addcode2.$addcode3."  
		order by a.pk asc    "; 

		$query2 = mysqli_query($objCon, $sql2);
		$total_record = mysqli_num_rows($query2);
		$total_page = ceil($total_record / $perpage);
		?>  
		<?php if (ceil($total_record / $perpage) > 0): ?>
		<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="createpaper.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="createpaper.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="createpaper.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="createpaper.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="createpaper.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="createpaper.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="createpaper.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_record / $perpage)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="createpaper.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_record / $perpage)): ?>
				<li class="next"><a href="createpaper.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
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
			<th width="7%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รายชื่อ  </font></div></th>   
			<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ที่อยู่ลูกค้า     </font></div></th> 
			<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดค่าสินค้า   </font></div></th>    
			<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ค่าขนส่ง     </font></div></th>     
			<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ส่วนลด     </font></div></th>  
			<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวม   </font></div></th>      
			<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะชำระ   </font></div></th>  
			<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  เลขพัสดุ   </font></div></th>    
			<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ขนส่ง   </font></div></th>    
			<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
			<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  พิมพ์   </font></div></th>  
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
			where a.bill_no != ''  and a.noteaddress = 'Product'
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
			$numbersend = $objResult["numbersend"];
		?>
		<tr style="background-color: <?php echo $bg ?>; "> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["bill_no"]; ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


		<td style=" border-left: 0px solid #F2F2F2; "><div align="left"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $all_address; ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

		<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice); ?>  </font></div></td> 

     
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

			<td  >
			<div align="center">
			<font size="3px" color="#FF0000" style=" font-size: 13px; " >  
			<input type="text" name="numbersend<?php echo $objResult["pk"]; ?>" id="numbersend<?php echo $objResult["pk"]; ?>" class="form-control " value="<?php echo $numbersend; ?>" autocomplete="off"  style="border: 1px solid #CACACA; font-size: 13px;  border-radius: 5px; background-color: #FFF; margin-top: -5px;  " onChange="Savenumber<?php echo $objResult["pk"]; ?>()" onKeyUp="Savenumber<?php echo $objResult["pk"]; ?>()"       > 
			</font>
			
			<input type="hidden" id="pkupdate<?php echo $objResult["pk"]; ?>" value="<?php echo $objResult["bill_no"]; ?>"  >
			<script> 
				function Savenumber<?php echo $objResult["pk"]; ?>() { 
				  var getdata = document.getElementById("numbersend<?php echo $objResult["pk"]; ?>").value;  
				  var pkupdate = document.getElementById("pkupdate<?php echo $objResult["pk"]; ?>").value;  
 
					  
					$.ajax({
					type: "POST",
					url: "save_codenonumber.php?data1="+getdata+"&data2="+pkupdate,
					data: {data1:getdata, data2:pkupdate},
					success: function(result) {  

					} 
					}); 
					
					
				}
			 </script>
									 
			</div>
			</td> 
		 	
			<td class="table-action">
		  
			<select class="form-control " style="background-color: #FFF; color: #000; font-size: 13px; margin-top: -5px; " id="status_sentype<?php echo $objResult["pk"]; ?>" name="status_sentype<?php echo $objResult["pk"]; ?>" onChange="showUser_statustype<?php echo $objResult["pk"]; ?>(this.value)"  >
				 <?php if(empty($typedatasend)){ ?>
					<option value=""> ขนส่ง </option> 
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
		
		
		
			
			<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 

			<a href="printcode.php?bill_no=<?php echo $objResult["bill_no"];?>" target="_blank" class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;   margin-top: -5px; " >
			<font size="3px" color="#F77369" style=" font-size: 13px; " >  พิมพ์ </font></a>

			</font></div></td>  
			
			
		
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
			<br><br><br><br> <br><br><br><br>

		</div>    
                   		    
		</div>
	  </div>
	</div>    		   
</div>
 
<?php
include('footer2.php');
?>