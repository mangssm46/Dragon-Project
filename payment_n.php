<?php 
$_SESSION["load"] = "9"; 
include('header.php');
 
$bank2 = "";
$bank3 = "";
$pricetotal = "";
?>
 <script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>
		
 <script language="JavaScript">
	function OnUploadCheck()
	{
		var extall="jpg,jpeg,png";

		file = document.form1.img.value;
		ext = file.split('.').pop().toLowerCase();
		if(parseInt(extall.indexOf(ext)) < 0)
		{
			alert('กรุณาอัพโหลดไฟล์ : ' + extall);
			return false;
		}
		return true;
	}
</script>


 <section class="product_section layout_padding" style="  " >
      
    <div class="container    " style="border: 0px solid #FFF; " >
      <div class=" row  " >
      
      <div class=" col-lg-12  " align="left" style="margin-top: 25px; border-left: 2px solid #3A2707; "> 
        <font color="#76622F" style="font-size: 25px; ">
         
          แจ้งชำระสินค้าปกติ 
           
        </font>
      </div>
          <div class=" col-lg-12  " align="left" style="margin-top: 25px;">  </div>

      </section>
    
    <section class="product_section layout_padding" style="  background-image: url('img/bg3.png');  background-repeat: no-repeat;    background-size: cover; " >
      
    <div class="container    " style="border: 0px solid #FFF; " >
        
       <div class="row">
<div class="col-lg-12">

 <div class="row">
 <div class="col-lg-2">						 	
 </div>
 <div class="col-lg-9" style="border: 1px solid #FFFFFF; border-radius: 10px; background-color: #FFFFFF; ">

   <form role="form" name="form1" method="post" action="save_update_payment.php" enctype="multipart/form-data" onSubmit="return OnUploadCheck();" >

	<div class="row">  
	  <div class="col-lg-8" align="left" style="margin-left: 5px;" > <br> <br> 
		<label> <font size="3px" color="black" class="serif1"> เลือกธนาคารที่ต้องการชำระเงิน  </font>  </label>  
		<select class="form-control myselect" id="bank1" name="bank1"    style=" border-radius: 10px; border: 1px solid #003566;"     onchange="myFunctionsend()"    >
		 <option value=""> เลือกธนาคารที่ต้องการชำระเงิน </option>    
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
		<input type="text" name="bank2" id="bank2" class="form-control " value="<?php echo $bank2; ?>" autocomplete="off"  style=" border-radius: 10px; border: 1px solid #003566; padding-left: 15px; " readonly    > 
		<br>

		<label> <font size="3px" color="black" class="serif1"> ชื่อเจ้าของบัญชีที่ต้องชำระเงิน  </font>  </label> 
		<input type="text" name="bank3" id="bank3" class="form-control " value="<?php echo $bank3; ?>" autocomplete="off"  style=" border-radius: 10px; border: 1px solid #003566; padding-left: 15px; " readonly    > 
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
		<select class="form-control myselect" id="payment" name="payment"    style=" border-radius: 10px; border: 1px solid #003566;"     onchange="myFunctionsend2()"    >
		 <option value=""> เลือกเลขบิลที่ต้องการชำระ </option>    
			  <?php 
				$i = 1;
				$sql2 = "SELECT * FROM list_order where status_paymet = '0' 
				and bill_no != ''  
				and create_by = '".$_SESSION["UserID2"]."'  
				and noteaddress = 'Product'   
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
					$sql = "SELECT * FROM list_order where bill_no = '".$objResult2["bill_no"] ."'  and noteaddress = 'Product'    ";
					$query = mysqli_query($objCon,$sql); 
					while($objResult = mysqli_fetch_array($query))
					{ 
						$total += ($objResult["price"]*$objResult["total"]);
					} 
					
					$totalprice = $total - $discount + $sendprice;
				?>     
				<option value="<?php echo $objResult2["bill_no"]; ?>/<?php echo number_format(0+$totalprice); ?>">
				 <?php echo $objResult2["bill_no"];  ?> </option>     
				<?php  
				$i++;
				}
				?> 
			</select> 

		<br>

		<label> <font size="3px" color="black" class="serif1"> ยอดเงินที่ชำระ  </font>  </label>  
		<input type="text" name="pricetotal" id="pricetotal" class="form-control " value="<?php echo $pricetotal; ?>" autocomplete="off"  style=" border-radius: 10px; border: 1px solid #003566; padding-left: 15px; " readonly    > 
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

	  <div class="col-lg-3" align="center" style="margin-left: -5px;">  
	  <br> <br> 
	  <label> <font size="3px" color="black" class="serif1"> อัพโหลดหลักฐานการชำระเงิน  </font>  </label>  


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

				<img src="images/upslip.png" style=" width: 100% ; " class="myAvatar" id="blah1" />
				<input type="file" name="newAvatar" id="newAvatar" style="display:none;" onchange="readURL1(this);"  />
				<script>
				$(".myAvatar").click(function() {
					$("#newAvatar").trigger("click");
				});
				</script>


			  </div> 
			  </div> 			 

			<input type="hidden" name="banksave" id="banksave" class="form-control " value="" >
			<input type="hidden" name="billsave" id="billsave" class="form-control " value="" >

			  <div class="col-lg-12" align="center" >

				<button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 150px; border-color: white; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="white" size="2px" class="serif1" > <b>   ยืนยันทำรายการ   </b> </font> </button> 

				<button type="button" class="btn btn-primary" style="background-color: #FFFFFF; border-radius: 5px; width: 150px; border-color: white; border: 1px solid #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" > <b>   ยกเลิก   </b> </font> </button>   
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

						<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 150px; border-color: white; margin-top: 15px; " > <font color="white" size="2px" class="serif1" > <b>   ใช่   </b> </font> </button>  

						<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #FFFFFF; border-radius: 5px; width: 150px; border-color: white; border: 1px solid #FF6633;  margin-top: 15px;  "> <font color="black" size="2px" class="serif1" > <b>   ไม่   </b> </font> </button> 

					</div> 
					</div>
				</div>
				</div>
				<!-- end modal small --> 


			  </div>   			 	
		  </form>   			 


		 </div>
		 </div>


		</div>
	</div>

    </div>
     
    </section>
    
    

	
<?php include('footer.php'); ?>