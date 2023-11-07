<?php 
session_start();
$_SESSION["load"] = "1";
include('header.php');
 
		 
	$searchname = "";
	if(empty($_GET["searchname"])){
		
	}else{
		$searchname = $_GET["searchname"];
	}
 	 
		 
		 
	$searchname2 = "";
	if(empty($_GET["searchname2"])){
		
	}else{
		$searchname2 = $_GET["searchname2"];
	}
 	 
?> 
        
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
            
            <div class="clearfix"></div>
            <div class="row" >
              <div class=" col-lg-12 "  > 
                <div class="x_panel"  style="background-color: #FFFFFF;  border-radius: 10px; " > 
                 
                  <div class=" col-lg-12 " style="background-color: #FFF; height: 38px; " align="left" >
                  <font color="#FFFFFF" size="3px" class="serif2"  >
                  <div style="margin-top: 6px;" > 
                     <font size="4px" color="#000000">  แก้ไขข้อมูลส่วนตัว </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){  
						$sql = "SELECT * FROM member_all Where  pk = '". $_SESSION["UserID"] ."' ";  
						$query = mysqli_query($objCon,$sql); 
						while($objResult = mysqli_fetch_array($query))
						{  
							$name = $objResult["name"];       
							$username = $objResult["username"];   
							$password = $objResult["password"];   

 
						}  
						?> 
                           
                          	
						  <form role="form" name="frmMain" method="post" action="save_staff_update2.php" enctype="multipart/form-data" onsubmit="return validateForm()"  > 
						  <input type="hidden" name="idupdate" id="idupdate" class="form-control " value="<?php echo $_SESSION["UserID"]; ?>" >
                    		 
                          
                          
                      	  <div class="col-md-3" style="margin-top: 20px; " > 

						  
                         <div class="col-md-12"  >	
							<div class="form-group">
							   <font color = '#000' size="3px" > ข้อมูลเข้าสู่ระบบ </font>  
							</div>
						  </div> 
                         
                  		 <div class="col-lg-12 ">   </div> 
                         
                         
                         <div class="col-md-12"  >	
							<div class="form-group">
							   <font color = '#000' size="3px" > Username </font>   
							  <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #C9C9C9; "  value="<?php echo $username; ?>"  > 
							</div>
						  </div> 
                  		 <div class="col-lg-12 ">   </div> 
                         
                         
                         
                         <div class="col-md-12"  >	
							<div class="form-group">
							   <font color = '#000' size="3px" > Password </font>   
							  <input type="text" class="form-control" id="password" name="password"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #C9C9C9; "  value="<?php echo $password; ?>" > 
							</div>
						  </div> 
                 		 
						  </div>  
                 		 
                 		 
                  		  <div class="col-lg-12 ">   </div> 
                         
                          <div class="col-lg-12" align="left"   > 
                           <div class="col-lg-12" align="left"   > 
							  <div class="form-group">     

							  	  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								 
							  	  <a href="product.php">
							  	  	 
								  <button type="button" class="btn btn-primary" style="background-color: #FFFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #C9C9C9; border: 1px solid  #C9C9C9;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 
  
							  	  </a>
  
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
										<div class="col-lg-12" align="center">
										 
											<button type="submit" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633;  margin-top: 15px; " > <font color="#FFF" size="2px" class="serif1" > <b>  ตกลง   </b> </font> </button> 
									 		 
									 
											<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" style="background-color: #CAD1DB; border-radius: 5px; width: 130px;  height: 40px; border-color: #CAD1DB; border: 1px solid  #CAD1DB;  margin-top: 15px;  "  > <font color="#000000" size="2px" class="serif1" > <b>   ไม่   </b> </font> </button> 

											   
										</div> 
										</div> 
										</div>
									</div>
									</div>
									<!-- end modal small --> 
							     
						  	  </div> 
						  </div>  
						  </div>  
                         
                    
						  </form> 
                    
                    
                      <?php }   ?>
                  		 <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
                          <bR><bR><bR><br>  
						 </div>
                    
                    
                </div>
              </div>
            </div>
            
             
            
        </div>

<?php
include('footer.php');
?>