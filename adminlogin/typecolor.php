<?php 
session_start();
$_SESSION["load"] = "-";
include('header.php'); 


	 
	$name = "";
	$address = "";
	$telphone = "";
	$major = "";
	$username = "";
	$password = "";
	$line = "";
	$facebook = "";
	$chk1 = "";
	$chk2 = "";
	$chk3 = "";
	$chk4 = "";
	$chk5 = "";
	$chk6 = "";
	$chk7 = "";
	$chk8 = "";
	$chk9 = "";
	$chk10 = "";
	$chk11 = "";
	$chk12 = "";
	$chk13 = "";
	$chk14 = "";
	$chk15 = "";
	$chk16 = "";
	$chk17 = "";
	$chk18 = "";
	$chk19 = "";
	$chk20 = "";
	$chk21 = "";
	$chk22 = "";
	$chk23 = "";
	$chk24 = "";
	$chk25 = "";
	$chk26 = "";
	$chk27 = "";
	$postion = "";
	$passport = "";

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
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  ประเภทสี      </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > ประเภทสี      </font>   
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
                     <font size="4px" color="#000000" class="serif">  ประเภทสี      </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                        
                         <form role="form" name="frmMain" method="post" action="save_typecolor.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 

							  <div class="col-md-4" style=" margin-top:  15px; " > 

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ประเภทสี  </font>
									 <input type="text" class="form-control" id="name" name="name"   autocomplete="off" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $name; ?>"   >
								  </div>
							   </div>  
  
							   
							  </div> 
							   
							    
							  <div class="col-md-12" > 
							  <div class="col-lg-12" align="left"   > 
								  <div class="form-group">     

								  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								
							  	  <a href="typecolor.php">
							  	  	 
								  <button type="button" class="btn btn-primary" style="background-color: #FFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #FFF; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 
 
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
                   		  
							<div class="col-md-12" >  <hr style=" border: 1px solid #C9C9C9; "> </div>
                    
                    
                    	 
                     		<?php 
								$i = 1;
								$bg = "#F8FAFD"; 

								$sql = "SELECT * FROM typecolor where name != '' order by pk asc   ";   
								$query = mysqli_query($con,$sql); 
								while($objResult = mysqli_fetch_array($query))
								{ 
									if($bg == "#FFF"){ 
										$bg = "#F8FAFD"; 
									}else{  
										$bg = "#FFF"; 
									}  		
							?>					
							  <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
								 <div class="col-lg-12 " style="margin-top: 10px; border: 1px solid #E0E0E0; border-radius: 5px; background-color: <?php echo $bg; ?>;  " >
										<div class="row"  >
										<div class="col-lg-8 ">
										<div class="form-group" style="margin-top: 15px;"  >   
										 <div  style="margin-top: 20px;" >    
										 <font color="black" size="3px" class="serif"  style="font-size: 14px; " >  <?php echo $i.". ".$objResult["name"]; ?> </font> 
										 </div>  
										</div>  
										</div>
										<div class="col-lg-4 " align="right">
										<div class="form-group" style="margin-top: 15px;"  >  

										<a  href="typecolor.php?CusID=<?php echo $objResult["pk"];?>&page=2"   >
										<button type="button" class="btn btn-sm btn-primary" style="background-color: #F77E51; border-radius: 5px;   border: 1px solid  #F77E51;   ">  
										<font color="#FFF" size="3px" class="serif1" style="font-size: 13px; " > &nbsp;   เเก้ไข &nbsp;  </font> </button>
										</a>  

										</div> 
										</div> 
										</div> 
								 </div> 
							  </div>


							 <?php $i++; } ?>
                      
                      	  
                        
                       
                        
                  		   
                   	  <?php } ?>
                   		    
                   		   
                  		         
                       <?php  
						if(isset($_GET["page"])){
						if( ($_GET["page"]) == "2" ){
						$sql = "SELECT * FROM typecolor Where  pk = '". $_GET["CusID"] ."' ";  
						$query = mysqli_query($objCon,$sql); 
						while($objResult = mysqli_fetch_array($query))
						{  
							$name = $objResult["name"];    

 
						}  
							 
						?>  
						  <form role="form" name="frmMain" method="post" action="save_typecolort_update.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 
						  <input type="hidden" name="idupdate" id="idupdate" class="form-control " value="<?php echo $_GET["CusID"]; ?>" >


							  <div class="col-md-4" style=" margin-top:  15px; " > 

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ประเภทสี </font>
									 <input type="text" class="form-control" id="name" name="name"   autocomplete="off" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $name; ?>"   >
								  </div>
							   </div>  
  
							   
							  </div> 
							   
							    
							  <div class="col-md-12" > 
							  <div class="col-lg-12" align="left"   > 
								  <div class="form-group">     

								  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								
							  	  <a href="typecolor.php">
							  	  	 
								  <button type="button" class="btn btn-primary" style="background-color: #FFF; border-radius: 5px; width: 130px;  height: 40px; border-color: #FFF; border: 1px solid  #FF6633;  margin-top: 15px;  "> <font color="#000000" size="2px" class="serif1" >  ยกเลิก  </font> </button> 
 
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
                           
                        <?php } } ?>
                          
                           
                   		        <div class="col-lg-12">
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        	<br><br><br><br> <br><br><br><br> 
                   		        </div>    
                   		   
                    
                    
                </div>
              </div>
            </div>
            
             
             
            
             
                   		   
        </div>
 
<?php
include('footer2.php');
?>