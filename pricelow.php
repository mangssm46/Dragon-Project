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
    
		 <form action="pricelow.php" method="get" >
        
       
         <div class="col-lg-12" style=" background: #F6F6F6; border-radius: 10px;  "  > 
         <div class="row"  align="left" style=" margin-top: 15px; margin-bottom: 15px;  "   > 
          
		  <div class="col-md-3"  align="left" style=" margin-top: 5px; " > <font color="#000" style="font-size: 22px; ">
			  รายการสินค้า 
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
							<a   href="pricelow.php"  style="text-decoration: none; " >  
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
						<a  href="pricelow.php?typedata=<?php echo $objResult2["pk"]; ?>" style="text-decoration: none; "    >  
						  &nbsp;&nbsp;&nbsp;&nbsp;
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
			 
			$sql2 = "SELECT a.*, b.price, b.img,  b.statusproduct2, b.discount
			FROM product a  Inner Join product_list b On a.bill_no = b.bill_no 
			where b.statusproduct = 'พร้อมจำหน่าย' and b.discount != '' and b.statusproduct2 = 'ลดราคา'
			".$addcode.$addcode2."    "; 
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
            <div class="col-md-3 col-grid-box" style="border: 0px solid #EDEDED; margin-bottom: 10px;   " >
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
         </div>
	   </div> 
       
       
    
    
    <div class="col-lg-12">  <br> <br> </div>
   </section>		
        						 
    
     
      
 <?php
include('footer.php');

?>