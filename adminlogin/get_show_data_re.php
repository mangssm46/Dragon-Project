<?php
session_start();
include('../database.php');
    
    $html = ''; 
	 
 	$bill_no = $_GET["bill_no"];
	$i = 1; 
	$sql = "  
	SELECT *  FROM product_list  
	where bill_no = '".$bill_no."' 
	order by  pk asc "; 
	$query = mysqli_query($objCon,$sql); 
	while($objResult = mysqli_fetch_array($query))
	{   
		$color = $objResult["color"];
		$size = $objResult["size"];
		$price = $objResult["price"];
		$total = $objResult["total"];
		$img = $objResult["img"];
		$discount = $objResult["discount"];
		$statusproduct = $objResult["statusproduct"];
		$statusproduct2 = $objResult["statusproduct2"];

?>  
		<div class="col-lg-12" style=" border: 1px solid #C9C9C9; margin-top: 10px;  "> 
  
		<div class="row">
			<div class="col-lg-2">  
			
				<div class="col-md-12"  style="margin-top: 10px;"  > 
				<input type="hidden" id="savepk<?php echo $objResult["pk"]; ?>" value="<?php echo $objResult["pk"]; ?>" >

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
				function readURL<?php echo $objResult["pk"]; ?>(input, Savedatapk) { 
					if (input.files && input.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
							$('#blah1<?php echo $objResult["pk"]; ?>').attr('src', e.target.result);
						}

						reader.readAsDataURL(input.files[0]);


						var Savedata = $("#savepk<?php echo $objResult["pk"]; ?>").val();  
						//// alert(Savedatapk);

						var fd = new FormData(); // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object

						var files = $('#uploadG'+<?php echo $objResult["pk"]; ?>)[0].files; //เป็นการดึงข้อมูลรูปภาพเพื่อเตรียมเช็คไฟล์ก่อนทำงานส่วน Ajax


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
				}  
				</script>	
				 <?php
					$showimg = "images/up.png";
					if(!empty($img)){ 
					$showimg = "../img/".$img;
					}
				 ?>

				 <img src="<?php echo $showimg; ?>" style="width: 100%;" class="myAvatar<?php echo $objResult["pk"]; ?>" id="blah1<?php echo $objResult["pk"]; ?>" />
				 <input type="file" name="uploadG<?php echo $objResult["pk"]; ?>" id="uploadG<?php echo $objResult["pk"]; ?>" style="display:none;" onchange="readURL<?php echo $objResult["pk"]; ?>(this, <?php echo $objResult["pk"]; ?>);"  />
				 <script>
					$(".myAvatar<?php echo $objResult["pk"]; ?>").click(function() {
						$("#uploadG<?php echo $objResult["pk"]; ?>").trigger("click");
					});
				 </script> 

				</div>
			
			</div>
			<div class="col-lg-10">  
			
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > สี  </font>    
				<select class="form-control" id="colorG<?php echo $objResult["pk"]; ?>" name="colorG<?php echo $objResult["pk"]; ?>"     style="border-radius: 5px; border: 1px solid #C9C9C9; "   onChange="Chgtotal(<?php echo $objResult["pk"]; ?>)"   onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)"    > 
				<?php if(empty($color)){ ?>
					<option value="">  สี    </option>
				<?php } ?> 
				<?php 
					$sql_d = "SELECT * FROM typecolor where pk = '".$color."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
				?>
					<option value="<?php echo $objResult_d["pk"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				<?php 
					$sql_d = "SELECT * FROM typecolor where pk != '".$color."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
					?>
						<option value="<?php echo $objResult_d["pk"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				</select>
				</div> 
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > ไซต์  </font>    
				<select class="form-control" id="sizeG<?php echo $objResult["pk"]; ?>" name="sizeG<?php echo $objResult["pk"]; ?>"     style="border-radius: 5px; border: 1px solid #C9C9C9; "   onChange="Chgtotal(<?php echo $objResult["pk"]; ?>)"   onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)"    > 
				<?php if(empty($size)){ ?>
					<option value="">  ไซต์    </option>
				<?php } ?> 
				<?php 
					$sql_p = "SELECT * FROM typesize where pk = '".$size."' order by pk asc  "; 
					$query_p = mysqli_query($objCon,$sql_p);
					while($objResult_p = mysqli_fetch_array($query_p))
					{ 
				?>
					<option value="<?php echo $objResult_p["pk"]; ?>"><?php echo $objResult_p["name"]; ?></option> 
				<?php  
					}
				?>   
				<?php 
					$sql_p = "SELECT * FROM typesize where pk != '".$size."' order by pk asc  "; 
					$query_p = mysqli_query($objCon,$sql_p);
					while($objResult_p = mysqli_fetch_array($query_p))
					{ 
					?>
						<option value="<?php echo $objResult_p["pk"]; ?>"><?php echo $objResult_p["name"]; ?></option> 
				<?php  
					}
				?>   
				</select>
				</div> 
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" >  ราคา  </font>   

				<input type="text" class="form-control" id="priceG<?php echo $objResult["pk"]; ?>" name="priceG<?php echo $objResult["pk"]; ?>"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; "    value="<?php echo $price; ?>"    onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" maxlength="5"      onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)"   >

				</div>
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > สต๊อกคงเหลือ </font>   

				<input type="text" class="form-control" id="totalG<?php echo $objResult["pk"]; ?>" name="totalG<?php echo $objResult["pk"]; ?>"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; "    value="<?php echo $total; ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" maxlength="5"      onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)">

				</div>
				
				
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > ระบุส่วนลด % </font>   

				<input type="text" class="form-control" id="discount<?php echo $objResult["pk"]; ?>" name="discount<?php echo $objResult["pk"]; ?>"  autocomplete="off"      style="border-radius: 5px; border: 1px solid #C9C9C9; "    value="<?php echo $discount; ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" maxlength="3"      onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)">

				</div>
				
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > สถานะสินค้า  </font>   

				<select class="form-control" id="statusproducttwo<?php echo $objResult["pk"]; ?>" name="statusproducttwo<?php echo $objResult["pk"]; ?>"     style="border-radius: 5px; border: 1px solid #C9C9C9; "   onChange="Chgtotal(<?php echo $objResult["pk"]; ?>)"   onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)"    >  
				<?php if(empty($statusproduct2)){ ?>
					<option value="">  สถานะสินค้า    </option>
				<?php } ?> 
				<?php 
					$sql_d = "SELECT * FROM drop_statusproduct2 where name = '".$statusproduct2."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
				?>
					<option value="<?php echo $objResult_d["name"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				<?php 
					$sql_d = "SELECT * FROM drop_statusproduct2 where name != '".$statusproduct2."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
					?>
						<option value="<?php echo $objResult_d["name"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				</select>

				</div>
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > สถานะ  </font>   

				<select class="form-control" id="statusproduct<?php echo $objResult["pk"]; ?>" name="statusproduct<?php echo $objResult["pk"]; ?>"     style="border-radius: 5px; border: 1px solid #C9C9C9; "   onChange="Chgtotal(<?php echo $objResult["pk"]; ?>)"   onKeyUp="Chgtotal(<?php echo $objResult["pk"]; ?>)"    >  
				<?php if(empty($statusproduct)){ ?>
					<option value="">  สถานะ    </option>
				<?php } ?> 
				<?php 
					$sql_d = "SELECT * FROM drop_statusproduct where name = '".$statusproduct."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
				?>
					<option value="<?php echo $objResult_d["name"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				<?php 
					$sql_d = "SELECT * FROM drop_statusproduct where name != '".$statusproduct."' order by pk asc  "; 
					$query_d = mysqli_query($objCon,$sql_d);
					while($objResult_d = mysqli_fetch_array($query_d))
					{ 
					?>
						<option value="<?php echo $objResult_d["name"]; ?>"><?php echo $objResult_d["name"]; ?></option> 
				<?php  
					}
				?>   
				</select>

				</div>
			
				<div class="col-md-3"  style="margin-top: 10px;"  >
				<font color = '#000' size="3px" > &nbsp; </font>   
				<a  class="btn btn-sm btn-delete-fuck1" style="cursor: pointer;  background-color: #FF0000; border-radius: 5px; height: 35px; border-color: #FF0000; margin-top: 25px; "   data-id="<?php echo $objResult["pk"]; ?>"> 
				<font color="#FFF" size = "3px" > ลบรายการทิ้ง </font> </a> 

				</div>
			</div>
			
		</div>
		
		
		
		 


		<div class="col-lg-12">  &nbsp; </div>
		
		</div>
<?php $i++; } ?>
								 

<script> 
		function Commas(str)
		{
			var parts = str.toString().replace("," ,"").split(".");
			parts[0] = parts[0].replace("," ,"").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}
	function numberWithCommas2(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
 
<?php
				function DateThai($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strDay";
				}
				function DateThai2($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strMonthThai $strYear";
				}   
				function DateThai3($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strMonthThai ";
				}  
				function DateThai4($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
					$strMonthThai=$strMonthCut[$strMonth];
					return " $strYear";
				}  
	?>