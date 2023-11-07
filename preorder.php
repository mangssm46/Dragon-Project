<?php
include('header.php');


	
	$searchname = "";
	$searchname2 = "";
	if(empty($_GET["searchname2"])){
		
	}else{
		$searchname2 = $_GET["searchname2"];
	} 
?> 
 
      
    <!-- end slider section -->
   
    <style>   
	  .imgresizeshowdata{ 
		  height: 200px;
	 }
	  .imgresizeshowdata2{ 
		  height: 200px;
	 }
	  @media only screen and (max-width: 767px){ 
		 .imgresizeshowdata{  width: 100%; height:  300px;   }
		 .imgresizeshowdata2{  width: 100%; height:  300px;   }
	  }  
	</style>
				 
				 
		
     <section class="product_section layout_padding" style="margin-top: 25px; " >
      
     <div class="container    " style="border: 0px solid #FFF; " >
    
       
		 <form action="preorder.php" method="get" >
        
       
         <div class="col-lg-12" style=" background: #F6F6F6; border-radius: 10px;  "  > 
         <div class="row"  align="left" style=" margin-top: 15px; margin-bottom: 15px;  "   > 
          
		  <div class="col-md-3"  align="left" style=" margin-top: 5px; " > <font color="#000" style="font-size: 22px; ">
			  สินค้าพรีออเดอร์ 
			</font>
		  </div>
		  
		  
		  
		
		 <div class="col-md-3"  align="left" style=" margin-top: 5px; "  >  
 
			<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; ">
			<input class="form-control "   type="search" style="background-color: #FFF;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px; height: 35px;   "    id="searchname" name="searchname" value="<?php echo $searchname; ?>"  placeholder=" ค้นหารายชื่อสินค้า "      autocomplete="off"  >

			<span class="input-group-append"  >
			  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FAFAFA;" type="submit">
					<img src="images/search.png" style="width: 15px; "> 
			  </button>
			</span>
			</div> 
    
		 </div>
        
        
		 <div class="col-md-3"  align="left" style=" margin-top: 5px; "  >  </div>
		 <div class="col-md-3"  align="left" style=" margin-top: 5px; "  >  
 
			<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; "> 
			<select class="form-control" id="searchname2" name="searchname2"    style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px;   "   onchange='this.form.submit()' >   
			<?php 
				$sql = "SELECT * FROM drophight where orderdarta = '".$searchname2."' order by pk asc  "; 
				$query = mysqli_query($objCon,$sql);
				while($objResult = mysqli_fetch_array($query))
				{ 
			?>
				<option value="<?php echo $objResult["orderdarta"]; ?>"><?php echo $objResult["name"]; ?></option> 
			<?php  
				}
			?>   
			<?php 
				$sql = "SELECT * FROM drophight where orderdarta != '".$searchname2."' order by pk asc  "; 
				$query = mysqli_query($objCon,$sql);
				while($objResult = mysqli_fetch_array($query))
				{ 
				?>
					<option value="<?php echo $objResult["orderdarta"]; ?>"><?php echo $objResult["name"]; ?></option> 
			<?php  
				}
			?>   
			</select>
			<span class="input-group-append"  >
			  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FAFAFA;" type="submit">
					<img src="images/dw.png" style="width: 15px; "> 
			  </button>
			</span>
			</div> 
    
		 </div>
        
        
        
         </div>
         </div>
        
         </form>
      
       <div class=" col-lg-12  "  style="margin-top: 0px; " ></div>
        		 
         <div class="col-lg-12" style=" background: #F6F6F6; border-radius: 10px;  "  > 
         <div class="row"  align="left" style=" margin-top: 15px; margin-bottom: 15px;  "   > 	  		
        	 
         <div class="col-lg-3" style=" background: #F6F6F6; border-radius: 10px;   "  > 
			 	 
            			
            	<div class="card" >
				  <h5 class="card-header"  style=" background-color: #FF6633; " >      
				  <font color="#FFF" style="font-size: 16px; ">
					<img src="images/q.png" style=" width: 20px; " >  &nbsp; หมวดสินค้า  
				  </font>
				  </h5>
				  <div class="card-body">
					   <div style="margin-top: 5px; " align="left" > 
							<a   href="product.php"  style="text-decoration: none; " >  
							  <img src="images/se.png" style=" height: 15px;" >
                          &nbsp;
                         <font color="#FF6633" style="font-size: 15px;">   หมวดสินค้าทั้งหมด  </font>  
							</a> 
						</div> 
				   
						<?php 
						$i = 1;  
						$sql2 = "SELECT * FROM typeproduct  order by pk asc    "; 
						$query2 = mysqli_query($objCon,$sql2);
						while($objResult2 = mysqli_fetch_array($query2))
						{ 
						?>  
					   <div style="margin-top: 5px; " align="left" > 
							<a  href="preorder.php?typedata=<?php echo $objResult2["pk"]; ?>" style="text-decoration: none; "    >  
							  &nbsp;&nbsp;&nbsp;
							  &nbsp;
							 <font color="#000" style="font-size: 15px;">   <?php echo $objResult2["name"]; ?>   </font>  
							</a> 
						</div> 
					   <?php } ?>
                    
				  </div>
				</div>
        
        				
         </div>
            
        					 
        	<div class="col-lg-9" style="margin-top:  0px;">
        	   
        	<div class="col-lg-12" style="margin-top: 00px; border: 0px solid #000; "> 
        	<div class="row" style="margin-top: 00px; border: 0px solid #000; padding-left: 15px;"> 
        	 
         	     
         	<?php    
         	$i = 1;  
			$loop = 1;  
			$img_all = ""; 
			 
			$i = 1;  
			$img_all = ""; 
			 
			 
			$addcode = "";
			if(empty($_GET["searchname"])){
				$addcode = " ";
			}else{
				$addcode = " and a.name like '%".$_GET["searchname"]."%'  ";
			}
			$addcode2 = "";
			if(empty($_GET["searchname2"])){
				$addcode2 = " order by a.pk asc ";
			}else{
				$addcode2 = " order by a.pk ".$_GET["searchname2"]."  ";
			}
			$addcode3 = "";
			if(empty($_GET["typedata"])){
				$addcode3 = "   ";
			}else{
				$addcode3 = "  and a.typedata = '".$_GET["typedata"]."'  ";
			}
			 
			$sql2 = "SELECT a.*, b.price, b.img, b.statusproduct2, b.discount, b.pk as newpk
			FROM product_pre a  Inner Join product_list_pre b On a.bill_no = b.bill_no  
			where b.statusproduct = 'พร้อมจำหน่าย'
			and a.onoff = '' ".$addcode.$addcode3.$addcode2."   "; 
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
                     		 
                     		 
							<button type="button" class="btn btn-sm "  style=" background-color: #F53D2D; border: 1px solid #F53D2D;  border-radius: 5px; " >  <font color="#FFF" class="imgresize"  style=" font-size: 8px; " >  เวลาปิดพรีออเดอร์ <?php echo $objResult2["timeend"]; ?> </font>   </button>
							 
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
         </div>
	   </div> 
       
       
    
    
    <div class="col-lg-12">  <br> <br> </div>
   </section>		
        						 
    
     
      
 <?php
include('footer.php');

?>