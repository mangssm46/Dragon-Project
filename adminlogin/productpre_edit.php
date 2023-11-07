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
	if(empty($_GET["searchname2"])){
		
	}else{
		$searchname2 = $_GET["searchname2"];
	}

 
	$sql = "SELECT * FROM product_pre Where  pk = '". $_GET["CusID"] ."' ";  
	$query = mysqli_query($objCon,$sql); 
	while($objResult = mysqli_fetch_array($query))
	{  
		$name = $objResult["name"];      
		$typedata = $objResult["typedata"];   
		$typedata2 = $objResult["typedata2"];    
		$detail = $objResult["detail"];    
		$startdate = $objResult["startdate"];    
		$timeend = $objResult["timeend"];    
		$bill_no = $objResult["bill_no"];     
		$enddate = $objResult["enddate"];    
		$timeend2 = $objResult["timeend2"]; 
	}  
?>  
        
	 							
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        											 
	<link href='calenthai/css/jquery-ui-1.8.10.custom.css' rel='stylesheet' type='text/css'/>

	<script type="text/javascript" src="calenthai/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="calenthai/js/jquery.datepick.js"></script>

	<script type="text/javascript"> 
	$(document).ready(function() {
		var d = new Date();
		d.setDate(d.getDate());
		var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear()); 

		$(".current").datepicker({    
		changeMonth: true, 
		changeYear: true, 
		dateFormat: 'dd/mm/yy', 
		isBuddhist: false, 
		defaultDate: toDay, 
		dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		yearRange: "+0:+5",
			  dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
			  monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
			  monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
			});
	}); 
	</script>																
										
										
       <!-- page content -->
        	<div class="right_col" role="main" style="background-color: #F5F5F7; " >
           
             
             <div class=" col-lg-12 " style="  " align="left" >
             <font color="#FFFFFF" size="3px" class="serif2"  >
             <div style="margin-top: 1px;" > 
                     <font size="4px" color="#FF6633" class="serif">  ข้อมูลรายการสินค้า (พรีออเดอร์) - แก้ไขรายการ      </font>  
                     <br> 
                     <font size="2px" color="#767676" class="serif">  หน้าเเรก > ข้อมูลรายการสินค้า (พรีออเดอร์) - แก้ไขรายการ     </font>   
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
                     <font size="4px" color="#000000" class="serif">  ข้อมูลรายการสินค้า (พรีออเดอร์) - แก้ไขรายการ       </font>   
                  </div> 
                  </font> 
                  </div>
                 
                      <?php if(empty($_GET["page"])){ ?>
                        
                        
                          <form role="form" name="frmMain" method="post" action="save_productpre_update.php" enctype="multipart/form-data" onsubmit="return validateForm()" >
						  
						   <input type="hidden" id="idupdate" name="idupdate" value="<?php echo $_GET["CusID"]; ?>" >
						   <input type="hidden" id="bill_no" name="bill_no" value="<?php echo $bill_no; ?>" >
 
                            

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
							         
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> วันทีเปิดพรีออเดอร์ </font>
									 <input type="text" class="form-control current" id="startdate" name="startdate"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $startdate; ?>" readonly  >
								  </div>
							   </div>  
							         
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> สิ้นสุดการพรีออเดอร์ </font>
									 <input type="time" class="form-control" id="timeend" name="timeend"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $timeend; ?>"  >
								  </div>
							   </div>  
  
							         
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> วันทีเปิดพรีออเดอร์ </font>
									 <input type="text" class="form-control current" id="enddate" name="enddate"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $enddate; ?>" readonly  >
								  </div>
							   </div>  
							         
							   <div class="col-md-6 "> 
								  <div class="form-group"> 
									 <font class="serif" size="3px" color="black" for="address"> สิ้นสุดการพรีออเดอร์ </font>
									 <input type="time" class="form-control" id="timeend2" name="timeend2"   autocomplete="off"    style="border: 1px solid #CACACA; height: 40px;  border-radius: 5px; background-color: #FFF; "    value="<?php echo $timeend2; ?>"  >
								  </div>
							   </div>  
							   <div class="col-md-12 ">     </div>  
							      
							  </div> 
							   
							    
							  <div class="col-md-7">
							  <div class="col-md-12" align="left"  > 
								   <font color = '#FF0000' size="4px" > *** การลบรูปภาพจะมีผลทันที่  </font>   
							  </div> 
							  
							 		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
									<link rel="stylesheet" href="upload_image2/css/style.css">  
									<script src="upload_image2/js/app.js"></script> 
									
									<ul id="media-list" class="clearfix">
										<?php 
											$sql = "SELECT * FROM product_img where bill_no = '".$bill_no."'  order by pk asc  "; 
											$query = mysqli_query($objCon,$sql);
											while($objResult = mysqli_fetch_array($query))
											{ 
											?> 
												<li class="myupload"  > 
												<img src='../img/<?php echo $objResult["img"]; ?>' /><div  class='post-thumb'><div class='inner-post-thumb'>
												
												<a  data-id='' class='remove-pic' onClick="myFunction<?php echo $objResult["pk"]; ?>(<?php echo $objResult["pk"]; ?>)" style="cursor: pointer;">
												<i class='fa fa-times' aria-hidden='true' style="color: #FFF;"></i></a>
												
												<script>
												function myFunction<?php echo $objResult["pk"]; ?>(Delepk) {
												   
													$.ajax({
														type: "POST",
														url: "delete_img.php",
														data: {del:Delepk},
														success: function( ) {   
														}
													});   
													
												}
												</script> 
												</li> 
											 
											 <?php } ?>
											 
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
									 <font class="serif" size="3px" color="black" for="address"> รายการตัวเลือกย่อย   </font> 
								  </div>
							   </div>  
							   </div>  
							   
							   <div class="col-lg-12 ">  
								<a onClick="save_drop()"        >
								<div class="col-lg-12 "> 
								<div class="col-md-5" align="center"  style="margin-top: 10px; background-color: #FF6633; cursor: pointer; "  >
								<div style="margin-top: 8px; margin-bottom: 8px; "  >
								<font color = '#FFF' size="3px" > เพิ่มตัวเลือกรายการย่อย </font>    
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
									var bill_no = document.getElementById("bill_no").value;
										$.ajax({
											type: "GET",
											url: "get_show_datapre_re.php?bill_no="+bill_no,
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
											url: "delete_product_listpre.php",
											data: {del:int1},
											success: function( ) {  
											 getTabel_new_con();  
											}
										});   
									});


									function save_drop()
									{ 
										 var bill_no = document.getElementById("bill_no").value;
										 var jsonString = "";  
											$.ajax({
												type: "POST",
												url: "save_addpre_re.php?bill_no="+bill_no,
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
												url:'upload_imgpre.php?pksave='+Savedata, //ให้ระบุชื่อไฟล์ PHP ที่เราจะส่งค่าไป
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
											url: "save_totalpre.php", 
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

								
							  	  <a href="productpre.php">
							  	  	 
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