<?php
session_start();
include("database.php");
    
	$calstartotal = 0;
	$calstar = 0;
	$total = 0;
 	if(!empty($_GET["productment"])){
		 
	$productment = $_GET["productment"];  
    $sql = "SELECT * FROM list_order where menu_id = '".$productment."' and star != '' and noteaddress = 'Productpre'    order by pk desc ";  
    $query = mysqli_query($objCon,$sql); 
    while($objResult = mysqli_fetch_array($query))
    {   
		$calstar += $objResult["star"];
		$bill_no = $objResult["bill_no"];
		$total++;
	}

	
	$calstartotal = 0;
	if($total <= 0){ 
	}else{ 
	$calstartotal = $calstar / $total; 
	}
	}
?>
 

	 
	<?php if($calstartotal == 5){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" >  
	<?php }else if($calstartotal == 4){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<?php }else if($calstartotal == 3){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<?php }else if($calstartotal == 2){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<?php }else if($calstartotal == 1){ ?>
	<img src="images/star.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<img src="images/star2.png" style=" width: 14px;" > 
	<?php } ?>
	    
	(<?php echo number_format(0+$calstar); ?>)  
	


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