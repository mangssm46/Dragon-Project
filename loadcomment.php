<?php
session_start();
include("database.php");
    
 
	$productment = $_GET["productment"]; 
    $sql = "SELECT * FROM list_order where menu_id = '".$productment."' and star != ''  and noteaddress = 'Product'   order by pk desc "; 
    $query = mysqli_query($objCon,$sql); 
    while($objResult = mysqli_fetch_array($query))
    {  
		
		$getstart = $objResult["star"];
		$bill_no = $objResult["bill_no"];
?>
   
	<div class="col-lg-12"  style=" border: 1px solid #D8D8D8; border-radius: 10px; ">
          
    <div class="row" style=" padding-left: 10px; padding-right: 15px; padding-top: 15px; padding-bottom: 15px; ">
	<div class="col-md-1">
	<img src="logo.png" style=" border-radius: 180px; width: 100%; " >   
	</div>
	<div class="col-md-11"> 
	<?php echo datethai($objResult["c_date"])." ".datethai2($objResult["c_date"]); ?> 
	เวลา <?php echo $objResult["c_time"]; ?> น  &nbsp;&nbsp;&nbsp; <?php echo number_format(0+$getstart, '1', '.', '.'); ?> คะแนน  &nbsp;&nbsp;
	 
	<?php if($getstart == 5){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<?php }else if($getstart == 4){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<?php }else if($getstart == 3){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<?php }else if($getstart == 2){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<?php }else if($getstart == 1){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<?php } ?>
	   
	<div  style="margin-top: 10px;"> </div>
	<?php echo $objResult["reviewnote"]; ?>
	</div>
	
	
	<div class="col-md-12">
    <div class="row" style=" padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; ">
	<div class="col-md-1">
	 &nbsp;  
	</div>
	<div class="col-md-11">
	<?php  
	$namesize = "";
	$sql_p = "SELECT * FROM product_img where bill_no = '".$bill_no."' order by pk asc  "; 
	$query_p = mysqli_query($objCon,$sql_p);
	while($objResult_p = mysqli_fetch_array($query_p))
	{ 
	?>
	<div class="col-md-1">
	 <img src="img/<?php echo $objResult_p["img"]; ?>" style="width: 100%;"  >
	</div>
	<?php
	}
	?>
	</div>
	</div>
	</div>
		
	
	
	
	</div>
   
	</div>
<?php
    } 
?>



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