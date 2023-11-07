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
                     <font size="4px" color="#FF6633" class="serif">  ตรวจสอบบิลคืนสินค้าพรีออเดอร์    </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > ตรวจสอบบิลคืนสินค้าพรีออเดอร์    </font>   
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
                     <font size="4px" color="#000000" class="serif">  ตรวจสอบบิลคืนสินค้าพรีออเดอร์    </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
               
                          <div class=" col-lg-5 "  align="left" style=" margin-top: 10px;" >
					    	<table width="100%" border="1" style="border: 1px solid #FF6633;  ">
					    	<tr> 
					    		<td width="30%" align="center" bgcolor="#FF6633"   >   
					    		<a href="checkcomebackpre.php"> 
					    		<div style="margin-top: 5px; margin-bottom: 5px; "  align="center" >    
					    		<font size="3px" color="#FFF" style="font-size: 14px; "> &nbsp; อยู่ในระหว่างการตรวจสอบ  &nbsp;  </font>  
					    		</div>
					    		</a>
					    		</td>
					    		<td width="30%" align="center" bgcolor="#FFF" style="border-top-right-radius: 5px;" > 
					    		<a href="checkcomebackpre.php?page=edit">   
					    		<div align="center"  >    
					    		<font size="3px" color="#000" style="font-size: 14px; "> &nbsp; คืนสินค้าแล้ว/โอนเงินแล้ว  &nbsp; </font>  
					    		</div>
					    		</a>
					    		</td>
					    	</tr>
					    </table>
					   </div> 
                         
                         
					  <div class=" col-lg-12 "  align="left" >     </div>
                  		   
                  		   
                  		   
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
								$addcode3 = ""; 



								$sql2 = " SELECT a.*, b.name FROM list_order a
								Inner Join member_all b  On a.create_by = b.pk 
								where a.bill_no != '' 
								and a.pasy_bill != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and pasy_status = 'อยู่ในระหว่างการตรวจสอบ'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3."  
								Group by a.pasy_bill
								order by a.pk asc    "; 

								$query2 = mysqli_query($objCon, $sql2);
								$total_record = mysqli_num_rows($query2);
								$total_page = ceil($total_record / $perpage);
								?>  
								<?php if (ceil($total_record / $perpage) > 0): ?>
								<ul class="pagination">
										<?php if ($page > 1): ?>
										<li class="prev"><a href="checkcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Prev</a></li>
										<?php endif; ?>

										<?php if ($page > 3): ?>
										<li class="start"><a href="checkcomebackpre.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">1</a></li>
										<li class="dots">...</li>
										<?php endif; ?>

										<?php if ($page-2 > 0): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
										<?php if ($page-1 > 0): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

										<li class="currentpage"><a href="checkcomebackpre.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

										<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
										<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)-2): ?>
										<li class="dots">...</li>
										<li class="end"><a href="checkcomebackpre.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
										<?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)): ?>
										<li class="next"><a href="checkcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
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
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดค่าสินค้า   </font></div></th>    
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ค่าขนส่ง     </font></div></th>     
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ส่วนลด     </font></div></th>  
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวม   </font></div></th>              
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ดูรายการสินค้า   </font></div></th>          
									<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะ   </font></div></th>  
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
								and a.pasy_bill != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and pasy_status = 'อยู่ในระหว่างการตรวจสอบ'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3."  
								Group by a.pasy_bill
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

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["pasy_bill"]; ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice); ?>  </font></div></td> 

								   
								   
								    
								<td class="table-action">
								<div align="center">
								<a  class="btn  btn-sm" style=" background-color: #D92B2B; border-radius: 5px;  border-color: #F8741D; border: 1px solid  #D92B2B;  border-radius: 5px; cursor: pointer; margin-top: -5px; "  data-toggle="modal" data-target="#myEodal1<?php echo $objResult["pasy_bill"];?>" data-id="" >
								<font color="#FFF" size="2px" class="serif2"  style=" font-size: 13px; "  > ดูข้อมูล </font> </a> 
								
								
								
								
									<!-- Modal -->
									<div class="modal fade" id="myEodal1<?php echo $objResult["pasy_bill"]; ?>" role="dialog" style=" margin-top: 75px; ">
									<div class="modal-dialog modal-lg"> 
										<!-- Modal content-->
											<div class="modal-content">
													<div class="modal-header">
													<font size="2px" color="black"  class="serif2"> เลขที่บิลรายการ : <?php echo $objResult["pasy_bill"]; ?> </font> 
													<button type="button" id="closepop<?php echo $objResult["pasy_bill"]; ?>"  class="close" data-dismiss="modal">&times;</button>
													</div> <br>
													<center>  
													<div class="row">  
													<div class="col-lg-12" style="margin-left: 10px; margin-right: 10px; ">  

													<?php   
														$i = 1;
														$totalall = 0;
														$note = "";
														$sql_order = "SELECT * FROM list_order where pasy_bill = '".$objResult["pasy_bill"]."'  "; 
														$query_order = mysqli_query($objCon,$sql_order); 
														while($objResult_order = mysqli_fetch_array($query_order))
														{ 

																$pricepro = $objResult_order["price"];
																$totalpro = $objResult_order["total"];

																$create_date = $objResult_order["create_date"];
																$create_date2 = $objResult_order["create_date2"];
																$create_time = $objResult_order["create_time"];
																$create_by = $objResult_order["create_by"];
																$pkselect = $objResult_order["pk"];
																$bill_no = $objResult_order["bill_no"];
																$menuid = $objResult_order["menu_id"];
															
															
																$note = $objResult_order["pasy_note"];


																$namepro = "-"; 
																$typepro = "-"; 
																$code_pro = "-";   
																$img = "";
																$sql_p = "SELECT a.*, b.name, b.typedata2 FROM product_list_pre a 
																Inner Join product b On a.bill_no = b.bill_no 
																where a.pk = '".$menuid."' ";
																$query_p = mysqli_query($objCon,$sql_p); 
																while($objResult_p = mysqli_fetch_array($query_p))
																{ 
																	$namepro = $objResult_p["name"]; 
																	$typepro = $objResult_p["typedata2"];
																	$code_pro = $objResult_p["bill_no"];   
																	$img = $objResult_p["img"];

																}


													?>	 
													  <div class="col-lg-12 " align="left" >
														<div class="form-group">
														<font size="2px" class="serif2" color="#000"   style=" font-size: 15px; " >    
														  <?php echo $namepro; ?> &nbsp; 
															จำนวน : 
														  <?php echo number_format($totalpro) ." รายการ ";?> <br>
															ยอดสุทธิ์
														  <?php echo   number_format($pricepro*$totalpro);?> บาท  
														  </font> 
														  <hr>
													  </div> 
													  </div>    
													<?php $i++;  } ?> 
													
													
													  <div class="col-lg-12 " align="left" >
														<div class="form-group">
														<font size="2px" class="serif2" color="#000"   style=" font-size: 15px; " >   
															รายละเอียด : <?php echo $note; ?>
														  </font> 
														  <hr>
													  </div> 
													  </div> 
 
												<br> 
												</div>
												</div>
												</center>
												</div>
										</div>
										</div>  
								
								
								
								</div></td>
								   
								   

								   <?php if($objResult["pasy_status"] == "อยู่ในระหว่างการตรวจสอบ" ){ ?>

									<td  >
									<div align="center">
									<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
									 อยู่ในระหว่างการตรวจสอบ
									</font>
									</div>
									</td> 


								<?php }else if($objResult["pasy_status"] == "" ){  ?>

									<td  >
									<div align="center">
									<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
									 อยู่ในระหว่างการตรวจสอบ
									</font>
									</div>
									</td> 

								<?php }else if($objResult["pasy_status"] == "คืนสินค้าแล้ว/โอนเงินแล้ว" ){  ?>

									<td  >
									<div align="center">
									<font size="3px" color="#006400" style=" font-size: 13px; " > 
									 คืนสินค้าแล้ว/โอนเงินแล้ว
									</font>
									</div>
									</td>  
 

								<?php } ?>


								  
								 </tr>  
								 <?php } ?>
								 </tbody>


					</table>   
					</div>
				    </div>
                  		    
				  <?php } ?>
                   		     
                   		     
                   		     
			  	<?php 
				if(isset($_GET["page"])){
				if( ($_GET["page"]) == "edit" ){  
				?>       		    
                   		    
                   		   
                          <div class=" col-lg-5 "  align="left" style=" margin-top: 10px;" >
					    	<table width="100%" border="1" style="border: 1px solid #FF6633;  ">
					    	<tr> 
					    		<td width="30%" align="center" bgcolor="#FFF"   >   
					    		<a href="checkcomebackpre.php"> 
					    		<div style="margin-top: 5px; margin-bottom: 5px; "  align="center" >    
					    		<font size="3px" color="#000" style="font-size: 14px; "> &nbsp; อยู่ในระหว่างการตรวจสอบ  &nbsp;  </font>  
					    		</div>
					    		</a>
					    		</td>
					    		<td width="30%" align="center" bgcolor="#FF6633" style="border-top-right-radius: 5px;" > 
					    		<a href="checkcomebackpre.php?page=edit">   
					    		<div align="center"  >    
					    		<font size="3px" color="#FFF" style="font-size: 14px; "> &nbsp; คืนสินค้าแล้ว/โอนเงินแล้ว  &nbsp; </font>  
					    		</div>
					    		</a>
					    		</td>
					    	</tr>
					    </table>
					   </div> 
                         
                         
					  <div class=" col-lg-12 "  align="left" >     </div>
                  		   
                  		   
                  		   
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
								$addcode3 = ""; 



								$sql2 = " SELECT a.*, b.name FROM list_order a
								Inner Join member_all b  On a.create_by = b.pk 
								where a.bill_no != '' 
								and a.pasy_bill != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and pasy_status = 'คืนสินค้าแล้ว/โอนเงินแล้ว'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3."  
								Group by a.pasy_bill
								order by a.pk asc    "; 

								$query2 = mysqli_query($objCon, $sql2);
								$total_record = mysqli_num_rows($query2);
								$total_page = ceil($total_record / $perpage);
								?>  
								<?php if (ceil($total_record / $perpage) > 0): ?>
								<ul class="pagination">
										<?php if ($page > 1): ?>
										<li class="prev"><a href="checkcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit">Prev</a></li>
										<?php endif; ?>

										<?php if ($page > 3): ?>
										<li class="start"><a href="checkcomebackpre.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit">1</a></li>
										<li class="dots">...</li>
										<?php endif; ?>

										<?php if ($page-2 > 0): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit"><?php echo $page-2 ?></a></li><?php endif; ?>
										<?php if ($page-1 > 0): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit"><?php echo $page-1 ?></a></li><?php endif; ?>

										<li class="currentpage"><a href="checkcomebackpre.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&page=edit"><?php echo $page ?></a></li>

										<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit"><?php echo $page+1 ?></a></li><?php endif; ?>
										<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="checkcomebackpre.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit"><?php echo $page+2 ?></a></li><?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)-2): ?>
										<li class="dots">...</li>
										<li class="end"><a href="checkcomebackpre.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>&page=edit"><?php echo ceil($total_record / $perpage) ?></a></li>
										<?php endif; ?>

										<?php if ($page < ceil($total_record / $perpage)): ?>
										<li class="next"><a href="checkcomebackpre.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&status=<?php echo $status; ?>">Next</a></li>
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
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดค่าสินค้า   </font></div></th>    
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ค่าขนส่ง     </font></div></th>     
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ส่วนลด     </font></div></th>  
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวม   </font></div></th>              
									<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ดูรายการสินค้า   </font></div></th>          
									<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สถานะ   </font></div></th>  
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
								and a.pasy_bill != '' 
								and a.noteaddress = 'Productpre'  
								and a.create_by = '".$_SESSION["UserID2"]."' 
								and status_paymet = '1'  
								and status_send = 'รับสินค้าเรียบร้อยแล้ว'
								and pasy_status = 'คืนสินค้าแล้ว/โอนเงินแล้ว'
								and memberpayment = ''
								".$addcode.$addcode2.$addcode3."  
								Group by a.pasy_bill
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

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["pasy_bill"]; ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult["name"]; ?>  </font></div></td> 


								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$total1); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$sendprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$discountprice); ?>  </font></div></td> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalprice); ?>  </font></div></td> 

								   
								   
								    
								<td class="table-action">
								<div align="center">
								<a  class="btn  btn-sm" style=" background-color: #D92B2B; border-radius: 5px;  border-color: #F8741D; border: 1px solid  #D92B2B;  border-radius: 5px; cursor: pointer; margin-top: -5px; "  data-toggle="modal" data-target="#myEodal1<?php echo $objResult["pasy_bill"];?>" data-id="" >
								<font color="#FFF" size="2px" class="serif2"  style=" font-size: 13px; "  > ดูข้อมูล </font> </a> 
								
								
								
								
									<!-- Modal -->
									<div class="modal fade" id="myEodal1<?php echo $objResult["pasy_bill"]; ?>" role="dialog" style=" margin-top: 75px; ">
									<div class="modal-dialog modal-lg"> 
										<!-- Modal content-->
											<div class="modal-content">
													<div class="modal-header">
													<font size="2px" color="black"  class="serif2"> เลขที่บิลรายการ : <?php echo $objResult["pasy_bill"]; ?> </font> 
													<button type="button" id="closepop<?php echo $objResult["pasy_bill"]; ?>"  class="close" data-dismiss="modal">&times;</button>
													</div> <br>
													<center>  
													<div class="row">  
													<div class="col-lg-12" style="margin-left: 10px; margin-right: 10px; ">  

													<?php   
														$i = 1;
														$totalall = 0;
														$note = "";
														$sql_order = "SELECT * FROM list_order where pasy_bill = '".$objResult["pasy_bill"]."'  "; 
														$query_order = mysqli_query($objCon,$sql_order); 
														while($objResult_order = mysqli_fetch_array($query_order))
														{ 

																$pricepro = $objResult_order["price"];
																$totalpro = $objResult_order["total"];

																$create_date = $objResult_order["create_date"];
																$create_date2 = $objResult_order["create_date2"];
																$create_time = $objResult_order["create_time"];
																$create_by = $objResult_order["create_by"];
																$pkselect = $objResult_order["pk"];
																$bill_no = $objResult_order["bill_no"];
																$menuid = $objResult_order["menu_id"];
															
															
																$note = $objResult_order["pasy_note"];


																$namepro = "-"; 
																$typepro = "-"; 
																$code_pro = "-";   
																$img = "";
																$sql_p = "SELECT a.*, b.name, b.typedata2 FROM product_list_pre a 
																Inner Join product b On a.bill_no = b.bill_no 
																where a.pk = '".$menuid."' ";
																$query_p = mysqli_query($objCon,$sql_p); 
																while($objResult_p = mysqli_fetch_array($query_p))
																{ 
																	$namepro = $objResult_p["name"]; 
																	$typepro = $objResult_p["typedata2"];
																	$code_pro = $objResult_p["bill_no"];   
																	$img = $objResult_p["img"];

																}


													?>	 
													  <div class="col-lg-12 " align="left" >
														<div class="form-group">
														<font size="2px" class="serif2" color="#000"   style=" font-size: 15px; " >    
														  <?php echo $namepro; ?> &nbsp; 
															จำนวน : 
														  <?php echo number_format($totalpro) ." รายการ ";?> <br>
															ยอดสุทธิ์
														  <?php echo   number_format($pricepro*$totalpro);?> บาท  
														  </font> 
														  <hr>
													  </div> 
													  </div>    
													<?php $i++;  } ?> 
													
													
													  <div class="col-lg-12 " align="left" >
														<div class="form-group">
														<font size="2px" class="serif2" color="#000"   style=" font-size: 15px; " >   
															รายละเอียด : <?php echo $note; ?>
														  </font> 
														  <hr>
													  </div> 
													  </div> 
 
												<br> 
												</div>
												</div>
												</center>
												</div>
										</div>
										</div>  
								
								
								
								</div></td>
								   
								   

								   <?php if($objResult["pasy_status"] == "อยู่ในระหว่างการตรวจสอบ" ){ ?>

									<td  >
									<div align="center">
									<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
									 อยู่ในระหว่างการตรวจสอบ
									</font>
									</div>
									</td> 


								<?php }else if($objResult["pasy_status"] == "" ){  ?>

									<td  >
									<div align="center">
									<font size="3px" color="#FF8C00" style=" font-size: 13px; " > 
									 อยู่ในระหว่างการตรวจสอบ
									</font>
									</div>
									</td> 

								<?php }else if($objResult["pasy_status"] == "คืนสินค้าแล้ว/โอนเงินแล้ว" ){  ?>

									<td  >
									<div align="center">
									<font size="3px" color="#006400" style=" font-size: 13px; " > 
									 คืนสินค้าแล้ว/โอนเงินแล้ว
									</font>
									</div>
									</td>  
 

								<?php } ?>


								  
								 </tr>  
								 <?php } ?>
								 </tbody>


					</table>   
					</div>
				    </div>
                  		    
                   		    
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