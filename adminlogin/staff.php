<?php 
session_start();
$_SESSION["load"] = "-";
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
     
	 																		
										
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  เพิ่มข้อมูลพนักงาน     </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > เพิ่มข้อมูลพนักงาน     </font>   
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
                     <font size="4px" color="#000000" class="serif">  เพิ่มข้อมูลพนักงาน     </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                        
                         <form role="form" name="frmMain" method="post" action="save_staff.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 

							  <div class="col-md-4" style=" margin-top:  15px; " > 

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ชื่อ-นามสกุล </font>
							  <input type="text" class="form-control" id="name" name="name"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #FF6633; background-color: #FFF; " value="<?php echo $name; ?>"  >
								  </div>
							   </div>  
  
							  
							  <div class="col-md-12"  >   </div>  

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ที่อยู่ </font>
							  		  <input type="text" class="form-control" id="address" name="address"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $address; ?>"   >
								  </div>
							   </div>  
 
							  
							  <div class="col-md-12"  >   </div>  
 
							    
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
 
							       
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> เบอร์โทร </font>
									 <input type="text" class="form-control" id="telphone" name="telphone"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $telphone; ?>"  maxlength="10"   onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  >
								  </div>
							   </div>  
 
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> Line </font>
									 <input type="text" class="form-control" id="line" name="line"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $line; ?>"  >
								  </div>
							   </div>  
   
 
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ข้อมูลเข้าสู่ระบบ </font> 
								  </div>
							   </div>  
							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> Username </font>
							  		 <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $username; ?>"   >
								  </div>
							   </div>  
 
							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> Password </font>
							  		 <input type="text" class="form-control" id="password" name="password"  autocomplete="off" required    style="border-radius: 5px; border: 1px solid #BCBCBC; background-color: #FFF;  "  value="<?php echo $password; ?>"   >
								  </div>
							   </div>  
							   
							  </div> 
							   
							    
							  <div class="col-md-12" > 
							  <div class="col-lg-12" align="left"   > 
								  <div class="form-group">     

								  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								
							  	  <a href="staff.php">
							  	  	 
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
                     
                    	 
                     
                      
                      	  
                    	    <div   class="col-lg-7"  align="left"  > 
								<table width="100%">
									<tr> 
										<td width="40%"> 
										<font color="black" size="3px" class="serif">  ค้นหารายชื่อ    </font>

										<form action="staff.php" method="get" >
										<div class="input-group   "  style="border: 1px solid #C9C9C9; border-radius: 4px; height: 40px; ">
										<input class="form-control    "   type="text" style="background-color: #FFF;  border: 1px solid #C9C9C9;  border: 0px; border-radius: 5px;   "    id="searchname" name="searchname" value="<?php echo $searchname; ?>"       autocomplete="off"  >
										  
										<span class="input-group-append">
										  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FFF;" type="submit">
												<img src="images/search.png" style="width: 15px; "> 
										  </button>
										</span>
										</div>
										</form> 

										</td>      
										<td width="1%">&nbsp;
										
										</td>   
										<td width="40%">
										<a href="staff.php"> 
										 <button type="button" class="btn btn-primary" style="background-color: #323D55; border-radius: 5px; width: 130px; height: 40px; border-color: #323D55; margin-top: 20px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    แสดงทั้งหมด   </font> </button> 
										</a> 
										</td>  
									</tr>
								</table>  
						     </div>
                     
                             <div class="col-md-12" style="margin-top: 15px;" > 
								  <style>
								 .pagination {
									list-style-type: none; 
									display: inline-flex;
									justify-content: space-between;
									box-sizing: border-box;
								}
								.pagination li {
									box-sizing: border-box;
									padding-right: 10px;
								}
								.pagination li a {
									box-sizing: border-box;
									background-color: #e2e6e6;
									padding: 8px;
									text-decoration: none;
									font-size: 12px;
									font-weight: bold;
									color: #616872;
									border-radius: 4px;
								}
								.pagination li a:hover {
									background-color: #d4dada;
								}
								.pagination .next a, .pagination .prev a {
									text-transform: uppercase;
									font-size: 12px;
								}
								.pagination .currentpage a {
									background-color: #518acb;
									color: #fff;
								}
								.pagination .currentpage a:hover {
									background-color: #518acb;
								}
								</style> 

							<?php											
								$perpage = 25;
								if (isset($_GET['page2'])) {
									$page = $_GET['page2']; 
								 } else {
									$page = 1;
								} 

								if (empty($_GET['page2'])) {
									 $page = 1;
								 }  			
								$start = ($page - 1) * $perpage;


								$addcode = "";
								if(empty($_GET["searchname"])){

								}else{
									$addcode = " and  name like '%".$searchname."%' ";
								}
								$addcode2 = ""; 
								if(empty($_GET["searchname2"])){

								}else{
									$addcode2 = " and majorline = '".$searchname2."'  ";
								} 

							$sql2 = " SELECT * FROM member_all 
							where name != ''   and status = 'ST'  
							".$addcode.$addcode2."  
							order by pk asc    "; 
							$query2 = mysqli_query($objCon, $sql2);
							$total_record = mysqli_num_rows($query2);
							$total_page = ceil($total_record / $perpage);
							 ?>  
							<?php if (ceil($total_record / $perpage) > 0): ?>
								 <ul class="pagination">
								<?php if ($page > 1): ?>
								<li class="prev"><a href="staff.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>">Prev</a></li>
								<?php endif; ?>

								<?php if ($page > 3): ?>
								<li class="start"><a href="staff.php?page2=1&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>">1</a></li>
								<li class="dots">...</li>
								<?php endif; ?>

								<?php if ($page-2 > 0): ?><li class="page"><a href="staff.php?page2=<?php echo $page-2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
								<?php if ($page-1 > 0): ?><li class="page"><a href="staff.php?page2=<?php echo $page-1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

								<li class="currentpage"><a href="staff.php?page2=<?php echo $page ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page ?></a></li>

								<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="staff.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
								<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="staff.php?page2=<?php echo $page+2 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage)-2): ?>
								<li class="dots">...</li>
								<li class="end"><a href="staff.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
								<?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage)): ?>
								<li class="next"><a href="staff.php?page2=<?php echo $page+1 ?>&searchcustomer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>">Next</a></li>
								<?php endif; ?>
							</ul>
							<?php endif; ?>

							</div>
                           
                     		<div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
							<div class="table-responsive"  >
							<table id="key_product"  class=" table    tablemobile  " border="0"    >
							 <thead> 
							 <tr>
								<th width="2%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; border-top-left-radius: 10px; "  ><div align="center"> 
								<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ลำดับ   </font></div></th>    
								<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
								<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    รายชื่อ  </font></div></th>      
								<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
								<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   เบอร์โทร     </font></div></th>    
								<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
								<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ดูข้อมูล     </font></div></th>         
								<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 10px;  "><div align="center"> 
								<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  แก้ไข   </font></div></th>  
							 </tr>
						  	</thead>  
										 
										 
										<tbody>
									 
									 
									 	<?php 
										$bg = "#F8FAFD"; 
										$i = 1;
										$total = 0;
										$totalprice1 = 0;
										$totalprice2 = 0;
										$totalprice3 = 0;
										$totalprice4 = 0; 
  
 										if (empty($_GET['page2'])) { 
											$i = 1;
										}else if (($_GET['page2'] == 1)) { 
											$i = 1;
										}else{

											$i = ( ($_GET["page2"]-1) * 25 ) + 1; 
										}
													 
										$sql2 = " SELECT * FROM member_all 
											where name != ''   and status = 'ST'   
											".$addcode.$addcode2."  
											order by pk asc   limit {$start} , {$perpage}   ";   
										$query2 = mysqli_query($con,$sql2); 
										while($objResult2 = mysqli_fetch_array($query2))
										{       
											
										if($bg == "#FFF"){ 
											$bg = "#F8FAFD"; 
										}else{  
											$bg = "#FFF"; 
										} 
										  
										$address1 = $objResult2["address1"];
										$address2 = $objResult2["address2"];
										$address3 = $objResult2["address3"];
										$address4 = $objResult2["address4"];


										$all_address = $objResult2["address"]."";
										$sql = "SELECT * FROM country where PROVINCE_ID = '".$address1."'   order by PROVINCE_ID asc  "; 
										$query = mysqli_query($objCon,$sql);
										while($objResult = mysqli_fetch_array($query))
										{ 
												$all_address = $all_address." จังหวัด : ".$objResult["PROVINCE_NAME"];
										}

										$sql = "SELECT * FROM aumpher where PROVINCE_ID = '".$address1."' 
										and AMPHUR_ID = '".$address2."'  order by AMPHUR_ID asc  "; 
										$query = mysqli_query($objCon,$sql);
										while($objResult = mysqli_fetch_array($query))
										{ 

												$all_address = $all_address." อำเภอ : ".$objResult["AMPHUR_NAME"];
										}
										$sql = "SELECT * FROM tumbon where PROVINCE_ID = '".$address1."' 
										and AMPHUR_ID = '".$address2."' and DISTRICT_CODE = '".$address3."'  order by DISTRICT_ID asc  "; 
										$query = mysqli_query($objCon,$sql);
										while($objResult = mysqli_fetch_array($query))
										{ 
												$all_address = $all_address." ตำบล : ".$objResult["DISTRICT_NAME"];
										}

										?>
										<tr style="background-color: <?php echo $bg ?>; "> 
										
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $i; ?> </font></div></td> 
										 
										  
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult2["name"]; ?>  </font></div></td> 
										 
										   
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult2["telphone"]; ?>  </font></div></td> 
										  
										  
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
										
										<a   data-toggle="modal" data-target="#myEodal2<?php echo $objResult2["pk"];?>"  class="  btn-sm " data-id="" style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369; cursor: pointer; "  >
										<font size="3px" color="Black" style=" font-size: 13px; " > ดูข้อมูล </font> </a>
										
										 
										
									      <!-- modal small -->
										<div class="modal fade" id="myEodal2<?php echo $objResult2["pk"]; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
										<div class="modal-dialog modal-md" role="document">
											<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="smallmodalLabel"> ดูข้อมูล </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<div class="col-lg-12" align="left">
											<font size="3px" color="Black" style=" font-size: 13px; " >						
												ชื่อ-นามสกุล : <?php echo $objResult2["name"]; ?>  <br>  
												ที่อยู่  : <?php echo $all_address; ?> <br>   
												  
												ข้อมูลเข้าสู่ระบบ  <br> 
												Username : <?php echo $objResult2["username"]; ?>  <br> 
												Password : <?php echo $objResult2["password"]; ?>	  <br>  				 
											</font> 
											</div> 
											</div> 
											</div>
											</div>
										</div>

										
										</font></div></td> 
										 
										     
										  
										<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
											 
											<a href="staff_edit.php?CusID=<?php echo $objResult2["pk"];?>?page=1" class="  btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;   "  ><font size="3px" color="red" style=" font-size: 13px; " > แก้ไข </font></a>
											 
										</font></div></td> 
										  
										</tr>  
										<?php $i++;   } ?>
									</tbody>
  
										 
							</table>  
							</div>
						  </div>
                        
                       
                        
                        
                  		   
                   	  <?php } ?>
                   		
                   		    
					<div class="col-lg-12">
						<br><br><br><br>
						<br><br><br><br>
						<br><br><br><br>
					</div>    
                   		   
                    
                </div>
              </div>
            </div>
            
             
             
            
             
                   		   
        </div>
 
<?php
include('footer2.php');
?>