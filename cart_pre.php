<?php
include('header.php');


	$pricediscount = "0";
	$codeno = "";
	if(!empty($_GET["pricediscount"])){
		$pricediscount = $_GET["pricediscount"];
		$codeno = $_GET["codeno"];
	}


 	 if(isset($_GET["Action"])){ 
		 if($_GET["Action"] == "Del")
		 {  
  
			$strSQL = "Delete From list_order  ";
			$strSQL .="WHERE pk = '".$_GET["CusID"]."' ";
			$objQuery = mysqli_query($objCon,$strSQL); 

				//echo("<script>alert('ทำการลบเรียบร้อย!!')</script>");
				echo("<script>window.location = 'cart_pre.php?pricediscount=".$pricediscount."&codeno=".$codeno."';</script>"); 
		 } 
	 }
 
	 
?>  
   
       
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-12 m-auto" align="left">  
                <font color="#000" style="font-size: 15px;">
                    หน้าแรก >  ตะกร้าสินค้า
                </font>   
                 
            </div>
        </div>
        
         <div class="row">
		 <div class="col-lg-12" >
		 <form action="save_confrim_pre.php" method="get" enctype="multipart/form-data">
		 
		 <input type="hidden" id="pricdiscount" name="pricediscount" value="<?php echo $pricediscount; ?>" >
		 <input type="hidden" id="showtxtdata" name="showtxtdata" value="11111" >
   
       
	    	 
			   <div class="col-lg-12 m-auto" align="left">  
                <font color="#000" style="font-size: 25px;">
                   <b>  ตะกร้าสินค้า     </b>
                </font>  
            	</div>
            	
				 
                <div class="row">
                
                <div class="col-lg-12" align="center">
                
                 <a href="cart.php"  style="text-decoration-line: none;"     > 
                 <button type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633; margin-bottom: 30px; margin-top: 40px; width: 200px;   margin-right: 10px; "   > <font color="#FF6633" style="font-size: 18px; ">  ตะกร้าสินค้าปกติ  </font> </button>
				 </a> 
                	
                 <a href="cart_pre.php"  style="text-decoration-line: none;"     > 
                 <button type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633; margin-bottom: 30px; margin-top: 40px;   margin-right: 10px;  width: 200px; "   > <font color="#FFF" style="font-size: 18px; ">  ตะกร้าสินค้าพรีออเดอร์  </font> </button>
				 </a> 
                </div>
                
                
                <div class="col-lg-12" align="center">
                <hr>
                </div>
                
                
				<div class="col-lg-12 " >
            	<?php   
					$i = 1;
					$totalall = 0;
					$totalall1 = 0;
					$totalall2 = 0;
					$totalall3 = 0;
					$bg = "#BCBCBC"; 


					$countall = 0;
					$sql2 = "SELECT * FROM list_order where create_by = '".$_SESSION["UserID2"] ."' and bill_no = ''  and status_product = 'Productpre' ";
					$query2 = mysqli_query($objCon,$sql2); 
					while($objResult2 = mysqli_fetch_array($query2))
					{ 
						$countall++;; 
					}

					$sql = "SELECT * FROM list_order where create_by = '".$_SESSION["UserID2"] ."' and bill_no = ''  and status_product = 'Productpre' order by pk desc "; 
					$query = mysqli_query($objCon,$sql); 
					while($objResult = mysqli_fetch_array($query))
					{ 
						$pricepro = $objResult["price"];
						$totalpro = $objResult["total"];

						
						 
							$namepro = "";
							$img = "";
							$sql2 = "SELECT a.*, b.name, b.typedata2 FROM product_list_pre a 
							Inner Join product_pre b On a.bill_no = b.bill_no 
							where a.pk = '".$objResult["menu_id"] ."' "; 
							$query2 = mysqli_query($objCon,$sql2); 
							while($objResult2 = mysqli_fetch_array($query2))
							{ 
								$namepro = $objResult2["name"]; 
								$typepro = $objResult2["typedata2"];
								$code_pro = $objResult2["bill_no"];   
								$img = $objResult2["img"];
								  
							}
						 


						if($bg == "#FFF"){ 
							$bg = "#BCBCBC"; 
						}else{  
							$bg = "#FFF"; 
						} 

						if(empty($pricepro)){
							$pricepro = 0;
						}
						if(empty($totalpro)){
							$totalpro = 0;
						}
						$totalall1 += $pricepro*$totalpro;
						$totalall2 += $totalpro; 
				?>	 
            	
				<div class="col-lg-12 " style="margin-top: 10px; border: 1px solid #E0E0E0; border-radius: 5px; background-color: <?php echo $bg; ?>;  " > 
				<div class="grid-container4"  style="margin-top: 20px; margin-bottom: 20px;  "  >
				<div class="grid-item">       
				 <font color="black" size="3px" class="serif">  
				  <div style="margin-left: 10px;">

				   <?php if(empty($img)){ ?>
					<img src="images/p1.png" alt="product" class="img-fluid " style="height: 100px; ">
				   <?php }else{ ?>
					<img src="img/<?php echo $img; ?>" alt="product" class="img-fluid " style="height: 100px; ">
				   <?php } ?>

				  </div>
				 </font>  
				</div>
				<div class="grid-item">       
				 <font color="black" size="3px" class="serif">  
				  <div style="margin-left: 10px;">

				  <?php echo $namepro; ?>

					<div style="margin-top: 10px;"></div>

					฿ <?php echo number_format(0+$pricepro); ?>

				  </div>
				 </font>  
				</div>
				
			 	<div class="grid-item">       
			 	<font color="black" size="3px" class="serif">  
			  	<div style="margin-left: 10px;">

				<div class="row" style="margin-top: 0px;"> 
				<div class="col-auto">

				<input type="hidden" name="product-quanity<?php echo $i; ?>" id="product-quanity<?php echo $i; ?>" style=" font-size: 18px; " value="<?php echo $totalpro; ?>"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"     >
				<div class="col-lg-12">  
				<table width="100%">
				<tr>
				<td>
				จำนวน	&nbsp;&nbsp; 			
				<button  type="button"  class="btn btn-sm"  style="height: 33px; width: 33px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FFF8F5;"  onClick="Deltotal<?php echo $i; ?>(<?php echo $objResult["pk"]; ?>)"   >   
				<img src="images/aa2.png" style=" width: 14px;" >  </button> 

				&nbsp;
				<button  type="button"  class="btn btn-sm"   style=" border-radius: 5px;  border: 1px solid <?php echo $bg; ?>; background-color: <?php echo $bg; ?>;" >   
				<font  id="showtxt<?php echo $i; ?>" style=" font-size: 20px; " >   
				   <?php echo $totalpro; ?>           
				</font>  
				</button>  

				  &nbsp;
				<button type="button" class="btn btn-sm"  style="height: 33px; width: 33px; border-radius: 5px;  border: 1px solid #FF6633; background-color: #FF6633;"   onClick="Addtotal<?php echo $i; ?>(<?php echo $objResult["pk"]; ?>)"  >   
				<img src="images/aa1.png" style=" width: 14px;"  >   </button>


				 &nbsp;&nbsp; <font style="font-size: 17px;   " color="#000" name="sall<?php echo $i; ?>"  id="sall<?php echo $i; ?>"  >   ฿ <?php echo number_format(0+$pricepro*$totalpro); ?> </font> 


				</td>
				</tr>
				</table>

				</div>
                                    
                                      
						<script language="javascript">
						 function Addtotal<?php echo $i; ?>(Savedata) { 
						   var gettotal =	document.getElementById("product-quanity<?php echo $i; ?>").value;

						   if(gettotal == ""){

						   }else{
							   var showtot1 =  parseInt(gettotal) + 1;
							   document.getElementById("product-quanity<?php echo $i; ?>").value = showtot1;
							   document.getElementById("showtxt<?php echo $i; ?>").innerHTML = showtot1;
								IsNumeric<?php echo $i; ?>();

						   }
						}
						 function Deltotal<?php echo $i; ?>(Savedata) { 
						   var gettotal =	document.getElementById("product-quanity<?php echo $i; ?>").value;

						   if(gettotal == ""){

						   }else{
							   var showtot1 =  parseInt(gettotal) - 1;

							   if(showtot1 < 1){

							   }else{
								 document.getElementById("product-quanity<?php echo $i; ?>").value = showtot1; 
								 document.getElementById("showtxt<?php echo $i; ?>").innerHTML = showtot1;
								IsNumeric<?php echo $i; ?>();
							   }

						   }
						}
						</script>
														
														 
						<input type="hidden" id="data<?php echo $i; ?>" value="<?php echo $objResult["pk"]; ?>"   > 
						<input type="hidden" id="menuid<?php echo $i; ?>" value="<?php echo $objResult["menu_id"]; ?>"   >  
                                         
                    	<input type="hidden" name="all<?php echo $i; ?>"  id="all<?php echo $i; ?>"  placeholder=" สุทธิ "  value="<?php echo  ($pricepro * $totalpro);?>"  class="form-control" style=" width: 100%; text-align: center; " readonly > 
                  	    
                   	    <input type="hidden" name="alltotal<?php echo $i; ?>"  id="alltotal<?php echo $i; ?>"  placeholder=" สุทธิ "  value="<?php echo  ($totalpro);?>"  class="form-control" style=" width: 100%; text-align: center; " readonly >           
                                   			
                        <script language="javascript">
						function IsNumeric<?php echo $i; ?>()
						{
							var int1 = document.getElementById("product-quanity<?php echo $i; ?>").value; 
							var getdatasave = document.getElementById("data<?php echo $i; ?>").value;
							var menuid = document.getElementById("menuid<?php echo $i; ?>").value;    


							var n1 = parseInt(int1);
							var show=document.getElementById('all<?php echo $i; ?>');
							show.value = (<?php echo $pricepro; ?> * n1);  

							var show=document.getElementById('alltotal<?php echo $i; ?>');
							show.value = (n1);  

							var show1=document.getElementById('sall<?php echo $i; ?>'); 
							show1.innerHTML =  " ฿ " + number_format(<?php echo $pricepro; ?> * n1);



							var jsonString = "{\"id\":"+getdatasave+",\"total\":"+int1+",\"menuid\":"+menuid+"}";				
							/// alert("save_total_update.php?id="+getdatasave+"&total="+int1+"&menuid="+menuid);
							
							var codeno = document.getElementById("codeno").value;    
							var pricediscount = document.getElementById("pricdiscount").value;    
							if(pricediscount == ""){
								pricediscount = 0;
							}
							
							$.ajax({
								type: "POST",
								url: "save_total_update_pre.php?id="+getdatasave+"&total="+int1+"&menuid="+menuid,
								contentType: 'application/json',
								data: jsonString,
								success: function(result) {   

									
									
								var check_number = result.ans;
								if(check_number == 0){

								}else{  
									alert(' จำนวนสินค้าคงเหลือไม่พอ ');	 
									window.location.href = "cart_pre.php?pricediscount="+pricediscount+"&codeno="+codeno;
								}
										 
									
							}
							});

								var total =  0;
								var total2 =  0;
								var end = <?php echo $countall; ?>;
								for (i2 = 1; i2 <= end; i2++) {

									var showallsum = document.getElementById('all'+i2).value;  
									total += Number(showallsum);  

									var showallsum = document.getElementById('alltotal'+i2).value;  
									total2 += Number(showallsum);  
								}

 
							
								var show1=document.getElementById('sumall'); 
								show1.innerHTML =  " "+ number_format(total);
								var show1=document.getElementById('sumallprice'); 
								show1.innerHTML =  " "+ number_format(total + 100 - pricediscount);

								var show1=document.getElementById('sumalltotal'); 
								 
								var show2=document.getElementById('sumallprice2'); 
								show2.innerHTML =  " "+ number_format( (total + 100 - pricediscount) / 2);

							 
						}

						function number_format (number, decimals, dec_point, thousands_sep) {
												// Strip all characters but numerical ones.
												number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
												var n = !isFinite(+number) ? 0 : +number,
													prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
													sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
													dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
													s = '',
													toFixedFix = function (n, prec) {
														var k = Math.pow(10, prec);
														return '' + Math.round(n * k) / k;
													};
												// Fix for IE parseFloat(0.55).toFixed(0) = 0;
												s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
												if (s[0].length > 3) {
													s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
												}
												if ((s[1] || '').length < prec) {
													s[1] = s[1] || '';
													s[1] += new Array(prec - s[1].length + 1).join('0');
												}
												return s.join(dec);
											}
						</script>
												
                                   
				</div>
				</div> 

				</div>
				</font>  
				</div>
				<div class="grid-item" align="right">       
				<font color="black" size="3px" class="serif">  
				<div style="margin-left: 10px; margin-right: 10px;">


				<a href="JavaScript:if(confirm(' กรุณายืนยันการลบ  ?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?php echo $objResult["pk"];?>&Menuid=<?php echo $objResult["menu_id"];?>';}" style="text-decoration-line: none;"     > <font size="3px" class="serif2" color="#000">  

				<img src="images/bin.png" style="height: 20px;">
				&nbsp;
				ลบ  </font>  </a> 

				</div>
				</font>  
				</div>
											  
				</div> 
				</div> 
            	
            	
            	<?php $i++; } ?>
   	    
			    </div> 
				  
   	        
   	        
   	        
   	        
   	        
   	        <style>  
				.grid-container {
				display: grid;
				grid-template-columns: 100%;  
				}
				.grid-container2 {
				display: grid;
				grid-template-columns: 60% 40%;  
				}
				.grid-container4 {
				display: grid;
				grid-template-columns: 25% 35% 30% 10% ;  
				}
				.grid-item {  
				padding-right: 3px; 
				}
			</style>
   	        <div class="col-lg-12 " style=" margin-top: 15px;  "   >
			<div class="col-lg-12" style="border: 1px solid #FFF;  border-radius: 10px; background-color: #FFF;     ">  
			
			 
			<div class="row" style="margin-top: 20px;  margin-right: 5px; "  >  
			<div class="col-lg-8"  >  
			
			</div>     
			 
			<div class="col-lg-4" > 
		  
			  <font color="#000" style="font-size: 17px;">
			   <b>  โค้ดส่วนลด (กรอกรหัสส่วนลด)     </b>
			   <div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px;   ">
				<input class="form-control    "   type="search" style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px; font-size: 15px;   height: 37px;  "    id="codeno" name="codeno"        autocomplete="off"    onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"   onchange="Checkcode()" onKeyUp="Checkcode()" value="<?php echo $codeno; ?>"  >

				<span class="input-group-append" >
				  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FFF8F5;" type="submit">
						<img src="images/cc1.png" style="width: 15px; "> 
				  </button>
				</span>
				</div> 
			</div>     
			</div>     
			
			  <script> 
				function Checkcode()  
				{    
					var codecustomer = document.getElementById("codeno").value; 

					$.ajax({
					type: "POST",
					url: "check_code.php",
					data: {data1:codecustomer},
					success: function(result) { 
						var check_number = result.ans; 
						var price = result.price; 
						   
						if(check_number == 0){ 
 							document.getElementById("pricdiscount").value = "0"; 
							calcodeSom();  
						}else{   
							document.getElementById("pricdiscount").value = price;
							calcodeSom();
						}
						}
					});

				}
				  function calcodeSom()  
				{   
					var total =  0;
					var total2 =  0;
					var end = <?php echo $countall; ?>;
					for (i2 = 1; i2 <= end; i2++) {

						var showallsum = document.getElementById('all'+i2).value;  
						total += Number(showallsum);  

						var showallsum = document.getElementById('alltotal'+i2).value;  
						total2 += Number(showallsum);  
					}


					var pricediscount = document.getElementById("pricdiscount").value;    
					if(pricediscount == ""){
						pricediscount = 0;
					}

					var show1=document.getElementById('sumall'); 
					show1.innerHTML =  " "+ number_format(total);
					var show1=document.getElementById('sumallprice'); 
					show1.innerHTML =  " "+ number_format(total + 100 - pricediscount);

					var show1=document.getElementById('sumalltotal'); 
					
					
					var show2=document.getElementById('sumallprice2'); 
					show2.innerHTML =  " "+ number_format( (total + 100 - pricediscount) / 2);
				}
				</script>
			
			
			<div class="row"  style="margin-top: 10px;  margin-right: 5px; "  > 
			<div class="col-lg-8"  >   </div>     
			<div class="col-lg-4" >  
			<div class="col-lg-12" style=" margin-top: 10px; ">  
			<font color="#000" style="font-size: 17px;">
			   <b>  ยอดชำระทั้งหมด     </b>

			<div class="grid-container2"  style=" margin-bottom: 20px; margin-left: 7px; margin-right: 7px;  "  >
			<div class="grid-item" style=" margin-top: 5px; ">       
			<font color="black" size="3px" class="serif"  style="font-size: 17px;" >  
			ยอดรวมชำระ
			</font> 
			</div> 
			<div class="grid-item"  style="background-color: #FFF;  margin-top: 5px; " align="right" >   
			<font color="black" size="3px" class="serif"  style="font-size: 17px;" id="sumall" > 
			<?php echo number_format(0+$totalall1); ?>
			</font> 
			</div> 
			
			<div class="grid-item" style=" margin-top: 5px;">       
			<font color="black" size="3px" class="serif"  style="font-size: 17px;" >  
			ค่าจัดส่ง
			</font> 
			</div> 
			<div class="grid-item"  style="background-color: #FFF;   margin-top: 5px; " align="right" >   
			<font color="black" size="3px" class="serif"  style="font-size: 17px;" id="sumall" > 
			<?php echo number_format(0+100); ?>
			</font> 
			</div> 
			
			
			
			<div class="grid-item" style="background-color: #FFF;  margin-top: 5px; ">       
			<font color="#FF6633" size="3px" class="serif"  style="font-size: 17px;"  id="sumalltotal">  
			ยอดชำระค่าสินค้า 
			</font> 
			</div> 
			<div class="grid-item"  style="background-color: #FFF;   margin-top: 5px; " align="right" >       
			<font color="#FF6633" size="3px" class="serif"  style="font-size: 17px;" id="sumallprice" > 
			<?php echo number_format(0+$totalall1); ?>
			</font> 
			</div> 
			
			 
			<div class="grid-item" style="background-color: #FFF;  margin-top: 5px; ">       
			<font color="#000" size="3px" class="serif"  style="font-size: 17px;"  id="sumalltotal2">  
			มัดจำค่าสินค้า 50 %
			</font> 
			</div> 
			<div class="grid-item"  style="background-color: #FFF;   margin-top: 5px; " align="right" >       
			<font color="#000" size="3px" class="serif"  style="font-size: 17px;" id="sumallprice2" > 
			<?php echo number_format(0+$totalall1/2, 0); ?>
			</font> 
			</div> 
			
			
			
			
			</div> 
			</div>  
               
               
               
			<div class="grid-container"  style="   margin-left: 7px; margin-right: 7px;  "  >
			<div class="grid-item"> 
 
			  <button type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633; margin-bottom: 10px; margin-top: 40px; width: 100%; margin-right: 0px;  height: 50px;  "  data-toggle="modal" data-target="#smallmodal"    > <font color="#FFF">  ยืนยันคำสั่งซื้อ  </font> </button>
                
                
                
				<div class="modal fade" id="smallmodal" style=" margin-top: 150px; " >
				<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="smallmodalLabel"> <font color="RED" size="4px"> *** เมือกดยืนยันรายการแล้วจะแก้ไขอะไรไม่ได้อีก *** </font> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="col-lg-12" align="center">

					<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 150px; border-color: #FF6633; margin-top: 15px; " > <font color="white" size="2px" class="serif1" > <b>  ยีนยันทำรายการ   </b> </font> </button> 


					<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #FFFFFF; border-radius: 5px; width: 150px; border: 1px solid #FF6633;  margin-top: 15px;  "> <font color="black" size="2px" class="serif1" > <b>   ยกเลิก   </b> </font> </button> 

				</div> 
				</div> 
				</div>
				</div>
				</div>
                

			 </div>
			 </div>

			</font> 
			</div> 
			</div> 
			
			 
			  
			   
			 <div class="col-lg-12">
			 	<br> 
			 </div> 
			 
			 
			</div>  
			</div>
   	        
   	        
   	        
   	        
	   	        </div> 
   	  
   	  
	   	  </div> 
	   	  </div> 
        
         
      
        
         <input type="hidden" autofocus style="background-color: #FFF; border: 1px solid #FFF; " readonly >
         
    </section>
    <!-- End Categories of The Month -->
 

<?php 

include('footer.php');

?>