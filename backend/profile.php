<?php 
session_start();
$_SESSION["load"] = "4";
include('header.php');
 
	$searchname = "";	 	 
	 
?> 
   <script language = "JavaScript"> 
		//**** List Province (Start) ***//
		function ListProvince(SelectValue)
		{ 
			
        	var data1 =  document.getElementById("address1").value  ;    	
			/// alert("dropdown_nation.php?data1="+data1);
			$.ajax({
			type: "GET",
			url: "dropdown_nation.php?data1="+data1,
			success: function(result) {
			$('#address2').html(result);
			}
			});		
			 														
		}
	 
		//**** List Province (Start) ***//
		function ListProvince2(SelectValue)
		{ 
			
        	var data1 =  document.getElementById("address1").value  ;    	
        	var data2 =  document.getElementById("address2").value  ;    	
			/// alert("dropdown_nation.php?data1="+data1);
			$.ajax({
			type: "GET",
			url: "dropdown_nation2.php?data1="+data1+"&data2="+data2,
			success: function(result) {
			$('#address3').html(result);
			}
			});		
			 														
		}
	 	 
		//**** List Province (Start) ***//
		function ListProvince3(SelectValue)
		{ 
			
        	var data1 =  document.getElementById("address1").value  ;    	
        	var data2 =  document.getElementById("address2").value  ;    	
        	var data3 =  document.getElementById("address3").value  ;    	
			// alert("dropdown_nation3.php?data1="+data1+"&data2="+data2+"&data3="+data3);
			$.ajax({
			type: "GET",
			url: "dropdown_nation3.php?data1="+data1+"&data2="+data2+"&data3="+data3,
			success: function(result) {
			 	//alert(result); 
				document.getElementById("address4").value = ""+result;
			}
			});		
			 														
		} 
