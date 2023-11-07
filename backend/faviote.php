<?php 
session_start();
$_SESSION["load"] = "5";
include('header.php'); 
 
?>  
        
	 																		
										
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  รายการโปรด    </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > รายการโปรด    </font>   
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
                     <font size="4px" color="#000000" class="serif">  รายการโปรด    </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                         
					<style>    
					  .imgresizeshowdata{ 
						  padding-top: 10px;
						  height: 200px;
					 }
					  @media only screen and (max-width: 767px){ 
						 .imgresizeshowdata{  width: 100%; height:  310px;   }
					  }  
					  @media only screen and (max-width: 767px){ 
						 .leftmobiledata{  margin-left: 10px; margin-right: 10px;   } 
					  }  
					</style>
				 
                    	  
                    
                    
                     <div class="row  ">
          
					   <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>

						<?php 
						$i = 1;  
						$loop = 1;  
						$img_all = ""; 

						$i = 1;  
						$img_all = ""; 

						$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount
						FROM product a  
						Inner Join product_list b On a.bill_no = b.bill_no 
						Inner Join list_order_fav c On a.pk = c.menu_id 
						where  c.create_by = '".$_SESSION["UserID2"]."' and c.typedata = 'product'
						Group by a.pk
						order by a.pk desc   ";  
						$query2 = mysqli_query($objCon,$sql2);
						while($objResult2 = mysqli_fetch_array($query2))
						{  

							$img = ""; 
							$img = $objResult2["img"];

							$img_all = $img; 


							$chl_select1 = "block";
							$chl_select2 = "none";

							$checkstatus2 = $objResult2["statusproduct2"];
								
								
							$chl_select1 = "block";
							$chl_select2 = "none";

							if(!empty($_SESSION["UserID2"])){

								$sql4 = "SELECT * FROM list_order_fav  where menu_id = '".$objResult2["pk"]."'  and  create_by = '".$_SESSION["UserID2"]."'   order by pk asc  ";  
								$query4 = mysqli_query($objCon,$sql4);
								while($objResult4 = mysqli_fetch_array($query4))
								{  
									$chl_select1 = "none";
									$chl_select2 = "block";
								} 

							}

						?> 
        
						<div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " id="HDD<?php echo $objResult2["pk"]; ?>" >
								 
						<div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >

						    <style> 
								.top-rightbg {
								  position: absolute;
								  top: 1px;
								  right: 5px;
								}
							   .container2 {
								  position: relative;
								  text-align: center;
								  color: white;
								}
							</style> 
					   
						   <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">

							<div class="container2"> 
 
							   <?php if(empty($img_all)){ ?>
								<img src="../img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
							   <?php }else{ ?>
								<img src="../img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
							   <?php } ?>
 
							  <div class="top-rightbg">
							  
								<button  id="box1<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px;   height: 40px;   margin-top: 5px;   display: <?php echo $chl_select1 ?>;   "    onClick="Saveorder(<?php echo $objResult2["pk"]; ?>)"    > <font color="#FF6633" style="font-size: 17px; "> <img src="images/heart.png"  style="width: 11px; " > &nbsp;  เพิ่มรายการโปรด  </font> </button>
 
                            		 
								<button  id="box2<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px;   height: 40px;  margin-top: 5px;  display: <?php echo $chl_select2 ?>;   "       onClick="Saveorderdel(<?php echo $objResult2["pk"]; ?>)" > <font color="#FFF" style="font-size: 17px; "> <img src="images/heart2.png"  style="width: 11px; " > &nbsp;  รายการโปรด  </font> </button>
  
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

												document.getElementById("HDD"+int1).style.display = "none";
												document.getElementById("box2"+int1).style.display = "none";
												document.getElementById("box1"+int1).style.display = "block"; 
 
											 }
										 });
									   }
									 </script>
									   
							  </div> 
							  </div>

 
								<div class="product-info" style=" border: 0px solid #000; ">
							   <div align="center"> 
								<style>   
								.imgresize{ font-size: 15px;  }
								@media only screen and (max-width: 767px){ 
									.imgresize{ font-size: 17px;   }
								} 

								.imgresizeshow{ width: 15px;
																		}
								@media only screen and (max-width: 767px){ 
									 .imgresizeshow{ width: 15px;   }
								} 
								</style>


								<?php if(empty($checkstatus2)){ ?>
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " >  <font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?> </font>   
								</div>

								<?php }else if($checkstatus2 == "ราคาปกติ"){ ?>
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " >  <font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?> </font>   
								</div>

								<?php }else if($checkstatus2 == "ลดราคา"){ 

								$price = $objResult2["price"];
								$discount = $objResult2["discount"];

								$newprice = $price * ($discount/100);
								$newprice2 = $price  - $newprice ;
								?> 
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " > 
								<font color="#DCDCDC" class="imgresize" >
								<span style="text-decoration: line-through; "> 
								 </fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>  
								</span>
								</font>   

								  &nbsp;

								<font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$newprice2, '2', '.', ','); ?> </font>   
								</div>

								<?php } ?>


								  <div style="margin-top: 5px;">  </div>



							   </div>
							   </div>
							</div>

						 </div> 
								  
						</div>

						<?php } ?>
						
						
						
						<?php 
						$i = 1;  
						$loop = 1;  
						$img_all = ""; 

						$i = 1;  
						$img_all = ""; 

						$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount
						FROM product_pre a  
						Inner Join product_list_pre b On a.bill_no = b.bill_no 
						Inner Join list_order_fav c On a.pk = c.menu_id 
						where  c.create_by = '".$_SESSION["UserID2"]."' and c.typedata = 'preorder'
						Group by a.pk
						order by a.pk desc   ";   
						$query2 = mysqli_query($objCon,$sql2);
						while($objResult2 = mysqli_fetch_array($query2))
						{  

							$img = ""; 
							$img = $objResult2["img"];

							$img_all = $img; 


							$chl_select1 = "block";
							$chl_select2 = "none";

							$checkstatus2 = $objResult2["statusproduct2"];
								
								
							$chl_select1 = "block";
							$chl_select2 = "none";

							if(!empty($_SESSION["UserID2"])){

								$sql4 = "SELECT * FROM list_order_fav  where menu_id = '".$objResult2["pk"]."'  and  create_by = '".$_SESSION["UserID2"]."'   order by pk asc  ";  
								$query4 = mysqli_query($objCon,$sql4);
								while($objResult4 = mysqli_fetch_array($query4))
								{  
									$chl_select1 = "none";
									$chl_select2 = "block";
								} 

							}

						?> 
        
						<div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " id="HDD<?php echo $objResult2["pk"]; ?>" >
								 
						<div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >

						    <style> 
								.top-rightbg {
								  position: absolute;
								  top: 1px;
								  right: 5px;
								}
							   .container2 {
								  position: relative;
								  text-align: center;
								  color: white;
								}
							</style> 
					   
						   <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">

							<div class="container2"> 
 
							   <?php if(empty($img_all)){ ?>
								<img src="../img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
							   <?php }else{ ?>
								<img src="../img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
							   <?php } ?>
 
							  <div class="top-rightbg">
							  
								<button  id="box1<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px;   height: 40px;   margin-top: 5px;   display: <?php echo $chl_select1 ?>;   "    onClick="Saveorder(<?php echo $objResult2["pk"]; ?>)"    > <font color="#FF6633" style="font-size: 17px; "> <img src="images/heart.png"  style="width: 11px; " > &nbsp;  เพิ่มรายการโปรด  </font> </button>
 
                            		 
								<button  id="box2<?php echo $objResult2["pk"]; ?>"  type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633;     margin-right: 0px;  border-radius: 5px;   height: 40px;  margin-top: 5px;  display: <?php echo $chl_select2 ?>;   "       onClick="Saveorderdel(<?php echo $objResult2["pk"]; ?>)" > <font color="#FFF" style="font-size: 17px; "> <img src="images/heart2.png"  style="width: 11px; " > &nbsp;  รายการโปรด  </font> </button>
  
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

												document.getElementById("HDD"+int1).style.display = "none";
												document.getElementById("box2"+int1).style.display = "none";
												document.getElementById("box1"+int1).style.display = "block"; 
 
											 }
										 });
									   }
									 </script>
									   
							  </div> 
							  </div>

 
								<div class="product-info" style=" border: 0px solid #000; ">
							   <div align="center"> 
								<style>   
								.imgresize{ font-size: 15px;  }
								@media only screen and (max-width: 767px){ 
									.imgresize{ font-size: 17px;   }
								} 

								.imgresizeshow{ width: 15px;
																		}
								@media only screen and (max-width: 767px){ 
									 .imgresizeshow{ width: 15px;   }
								} 
								</style>


								<?php if(empty($checkstatus2)){ ?>
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " >  <font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?> </font>   
								</div>

								<?php }else if($checkstatus2 == "ราคาปกติ"){ ?>
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " >  <font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?> </font>   
								</div>

								<?php }else if($checkstatus2 == "ลดราคา"){ 

								$price = $objResult2["price"];
								$discount = $objResult2["discount"];

								$newprice = $price * ($discount/100);
								$newprice2 = $price  - $newprice ;
								?> 
								<div   style=" background-color: #FFF; border: 1px solid #FFF; width: 85%; border-radius: 5px; " > 
								<font color="#DCDCDC" class="imgresize" >
								<span style="text-decoration: line-through; "> 
								 </fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>  
								</span>
								</font>   

								  &nbsp;

								<font color="#FF6633" class="imgresize" ></fon> ฿ <?php echo number_format(0+$newprice2, '2', '.', ','); ?> </font>   
								</div>

								<?php } ?>


								  <div style="margin-top: 5px;">  </div>



							   </div>
							   </div>
							</div>

						 </div> 
								  
						</div>

						<?php } ?>
					 </div>
                      
                      	  
                        
                       
                        
                  		   
                   	  <?php } ?>
                   		    
						<div class="col-lg-12">
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