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
         
          ช่องทางการชำระเงิน 
           
        </font>
      </div>
          <div class=" col-lg-12  " align="left" style="margin-top: 25px;">  </div>

      </section>
    
    <section class="product_section layout_padding" style="  background-image: url('img/bg3.png');  background-repeat: no-repeat;    background-size: cover; " >
      
    <div class="container    " style="border: 0px solid #FFF; " >
        
        <div class="row">
				
							 
				 <div class="col-lg-12" align="center">
                
                 <a href="payment_n.php"  style="text-decoration-line: none;"     > 
                 <button type="button" class="btn btn-sm  " style="background-color: #FF6633; border: 1px solid #FF6633; margin-bottom: 30px; margin-top: 40px; width: 220px;   margin-right: 10px; "   > <font color="#FFF" style="font-size: 18px; ">  แจ้งชำระสินค้าปกติ  </font> </button>
				 </a> 
                	
                 <a href="payment_p.php"  style="text-decoration-line: none;"     > 
                 <button type="button" class="btn btn-sm  " style="background-color: #FFF; border: 1px solid #FF6633; margin-bottom: 30px; margin-top: 40px;   margin-right: 10px;  width: 220px; "   > <font color="#FF6633" style="font-size: 18px; ">  แจ้งชำระสินค้าพรีออเดอร์  </font> </button>
				 </a> 
                </div>
                  			 			 
		</div>
      
    </div>
     
    </section>
    
    

	
<?php include('footer.php'); ?>