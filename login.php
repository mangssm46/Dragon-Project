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


?> 

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
      <div class=" row  leftmobiledata" >
      
       <div class=" col-lg-12  " align="left" style="margin-top: 25px;   "> 
        <font color="#76622F" style="font-size: 25px; ">
         
          ล๊อกอินเข้าสู่ระบบ 
           
        </font>
      </div>
         
         
       <div class=" col-lg-12  " align="left" style="margin-top: 25px;">  </div>
 	   </div> 
       
       
       <form role="form" name="frmMain" method="post" action="check_login2.php" enctype="multipart/form-data" onsubmit="return validateForm()"  > 
        			
       <div class="col-md-12" style="background-color: #FFF; border-radius: 20px;"> 
       <div class="row" leftmobiledata style="background-color: #FFF; "> 
          
            <div class="col-md-5">  
            <div class="row leftmobiledata">  
						 
							  
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > ล๊อกอินเข้าสู่ระบบ </font>    
							</div>
						  </div> 
							
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > Username </font>   
							  <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #FF6633; background-color: #FFF8F5;  "  value="<?php echo $username; ?>"   >
							</div>
						  </div> 
							
                      	  <div class="col-md-12"  >
							<div class="form-group" style="margin-top: 10px;">
							   <font color = '#000' size="3px" > Password </font>   
							  <input type="password" class="form-control" id="password" name="password"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #FF6633; background-color: #FFF8F5;  "  value="<?php echo $password; ?>"   >
							</div>
							
						  </div> 
                  		    
                  		 <div class="col-lg-12 ">   </div> 
                  		 <div class="col-lg-12 "> 
                  		 <table width="100%">
                  		 	<tr>
                  		 		<td width="50%">
                  		 		 <button type="submit" class="btn btn-sm  btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 100%; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    ล๊อกอิน   </font> </button>	
                  		 		</td>
                  		 		<td width="1%">&nbsp;  </td>
                  		 		<td width="50%">
                  		 		<button type="button" class="btn btn-sm  btn-primary" style="background-color: #FFF; border-radius: 5px; width: 100%;  height: 40px; border-color: #BCBCBC; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000" size="2px" class="serif1" >  ยกเลิก  </font> </button>  
                  		 		</td>
                  		 	</tr>
                  		 	<tr>
                  		 		<td width="100%" colspan="3" align="center">
                  		 		 <button type="submit" class="btn btn-sm  btn-primary" style="background-color: #FFF; border-radius: 5px;  height: 40px; border-color: #FFF; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#000" size="2px" class="serif1" >    ลืมรหัสผ่าน ?   </font> </button>	
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
       		 	<img src="images/lo1.png"  style="width: 80%;" class=" rightbanner "  >  
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