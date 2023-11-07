<?php
include('header.php');


	$searchname = "";
	if(empty($_GET["searchname"])){
		
	}else{
		$searchname = $_GET["searchname"];
	}
?> 

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
				 
				 
    <section class="product_section layout_padding" style="   background-image: url('images/bg1.png');   background-position: center; background-repeat: no-repeat; background-size: cover;"  >
     
    <style>   
	.fulldata{     
		margin-right: 150px;
		margin-left: 150px; 
	}
	@media only screen and (max-width: 767px){ 
		.fulldata{  
		  width: 100%;
		  padding-right: 15px;
		  padding-left: 15px;
		  margin-right: auto;  
		  margin-left: auto;  
		
		}
	}  
	</style>
				  
    <div class="container    " style="border: 0px solid #FFF; margin-top: 15px; " >
      <div class=" row leftmobiledata " >
      
       <div class=" col-lg-12  " align="left"  >
        <font color="#F9502F" style="font-size: 17px; ">
           สินค้าขายดี  
        </font> 
      </div>
      
       <style>   
			.imgresdataf{ 
				height: 180px; 
			}
			@media only screen and (max-width: 767px){ 
			.imgresdataf{    }
			} 
	   </style>
      
       <div class=" col-lg-12  "  style="margin-top: 0px; " ></div>
        			
       <div class="col-lg-12"> 
       
       <div class="row  ">
          
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
         
            <?php 
			$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount
			FROM product a  Inner Join product_list b On a.bill_no = b.bill_no 
			where b.statusproduct = 'พร้อมจำหน่าย'
			
			order by a.pk desc limit 9   "; 
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{  

				$img = ""; 
				$img = $objResult2["img"];
				
				$img_all = $img; 
 

				$chl_select1 = "block";
				$chl_select2 = "none";
 
				$checkstatus2 = $objResult2["statusproduct2"];
				
						 
			?> 
        
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " >
                    <a href="detail.php?product=<?php echo $objResult2["pk"]; ?>" style="text-decoration: none; " > 
            <div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >
                 
               <style> 
					.top-right {
					  position: absolute;
					  top: 1px;
					  right: 10px;
					}
				   .container {
					  position: relative;
					  text-align: center;
					  color: white;
					}
				</style> 
               <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">
               
                <div class="container2"> 
                
                   
                   <?php if(empty($img_all)){ ?>
					<img src="img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php }else{ ?>
					<img src="img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php } ?>
               
               
 
				  <div class="top-right">
				  <button type="button" class="btn " style="  margin-right: -15px;  background-image: url('images/bookmark.png');   background-position: center; background-repeat: no-repeat; background-size: cover; height: 65px;  ">
				   <div style="margin-top: -20px;"></div>
				   <font color="#FFF" style="font-size: 4px; ">   สินค้า    </font>
				   <div style="margin-top: -12px;"></div>
				   <font color="#F9502F" style="font-size: 11px; "> <b>      ขายดี	 </b>  </font>
				  </button> 
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
                    </a>  
		    </div>
         
      		<?php } ?>
         </div>
        
	   </div>  
	    
        
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
      
       <div class=" col-lg-12  " align="left"  >
        <font color="#F9502F" style="font-size: 17px; ">
           สินค้าลดราคา  
        </font> 
       </div>
      
      
       <div class=" col-lg-12  "  style="margin-top: 0px; " ></div>
        			
       <div class="col-lg-12"> 
       
       <div class="row  ">
          
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
         
             <?php 
			$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			 
			$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount
			FROM product a  Inner Join product_list b On a.bill_no = b.bill_no 
			where b.statusproduct = 'พร้อมจำหน่าย'
			 order by a.pk desc limit 9   "; 
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{  

				$img = ""; 
				$img = $objResult2["img"];
				
				$img_all = $img; 
 

				$chl_select1 = "block";
				$chl_select2 = "none";
 
				$checkstatus2 = $objResult2["statusproduct2"];
						 
			?> 
         
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " >
            <div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >
                
			<a href="detail.php?product=<?php echo $objResult2["pk"]; ?>" style="text-decoration: none; " > 
              	  
               <style> 
					.top-right {
					  position: absolute;
					  top: 1px;
					  right: 10px;
					}
				   .container {
					  position: relative;
					  text-align: center;
					  color: white;
					}
				</style> 
               <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">
               
                <div class="container2"> 
                
                   
                    <?php if(empty($img_all)){ ?>
					<img src="img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php }else{ ?>
					<img src="img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php } ?>
               
               
 
				  <div class="top-right">
				  <button type="button" class="btn " style="  margin-right: -15px;  background-image: url('images/bookmark.png');   background-position: center; background-repeat: no-repeat; background-size: cover; height: 65px;  ">
				   <div style="margin-top: -20px;"></div>
				   <font color="#FFF" style="font-size: 4px; ">   สินค้า    </font>
				   <div style="margin-top: -12px;"></div>
				   <font color="#F9502F" style="font-size: 11px; "> <b>      ขายดี	 </b>  </font>
				  </button> 
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
                      
			</a>                      
             </div> 
		    </div> 
         
      		<?php } ?>
         </div>
        
	   </div>  
      
       
    </div>
    </div>
    
    
     <div class="col-lg-12">  <br> <br> </div>
    </section>

 
  
     
    <section class="product_section layout_padding" style="   background-image: url('images/bg2.png');   background-position: center; background-repeat: no-repeat; background-size: cover;"  >
     
    <style>   
	.fulldata{     
		margin-right: 150px;
		margin-left: 150px; 
	}
	@media only screen and (max-width: 767px){ 
		.fulldata{  
		  width: 100%;
		  padding-right: 15px;
		  padding-left: 15px;
		  margin-right: auto;  
		  margin-left: auto;  
		
		}
	}  
	</style>
				  
    <div class="container    " style="border: 0px solid #FFF; margin-top: 15px; " >
      <div class=" row    leftmobiledata" >
      
       <div class=" col-lg-12  " align="left"  >
        <font color="#F9502F" style="font-size: 17px; ">
           สินค้าพรีออเดอร์  
        </font> 
      </div>
      
       <style>   
			.imgresdataf{ 
				height: 180px; 
			}
			@media only screen and (max-width: 767px){ 
			.imgresdataf{    }
			} 
	   </style>
      
       <div class=" col-lg-12  "  style="margin-top: 0px; " ></div>
        			
       <div class="col-lg-12"> 
       
       <div class="row  ">
          
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
         
           
            <?php 
			$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			$sql2 = "SELECT a.*, b.price, b.img, b.statusproduct2, b.discount, b.pk as newpk
			FROM product_pre a  Inner Join product_list_pre b On a.bill_no = b.bill_no  
			where b.statusproduct = 'พร้อมจำหน่าย'
			and a.onoff = '' 
			order by a.pk desc limit 9   "; 
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{  

				$img = ""; 
				$img = $objResult2["img"];
				
				$img_all = $img; 
 

				$chl_select1 = "block";
				$chl_select2 = "none";
 
						 
				$checkstatus2 = $objResult2["statusproduct2"];
			?> 
        
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " >
			<a href="detail2.php?product=<?php echo $objResult2["pk"]; ?>" style=" text-decoration: none; " > 
            <div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >
                
              	  
               <style> 
					.top-right {
					  position: absolute;
					  top: 1px;
					  right: 10px;
					}
				   .container {
					  position: relative;
					  text-align: center;
					  color: white;
					}
				</style> 
               <div class="product border-theme" style="border: 0px solid #EDEDED; border-radius: 0px; ">
               
                <div class="container2"> 
                 
                   <?php if(empty($img_all)){ ?>
					<img src="img/p1.png" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php }else{ ?>
					<img src="img/<?php echo $img_all; ?>" alt="product" class="img-fluid imgresizeshowdata"  >
				   <?php } ?>
                
				  <div class="top-right">
				  <button type="button" class="btn " style="  margin-right: -15px;  background-image: url('images/bookmark.png');   background-position: center; background-repeat: no-repeat; background-size: cover; height: 65px;  ">
				   <div style="margin-top: -20px;"></div>
				   <font color="#FFF" style="font-size: 4px; ">   สินค้า    </font>
				   <div style="margin-top: -12px;"></div>
				   <font color="#F9502F" style="font-size: 11px; "> <b>  ขายดี	 </b>  </font>
				  </button> 
				  </div> 
				  </div>
                 
                 <div class="product-info" style=" border: 0px solid #000; ">
                   <div align="center"> 
                   <style>   
				    .imgresize{ font-size: 17px;  }
					@media only screen and (max-width: 767px){ 
						.imgresize{ font-size: 17px;   }
					} 

					.imgresizeshow{ width: 15px;
															}
					@media only screen and (max-width: 767px){ 
						 .imgresizeshow{ width: 15px;   }
					} 
					</style>
                     
                     
                     <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
					 <h6>
						<font color="#000"> 
						<?php echo $objResult2["name"]; ?>
						<div style="  margin-top: 10px; " align="left">
						<font color="#000" style=" font-size: 12px; "> 

						  <font color="#FF6633" style=" font-size: 12px; " >  
						   
						   		<?php if(empty($checkstatus2)){ ?>
								  ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>     

								<?php }else if($checkstatus2 == "ราคาปกติ"){ ?>
								  ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>    

								<?php }else if($checkstatus2 == "ลดราคา"){ 

								$price = $objResult2["price"];
								$discount = $objResult2["discount"];

								$newprice = $price * ($discount/100);
								$newprice2 = $price  - $newprice ;
								?>  
								<font color="#DCDCDC" class=" " >
								<span style="text-decoration: line-through; "> 
								 </fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>  
								</span> 
						   		</font> 

								  &nbsp;

								<font color="#FF6633" class=" " ></fon> ฿ <?php echo number_format(0+$newprice2, '2', '.', ','); ?> </font>  

								<?php } ?>
						   
						    
						   </font> 
						  <div style="  margin-top: 10px; " >   </div> 

						</font>
						</div>
						</font>
					 </h6>
                     </div>
                     
                     
                     <?php 
						$calstar = 0;
						$total = 0;
						$getpro = $objResult2["newpk"];
						$sql_star = "SELECT * FROM list_order where menu_id = '".$getpro."' and star != '' order by pk desc "; 
						$query_star = mysqli_query($objCon,$sql_star); 
						while($objResult_star = mysqli_fetch_array($query_star))
						{  
							$calstar += $objResult_star["star"];
							$total++;
						}
				
							$calstartotal = 0;
							if($total <= 0){ 
							}else{ 
							$calstartotal = $calstar / $total; 
							}
					 ?>
                     <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
                     <table width="100%">
                     	<tr>
                     		<td width="40%">  
								<?php if($calstartotal == 5){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 4){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 3){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 2){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 1){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else{ ?>
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
                    		    <?php } ?>
                     		    <font color="#000" style=" font-size: 10px; " > (<?php echo number_format(0+$calstar); ?>)  </font> 
								</td>
                     		<td align="right" >   
                     		 
                     		 
							<button type="button" class="btn btn-sm "  style=" background-color: #F53D2D; border: 1px solid #F53D2D;  border-radius: 5px; " >  <font color="#FFF" class="imgresize"  style=" font-size: 10px; " >  เวลาปิดรับพรีออเดอร์ <?php echo $objResult2["timeend"]; ?> </font>   </button>
							 
                     		</td>
                     	</tr>
                     </table>
                	 </div>
                      
                    
                     <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
                      
                	 </div>
                      
                   </div>
                   </div>
                </div>
                                          
             </div> 
             </a> 
		    </div>
         
      		<?php } ?>
           
           
            
         </div>
        
	   </div>  
	     
      
    </div>
    </div> 
			    
			   
    
     <div class="col-lg-12">  <br> <br> </div>
    </section>
      
    <section class="product_section layout_padding" style="    "  >
     
    <style>   
	.fulldata{     
		margin-right: 150px;
		margin-left: 150px; 
	}
	@media only screen and (max-width: 767px){ 
		.fulldata{  
		  width: 100%;
		  padding-right: 15px;
		  padding-left: 15px;
		  margin-right: auto;  
		  margin-left: auto;  
		
		}
	}  
	</style>
				  
   <?php  
	$sql_type = "SELECT *   FROM typeproduct   order  by pk asc   "; 
	$query_type = mysqli_query($objCon,$sql_type);
	while($objResult_type = mysqli_fetch_array($query_type))
	{  
		
	?>
    <div class="container    " style="border: 0px solid #FFFFFF; background-color: #FFF; margin-top: 15px; height: 65px; border-bottom: 1px solid #FF6633;  " >
      <div class=" row  leftmobiledata " >
				  
       <div class=" col-lg-10  " align="left"  style="border: 0px solid #FFFFFF; margin-top: 15px;  " >
        <font color="#000" style="font-size: 17px; ">
            <b>  หมวดสินค้า : <?php echo $objResult_type["name"]; ?>     </b>
        </font> 
      </div>  
       <div class=" col-lg-2  " align="right"  style="border: 0px solid #FFFFFF; margin-top: 15px;  " >
       <a  href="preorder.php?typedata=<?php echo $objResult_type["pk"]; ?>" style="text-decoration: none; "> 
        <font color="#000" style="font-size: 17px; ">
            <b>  ดูรายการสินค้าทั้งหมด    </b>
        </font> 
       </a>
      </div>
      
      </div>
      </div>
        
    <div class="container    " style="border: 0px solid #FFF; margin-top: 15px; " >
      <div class=" row  leftmobiledata " >
      
       <div class=" col-lg-12  " align="left"  >
        <font color="#F9502F" style="font-size: 17px; ">
              
        </font> 
      </div>
      
       <style>   
			.imgresdataf{ 
				height: 180px; 
			}
			@media only screen and (max-width: 767px){ 
			.imgresdataf{    }
			} 
	   </style>
      
       <div class=" col-lg-12  "  style="margin-top: 0px; " ></div>
        			
       <div class="col-lg-12"> 
       
       <div class="row  ">
          
       <div class=" col-lg-12  "  style="margin-top: 20px; " ></div>
         
	   <?php 
			$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount, b.pk as newpk FROM product_pre a  Inner Join product_list_pre b On a.bill_no = b.bill_no 
			
			Where a.typedata = '".$objResult_type["pk"]."' and b.statusproduct = 'พร้อมจำหน่าย' 
			and a.onoff = '' 
			order by a.pk desc limit 9   "; 
			$query2 = mysqli_query($objCon,$sql2);
			while($objResult2 = mysqli_fetch_array($query2))
			{  

				$img = ""; 
				$img = $objResult2["img"];
				
				$img_all = $img; 
 

				$chl_select1 = "block";
				$chl_select2 = "none";
 
				$checkstatus2 = $objResult2["statusproduct2"];
						 
			?> 
        
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-top: 10px; " >
			<a href="detail2.php?product=<?php echo $objResult2["pk"]; ?>" style=" text-decoration: none; " > 
            <div class="product-box" style="border: 1px solid #EDEDED; background-color: #FFF; border-radius: 10px " >
                 
              	  
               <style> 
					.top-right {
					  position: absolute;
					  top: 1px;
					  right: 10px;
					}
				   .container {
					  position: relative;
					  text-align: center;
					  color: white;
					}
				</style> 
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
                   <style>   
				    .imgresize{ font-size: 17px;  }
					@media only screen and (max-width: 767px){ 
						.imgresize{ font-size: 17px;   }
					} 

					.imgresizeshow{ width: 15px;
															}
					@media only screen and (max-width: 767px){ 
						 .imgresizeshow{ width: 15px;   }
					} 
					</style>
                     
                     
                      <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
					 <h6>
						<font color="#000"> 
						<?php echo $objResult2["name"]; ?>
						<div style="  margin-top: 10px; " align="left">
						<font color="#000" style=" font-size: 12px; "> 

						  <font color="#FF6633" style=" font-size: 12px; " >  
						   
						   		<?php if(empty($checkstatus2)){ ?>
								  ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>     

								<?php }else if($checkstatus2 == "ราคาปกติ"){ ?>
								  ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>    

								<?php }else if($checkstatus2 == "ลดราคา"){ 

								$price = $objResult2["price"];
								$discount = $objResult2["discount"];

								$newprice = $price * ($discount/100);
								$newprice2 = $price  - $newprice ;
								?>  
								<font color="#DCDCDC" class=" " >
								<span style="text-decoration: line-through; "> 
								 </fon> ฿ <?php echo number_format(0+$objResult2["price"], '2', '.', ','); ?>  
								</span> 
						   		</font> 

								  &nbsp;

								<font color="#FF6633" class=" " ></fon> ฿ <?php echo number_format(0+$newprice2, '2', '.', ','); ?> </font>  

								<?php } ?>
						   
						    
						   </font> 
						  <div style="  margin-top: 10px; " >   </div> 

						</font>
						</div>
						</font>
					 </h6>
                     </div>
                     
                     
                     
                     
                     <?php 
						$calstar = 0;
						$total = 0;
						$getpro = $objResult2["newpk"];
						$sql_star = "SELECT * FROM list_order where menu_id = '".$getpro."' and star != '' order by pk desc "; 
						$query_star = mysqli_query($objCon,$sql_star); 
						while($objResult_star = mysqli_fetch_array($query_star))
						{  
							$calstar += $objResult_star["star"];
							$total++;
						}
				
							$calstartotal = 0;
							if($total <= 0){ 
							}else{ 
							$calstartotal = $calstar / $total; 
							}
					 ?>
                    
                    
                     <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
                     <table width="100%">
                     	<tr>
                     		<td width="40%">  
								<?php if($calstartotal == 5){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 4){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 3){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 2){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else if($calstartotal == 1){ ?>
								<img src="images/star.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<?php }else{ ?>
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
								<img src="images/star2.png" style=" width: 10px;" > 
                    		    <?php } ?>
                     		    <font color="#000" style=" font-size: 10px; " > (<?php echo number_format(0+$calstar); ?>)  </font> 
								</td>
                     		<td align="right" >  
                     		 <a href="detail.php?product=<?php echo $objResult2["pk"]; ?>" >  
							<button type="button" class="btn btn-sm "  style=" background-color: #F53D2D; border: 1px solid #F53D2D;  border-radius: 5px; " >  <font color="#FFF" class="imgresize"  style=" font-size: 10px; " >  เวลาปิดรับพรีออเดอร์ <?php echo $objResult2["timeend"]; ?> </font>   </button>
							</a>  
                     		</td>
                     	</tr>
                     </table>
                	 </div>
                      
                    
                     <div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10xp; " align="left">
                      
                	 </div>
                      
                   </div>
                   </div>
                </div>
                     
             
             </div>                       
             </a> 
		    </div>
         
      		<?php } ?>
         </div>
        
	   </div>  
	    
 
      
      
      
    </div>
    </div>
    
     <div class="col-lg-12">  <br>   </div>
     <?php } ?>
    
     <div class="col-lg-12">  <br> <br> </div>
    </section>
      
 <?php
include('footer.php');

?>