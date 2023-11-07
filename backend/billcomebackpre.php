<?php 
session_start();
$_SESSION["load"] = "3";
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
	 
	

	$detail = "";

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
        
	 																		
								
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        											
												
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  บิลคืนสินค้าพรีออเดอร์    </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > บิลคืนสินค้าพรีออเดอร์    </font>   
                     <div > &nbsp; </div>
             </div> 
             </font> 
             </div>
             
            <div class="row"  >
              <div class=" col-lg-12 "  style="margin-top: -15px;"  > 
                <div class="x_panel"  style="background-color: #FFFFFF;  border-radius: 10px; " > 
                  
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000" class="serif">  บิลคืนสินค้าพรีออเดอร์    </font>   
                  </div> 
                  </font> 
                  </div>
                        
                         
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

										<form action="billcomebackpre.php" method="get" >
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



								$sql2 = " SELECT a.*, b.name FROM list_order a
								Inner Join member_all b  On a.create_by = b.pk 
								where a.bill_no != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3."  
								Group by a.bill_no
								order by a.pk asc    "; 

								$query2 = mysqli_query($objCon, $sql2);
								$total_record = mysqli_num_rows($query2);
								$total_page = ceil($total_record / $perpage);
								?>  
								<?php if (ceil($total_record / $perpage) > 0): ?>
								<ul class="pagination">
										<?php if ($page > 1): ?>
										<li class="prev"><a href="billcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Prev</a></li>
										<?php endif; ?>

										<?php if ($page > 3): ?>
										<li class="start"><a href="billcomebackpre.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">1</a></li>
										<li class="dots">...</li>
										<?php endif; ?>

										<?php if ($page-2 > 0): ?><li class="page"><a href="billcomebackpre.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
										<?php if ($page-1 > 0): ?><li class="page"><a href="billcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

										<li class="currentpage"><a href="billcomebackpre.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

										<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="billcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
										<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="billcomebackpre.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)-2): ?>
										<li class="dots">...</li>
										<li class="end"><a href="billcomebackpre.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
										<?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)): ?>
										<li class="next"><a href="billcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
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
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวม   </font></div></th>              
									<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะรับสินค้า   </font></div></th>    
									<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  บิลใบเสร็จ   </font></div></th>     
									<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  รีวิว   </font></div></th>         
									<th width="5%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  คืนสินค้า   </font></div></th>  
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
								Inner Join member_all b  On a.create_by = b.pk 
								where a.bill_no != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3." 
								Group by a.bill_no
								order by a.pk asc limit {$start} , {$perpage}   ";    
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
								?>
								<tr style="background-color: <?php echo $bg ?>; "> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["bill_no"]; ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice); ?>  </font></div></td> 


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
									<font size="3px" color="#006400" style=" font-size: 13px; " > 
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


									<td  >
									<div align="center">
									 <a href="print_pre.php?bill_no=<?php echo $objResult["bill_no"]; ?>&page=claim" target="_blank"      class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;  margin-top: -5px;  " > <font size="3px" color="#F77369" style=" font-size: 13px; " >  พิมพ์ </font></a>	
									</div>
									</td> 

									<td  >
									<div align="center"> 
								  <?php if($objResult["star"] == "" ){ ?>
									 <a href="billcomebackpre.php?bill_no=<?php echo $objResult["bill_no"]; ?>&page=review"    class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;  margin-top: -5px;  " > <font size="3px" color="#F77369" style=" font-size: 13px; " >  รีวิว </font></a>	
								 <?php }  ?>  
									</div>
									</td> 


								  <?php if($objResult["status_send"] == "รับสินค้าเรียบร้อยแล้ว" ){ ?>

									<td  >
									<div align="center">
									 <a href="billcomebackpre.php?bill_no=<?php echo $objResult["bill_no"]; ?>&page=claim"    class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;  margin-top: -5px;  " > <font size="3px" color="#F77369" style=" font-size: 13px; " >  คืนสินค้า </font></a>	
									</div>
									</td> 

								 <?php }  ?>  

								 </tr>  
								 <?php } ?>
								 </tbody>


									</table>   
									</div>
								  </div>
                        
                  		   
                   	  <?php } ?>
                   		    
                   		    
                   		    
                  <?php 
						if(isset($_GET["page"])){
						if( ($_GET["page"]) == "claim" ){ 
							
							$bill_no = $_GET["bill_no"];
						?>       		    
                   		    
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000" class="serif">  บิลคืนสินค้าพรีออเดอร์    </font>   
                  </div> 
                  </font> 
                  </div>
                        
                         <form role="form" name="frmMain" method="post" action="save_confrim_billcomebackpre.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 

                  		 <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $bill_no; ?>"  >
                   		    
					     <div class="col-md-12" style="margin-top: 15px;" align="right" >  
						  
						 <a href="billcomebackpre_all.php?page=claim&bill_no=<?php echo $bill_no; ?>"> 
						 <button type="button"  class="btn btn-primary" style="background-color: #006400; border-radius: 5px;  height: 40px; border-color: #006400;  "    > <font color="#FFF" size="2px" class="serif1" >  เลือกรายการทั้งหมด   </font> </button>  </a>

					 
						 <a href="billcomebackpre_cancel.php?page=claim&bill_no=<?php echo $bill_no; ?>"> 
						 <button type="button"  class="btn btn-primary" style="background-color: #FF0000; border-radius: 5px;  height: 40px; border-color: #FF0000; "    > <font color="#FFF" size="2px" class="serif1" >  ยกเลิกรายการทั้งหมด   </font> </button>  </a>
  
					   </div> 
                   		    
                   		     
                         <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
						 <div class="table-responsive"  >
						 <table id="key_product"  class=" table    tablemobile  " border="0"   >
							     
						 <tbody> 
						 <?php 
							$bg = "#F8FAFD"; 
							$i = 1;
							$total = 0;
							$totalprice1 = 0;
							$totalprice2 = 0;
							$totalprice3 = 0;
							$totalprice4 = 0; 


							$sql2 = "  SELECT *  FROM list_order 
							where  bill_no != ''  and bill_no = '".$bill_no."'  and pasy_bill = '' 
							order by pk asc   ";   
							$query2 = mysqli_query($con,$sql2); 
							while($objResult2 = mysqli_fetch_array($query2))
							{
								if($bg == "#FFF"){ 
									$bg = "#F8FAFD"; 
								}else{  
									$bg = "#FFF"; 
								}
								$pricepro = $objResult2["price"];
								$totalpro = $objResult2["total"];

								$create_date = $objResult2["create_date"];
								$create_date2 = $objResult2["create_date2"];
								$create_time = $objResult2["create_time"];
								$create_by = $objResult2["create_by"];
								$pkselect = $objResult2["pk"];
								$bill_no = $objResult2["bill_no"];
								$menuid = $objResult2["menu_id"];

 
								$namepro = "-"; 
								$typepro = "-"; 
								$code_pro = "-";   
								$img = "";
								$sql_p = "SELECT a.*, b.name, b.typedata2 FROM product_list_pre a 
								Inner Join product_pre b On a.bill_no = b.bill_no 
								where a.pk = '".$menuid."' ";
								$query_p = mysqli_query($objCon,$sql_p); 
								while($objResult_p = mysqli_fetch_array($query_p))
								{ 
									$namepro = $objResult_p["name"]; 
									$typepro = $objResult_p["typedata2"];
									$code_pro = $objResult_p["bill_no"];   
									$img = $objResult_p["img"];

								}

  

								$pasy_onoff = $objResult2["pasy_onoff"];
								$hiiden1 = "";
								$hiiden2 = "display: none;";
								if($pasy_onoff == "ON"){  
								$hiiden1 = " display: none; ";
								$hiiden2 = " ";
								}

								
								$totalsum = $totalpro * $pricepro;
							?>
							<tr style="background-color: <?php echo $bg ?>; " id="hdd<?php echo $objResult2["pk"]; ?>"   > 

							<td style=" border-left: 0px solid #F2F2F2; ">
							<div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 

						 		<input type="hidden" id="bill_save<?php echo $objResult2["pk"]; ?>" value="<?php echo $objResult2["pk"]; ?>" >

								<div id="showdata<?php echo $objResult2["pk"]; ?>" style="<?php echo $hiiden1; ?>" > 
								<input type="checkbox" id="savedata<?php echo $objResult2["pk"]; ?>" name="savedata" value="<?php echo $objResult2["pk"]; ?>"  style=" width: 20px; height: 20px; border: 1px solid #83161C; "   onclick="getRadioVaal(this.value)"  >

								</div> 

								<div id="showdatacan<?php echo $objResult2["pk"]; ?>" style="<?php echo $hiiden2; ?>"  > 
								<input type="checkbox" id="savedatacan<?php echo $objResult2["pk"]; ?>" name="savedatacan" value="<?php echo $objResult2["pk"]; ?>"    style=" width: 20px; height: 20px; border: 1px solid #83161C; " checked      onclick="getRadioVaalcancel(this.value)"   >

								</div> 

								<style>
									#savedata<?php echo $objResult["pk"]; ?> {
										accent-color: #83161C;
									}
									#savedatacan<?php echo $objResult["pk"]; ?> {
										accent-color: #83161C;
									}
								</style>

								<script type="text/javascript"> 
								function getRadioVaalcancel(radio_val){ 
									document.getElementById("showdata"+radio_val).style.display = "block";
									document.getElementById("showdatacan"+radio_val).style.display = "none";  
									document.getElementById("savedata"+radio_val).checked  = false;  

									 var int1 = radio_val; 
									 var bill_save = document.getElementById("bill_save"+radio_val).value; ;

									 
									$.ajax({
										type: "POST",
										url: "save_select_pasy2.php",
										data: {data1:int1, bill_save:bill_save},
										success: function(result) {
											  
										}
									});

								} 
								function getRadioVaal(radio_val){ 
									document.getElementById("showdata"+radio_val).style.display = "none";
									document.getElementById("showdatacan"+radio_val).style.display = "block";  
									document.getElementById("savedatacan"+radio_val).checked  = true;  

									 var int1 = radio_val; 
									 var bill_save = document.getElementById("bill_save"+radio_val).value; ;

									 
									$.ajax({
										type: "POST",
										url: "save_select_pasy.php",
										data: {data1:int1, bill_save:bill_save},
										success: function(result) {
											  
										}
									});

								} 
								</script> 
 
							</font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
							   <?php if(empty($img)){ ?>
								<img src="../img/p1.png" alt="product" class="img-fluid " style="height: 75px; ">
							   <?php }else{ ?>
								<img src="../img/<?php echo $img; ?>" alt="product" class="img-fluid " style="height: 75px; ">
							   <?php } ?>  
							</font></div></td> 
 
							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $namepro; ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$pricepro);?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalpro);?>  </font></div></td> 
							
							
							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalsum);?>  </font></div></td> 
  

							</tr>  
							<?php $i++;  $totalprice1+=$totalsum;  } ?>
						</tbody>

						<thead>   
						<tr>
						<th width="2%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF;  border-top-left-radius: 10px;  "  ><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    เลือก    </font></div></th>    
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รูป  </font></div></th>   
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รายการสินค้า     </font></div></th> 
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ราคา   </font></div></th>     
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  จำนวน   </font></div></th>     
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;   border-top-right-radius: 10px;"><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดเงินสุทธิ   </font></div></th>  
						</tr>
						</thead>
						</table>  
						</div> 
						</div>    
                   		    
                   		     
                   		    
                   		 <div class="col-md-7 "> 
						  <div class="form-group"> 
							 <font class="serif" size="3px" color="black" for="address"> รายละเอียดเหตุผล </font> 

							<textarea class="form-control" id="detail" name="detail"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   ><?php echo $detail; ?></textarea>

							<script>
							CKEDITOR.replace('detail');
							function CKupdate() {
							 for (instance in CKEDITOR.instances)
							 CKEDITOR.instances[instance].updateElement();
							 } 
							</script>

						  </div>
					   </div>      
                   		    
						 <div class="col-md-5">
							<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
							<link rel="stylesheet" href="upload_image2/css/style.css">  
							<script src="upload_image2/js/app.js"></script> 

							<ul id="media-list" class="clearfix">
							<li class="myupload"> 
								<span><i class="fa fa-plus" aria-hidden="true"></i>
								<input type="file"  click-type="type2"   class="picupload"  name="picupload[]" id="picupload"  multiple="multiple"     ></span>
							</li> 
							</ul>  
						</div>
                   		    
                   		    
                   		    
                   		    
                   		    
                   		    
						<div class="col-md-12" > 
					    <div class="col-lg-12" align="center" style=" margin-top: 15px; "   > 
						  <div class="form-group">     

						  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >  ยืนยันการคืนสินค้า  </font> </button> 


						  <a href="billcomebackpre.php">

						  <button type="button" class="btn btn-primary" style="background-color: #FFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #FFF; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 

						  </a>

							  <!-- modal small -->
							<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">
								<h5 class="modal-title" id="smallmodalLabel"> <font style=" font-size: 16px; " color="#000" >  ยืนยันทำรายกาาร </font> </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<div class="col-lg-12" align="left">
								<font style=" font-size: 14px; " color="#000" >
								
								เงื่อนไขในการคืนสินค้า
								<div style="margin-top: -2px;"> &nbsp; </div>
								-สินค้าที่ทำการสกรีนชื่อและเบอร์ลงบนสินค้า สินค้าจัดรายการโปรโมชั่น ไม่สามารถทำการเปลี่ยนหรือคืนสินค้าได้ทุกกรณี ยกเว้นสินค้ามีตำหนิที่เกิดจากการผลิตเท่านั้น
								<div style="margin-top: -10px;"> &nbsp; </div>
								-สินค้าราคาปกติ สินค้าที่ใช้ส่วนลดสมาชิก สามารถเปลี่ยนหรือคืนสินค้าได้
								<div style="margin-top: -10px;"> &nbsp; </div>
								-การเปลี่ยน/คืนสินค้า สามารถทำได้ภายใน 14 วัน นับจากวันที่สินค้าส่งถึงปลายทาง
								<div style="margin-top: -10px;"> &nbsp; </div>
								-สินค้านั้นจะต้องอยู่ในสภาพสมบูรณ์ ไม่ถูกใช้ โดยป้ายฉลากสินค้าจะต้องไม่ฉีกขาดหรือเสียหาย และสินค้าจะต้องอยู่ในบรรจุภัณฑ์ที่สมบูรณ์ของยี่ห้อนั้นๆ
								<div style="margin-top: -10px;"> &nbsp; </div>
								-การเปลี่ยนหรือคืนสินค้า ทางลูกค้าเป็นผู้รับผิดชอบค่าส่งสินค้ากลับและค่าส่งสินค้าใหม่ไปเปลี่ยนทุกกรณี ยกเว้นสินค้าที่มีตำหนิที่เกิดจากการผลิตเท่านั้น
								<div style="margin-top: -10px;"> &nbsp; </div>
								-การเปลี่ยน/คืนสินค้า จำกัดที่ 1 ครั้ง ต่อ 1 เลขที่การสั่งซื้อ
								<div style="margin-top: 2px;"> &nbsp; </div> 

								ที่อยู่สำหรับการเปลี่ยน/คืนสินค้า
								<div style="margin-top: -10px;"> &nbsp; </div>
								Dragon football shirt
								<div style="margin-top: -10px;"> &nbsp; </div>
								21/75 ซอยเคหะคลองเตย ถนนอาจณรงค์  แขวงคลองเตย เขตคลองเตย กรุงเทพ 10110 โทร.0984452067
									
								</font>
								
								
								</div> 
								<div class="col-lg-12" align="center">

									<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633;  margin-top: 15px; " > <font color="#FFF" size="2px" class="serif1" > <b>  ยืนยันการคืนสินค้า   </b> </font> </button> 


									<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #CAD1DB; border-radius: 5px; width: 130px;  height: 40px; border-color: #CAD1DB; border: 1px solid  #CAD1DB;  margin-top: 15px;  "  > <font color="#000000" size="2px" class="serif1" > <b>   ไม่   </b> </font> </button> 


								</div> 
								</div> 
								</div>
							</div>
							</div>
							<!-- end modal small -->  

						  </div> 
					  </div> 
					  </div> 	  

					 </form>
                  
                   <?php } } ?>   
                   		    
				<?php 
						if(isset($_GET["page"])){
						if( ($_GET["page"]) == "review" ){ 
							
							$bill_no = $_GET["bill_no"];
						?>       		    
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000" class="serif">  รีวิว    </font>   
                  </div> 
                  </font> 
                  </div>
                        
                         <form role="form" name="frmMain" method="post" action="save_confrim_reviewpre.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 

                  		 <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $bill_no; ?>"  >
                   		     
                   		     
                         <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
						 <div class="table-responsive"  >
						 <table id="key_product"  class=" table    tablemobile  " border="0"   >
							     
						 <tbody> 
						 <?php 
							$bg = "#F8FAFD"; 
							$i = 1;
							$total = 0;
							$totalprice1 = 0;
							$totalprice2 = 0;
							$totalprice3 = 0;
							$totalprice4 = 0; 


							$sql2 = "  SELECT *  FROM list_order 
							where  bill_no != ''  and bill_no = '".$bill_no."' 
							order by pk asc   ";   
							$query2 = mysqli_query($con,$sql2); 
							while($objResult2 = mysqli_fetch_array($query2))
							{
								if($bg == "#FFF"){ 
									$bg = "#F8FAFD"; 
								}else{  
									$bg = "#FFF"; 
								}
								$pricepro = $objResult2["price"];
								$totalpro = $objResult2["total"];

								$create_date = $objResult2["create_date"];
								$create_date2 = $objResult2["create_date2"];
								$create_time = $objResult2["create_time"];
								$create_by = $objResult2["create_by"];
								$pkselect = $objResult2["pk"];
								$bill_no = $objResult2["bill_no"];
								$menuid = $objResult2["menu_id"];

 
								$namepro = "-"; 
								$typepro = "-"; 
								$code_pro = "-";   
								$img = "";
								$sql_p = "SELECT a.*, b.name, b.typedata2 FROM product_list_pre a 
								Inner Join product_pre b On a.bill_no = b.bill_no 
								where a.pk = '".$menuid."' ";
								$query_p = mysqli_query($objCon,$sql_p); 
								while($objResult_p = mysqli_fetch_array($query_p))
								{ 
									$namepro = $objResult_p["name"]; 
									$typepro = $objResult_p["typedata2"];
									$code_pro = $objResult_p["bill_no"];   
									$img = $objResult_p["img"];

								}

  

								$pasy_onoff = $objResult2["pasy_onoff"];
								$hiiden1 = "";
								$hiiden2 = "display: none;";
								if($pasy_onoff == "ON"){  
								$hiiden1 = " display: none; ";
								$hiiden2 = " ";
								}

								
								$totalsum = $totalpro * $pricepro;
							?>
							<tr style="background-color: <?php echo $bg ?>; " id="hdd<?php echo $objResult2["pk"]; ?>"   > 


							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$i);?>  </font></div></td> 
							 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
							   <?php if(empty($img)){ ?>
								<img src="../img/p1.png" alt="product" class="img-fluid " style="height: 75px; ">
							   <?php }else{ ?>
								<img src="../img/<?php echo $img; ?>" alt="product" class="img-fluid " style="height: 75px; ">
							   <?php } ?>  
							</font></div></td> 
 
							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $namepro; ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$pricepro);?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalpro);?>  </font></div></td> 
							
							
							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalsum);?>  </font></div></td> 
  

							</tr>  
							<?php $i++;  $totalprice1+=$totalsum;  } ?>
						</tbody>

						<thead>   
						<tr>
						<th width="2%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF;  border-top-left-radius: 10px;  "  ><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    ลำดับ    </font></div></th>    
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รูป  </font></div></th>   
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   รายการสินค้า     </font></div></th> 
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ราคา   </font></div></th>     
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  จำนวน   </font></div></th>     
						<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;   border-top-right-radius: 10px;"><div align="center"> 
						<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดเงินสุทธิ   </font></div></th>  
						</tr>
						</thead>
						</table>  
						</div> 
						</div>    
                   		    
                   		     
						<style>
							.rating {
								display: flex;
								flex-direction: row-reverse;
								justify-content: center
							}

							.rating>input {
								display: none
							}

							.rating>label {
								position: relative;
								width: 1em;
								font-size: 3.5vw;
								color: #FFD600;
								cursor: pointer
							}

							.rating>label::before {
								content: "\2605";
								position: absolute;
								opacity: 0
							}

							.rating>label:hover:before,
							.rating>label:hover~label:before {
								opacity: 1 !important
							}

							.rating>input:checked~label:before {
								opacity: 1
							}

							.rating:hover>input:checked~label:before {
								opacity: 0.4
							}
							 </style>
 
						<div class="col-md-4 ">
						 <font class="serif" size="3px" color="black" for="address"> ความพอใจ </font> 
						<div class="rating-block"> 
						 <div class="rating"> 
						<input type="radio" name="rating" value="5" id="5"  onchange="showUser(this.value)" ><label for="5" >☆</label> 
						<input type="radio" name="rating" value="4" id="4"   onchange="showUser(this.value)" ><label for="4">☆</label> 
						<input type="radio" name="rating" value="3" id="3"   onchange="showUser(this.value)" ><label for="3">☆</label> 
						<input type="radio" name="rating" value="2" id="2"   onchange="showUser(this.value)" ><label for="2">☆</label> 
						<input type="radio" name="rating" value="1" id="1"   onchange="showUser(this.value)" ><label for="1">☆</label> 
						</div>
						</div>  
						</div> 
                   		    
                   		 <div class="col-md-12 "></div>  
                   		 <div class="col-md-7 "> 
						  <div class="form-group"> 
							 <font class="serif" size="3px" color="black" for="address"> คอมเม้น </font> 

							<textarea class="form-control" id="detail" name="detail"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   ><?php echo $detail; ?></textarea>

							<script>
							CKEDITOR.replace('detail');
							function CKupdate() {
							 for (instance in CKEDITOR.instances)
							 CKEDITOR.instances[instance].updateElement();
							 } 
							</script>

						  </div>
					   </div> 
					   
					      
					       
					    <div class="col-md-5">
							<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
							<link rel="stylesheet" href="upload_image2/css/style.css">  
							<script src="upload_image2/js/app.js"></script> 

							<ul id="media-list" class="clearfix">
							<li class="myupload"> 
								<span><i class="fa fa-plus" aria-hidden="true"></i>
								<input type="file"  click-type="type2"   class="picupload"  name="picupload[]" id="picupload"  multiple="multiple"     ></span>
							</li> 
							</ul>  
						</div>
                   		      
					            
					                
					    <div class="col-lg-7" align="center" style=" margin-top: 15px; "   > 
						  <div class="form-group">     

						  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >  ยืนยันการคืนสินค้า  </font> </button> 


						  <a href="billcomeback.php">

						  <button type="button" class="btn btn-primary" style="background-color: #FFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #FFF; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 

						  </a>

							  <!-- modal small -->
							<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">
								<h5 class="modal-title" id="smallmodalLabel"> <font style=" font-size: 16px; " color="#000" >  ขอบคุณสำหรับการรีวิว </font> </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<div class="col-lg-12" align="left"> 
								
								
								</div> 
								<div class="col-lg-12" align="center">

									<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633;  margin-top: 15px; " > <font color="#FFF" size="2px" class="serif1" > <b>  ยืนยันการคืนสินค้า   </b> </font> </button> 


									<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #CAD1DB; border-radius: 5px; width: 130px;  height: 40px; border-color: #CAD1DB; border: 1px solid  #CAD1DB;  margin-top: 15px;  "  > <font color="#000000" size="2px" class="serif1" > <b>   ไม่   </b> </font> </button> 


								</div> 
								</div> 
								</div>
							</div>
							</div>
							<!-- end modal small -->  

						  </div> 
					  </div>  
					  
					     
                   		    
						  	  

					 </form>
                  
                   <?php } } ?>   
                   		    
				<div class="col-lg-12">
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