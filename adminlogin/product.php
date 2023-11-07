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
	$detail = "";
	$typedata2 = "";

	$searchname = "";
	if(empty($_GET["searchname"])){
		
	}else{
		$searchname = $_GET["searchname"];
	}
 	  
	$searchname2 = "";
	$searchname3 = "";
	$typedata = "";
	if(empty($_GET["searchname2"])){
		
	}else{
		$searchname2 = $_GET["searchname2"];
	}

?>  
        
	 							
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        											
										
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  ข้อมูลรายการสินค้า     </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > ข้อมูลรายการสินค้า     </font>   
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
                     <font size="4px" color="#000000" class="serif">  ข้อมูลรายการสินค้า     </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                        
                         <form role="form" name="frmMain" method="post" action="save_product.php" enctype="multipart/form-data" onsubmit="return validateForm()" > 

							  <div class="col-md-5" style=" margin-top:  15px; " > 

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ชื่อสินค้า </font>
									 <input type="text" class="form-control" id="name" name="name"   autocomplete="off" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $name; ?>"   >
								  </div>
							   </div>  
  
							  
							  <div class="col-md-12"  >   </div>  

							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> รายละเอียดสินค้า </font> 
									 
									<textarea class="form-control" id="detail" name="detail"  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   ><?php echo $detail; ?></textarea>

									<script>
									CKEDITOR.replace('detail');
									function CKupdate() {
									 for (instance in CKEDITOR.instances)
									 CKEDITOR.instances[instance].updateElement();
									 } 
									</script>

								  </div>
							   </div>  
 
							  
							  <div class="col-md-12"  >   </div>  
 
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> ประเภท </font>
									 <select class="form-control" id="typedata" name="typedata" required  style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "   >  
											<option value="">  ประเภท    </option> 
										<?php 
											$sql = "SELECT * FROM typeproduct where pk = '".$typedata."' order by pk asc  "; 
											$query = mysqli_query($objCon,$sql);
											while($objResult = mysqli_fetch_array($query))
											{ 
										?>
											<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
										<?php  
											}
										?>   
										<?php 
											$sql = "SELECT * FROM typeproduct where pk != '".$typedata."' order by pk asc  "; 
											$query = mysqli_query($objCon,$sql);
											while($objResult = mysqli_fetch_array($query))
											{ 
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
										<?php  
											}
										?>   
										</select>
								  </div>
							   </div>  
 
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> หน่วย </font>
									 <input type="text" class="form-control" id="typedata2" name="typedata2"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $typedata2; ?>"  >
								  </div>
							   </div>  
							         
  
							   <div class="col-md-12 ">     </div>  
							      
							  </div> 
							   
							    
							  <div class="col-md-7">
							 		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
									<link rel="stylesheet" href="upload_image2/css/style.css">  
									<script src="upload_image2/js/app.js"></script> 
									
									<ul id="media-list" class="clearfix">
											<li class="myupload"> 
												<span><i class="fa fa-plus" aria-hidden="true"></i>
												<input type="file"  click-type="type2"   class="picupload"  name="picupload[]" id="picupload"  multiple="multiple"     ></span>
											</li>
											
											 
										</ul>  
						  		</div>
							   
							   
							  <div class="col-md-12 ">   </div> 
							  
							  
							   <div class="col-md-12 "> 
							   <div class="col-md-12 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> รายการตัวเลือกสินค้า   </font> 
								  </div>
							   </div>  
							   </div>  
							   
							   <div class="col-lg-12 ">  
								<a onClick="save_drop()"        >
								<div class="col-lg-12 "> 
								<div class="col-md-5" align="center"  style="margin-top: 10px; background-color: #FF6633; cursor: pointer; "  >
								<div style="margin-top: 8px; margin-bottom: 8px; "  >
								<font color = '#FFF' size="3px" > เพิ่มตัวเลือกสินค้า </font>    
								</div>
								</div> 
								</div> 
								</a>  
							   </div>  
							   
							 	<div class="col-md-12" style=" margin-top: 10px; " >   </div>
						    
							    <div class="col-lg-12 "> 
							    <div class="col-lg-12 "> 
								<div id="table_payment" >  

								</div>
								</div>
								</div>
					   		
					   		
						   		<script language="javascript">
									$( document ).ready(function() {   
										getTabel_new_con();   
									});

									function getTabel_new_con() { 
									var major = "";
										$.ajax({
											type: "GET",
											url: "get_show_data.php?major="+major,
											success: function(result) {
												$('#table_payment').html(result);
											}
										});
									}


									/// ปุ่มลบ เรียกเป็น Class แถน 
									$(document).on('click', '.btn-delete-fuck1', function() {
										var int1 = $(this).attr('data-id'); 
										 
										$.ajax({
											type: "POST",
											url: "delete_product_list.php",
											data: {del:int1},
											success: function( ) {  
											 getTabel_new_con();  
											}
										});   
									});


									function save_drop()
									{ 
										var major = "";
										 var jsonString = "";  
											$.ajax({
												type: "POST",
												url: "save_add.php?major="+major,
												contentType: 'application/json',
												data: jsonString,
												success: function( ) {  
													getTabel_new_con();  
											}
											});   
									 } 


									function ChgSaveImage(Savedata)
									{  

										var fd = new FormData(); // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object

										var files = $('#uploadG'+Savedata)[0].files; //เป็นการดึงข้อมูลรูปภาพเพื่อเตรียมเช็คไฟล์ก่อนทำงานส่วน Ajax


										// เช็คว่ามีไฟล์รูปภาพอยู่หรือไม่
										if(files.length > 0 ){

											fd.append('file',files[0]); //ใช้ในการแทรกค่าไฟล์รูปภาพใน element 

											$.ajax({
												url:'upload_img.php?pksave='+Savedata, //ให้ระบุชื่อไฟล์ PHP ที่เราจะส่งค่าไป
												type:'post',
												data:fd, //ข้อมูลจาก input ที่ส่งเข้าไปที่ PHP
												contentType: false,
												processData: false,
												success:function(response){ //หากทำงานสำเร็จ จะรับค่ามาจาก JSON หลังจากนั้นก็ให้ทำงานตามที่เรากำหนดได้

													if(response != 0){
														$("#img").attr("src",response);
														$('.preview img').show();
													}else{
														alert('File not uploaded');
													}
												}
											});
										}else{
											alert("Please select a file.");
										}


									} 

									/////////// เปลี่ยน จำนวน เปลี่ยนราคา  
									function Chgtotal(Savedata) { 

										var int1 = Savedata;          
										var int2 = $("#colorG"+Savedata).val();    
										var int3 = $("#sizeG"+Savedata).val();    
										var int4 = $("#priceG"+Savedata).val();     
										var int5 = $("#totalG"+Savedata).val();     
										var int6 = $("#discount"+Savedata).val();     
										var int7 = $("#statusproduct"+Savedata).val();     
										var int8 = $("#statusproducttwo"+Savedata).val();     

										///alert(Savedata + " // " +int2 + " // " + int3 + " /// " + int4);

										$.ajax({
											type: "POST",
											url: "save_total.php", 
											data: {data1:int1, data2:int2, data3:int3, data4:int4, data5:int5, data6:int6, data7:int7, data8:int8},
											success: function(result) { 
 

											}
										});

									}

							    </script>
						    
							   
							    <div class="col-md-12" > 
							  <div class="col-lg-12" align="left"   > 
								  <div class="form-group">     

								  <button type="button" class="btn btn-primary" style="background-color: #FF6633; border-radius: 5px; width: 130px; height: 40px; border-color: #FF6633; margin-top: 15px; "  data-toggle="modal" data-target="#smallmodal" > <font color="#FFF" size="2px" class="serif1" >    เพิ่มข้อมูล   </font> </button> 

								
							  	  <a href="product.php">
							  	  	 
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
                     
                    		 <div   class="col-lg-6"  align="left"  > 
								<table width="100%">
									<tr> 
										<td width="40%"> 
										<font color="black" size="3px" class="serif">  ค้นหารหัสสินค้า /รายชื่อสินค้า    </font>

										<form action="product.php" method="get" >
										<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; ">
										<input class="form-control    "   type="text" style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px;   "    id="searchname" name="searchname" value="<?php echo $searchname; ?>"       autocomplete="off"  >
										  
										<span class="input-group-append" style=" display: none;  ">
										  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FAFAFA;" type="submit">
												<img src="images/search.png" style="width: 15px; "> 
										  </button>
										</span>
										</div> 

										</td>  
										<td width="1%">&nbsp;
										 
										</td>
										<td width="40%"> 
										<font color="black" size="3px" class="serif">  ประเภทสินค้า    </font>
 
										<div class="input-group   "  style="border: 1px solid #FF6633; border-radius: 4px; height: 40px; "> 
									  
									   <select class="form-control" id="searchname2" name="searchname2"    style="background-color: #FFF8F5;  border: 1px solid #FF6633;  border: 0px; border-radius: 5px;   "   >   
										<?php 
											$sql = "SELECT * FROM typeproduct where pk = '".$searchname."' order by pk asc  "; 
											$query = mysqli_query($objCon,$sql);
											while($objResult = mysqli_fetch_array($query))
											{ 
										?>
											<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
										<?php  
											}
										?>   
										<?php 
											$sql = "SELECT * FROM typeproduct where pk != '".$searchname."' order by pk asc  "; 
											$query = mysqli_query($objCon,$sql);
											while($objResult = mysqli_fetch_array($query))
											{ 
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option> 
										<?php  
											}
										?>   
										</select>
										  
										<span class="input-group-append">
										  <button class="btn btn-outline-secondary  " style="border: 0px solid; background-color: #FAFAFA;" type="submit">
												<img src="images/search.png" style="width: 15px; "> 
										  </button>
										</span>
										</div>
										</form> 

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
									$perpage = 20;
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
									$addcode2 = "";
									$addcode3 = "";
									$addcode4 = "";
									if(empty($_GET["searchname"])){

									}else{
										$addcode = " and ( name like '%".$searchname."%' or  bill_no like '%".$searchname."%'  ) ";
									} 
									if(empty($_GET["searchname2"])){

									}else{
										$addcode2 = " and typedata = '".$searchname2."'  ";
									}  

								$sql2 = " SELECT * FROM product 
								where name != ''   
								".$addcode.$addcode2.$addcode3.$addcode4."  
								order by pk asc    "; 

								$query2 = mysqli_query($objCon, $sql2);
								$total_record = mysqli_num_rows($query2);
								$total_page = ceil($total_record / $perpage);
								 ?>  
								<?php if (ceil($total_record / $perpage) > 0): ?>
								<ul class="pagination">
								<?php if ($page > 1): ?>
								<li class="prev"><a href="product.php?page2=<?php echo $page-1 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>">Prev</a></li>
								<?php endif; ?>

								<?php if ($page > 3): ?>
								<li class="start"><a href="product.php?page2=1&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>">1</a></li>
								<li class="dots">...</li>
								<?php endif; ?>

								<?php if ($page-2 > 0): ?><li class="page"><a href="product.php?page2=<?php echo $page-2 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
								<?php if ($page-1 > 0): ?><li class="page"><a href="product.php?page2=<?php echo $page-1 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

								<li class="currentpage"><a href="product.php?page2=<?php echo $page ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo $page ?></a></li>

								<?php if ($page+1 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="product.php?page2=<?php echo $page+1 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
								<?php if ($page+2 < ceil($total_record / $perpage)+1): ?><li class="page"><a href="product.php?page2=<?php echo $page+2 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage)-2): ?>
								<li class="dots">...</li>
								<li class="end"><a href="product.php?page2=<?php echo ceil($total_record / $perpage) ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
								<?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage)): ?>
								<li class="next"><a href="product.php?page2=<?php echo $page+1 ?>&searchnamer=<?php echo $searchname; ?>&searchname2=<?php echo $searchname2; ?>&searchname3=<?php echo $searchname3; ?>&typedata=<?php echo $typedata; ?>">Next</a></li>
								<?php endif; ?>
								</ul>
								<?php endif; ?>

							</div>
                     	    
                     	    
                     	    
                     	    
                     	    
                      	    <div class="col-lg-12"  align="left" style="margin-top: 15px; "  >  
							<div class="table-responsive"  >
							<table id="key_product"  class=" table    tablemobile  " border="0"    >
							 <thead> 
								 <tr>
									<th width="4%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; border-top-left-radius: 0px; "  ><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">    รหัสสินค้า    </font></div></th>    
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ชื่อสินค้า  </font></div></th>   
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   ประเภทสินค้า     </font></div></th> 
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">   หน่วย     </font></div></th>
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  สต๊อกสินค้ารวม   </font></div></th>     
									<th width="4%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-top-right-radius: 0px;  "><div align="center"> 
									<font size="3px" class="serif2" color="#000" style=" font-size: 13px; ">  แก้ไข   </font></div></th>  
								 </tr>
							  </thead>  


							<tbody> 
							<?php 
							$bg = "#F8FAFD"; 

							$i = 1;
							$bg = "#F8FAFD"; 

							if (empty($_GET['page2'])) { 
								$i = 1;
							}else if (($_GET['page2'] == 1)) { 
								$i = 1;
							}else{

								$i = ( ($_GET["page2"]-1) * 20 ) + 1; 
							}

							$sql2 = " SELECT * FROM product 
								where name != ''  
								".$addcode.$addcode2.$addcode3.$addcode4."  
								order by pk asc    limit {$start} , {$perpage}   ";  

							$query2 = mysqli_query($con,$sql2); 
							while($objResult2 = mysqli_fetch_array($query2))
							{      
									if($bg == "#FFF"){ 
										$bg = "#F8FAFD"; 
									}else{  
										$bg = "#FFF"; 
									} 
									$bill_no = $objResult2["bill_no"];


									$name_typedata = "";
									$sql = "SELECT * FROM typeproduct where pk = '".$objResult2["typedata"]."'   order by pk asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
										$name_typedata =  $objResult["name"];
									}
 
									$totalstock = 0;
									$sql = "SELECT * FROM product_list where bill_no = '".$bill_no."'   order by pk asc  "; 
									$query = mysqli_query($objCon,$sql);
									while($objResult = mysqli_fetch_array($query))
									{ 
										$totalstock +=  $objResult["total"];
									}
							?>
							<tr style="background-color: <?php echo $bg ?>; "> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo $objResult2["bill_no"]; ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " >  <?php echo $objResult2["name"]; ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " >  <?php echo $name_typedata; ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " >  <?php echo $objResult2["typedata2"]; ?>   </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > <?php echo number_format(0+$totalstock); ?>  </font></div></td> 

							<td style=" border-left: 0px solid #F2F2F2; "><div align="center"><font size="3px" color="Black" style=" font-size: 13px; " > 
								 
							<a href="product_edit.php?CusID=<?php echo $objResult2["pk"];?>" class="btn btn-sm " style="background-color: #FFF; border-radius: 5px;  border-color: #F77369; border: 1px solid  #F77369;   margin-top: -5px; " >
							<font size="3px" color="#F77369" style=" font-size: 13px; " >  แก้ไข </font></a>
								
							</font></div></td> 


							</tr>  
							<?php $i++;  } ?>
							</tbody>


							</table>  
							</div>
						  </div>


						  <?php } ?>

                   		   
						<div class="col-lg-12">
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
							<br><br><br><br><br><br><br><br> 
						</div>    
                   		    
                </div>
              </div>
            </div>
            
             
             
            
             
                   		   
        </div>
 
<?php
include('footer2.php');
?>