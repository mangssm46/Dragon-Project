<?php 
session_start();
$_SESSION["load"] = "1";
include('header.php');
 
			 	 

$bank2 = "";
$bank3 = "";
$pricetotal = "";
?> 
        
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
                  <div class=" col-lg-12 " style="  " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 1px;" > 
                     <font size="4px" color="#000000">  รายการคำสั่งซื้อ   </font>  
                     <br> 
                     <font size="2px" color="#000000">  หน้าเเรก > รายการคำสั่งซื้อ  </font>   
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
                     <font size="4px" color="#000000">  รายการคำสั่งซื้อ   </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ 
					
						$sql2 = "SELECT * FROM list_order where  bill_no != '' 
						and create_by = '".$_SESSION["UserID2"]."'  
						and bill_no = '".$_GET["bill_no"]."'  
						Group By bill_no order by pk desc  "; 
						$query2 = mysqli_query($objCon,$sql2);
						while($objResult2 = mysqli_fetch_array($query2))
						{    
							 
						 $timesetart = $objResult2["create_date2"]." ".$objResult2["create_time"];
						 $chectime = date('Y-m-d H:i');
						 $caltime = DateTimeDiff($timesetart, $chectime);
							
							
							
							if($caltime > 12){
								
								
								$strSQL = " Update list_order Set  memberpayment = 'หมดเวลา'  " ;
								$strSQL .=" WHERE bill_no = '".$_GET["bill_no"]."'  ";  
								$objQuery = mysqli_query($objCon, $strSQL); 
								
								
		 						  echo("<script>alert('  หมดเวลาแจ้งชำระเงิน ')</script>");
								  echo("<script>window.location = 'checkproduct.php';</script>");
							}
						}
						 
					
					
						?>
                       
                       
							 <div class="col-lg-12" style="border: 1px solid #FFFFFF; border-radius: 10px; background-color: #FFFFFF; ">
 
							   <form role="form" name="form1" method="post" action="save_update_payment_pre2.php" enctype="multipart/form-data" onSubmit="return OnUploadCheck();" >
						     
							    <div class="row">  
								  <div class="col-lg-4" align="left" style="margin-left: 5px;" > 
									<label> <font size="3px" color="black" class="serif1"> เลือกธนาคารที่ต้องการชำระเงิน  </font>  </label>  
								 	<select class="form-control myselect" id="bank1" name="bank1"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   onchange="myFunctionsend()"    >
									 <option value=""> โปรดเลือกธนาคาร </option>    
										  <?php 
											$i = 1;
											$sql2 = "SELECT * FROM bank2  order by pk desc "; 
											$query2 = mysqli_query($objCon,$sql2);
											while($objResult2 = mysqli_fetch_array($query2))
											{   
												$namebank = " ";
												$sql = "SELECT * FROM bank where pk = '".$objResult2["bank"]."'  order by pk desc "; 
												$query = mysqli_query($objCon,$sql);
												while($objResult = mysqli_fetch_array($query))
												{  
														$namebank = $objResult["name"];
												}
											?>     
											<option value="<?php echo $objResult2["pk"]; ?>/<?php echo $namebank; ?>/<?php echo $objResult2["name"]; ?>/<?php echo $objResult2["bookbank"]; ?>">
											 <?php echo $namebank." [เลขบัญชี : ".$objResult2["bookbank"]." ]";  ?> </option>     
											<?php  
											$i++;
											}
											?> 
										</select> 
									<br>
								
									<label> <font size="3px" color="black" class="serif1"> เลขบัญชีธนาคารที่ต้องชำระเงิน  </font>  </label> 
									<input type="text" name="bank2" id="bank2" class="form-control " value="<?php echo $bank2; ?>" autocomplete="off"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   readonly    > 
									<br>
									
									<label> <font size="3px" color="black" class="serif1"> ชื่อเจ้าของบัญชีที่ต้องชำระเงิน  </font>  </label> 
									<input type="text" name="bank3" id="bank3" class="form-control " value="<?php echo $bank3; ?>" autocomplete="off"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "  readonly    > 
									<br>
									
									<script> 
										function myFunctionsend() {
										  var x1 = document.getElementById("bank2");
										  var x2 = document.getElementById("bank3"); 
										  var x3 = document.getElementById("banksave"); 
										  var getdata = document.getElementById("bank1").value; 
										  var getX = getdata.split("/");

											x1.value = getX[3];
											x2.value = getX[2];
											x3.value = getX[0];
 

										}
									 </script>
									 
									
									<label> <font size="3px" color="black" class="serif1"> เลือกเลขบิลที่ต้องการชำระ  </font>  </label>  
									<select class="form-control myselect" id="payment" name="payment"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "      onchange="myFunctionsend2()"    > 
										  <?php 
											$i = 1;
											$totalprice = 0;
											$sql2 = "SELECT * FROM list_order where  bill_no != '' 
											and create_by = '".$_SESSION["UserID2"]."'  
											and bill_no = '".$_GET["bill_no"]."'  
											Group By bill_no order by pk desc  "; 
											$query2 = mysqli_query($objCon,$sql2);
											while($objResult2 = mysqli_fetch_array($query2))
											{    
												 
												$totalprice = 0;
												$discount = 0;
												if(!empty($objResult2["discountprice"])){
													$discount = $objResult2["discountprice"];
												}
												$sendprice = 0;
												if(!empty($objResult2["sendprice"])){
													$sendprice = $objResult2["sendprice"];
												}
												$total = 0;
												$sql = "SELECT * FROM list_order where bill_no = '".$objResult2["bill_no"] ."'  and noteaddress = 'Productpre'    ";
												$query = mysqli_query($objCon,$sql); 
												while($objResult = mysqli_fetch_array($query))
												{ 
													$total += ($objResult["price"]*$objResult["total"]);
												} 

												$totalprice = ($total - $discount + $sendprice) / 2;
											?>     
											<option value="<?php echo $objResult2["bill_no"]; ?>"> <?php echo $objResult2["bill_no"];  ?> </option>     
											<?php  
											$i++;
											}
											?> 
										</select> 
										 
									<br>
									
									<label> <font size="3px" color="black" class="serif1"> ยอดเงินที่ชำระ  </font>  </label>  
									<input type="text" name="pricetotal" id="pricetotal" class="form-control " value="<?php echo $totalprice; ?>" autocomplete="off"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "  readonly    > 
									<br>
									
										
									<script> 
										function myFunctionsend2() {
										  var x1 = document.getElementById("pricetotal"); 
										  var x2 = document.getElementById("billsave"); 
										  var getdata = document.getElementById("payment").value; 
										  var getX = getdata.split("/");

											x1.value = getX[1]+" บาท "; 
											x2.value = getX[0]; 
  
										}
									 </script>
									 
									 
								  </div>    
							  			 
							  	  <div class="col-lg-3" align="center" style=" ">   
							  	  <label> <font size="3px" color="black" class="serif1">  หลักฐานการชำระเงิน  </font>  </label>  
							  	  
							  	  
                            		<style>
							.image-upload > input
							{
								display: none;
							}
							.upload-icon{
							  width: 100%; 
							  border: 2px solid #C2C2C2; 
							}
							.upload-icon img{
							  width: 100%; 
							  cursor: pointer;
							}
							.upload-icon.has-img {
								width: 100%; 
								border: none;
							}
							.upload-icon.has-img img {
								width: 100%;
								height: auto;
								border-radius: 18px;
								margin:0px;
							}
							</style> 
                   					<script type="text/javascript">
								function readURL1(input) { 
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function (e) {
											$('#blah1').attr('src', e.target.result);
										}

										reader.readAsDataURL(input.files[0]);
									}
								}  
							</script>	
                           
									<img src="images/upload2.png" style=" width: 100% ; " class="myAvatar" id="blah1" />
									<input type="file" name="newAvatar" id="newAvatar" style="display:none;" onchange="readURL1(this);"  />
									<script>
									$(".myAvatar").click(function() {
										$("#newAvatar").trigger("click");
									});
									</script>
							  	  
							  	   
							  	  </div> 
								  </div> 			 
								  		 
								<input type="hidden" name="banksave" id="banksave" class="form-control " value="" >
								<input type="hidden" name="billsave" id="billsave" class="form-control " value="<?php echo $_GET["bill_no"];?>" >
							   
								  <div class="col-lg-7" align="left" >
								   
									<button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 120px; border-color: white; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="white" size="2px" class="serif1" > <b>   ยืนยันทำรายการ   </b> </font> </button> 
									
									<button type="button" class="btn btn-primary" style="background-color: #FFFFFF; border-radius: 5px; width: 120px; border-color: white; border: 1px solid #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" > <b>   ยกเลิก   </b> </font> </button>   
									 <br><br><br>
									 
									 
									  <!-- modal small -->
									<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="smallmodalLabel"> ยืนยันทำรายกาาร </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>
										<div class="modal-body">
										<div class="col-lg-12" align="center">
										 
											<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 150px; border-color: white; margin-top: 15px; " > <font color="white" size="2px" class="serif1" > <b>   ใช่   </b> </font> </button>  
									 
											<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #FFFFFF; border-radius: 5px; width: 150px; border-color: white; border: 1px solid #FF6633;  margin-top: 15px;  "> <font color="black" size="2px" class="serif1" > <b>   ไม่   </b> </font> </button> 
											   
										</div> 
										</div> 
										</div>
									</div>
									</div>
									<!-- end modal small --> 
									 
									  
								  </div>   			 	
							  </form>   			 
								  		
								     		 					 	
							 </div> 
                   
                   	  <?php } ?>
                   		    
                   		  
                  		   
                  		 <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
                          <bR><bR><bR><br> <bR><bR><bR><br>   
                          <bR><bR><bR><br> <bR><bR><bR><br>   
                          <bR><bR><bR><br> <bR><bR><bR><br>   
                          <bR><bR><bR><br> <bR><bR><bR><br>   
                          <bR><bR>   
						 </div>
                     
                    
                </div>
              </div>
            </div>
            
             
            
        </div>

<?php
include('footer2.php');
?>