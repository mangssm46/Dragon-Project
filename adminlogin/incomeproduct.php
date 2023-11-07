<?php 
session_start();
$_SESSION["load"] = "-";
include('header.php'); 


	 
	$name = "";
	$address = "";
	$telphone = "";
	$major = "";
	$username = "";
	$password = "";
	$line = "";
	$facebook = "";
	$chk1 = "";
	$chk2 = "";
	$chk3 = "";
	$chk4 = "";
	$chk5 = "";
	$chk6 = "";
	$chk7 = "";
	$chk8 = "";
	$chk9 = "";
	$chk10 = "";
	$chk11 = "";
	$chk12 = "";
	$chk13 = "";
	$chk14 = "";
	$chk15 = "";
	$chk16 = "";
	$chk17 = "";
	$chk18 = "";
	$chk19 = "";
	$chk20 = "";
	$chk21 = "";
	$chk22 = "";
	$chk23 = "";
	$chk24 = "";
	$chk25 = "";
	$chk26 = "";
	$chk27 = "";
	$postion = "";
	$passport = "";

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

?>  
        
			<link href="../select2.min.css" rel="stylesheet" />
			<script src="../select2.min.js"></script>  
  			
         						
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  รับสินค้า     </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > รับสินค้า     </font>   
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
                     <font size="4px" color="#000000" class="serif">  รับสินค้า     </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                         
							  <div class="col-md-4" style=" margin-top:  15px; " > 
							  <form action="incomeproduct.php" method="get">
							  
							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									<font class="serif" size="3px" color="black" for="address"> เลือกรายการสินค้า </font>
									<select class="form-control myselect " id="product" name="product"   style="  border:  0px solid #FFF; border-radius: 5px;  " onchange='this.form.submit()'  >  
									<option value=""> เลือกรายการสินค้า </option>
									<?php 
									$sql = "SELECT * FROM product where pk = '".$product."' order by pk asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
									?>
									<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
									<?php  
									}
									?>   
									<?php 
									$sql = "SELECT * FROM product where pk != '".$product."' order by pk asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
									?>
									<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
									<?php  
									}
									?>   
									</select> 
									<script type="text/javascript">
									$(".myselect").select2();
									</script>  
								  </div>
							   </div>  
							   
							  </form> 
							  </div> 
  
							  <div class="col-md-12" >   </div> 
							  
                        	   <?php if(!empty($_GET["product"])){   
									$sql = "SELECT * FROM product Where  pk = '". $_GET["product"] ."' ";  
									$query = mysqli_query($objCon,$sql); 
									while($objResult = mysqli_fetch_array($query))
									{  
										$name = $objResult["name"];      
										$typedata = $objResult["typedata"];   
										$typedata2 = $objResult["typedata2"];    
										$detail = $objResult["detail"];    
										$bill_no = $objResult["bill_no"];    
									}  
										
									$nametypedata = "";
									$sql = "SELECT * FROM typeproduct where pk = '".$typedata."' order by pk asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
										$nametypedata = $objResult["name"];
									}
								?>
                         	   <form role="form" name="frmMain" method="post" action="save_incomeproduct.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 
                         	   
                         	   <input type="hidden" id="product" name="product" value="<?php echo $_GET["product"]; ?>" >
                         	   <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $bill_no; ?>" >

							  <div class="col-md-4" style=" margin-top:  5px; " > 
							  <div class="col-md-12"  >   </div>  

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> รหัสสินค้า </font>
									 <input type="text" class="form-control" id="txtdata1" name="txtdata1"   autocomplete="off" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $bill_no; ?>" readonly   >
								  </div>
							   </div>  
  
							  <div class="col-md-12"  >   </div>  

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ชื่อสินค้า </font>
									 <input type="text" class="form-control" id="txtdata2" name="txtdata2"   autocomplete="off" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $name; ?>"  readonly >
								  </div>
							   </div>  
							   
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ประเภท </font>
									 <input type="text" class="form-control" id="txtdata3" name="txtdata3"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $nametypedata; ?>" readonly >
								  </div>
							   </div>  
 
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> หน่วย </font>
									 <input type="text" class="form-control" id="txtdata4" name="txtdata4"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $typedata2; ?>" readonly >
								  </div>
							   </div>  
							  </div> 
							            
								<div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
								<div class="col-lg-12"  align="left"  >  
								<div class="table-responsive"  >
								<table id="key_product"  class=" table    tablemobile  " border="0"    >
								 <thead> 
								 <tr>
									<th width="4%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; border-top-left-radius: 0px; "  ><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    #    </font></div></th>    
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    สี   </font></div></th>     
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ไซต์  </font></div></th>   
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ราคา     </font></div></th> 
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  รับเข้า   </font></div></th>     
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  จำนวนคงเหลือ   </font></div></th>  
								 </tr>
							   </thead>   
								<tbody>
 
								<?php 
								$bg = "#F8FAFD"; 

								$sql = "  
								SELECT *  FROM product_list  
								where bill_no = '".$bill_no."' 
								order by  pk asc "; 
								$query = mysqli_query($objCon,$sql); 
								while($objResult = mysqli_fetch_array($query))
								{   
									$color = $objResult["color"];
									$size = $objResult["size"];
									$price = $objResult["price"];
									$total = $objResult["total"];
									$img = $objResult["img"];
									$discount = $objResult["discount"];
									$statusproduct = $objResult["statusproduct"];

									if($bg == "#FFF"){ 
										$bg = "#F8FAFD"; 
									}else{  
										$bg = "#FFF"; 
									}
									
									$colorname = "";
									$sizename = ""; 
									$sql_d = "SELECT * FROM typecolor where pk = '".$color."' order by pk asc  "; 
									$query_d = mysqli_query($objCon,$sql_d);
									while($objResult_d = mysqli_fetch_array($query_d))
									{ 
										$colorname = $objResult_d["name"];
									} 
									$sql_d = "SELECT * FROM typesize where pk = '".$size."' order by pk asc  "; 
									$query_d = mysqli_query($objCon,$sql_d);
									while($objResult_d = mysqli_fetch_array($query_d))
									{ 
										$sizename = $objResult_d["name"];
									} 
										
								?>
								<tr style="background-color: <?php echo $bg ?>; "> 

								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
										
								 <?php
									$showimg = "images/up.png";
									if(!empty($img)){ 
									$showimg = "../img/".$img;
									}
								 ?>
									 <img src="<?php echo $showimg; ?>" style="width: 20%;" class="myAvatar<?php echo $objResult["pk"]; ?>" id="blah1<?php echo $objResult["pk"]; ?>" />
									
									</font></div></td> 
								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $colorname; ?>  </font></div></td> 
								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $sizename; ?>  </font></div></td> 
								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$price); ?>   </font></div></td> 
								<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
									 
								<input type="text" class="form-control" id="totalG<?php echo $objResult["pk"]; ?>" name="totalG<?php echo $objResult["pk"]; ?>"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; text-align: center; font-size: 13px; margin-top: -5px; "    value="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" maxlength="5"   onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)" >
 
							
								<input type="hidden" id="bk_total<?php echo $objResult["pk"]; ?>" value="<?php echo $total; ?>" >
								</font></div></td> 
								
							    <script>
									/////////// เปลี่ยน จำนวน เปลี่ยนราคา  
									function Chgtotal(Savedata) { 

										var int1 = Savedata;    
										var int2 = $("#totalG"+Savedata).val();    
										var int3 = $("#bk_total"+Savedata).val();        

										var data1 = 0;
										var data2 = 0;
										if(int2 == ""){
											
										}else{
											data1 = parseFloat(int2);
										}
										if(int3 == ""){
											
										}else{
											data2 = parseFloat(int3);
										}
										      
										var sumall = data1 + data2; 
										document.getElementById("totalsohw"+Savedata).innerHTML  = Commas(sumall);
									}

							    </script>
							     
								<td style=" border-left: 0px solid #F2F2F2; "><div align="center">
								<font size="3px" color="Black" style=" font-size: 13px; " id="totalsohw<?php echo $objResult["pk"]; ?>" > 
								
								<?php echo number_format(0+$total); ?>   
								
								</font></div></td> 
 
								</tr>  
								<?php } ?>
							</tbody>
  
										 
							</table>  
							</div>
						  		</div>
						  		</div>
							      
							  <div class="col-lg-12" align="left"   > 
							  <div class="col-lg-12" align="left"   > 
								  <div class="form-group">     

								  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								
							  	  <a href="incomeproduct.php">
							  	  	 
								  <button type="button" class="btn btn-primary" style="background-color: #FFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #FFF; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 
 
							  	  </a>
							  
							  
							  
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
										 
											<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633;  margin-top: 15px; " > <font color="#FFF" size="2px" class="serif1" > <b>  ตกลง   </b> </font> </button> 
									 		 
									 
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
                   		  
							  <div class="col-md-12" >  <hr style=" border: 1px solid #C9C9C9; "> </div>
                     
                      
                      	       <div class="col-lg-12"  align="left" style="margin-top: 15px; display: none; "  >  
							<div class="table-responsive"  >
							<table id="key_product"  class=" table    tablemobile  " border="0"    >
							 <thead> 
											 <tr>
												<th width="4%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; border-top-left-radius: 0px; "  ><div align="center"> 
												<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    รหัสสินค้า    </font></div></th>    
												<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
												<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ชื่อสินค้า  </font></div></th>   
												<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
												<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ประเภทสินค้า     </font></div></th> 
												<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
												<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  ยอดรวมรับเข้า   </font></div></th>     
												<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
												<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  แก้ไข   </font></div></th>  
											 </tr>
										  </thead>  
										 
										 
										<tbody>
									 
									 
									 	<?php 
										$bg = "#F8FAFD"; 
										
										for($loop = 1; $loop <= 10; $loop++)
										{ 
											
										if($bg == "#FFF"){ 
											$bg = "#F8FAFD"; 
										}else{  
											$bg = "#FFF"; 
										}
											
										 
									 
										?>
										<tr style="background-color: <?php echo $bg ?>; "> 
										
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > รหัสสินค้า  </font></div></td> 
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > ชื่อสินค้า  </font></div></td> 
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > ประเภทสินค้า  </font></div></td> 
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > ยอดรวมรับเข้า  </font></div></td> 
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > แก้ไข  </font></div></td> 
										  
 
										</tr>  
										<?php } ?>
									</tbody>
  
										 
							</table>  
							</div>
						  </div>
                        
                  		  	  <?php } ?>
                       
                        
                  		   
                   	  <?php } ?>
                   		    
					<div class="col-lg-12">
						<br><br><br><br>
						<br><br><br><br>
						<br><br><br><br>
						<br><br><br><br>
					</div>    
                   		    
                </div>
              </div>
            </div>
                  		   
        </div>
        
 <script> 
		function Commas(str)
		{
			var parts = str.toString().replace("," ,"").split(".");
			parts[0] = parts[0].replace("," ,"").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}
	function numberWithCommas2(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>       
         
<?php
include('footer2.php');
?>