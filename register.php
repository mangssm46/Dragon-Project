<?php
include('header.php');
	 
	$name = "";
	$code_student = "";
	$telphone = "";
	$address = "";
	$searchname = "";
	$username = "";
	$password = "";
	$line = "";
	$facebook = "";
	$address1 = "";
	$address2 = "";
	$address3 = "";
	$address4 = "";


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
   
   
    <style>   
	  .imgresizeshowdata{ 
		  height: 260px;
	 }
	  @media only screen and (max-width: 767px){ 
		 .imgresizeshowdata{  width: 100%; height:  300px;   }
	  }  
	</style>
				 
				 
    <section class="product_section layout_padding" style=" background-color: #FAFAFA; border-radius: 20px;   " >
      
    <div class="container    " style="border: 0px solid #FFF; " >
      <div class=" row  leftmobiledata " >
      
       <div class=" col-lg-12  " align="left" style="margin-top: 25px;   "> 
        <font color="#76622F" style="font-size: 25px; ">
         
          ลงทะเบียนเข้าสู่ระบบ 
           
        </font>
      </div>
         
         
       <div class=" col-lg-12  " align="left" style="margin-top: 25px;">  </div>
 	   </div> 
       
       
       <form role="form" name="frmMain" method="post" action="save_register.php" enctype="multipart/form-data" onsubmit="return validateForm()"  > 
        			
       <div class="col-md-12" style="background-color: #FFF; border-radius: 20px;"> 
       <div class="row leftmobiledata " style="background-color: #FFF; "> 
          
            <div class="col-md-5">  
            <div class="row">  
						  
                      	  <div class="col-lg-9" style="margin-top: 20px; " >	 
							<div class="form-group">
							   <font color = '#000' size="3px" > ชื่อ-นามสกุล </font>   
							  <input type="text" class="form-control" id="name" name="name"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #FF6633; background-color: #FFF; " value="<?php echo $name; ?>"  >
							</div>
						  
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > ที่อยู่ </font>   
							  <input type="text" class="form-control" id="address" name="address"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $address; ?>"   >
							</div>
						  </div> 
							 
                      	  <div class="col-lg-3"  style="margin-top: 20px; " align="center"  >  
							<div class="form-group" style=" margin-top: -3px; ">
							   <font color = '#000' size="3px" >  &nbsp;  </font>   
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
                          
                          
							<style>   
							  .uploadimagesdata{ 
								  width: 100%;
							 }
							  @media only screen and (max-width: 767px){ 
								 .uploadimagesdata{  width: 50%;    }
							  }  
							</style>
                          	 <img src="images/upload.png"  class="myAvatar uploadimagesdata " id="blah1" />
							 <input type="file" name="newAvatar" id="newAvatar" style="display:none;" onchange="readURL1(this);"  />
							 <script>
								$(".myAvatar").click(function() {
									$("#newAvatar").trigger("click");
								});
							 </script>
						   </div> 
						  </div> 
                     	  
                     	  
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > จังหวัด </font>   
							   <select class="form-control" id="address1" name="address1"     oninput="setCustomValidity('')" onChange = "ListProvince(this.value)"       style="border-radius: 5px; border: 1px solid #C9C9C9; "    >
								<option value="">  จังหวัด </option>
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
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > อำเภอ </font>   
								<select class="form-control  " id="address2" name="address2"   
								 style="border-radius: 5px; border: 1px solid #C9C9C9; " 
								 onChange = "ListProvince2(this.value)"  >  </select>
							</div>  
						  </div> 
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > ตำบล </font>   
								<select class="form-control  " id="address3" name="address3"   
								 style="border-radius: 5px; border: 1px solid #C9C9C9; "  
								 onChange = "ListProvince3(this.value)"  >  </select> 
							</div>  
						  </div> 
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > รหัสไปรษณีย์ </font>   
							  <input type="text" class="form-control" id="address4" name="address4"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; "   value="<?php echo $address4; ?>"    >
							</div>  
						  </div> 
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > เบอร์โทรติดต่อ </font>   
							  <input type="text" class="form-control" id="telphone" name="telphone"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "   value="<?php echo $telphone; ?>"   maxlength="10"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"   >
							</div>  
						  </div> 
                      	  <div class="col-lg-6"  >
							<div class="form-group" style="margin-top: 0px;">
							   <font color = '#000' size="3px" > Line </font>   
							  <input type="text" class="form-control" id="line" name="line"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "   value="<?php echo $line; ?>"    >
							</div>  
						  </div> 
							 
       		 			  
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > ข้อมูลเข้าสู่ระบบ </font>    
							</div>
						  </div> 
							
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > Username </font>   
							  <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $username; ?>"   >
							</div>
						  </div> 
							
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > Password </font>   
							  <input type="text" class="form-control" id="password" name="password"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $password; ?>"   >
							</div>
							
						  </div> 
                  		    
                  		 <div class="col-lg-12 ">   </div> 
                  		 <div class="col-lg-12 "> 
                  		 <table width="100%">
                  		 	<tr>
                  		 		<td width="50%">
                  		 		 <button type="submit" class="btn btn-sm  btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 100%; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    ลงทะเบียนใช้งาน   </font> </button>	
                  		 		</td>
                  		 		<td width="1%">&nbsp;  </td>
                  		 		<td width="50%">
                  		 		<button type="button" class="btn btn-sm  btn-primary" style="background-color: #FFF; border-radius: 5px; width: 100%;  height: 40px; border-color: #BCBCBC; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000" size="2px" class="serif1" >  ยกเลิก  </font> </button>  
                  		 		</td>
                  		 	</tr>
                  		 </table>
						 </div>  
							  	  
							     
								  
							      	   
       		 </div>      
    					   
       		 </div> 
           
			 <style>   
				  .rightbanner{ 
					  height: 470px; 
				 }
				  @media only screen and (max-width: 767px){ 
					 .rightbanner{   display: none; }
				  }  
				</style>
      		  
       		 <div class="col-md-7 ">
       		 <div class="col-lg-12" style="margin-top: 20px;" align="center">
       		 	<img src="images/lo1.png"   class=" rightbanner "  >  
       		 </div>
       		 </div>
       		  
          
	   </div>  
	   </div>  
	   
	 </form> 
        
      
       <div class=" col-lg-12  " align="left" style="margin-top: 25px;">  </div>
    </div>
     
    </section>
 
   
      
     
      
 <?php
include('footer.php');

?>