</script>     
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
            
            <div class="clearfix"></div>
            <div class="row" >
              <div class=" col-lg-12 "  > 
                <div class="x_panel"  style="background-color: #FFFFFF;  border-radius: 10px; " > 
                 
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000">  จัดการข้อมูลสมาชิก </font>   
                  </div> 
                  </font> 
                  </div>
                  
                   		<?php   
						$sql = "SELECT * FROM customer Where  pk = '". $_SESSION["UserID2"] ."' ";  
						$query = mysqli_query($objCon,$sql); 
						while($objResult = mysqli_fetch_array($query))
						{  
							$name = $objResult["name"];  
							$username = $objResult["username"];
							$password = $objResult["password"];        
							$address = $objResult["address"];       
							$telphone = $objResult["telphone"];  
							$address1 = $objResult["address1"];    
							$address2 = $objResult["address2"];    
							$address3 = $objResult["address3"];    
							$address4 = $objResult["address4"];        

 
						}  
							 
						?> 
                         
                   		     
                   		    <form role="form" name="frmMain" method="post" action="save_customer_update.php" enctype="multipart/form-data" onsubmit="return validateForm()"  > 
                          
							<input type="hidden" name="idupdate" id="idupdate" class="form-control " value="<?php echo $_SESSION["UserID2"]; ?>" >
						 
                          
                           <div class="col-md-4" style="margin-top: 10px; " > 
						  
						 	 <div class="col-md-12"   style="margin-top: 10px;"   >	 
							   <font color = '#000' size="3px" > ชื่อ-นามสกุล  </font>   
							  <input type="text" class="form-control" id="name" name="name"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #C9C9C9; "    value="<?php echo $name; ?>"  >
							</div>  
							
							 <div class="col-md-12"  style="margin-top: 10px;"  >
							   <font color = '#000' size="3px" > ที่อยู่   </font>   
							  <input type="text" class="form-control" id="address" name="address"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; " value="<?php echo $address; ?>" >
							</div> 
							
							 <div class="col-md-12"  style="margin-top: 10px;"  >
							   <font color = '#000' size="3px" > เบอร์โทร   </font>   
							  <input type="text" class="form-control" id="telphone" name="telphone"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; " value="<?php echo $telphone; ?>"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  maxlength="10"  >
							</div>
							
							
                      	  <div class="col-md-6"  style="margin-top: 10px;"  >
							<div class="form-group">
							   <font color = '#000' size="3px" > จังหวัด </font>    
							   <select class="form-control" id="address1" name="address1"     oninput="setCustomValidity('')" onChange = "ListProvince11(this.value)"       style="border-radius: 5px; border: 1px solid #C9C9C9; "    >
							   <?php if(empty($address1)){ ?> 
								<option value="">  จังหวัด </option>
							   <?php } ?> 
							   <?php 
									$sql = "SELECT * FROM country where PROVINCE_ID = '".$address1."' order by PROVINCE_ID asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
								?>
								<option value="<?php echo $objResult["PROVINCE_ID"]; ?>"><?php echo $objResult["PROVINCE_NAME"]; ?></option> 
								<?php  } ?>   
								<?php 
									$sql = "SELECT * FROM country where PROVINCE_ID != '".$address1."' order by PROVINCE_ID asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
								?>
								<option value="<?php echo $objResult["PROVINCE_ID"]; ?>"><?php echo $objResult["PROVINCE_NAME"]; ?></option> 
							  <?php  } ?>   
							  </select> 	
							</div> 
						  </div> 
							
                      	  <div class="col-md-6"  style="margin-top: 10px;"  >
							<div class="form-group">
							   <font color = '#000' size="3px" > อำเภอ </font>    
								<select class="form-control  " id="address2" name="address2"   
								 style="border-radius: 5px; border: 1px solid #C9C9C9; " 
								 onChange = "ListProvince22(this.value)"  >
											<?php 
												$sql = "SELECT * FROM aumpher where PROVINCE_ID = '".$address1."' 
												and AMPHUR_ID = '".$address2."'  order by AMPHUR_ID asc  "; 
												$query = mysqli_query($objCon,$sql);
												while($objResult = mysqli_fetch_array($query))
												{ 
											?>
												<option value="<?php echo $objResult["AMPHUR_ID"]; ?>"><?php echo $objResult["AMPHUR_NAME"]; ?></option> 
												<?php  
												$i++;
												}
											?>   
											<?php 
												$sql = "SELECT * FROM aumpher where PROVINCE_ID = '".$address1."' 
												and AMPHUR_ID != '".$address2."' order by AMPHUR_ID asc  "; 
												$query = mysqli_query($objCon,$sql);
												while($objResult = mysqli_fetch_array($query))
												{ 
											?>
												<option value="<?php echo $objResult["AMPHUR_ID"]; ?>"><?php echo $objResult["AMPHUR_NAME"]; ?></option> 
												<?php  
												$i++;
												}
											?>      
								</select>
							</div> 
						  </div> 
							
                      	  <div class="col-md-6"  style="margin-top: 10px;"  >
							<div class="form-group">
							   <font color = '#000' size="3px" > ตำบล </font>    
								<select class="form-control  " id="address3" name="address3"   
								 style="border-radius: 5px; border: 1px solid #C9C9C9; "  
								 onChange = "ListProvince33(this.value)"  >
											<?php 
												$sql = "SELECT * FROM tumbon where PROVINCE_ID = '".$address1."' 
												and AMPHUR_ID = '".$address2."' and DISTRICT_CODE = '".$address3."'  order by DISTRICT_ID asc  "; 
												$query = mysqli_query($objCon,$sql);
												while($objResult = mysqli_fetch_array($query))
												{ 
											?>
												<option value="<?php echo $objResult["DISTRICT_CODE"]; ?>"><?php echo $objResult["DISTRICT_NAME"]; ?></option> 
												<?php  
												$i++;
												}
											?>   
											<?php 
												$sql = "SELECT * FROM tumbon where PROVINCE_ID = '".$address1."' 
												and AMPHUR_ID = '".$address2."' and DISTRICT_CODE != '".$address3."' order by DISTRICT_ID asc  "; 
												$query = mysqli_query($objCon,$sql);
												while($objResult = mysqli_fetch_array($query))
												{ 
											?>
												<option value="<?php echo $objResult["DISTRICT_CODE"]; ?>"><?php echo $objResult["DISTRICT_NAME"]; ?></option> 
												<?php  
												$i++;
												}
											?>      
								</select> 
							</div> 
						  </div> 
							
                      	  <div class="col-md-6"   style="margin-top: 10px;" >
							<div class="form-group">
							   <font color = '#000' size="3px" > รหัสไปรษณีย์ </font>   
							  <input type="text" class="form-control" id="address4" name="address4"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; "   value="<?php echo $address4; ?>"    >
							</div> 
						  </div> 
                      	    
							
                      	    
							
                      	    
							
							 <div class="col-md-12"  style="margin-top: 10px;"  >	
								<div class="form-group">
								   <font color = '#000' size="3px" > ข้อมูลเข้าสู่ระบบ </font>  
								</div>
							  </div> 
							
							
							 <div class="col-md-12"  style="margin-top: 10px;"  >
							   <font color = '#000' size="3px" > Username </font>   
							  <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #C9C9C9; "  value="<?php echo $username; ?>"  > 
							</div>
							 <div class="col-md-12"  style="margin-top: 10px;"  >
							   <font color = '#000' size="3px" > Password </font>   
							  <input type="text" class="form-control" id="password" name="password"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #C9C9C9; "  value="<?php echo $password; ?>" > 
							</div>
							
						  </div> 
                        
                            
                          
                          <div class="col-lg-12 ">   </div> 
                           
                          <div class="col-lg-12" align="left"   > 
                          <div class="col-lg-12" align="left"   > 
							  <div class="form-group">     

							 
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
						  </div>  
						  </div>  
				      
				      
					      </form>
                   		    
                   		    
                   		    
                   		     
                          
                  		 <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
						 </div>
                     
                    
                </div>
              </div>
            </div>
            
             
            
        </div>

<?php
include('footer2.php');
?>