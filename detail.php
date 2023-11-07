<?php
include('header.php');

 
	$i = 1;  
	$sql2 = "SELECT * FROM product where pk = '".$_GET["product"]."'   "; 
	$query2 = mysqli_query($objCon,$sql2);
	while($objResult2 = mysqli_fetch_array($query2))
	{  
						 
		$img = "";
		$img_all = "";
		$sql4 = "SELECT * FROM product_img  where bill_no = '".$objResult2["bill_no"]."' order by pk asc limit 1 "; 
		$query4 = mysqli_query($objCon,$sql4);
		while($objResult4 = mysqli_fetch_array($query4))
		{  
			$img = $objResult4["img"];
		} 
		$totalimg = 0;
		$sql4 = "SELECT * FROM product_img  where bill_no = '".$objResult2["bill_no"]."' order by pk asc  "; 
		$query4 = mysqli_query($objCon,$sql4);
		while($objResult4 = mysqli_fetch_array($query4))
		{  
			$totalimg++;
		} 
		$img_all = $img; 

		$typedata = "-";
		$sql4 = "SELECT * FROM typeproduct  where pk = '".$objResult2["typedata"]."' order by pk asc   "; 
		$query4 = mysqli_query($objCon,$sql4);
		while($objResult4 = mysqli_fetch_array($query4))
		{  
			$typedata = $objResult4["name"];
		} 
 
		$price1 = 0;
		$total1 = 0;
		$discountget = 0;
		$imgshow = "";
		$pksave = "";
		$sql4 = "SELECT * FROM product_list  where bill_no = '".$objResult2["bill_no"]."' order by pk asc limit 1   "; 
		$query4 = mysqli_query($objCon,$sql4);
		while($objResult4 = mysqli_fetch_array($query4))
		{  
			if(!empty($objResult4["price"])){
			$price1 = $objResult4["price"];	
			}
			 
			if(!empty($objResult4["total"])){
			$total1 = $objResult4["total"];	
			} 
			
			if(!empty($objResult4["img"])){
			$imgshow = $objResult4["img"];	
			} 
			
			
			if(!empty($objResult4["discount"])){
			$discountget = $objResult4["discount"];	
			} 
			$checkstatus2 = $objResult4["statusproduct2"];
			$pksave = $objResult4["pk"];
		} 
		
		$loopbtn = 0;
		$sql4 = "SELECT * FROM product_list  where bill_no = '".$objResult2["bill_no"]."' order by pk asc     "; 
		$query4 = mysqli_query($objCon,$sql4);
		while($objResult4 = mysqli_fetch_array($query4))
		{ 
			$loopbtn++;
		} 

		?> 
    <!-- Start Categories of The Month -->
    <section class="container py-5" style="background-color: #FFF; ">
        <div class="row text-center pt-3">
            <div class="col-lg-12 m-auto" align="left">  
                <font color="#000" style="font-size: 15px;">
                    หน้าแรก > <?php echo $objResult2["name"]; ?>
                </font>   
                 
            </div>
        </div>
        
         <div class="row">
		 <div class="col-lg-12" style=" margin-left: 10px; margin-right: 10px; " >
	    	 
			 <div class="row">
                <div class="col-lg-4 mt-5" >
                    <div class="card mb-3" style="border: 0px solid #000;  ">
                         
					<style>   
						 .imgresizeshowdatabanner{ 
							 height: 380px;
						 }
						 .imgresizeshowdatabanner2{ 
							 height: 40px;
						 }
						 @media only screen and (max-width: 767px){ 
							 .imgresizeshowdatabanner{  height: 200px;  }
							 .imgresizeshowdatabanner2{  height: 50px;  }
						 }  
					 </style>
				   <?php if(empty($img_all)){ ?>
					<img src="img/p1.png" alt="product" class="card-img img-fluid imgresizeshowdatabanner"   alt="Card image cap" id="product-detail"  >
				   <?php }else{ ?>
				   
				   
				   <?php if(!empty($imgshow)){ ?>
					<img src="img/<?php echo $imgshow; ?>" alt="product" class="card-img img-fluid imgresizeshowdatabanner"   id="product-detail" >
				   <?php }else{ ?>
					<img src="img/<?php echo $img; ?>" alt="product" class="card-img img-fluid imgresizeshowdatabanner"   id="product-detail" >
				   <?php } ?> 
				   <?php } ?>
                
                    </div>
                    <div class="row" >
                        <!--Start Controls-->
                        <?php
						if($totalimg != 0){ 
							$cal_loop = $totalimg / 6;   
						?> 
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->  
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                             
                            <div class="carousel-inner product-links-wap" role="listbox"> 
                               <?php  
								for($loop = 1; $loop <= ($cal_loop+1); $loop++){ 
								?>
                                <!--First slide-->
                                <div class="carousel-item <?php if($loop == 1){ echo "active"; } ?>">
                                    <div class="row"> 
                                       <?php
											$perpage = 6;
											if (isset($loop)) {
												$page = $loop; 
											 } else {
												$page = 1;
											} 

											 if (empty($loop)) {
												 $page = 1;
											 }  			
											$start = ($page - 1) * $perpage;

									
											$sql4 = "SELECT * FROM product_img 
											where bill_no = '".$objResult2["bill_no"]."'
											order by pk asc limit {$start} , {$perpage}  "; 
											$query4 = mysqli_query($objCon,$sql4);
											while($objResult4 = mysqli_fetch_array($query4))
											{  
										?>
                                        <div class="col-2">
                                            <a href="#">
                                                <img class="card-img img-fluid  imgresizeshowdatabanner2 "  style="width: 100%;"
                                                src="img/<?php echo $objResult4["img"]; ?>"   
                                                alt="Product Image 1">
                                            </a>
                                        </div> 
                                        <?php } ?>
                                    </div>
                                </div>
                                 
                                 
                                <!--/.First slide--> 
                                
                                <?php } ?>
                            </div> 
                            <!--End Slides-->
                        </div> 
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
					<?php } ?>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-8 mt-5">
                    <div class="card"  style="border: 0px solid #000;  ">
                        	<div class=" col-lg-12">
                            <font style="font-size: 25px;"> 
                             <b>    <?php echo $objResult2["name"]; ?>  </b>
                            </font>
                               
							</div>
								  
                             <table width="100%" border="0">
                             	<tr>
                             		<td> 
                             		
									<div class="col-lg-12"  style="margin-top: 30px;" id="showcomment2">

									</div>
                            		   
                             		</td>
                             		<td align="right">  
                             		
                             		<?php
		 
									$chl_select1 = "block";
									$chl_select2 = "none";

									if(!empty($_SESSION["UserID2"])){

										$sql4 = "SELECT * FROM list_order_fav  
										where menu_id = '".$objResult2["pk"]."'  
										and  create_by = '".$_SESSION["UserID2"]."'  
										and typedata = 'product' 
										order by pk asc  ";  
										$query4 = mysqli_query($objCon,$sql4);
										while($objResult4 = mysqli_fetch_array($query4))
										{  
											$chl_select1 = "none";
											$chl_select2 = "block";
										} 

									}
									?>
                             		
									<button  id="box1<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px; width: 180px; height: 40px;  margin-right: 15px;   display: <?php echo $chl_select1 ?>;   "    onClick="Saveorder(<?php echo $objResult2["pk"]; ?>)"    > <font color="#FF6633" style="font-size: 17px; "> <img src="images/heart.png"  style="width: 14px; " > &nbsp;  เพิ่มรายการโปรด  </font> </button>
 
                            		 
									<button  id="box2<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px; width: 180px; height: 40px;  margin-right: 15px;   display: <?php echo $chl_select2 ?>;   "       onClick="Saveorderdel(<?php echo $objResult2["pk"]; ?>)" > <font color="#FFF" style="font-size: 17px; "> <img src="images/heart2.png"  style="width: 14px; " > &nbsp;  รายการโปรด  </font> </button>
  
									 <script>
										 function Saveorder(Savedataget) {

										  var checkdata = Savedataget;
										  var int1 = Savedataget;

											 $.ajax({
											 type: "POST",
											 url: "save_fav.php",
											 data: {data1:int1},
											 success: function(result) {
 
												document.getElementById("box1"+int1).style.display = "none";
												document.getElementById("box2"+int1).style.display = "block"; 
 

											 }
										 });
									   }
										 function Saveorderdel(Savedataget) {

										 var checkdata = Savedataget;
										  var int1 = Savedataget;

											 $.ajax({
											 type: "POST",
											 url: "save_fav_del.php",
											 data: {data1:int1},
											 success: function(result) {

												document.getElementById("box2"+int1).style.display = "none";
												document.getElementById("box1"+int1).style.display = "block"; 
 
											 }
										 });
									   }
									 </script>
                      
                             		</td>
                             	</tr>
                             </table>
								  
                            <div  style="margin-top: 10px;"> </div>
                            
                            <font style="font-size: 20px; " color="#CA2421"> รายละเอียด :   </font> <?php echo $objResult2["detail"]; ?>   
                             
							 <div style="margin-top: 20px;">  </div>

							 <font style="font-size: 20px; "> ตัวเลือก :  </font> 
							 
							 <div style="margin-top: 5px;">  </div> 
							 
							 <div class="col-md-12">  
                               
							 <input type="hidden" id="datasaveproduct" value="<?php echo $pksave; ?>"   > 
                             <?php
								$bg = "#FFF"; 
								$border = "";
								$txt = "";
								$no = 1;
								$total1get = 0;
								$display = "";
								$display2 = "";
								$sql4 = "SELECT * FROM product_list  where bill_no = '".$objResult2["bill_no"]."' order by pk asc  "; 
								$query4 = mysqli_query($objCon,$sql4);
								while($objResult4 = mysqli_fetch_array($query4))
								{ 
									if(!empty($objResult4["total"])){
									$total1get = $objResult4["total"];	
									} 

									if(!empty($objResult4["img"])){
									$imgshow = $objResult4["img"];	
									}  
									
									$color = $objResult4["color"];
									$size = $objResult4["size"]; 
									
									$namesize = "";
									$sql_p = "SELECT * FROM typesize where pk = '".$size."' order by pk asc  "; 
									$query_p = mysqli_query($objCon,$sql_p);
									while($objResult_p = mysqli_fetch_array($query_p))
									{ 
										$namesize = $objResult_p["name"];
									}
									$namecolor = "";
									$sql_p = "SELECT * FROM typecolor where pk = '".$color."' order by pk asc  "; 
									$query_p = mysqli_query($objCon,$sql_p);
									while($objResult_p = mysqli_fetch_array($query_p))
									{ 
										$namecolor = $objResult_p["name"];
									}
									 
									
									if($bg == "#FFF"){ 
										$bg = "#F8FAFD"; 
										$border = "  border: 1px solid #FF6633; background-color: #FF6633; ";
										$txt = "#FFF";
										 
									}else{  
										$bg = "#FFF"; 
										$border = "  border: 1px solid #FF6633; background-color: #FFF; ";
										$txt = "#000"; 
									}
									  
									$checkstatus_loop = $objResult4["statusproduct2"];
									$price1_loop = $objResult4["price"];
									$discountget_loop = $objResult4["discount"];
									
									
									$txtget  =  "";
									if(empty($checkstatus_loop)){        
										$txtget  =  "".$price1_loop;
								 	}else if($checkstatus_loop == "ราคาปกติ"){    
										$txtget  =  "".$price1_loop;     

									}else if($checkstatus_loop == "ลดราคา"){ 

									$price_cal = $price1_loop;
									$discount_cal = $discountget_loop;

									$newprice_cal = $price_cal * ($discount_cal/100);
									$newprice2_cal = $price_cal  - $newprice_cal ;
										
									$txtget  =  "".$price1_loop;     
									$txtget2  =  "".$newprice2_cal;     
										
									}
										
										
								?> 
								
								<button type="button" class="btn btn-sm"     style="  border-radius: 5px;  <?php echo $border; ?>    " id="btns<?php echo $no; ?>"  onClick="Calbtndata<?php echo $no; ?>(<?php echo $no; ?>)"    >    
								<font color="<?php echo $txt; ?>" id="textdata<?php echo $no; ?>" > ไซต์  <?php echo $namesize; ?>  สี <?php echo $namecolor; ?>   	  </font>	 
								</button>
								
								<input type="hidden" id="loopdata" value="<?php echo $loopbtn; ?>"   > 
								<input type="hidden" id="priceshdata<?php echo $no; ?>" value="<?php echo $txtget; ?>"   >
								<input type="hidden" id="priceshsdata<?php echo $no; ?>" value="<?php echo $txtget2; ?>"   >
								
								
								<input type="hidden" id="data<?php echo $no; ?>" value="<?php echo $objResult4["pk"]; ?>"   > 
								<input type="hidden" id="menuid<?php echo $no; ?>" value="<?php echo $objResult4["img"]; ?>"   >
								<input type="hidden" id="pricesh<?php echo $no; ?>" value="<?php echo $objResult4["price"]; ?>"   >
								<input type="hidden" id="totalsh<?php echo $no; ?>" value="<?php echo $objResult4["total"]; ?>"   >
								<input type="hidden" id="checkstatus_loop<?php echo $no; ?>" value="<?php echo $checkstatus_loop; ?>"   >
								<script>
								function Calbtndata<?php echo $no; ?>(Savedata)
								{
									///alert("Asdfadsf" + Savedata);
									
									var loopdata = document.getElementById("loopdata").value; 
									var getdatasave = document.getElementById("data<?php echo $no; ?>").value;
									var menuid = document.getElementById("menuid<?php echo $no; ?>").value;  
									var pricesh = document.getElementById("pricesh<?php echo $no; ?>").value;  
									var totalsh = document.getElementById("totalsh<?php echo $no; ?>").value;  
									var checkstatus_loop = document.getElementById("checkstatus_loop<?php echo $no; ?>").value;  
									var priceshdata = document.getElementById("priceshdata<?php echo $no; ?>").value;  
									var priceshsdata = document.getElementById("priceshsdata<?php echo $no; ?>").value;  

									
									document.getElementById("datasaveproduct").value = getdatasave;
									Loadtable();
									
									
									 if(menuid == ""){
										 
									 }else if(menuid == "null"){
										 
									 }else{
										$('#product-detail').attr('src', "img/"+menuid);
									 } 
									
									 document.getElementById("txtprice").innerHTML = " "+pricesh;
									 document.getElementById("showtxttotal").innerHTML = " สินค้าคงเหลือ "+totalsh;
									 
									if(checkstatus_loop == ""){
									 document.getElementById("txtprice").innerHTML = " ฿ "+priceshdata;
									}else if(checkstatus_loop == "ราคาปกติ"){
									 document.getElementById("txtprice").innerHTML = " ฿ "+priceshdata;
									}else if(checkstatus_loop == "ลดราคา"){
										
										
									 document.getElementById("txtprice").innerHTML = " <font color='#DCDCDC' ><span style='text-decoration: line-through;'  > </fon> ฿ "+priceshdata+" </span>  </font>    &nbsp;  <font color='#FF6633' ></fon> ฿ "+priceshsdata+" </font>   ";
										
										
										
									} 
									 
									for (i2 = 1; i2 <= loopdata; i2++) {

										if(i2 == Savedata){ 
											 document.getElementById("textdata"+i2).style.color = "#FFF";
											 document.getElementById("btns"+i2).style.backgroundColor = "#FF6633";


										}else{

											 document.getElementById("textdata"+i2).style.color = "#000";
											 document.getElementById("btns"+i2).style.backgroundColor = "#FFF";
										}
									}
									
									
									
								}
								</script>
								 
                              <?php $no++; } ?>
                               </div>  
                               
                               
							 <div style="margin-top: 20px;">  </div>
                            
                        	<div class=" col-lg-12">
                             <font style="font-size: 20px; "> ราคา :  </font> 
                             
                             <font style="font-size: 20px; " color="#AD2323" id="txtprice"> 
                              
                              <?php if(empty($checkstatus2)){ ?>
								  ฿ <?php echo number_format(0+$price1, '2', '.', ','); ?>     

								<?php }else if($checkstatus2 == "ราคาปกติ"){ ?>
								  ฿ <?php echo number_format(0+$price1, '2', '.', ','); ?>    

								<?php }else if($checkstatus2 == "ลดราคา"){ 

								$price = $price1;
								$discount = $discountget;

								$newprice = $price * ($discount/100);
								$newprice2 = $price  - $newprice ;
								?>  
                            	<font color="#DCDCDC" class=" " >
								<span style="text-decoration: line-through; "> 
								 </fon> ฿ <?php echo number_format(0+$price1, '2', '.', ','); ?>  
								</span> 
						   		</font>  
								  &nbsp; 
								<font color="#FF6633" class=" " ></fon> ฿ <?php echo number_format(0+$newprice2, '2', '.', ','); ?> </font>  
                              <?php } ?>   
                             
                             </font> บาท 
                             
							 <div style="margin-top: 20px;">  </div>
                            
                             <font style="font-size: 20px; "> ค่าจัดส่ง :  </font> <font style="font-size: 20px; " color="#AD2323"> <?php echo number_format(0+100); ?>       </font>   บาท   
    
							</div>
                             
   
							 <div style="margin-top: 10px;">  </div>
							  <input type="hidden" name="product-quanity" id="product-quanity" style=" font-size: 20px; " value="1">
                               
                               <?php if(!empty($_SESSION["UserID2"])){ ?>
                               
                                    <div class="col-lg-12">  
										<table width="100%">
										<tr>
										<td>
										จำนวน	&nbsp;&nbsp; 			
										<button  type="button"  class="btn btn-sm"  style="height: 40px; width: 40px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FFF8F5;"  onClick="Deltotal()"   >   
										<img src="images/aa2.png" style=" width: 18px;" >  </button> 

										&nbsp;
										<button  type="button"  class="btn btn-sm"   style=" border-radius: 5px;  border: 1px solid #FFF; background-color: #FFF;" >   
										<font  id="showtxt" style=" font-size: 30px; " >   
										1         
										</font>  
										</button>  

										  &nbsp;
										<button type="button" class="btn btn-sm"  style="height: 40px; width: 40px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FF6633;"   onClick="Addtotal()"  >   
										<img src="images/aa1.png" style=" width: 18px;"  >   </button>

									  	&nbsp; &nbsp; 
										<font  id="showtxttotal" style=" font-size: 18px; " color="#808080" >   
										  สินค้าคงเหลือ  <?php echo $total1; ?>      
										</font> 
 
										
										</td>
										</tr>
										</table>
                                            
                                            <script >
												 function Addtotal( ) { 
													  
												   var gettotal =	document.getElementById("product-quanity").value;
 
												    	if(gettotal == ""){

													   }else{
														   var showtot1 =  parseInt(gettotal) + 1;
														   document.getElementById("product-quanity").value = showtot1;
														   document.getElementById("showtxt").innerHTML = showtot1; 
													   }
												}
												 
												 function Deltotal( ) { 
													  
												   var gettotal =	document.getElementById("product-quanity").value;
													   if(gettotal == ""){

													   }else{
														   var showtot1 =  parseInt(gettotal) - 1;

														   if(showtot1 < 1){

														   }else{
															 document.getElementById("product-quanity").value = showtot1; 
															 document.getElementById("showtxt").innerHTML = showtot1;
														   }

													   }
												}
												 
											</script>
                                              
                                    </div>
                                    
                                
                               	    <div class="row pb-3">  
                                    <div class="col col-md-12"> 
                						<button type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633; margin-bottom: 10px; margin-top: 40px;   margin-right: 0px;  border-radius: 5px; width: 180px; height: 45px;     "   onClick="Saveordercart()"    > <font color="#FF6633" style="font-size: 17px; "> <img src="images/cart.png"  style="width: 17px; " >  หยิบลงตะกร้า  </font> </button>
				  
               							<a href="index.php"> 
                						<button type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633; margin-bottom: 10px; margin-top: 40px;  margin-right: 0px;   border-radius: 5px; width: 180px; height: 45px;   "     onClick="Saveordercart()"    > <font color="#FFF" style="font-size: 17px; ">  ซื้อสินค้า  </font> </button>  
               							</a>
                                    </div>
                                    </div>
                                    
                                    
                                    <script>
											 function Saveordercart() { 
											   var savepk =	document.getElementById("datasaveproduct").value; 
											   var gettotal =	document.getElementById("product-quanity").value;
											   var int1 =	document.getElementById("product-quanity").value;

												 
												 $.ajax({
												 type: "POST",
												 url: "save_cart.php?savepk="+savepk+"&total="+gettotal,
												 data: {data1:int1},
												 success: function(result) {

													var check_number = result.ans; 
													if(check_number == 0){
 
													 	alert(" ลงตะกร้าสำเร็จ ");

													}else{  
														alert(' จำนวนสินค้าคงเหลือไม่พอ ');	  

													}


												 }
											 });
										   } 
										 </script>
                                 
                               <?php }else{ ?>
                                
                                    	<div class="col-lg-12">  
										<table width="100%">
										<tr>
										<td>
										จำนวน	&nbsp;&nbsp; 			
										<button  type="button"  class="btn btn-sm"  style="height: 40px; width: 40px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FFF8F5;"  onClick="Deltotal()"   >   
										<img src="images/aa2.png" style=" width: 18px;" >  </button> 

										&nbsp;
										<button  type="button"  class="btn btn-sm"   style=" border-radius: 5px;  border: 1px solid #FFF; background-color: #FFF;" >   
										<font  id="showtxt" style=" font-size: 30px; " >   
										1         
										</font>  
										</button>  

										  &nbsp;
										<button type="button" class="btn btn-sm"  style="height: 40px; width: 40px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FF6633;"   onClick="Addtotal()"  >   
										<img src="images/aa1.png" style=" width: 18px;"  >   </button>

									  	&nbsp; &nbsp; 
										<font  id="showtxttotal" style=" font-size: 18px; " color="#808080" >   
										  สินค้าคงเหลือ  <?php echo $total1; ?>      
										</font> 
										
										</td>
										</tr>
										</table>
                                            
                                            <script >
												 function Addtotal( ) { 
													  
												   var gettotal =	document.getElementById("product-quanity").value;
 
												    	if(gettotal == ""){

													   }else{
														   var showtot1 =  parseInt(gettotal) + 1;
														   document.getElementById("product-quanity").value = showtot1;
														   document.getElementById("showtxt").innerHTML = showtot1; 
													   }
												}
												 
												 function Deltotal( ) { 
													  
												   var gettotal =	document.getElementById("product-quanity").value;
													   if(gettotal == ""){

													   }else{
														   var showtot1 =  parseInt(gettotal) - 1;

														   if(showtot1 < 1){

														   }else{
															 document.getElementById("product-quanity").value = showtot1; 
															 document.getElementById("showtxt").innerHTML = showtot1;
														   }

													   }
												}
												 
											</script>
                                              
                                    	</div>  
                                    
										<div class="row pb-3">  
										<div class="col col-md-12"> 
											<button type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633; margin-bottom: 10px; margin-top: 40px;   margin-right: 0px;  border-radius: 5px; width: 180px; height: 45px;     "   onClick="Saveordercart2()"      > <font color="#FF6633" style="font-size: 17px; "> <img src="images/cart.png"  style="width: 17px; " >  หยิบลงตะกร้า  </font> </button>

											<a href="index.php"> 
											<button type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633; margin-bottom: 10px; margin-top: 40px;  margin-right: 0px;   border-radius: 5px; width: 180px; height: 45px;   "    onClick="Saveordercart2()"  > <font color="#FFF" style="font-size: 17px; ">  ซื้อสินค้า  </font> </button>  
											</a>
										</div>
										</div>
                                 
                                 
                                 		<script>
											 function Saveordercart2() { 
											  
													 	alert(" กรุณาล็อกอิน ");
 
										   } 
										 </script>
                               <?php } ?> 
                             

                        </div>
                    </div>
                </div>
            </div>
   	    
	   	  </div> 
	   	  </div> 
        
         
        
        <div class="col-lg-12"  style="margin-top: 30px;">
        	<hr>
        </div>
        
        
		<div  style="margin-top: 10px;"> </div>

		<font style="font-size: 20px; " color="#CA2421"> รีวิวผู้ใช้งาน :   </font>  
        
        
        <script>
		$( document ).ready(function() {   
			 Loadtable();    
		});

		function Loadtable()
		{      
		 	var productgetdata = document.getElementById("datasaveproduct").value; 
			   
			$.ajax({
				type: "GET",
				url: "loadcomment.php?productment="+productgetdata,
				success: function(result) {
				$('#showcomment').html(result);
				}
			});	  	
			
			
			$.ajax({
				type: "GET",
				url: "loadcomment_top.php?productment="+productgetdata,
				success: function(result) {
				$('#showcomment2').html(result);
				}
			});	  
		}  
        </script>
			
			
        <div class="col-lg-12"  style="margin-top: 30px;" id="showcomment">
           
        </div>
        
         
    </section>
    <!-- End Categories of The Month -->

	<?php } ?>
    
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">   
                <h1 class="h1">
                <font color="#000"  style="font-size: 25px;" >
                สินค้าในหมวดเดียวกัน
                </font> 
                </h1>
                 
            </div>
        </div>
        
         <div class="row  ">
          
       <style>    
	  .imgresizeshowdata{ 
		  height: 200px;
	 }
	  @media only screen and (max-width: 767px){ 
		 .imgresizeshowdata{  width: 100%; height:  310px;   }
	  }  
	  @media only screen and (max-width: 767px){ 
		 .leftmobiledata{  margin-left: 10px; margin-right: 10px;   } 
	  }  
	</style>
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
         
             <?php 
			$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			$sql2 = "SELECT a.*, b.price, b.img FROM product a  Inner Join product_list b On a.bill_no = b.bill_no order by a.pk desc limit 4   "; 
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{  

				$img = ""; 
				$img = $objResult2["img"];
				
				$img_all = $img; 
 

				$chl_select1 = "block";
				$chl_select2 = "none";
 
						 
			?> 
         
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " >
            <div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >
                
			<a href="detail.php?product=<?php echo $objResult2["pk"]; ?>" > 
              	  
                 
               <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">
               
                <div class="container2"> 
                
                   
                    <?php if(empty($img_all)){ ?>
					<img src="img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php }else{ ?>
					<img src="img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php } ?>
               
               
  
				  </div>
                 
                <div class="product-info" style=" border: 0px solid #000; ">
                   <div align="center"> 
                     
                        
                    <button type="button" class="btn btn-sm "  style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " >  <font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?> </font>   </button> 
                      
                   </div>
                   </div>
                </div>
                      
			</a>                      
             </div> 
		    </div> 
         
      		<?php } ?>
         </div>
         
    </section>

<?php 

include('footer.php');

?>