<?php include('../database.php'); ?>
<script> 
window.print(); 
</script>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> บิลใบเสร็จชำระเงิน   </title>
</head>  
<style>
@font-face {
  font-family: SukhumvitSet-Medium;
  src: url('../fonts/Anuphan-VariableFont_wght.ttf'); 
}

@font-face {
  font-family: SukhumvitSet-SemiBold;
  src: url('../fonts/Anuphan-VariableFont_wght.ttf'); 
} 
	 
.serif {
  font-family:  SukhumvitSet-Medium, serif;
} 
.serif2 {
  font-family:  SukhumvitSet-SemiBold, serif;
}

</style>

<body class="serif">  
 
  <?php
function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
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

   
	
  <style>
		#customers { 
		  border-collapse: collapse;
		  width: 100%;
		}
		
		#customers td, #customers th {
		  border: 1px solid #000000; 
		}  
 </style>
 
  <style>
		#customers2 { 
		  border-collapse: collapse;
		  width: 99%;
		}
		  
		 #customers2 th { 
				border-bottom: 1px solid #000000;
				border-top: 1px solid #000000;
		}  
		 #customers2 td { 
				border-bottom: 1px solid #ddd;
		}  
 </style>
   	     
  <?php
	$getmoney = 0;
	
	$bill_no = $_GET["bill_no"];
	$address = "-";
	$all_address = "-";
	$namecustomer = "-";
	$telphone = "-";
	$sql = "SELECT * FROM list_order Where  bill_no = '". $_GET["bill_no"] ."' ";  
	$query = mysqli_query($objCon,$sql); 
	while($objResult = mysqli_fetch_array($query))
	{   
		$create_by = $objResult["create_by"];  
		$bill_no = $objResult["bill_no"]; 
		$create_by = $objResult["create_by"]; 
		$create_date = $objResult["create_date"]; 
		$create_time = $objResult["create_time"]; 
		 
  
		$sql2 = "SELECT * FROM customer Where  pk = '". $objResult["create_by"]."' ";   
		$query2 = mysqli_query($objCon,$sql2); 
		while($objResult2 = mysqli_fetch_array($query2))
		{
			$namecustomer = $objResult2["name"];
			$telphone = $objResult2["telphone"];
			$address1 = $objResult2["address1"];
			$address2 = $objResult2["address2"];
			$address3 = $objResult2["address3"];
			$address4 = $objResult2["address4"];


			$all_address = "";
			$sql_c = "SELECT * FROM country where PROVINCE_ID = '".$address1."'   order by PROVINCE_ID asc  "; 
			$query_c = mysqli_query($objCon,$sql_c);
			while($objResult_c = mysqli_fetch_array($query_c))
			{ 
					$all_address = $all_address." จังหวัด : ".$objResult_c["PROVINCE_NAME"];
			}

			$sql_c = "SELECT * FROM aumpher where PROVINCE_ID = '".$address1."' 
			and AMPHUR_ID = '".$address2."'  order by AMPHUR_ID asc  "; 
			$query_c = mysqli_query($objCon,$sql_c);
			while($objResult_c = mysqli_fetch_array($query_c))
			{ 

					$all_address = $all_address." อำเภอ : ".$objResult_c["AMPHUR_NAME"];
			}
			$sql_c = "SELECT * FROM tumbon where PROVINCE_ID = '".$address1."' 
			and AMPHUR_ID = '".$address2."' and DISTRICT_CODE = '".$address3."'  order by DISTRICT_ID asc  "; 
			$query_c = mysqli_query($objCon,$sql_c);
			while($objResult_c = mysqli_fetch_array($query_c))
			{ 
					$all_address = $all_address." ตำบล : ".$objResult_c["DISTRICT_NAME"];
			}
		}	 
	}  
   
								
?>
    	     
<table width="100%" border="0" style="margin-top: 10px;" > 
<tr>
 <td width="20%" align="center"  >  
	<img src="../logo.png" width="100px" />   
 </td>
 <td align="left"     >   
	<font size="3px" style=" font-size: 20px; ">  
	<b>
	DRAGON FOOTBALL SHIRT

	</b>
		<div style="margin-top: 5px; ">  </div>
	ที่อยู่ 21/75 ซอยเคหะคลองเตย ถนนอาจณรค์  แขวงคลองเตย เขตคลองเตย กรุงเทพ 10110
		<div>  </div>

	</font>
 </td>
</tr>    
</table>


<table width="100%" border="0" style="margin-top: 10px;" > 
<tr> 
 <td align="center"     >   
	<font size="3px" style=" font-size: 20px; ">  
	<b>

		 บิลใบเสร็จชำระเงิน

	</b>
	</font>
 </td>
</tr>    
</table>

<table width="100%"   style="margin-top: 10px;" > 
<tr> 
 <td width="100%" align="left"     >   
	<div style=" margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;   ">  
	<font size="3px" style=" font-size: 18px; ">  

		ข้อมูลลูกค้า <?php echo $namecustomer; ?>
		<div style="margin-top: 5px; ">  </div>
		ที่อยู่  <?php echo $all_address; ?>
		<div style="margin-top: 5px; ">  </div>
		โทร    <?php echo $telphone; ?>

	</font>
	</div>
 </td> 
</tr>    
</table>  
	         
<table width="100%"   style="margin-top: 10px;" > 
<tr> 
 <td width="100%" align="left"     >   
	<div style=" margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;   ">  
	<font size="3px" style=" font-size: 18px; ">  

		เลขที่ใบสั่งซื้อสินค้า <?php echo $bill_no; ?>
		<div style="margin-top: 5px; ">  </div>
		วันที่  <?php echo DateThai($create_date)." ".DateThai($create_date); ?> 

	</font>
	</div>
 </td> 
</tr>    
</table>  
	         
	         
<table width="100%"   style="margin-top: 10px;" > 
<tr> 
<td width="100%" align="left"     >   
<div style=" margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;   ">  
<font size="3px" style=" font-size: 18px; ">   รายการสั่งสินค้า
<?php 
$bg = "#F8FAFD"; 
$i = 1;
$total = 0;
$totalprice1 = 0;
$totalprice2 = 0;
$totalprice3 = 0;
$totalprice4 = 0; 
$discountprice = 0; 
$slip = ""; 


$sql2 = "  SELECT *  FROM list_order 
where  bill_no != ''  and bill_no = '".$bill_no."'  
order by pk asc   ";   
$query2 = mysqli_query($con,$sql2); 
while($objResult2 = mysqli_fetch_array($query2))
{
if($bg == "#FFF"){ 
	$bg = "#F8FAFD"; 
}else{  
	$bg = "#FFF"; 
}
$pricepro = $objResult2["price"];
$totalpro = $objResult2["total"];
$discountprice = $objResult2["discountprice"];
$slip = $objResult2["slip"];

$create_date = $objResult2["create_date"];
$create_date2 = $objResult2["create_date2"];
$create_time = $objResult2["create_time"];
$create_by = $objResult2["create_by"];
$pkselect = $objResult2["pk"];
$bill_no = $objResult2["bill_no"];
$menuid = $objResult2["menu_id"];


$namepro = "-"; 
$typepro = "-"; 
$code_pro = "-";   
$img = "";
$size = "";
$namesize = "";
$sql_p = "SELECT a.*, b.name, b.typedata2 FROM product_list a 
Inner Join product b On a.bill_no = b.bill_no 
where a.pk = '".$menuid."' ";
$query_p = mysqli_query($objCon,$sql_p); 
while($objResult_p = mysqli_fetch_array($query_p))
{ 
	$namepro = $objResult_p["name"]; 
	$typepro = $objResult_p["typedata2"];
	$code_pro = $objResult_p["bill_no"];   
	$img = $objResult_p["img"];
	$size = $objResult_p["size"];

	
	$namesize = "";
	$sql_c = "SELECT * FROM typesize where pk = '".$size."'   order by pk asc  "; 
	$query_c = mysqli_query($objCon,$sql_c);
	while($objResult_c = mysqli_fetch_array($query_c))
	{ 
			$namesize =  $objResult_c["name"];
	}
}



$pasy_onoff = $objResult2["pasy_onoff"];
$hiiden1 = "";
$hiiden2 = "display: none;";
if($pasy_onoff == "ON"){  
$hiiden1 = " display: none; ";
$hiiden2 = " ";
}
 
$totalsum = $totalpro * $pricepro;
?> 	 

<div align="left" style="margin-top: 10px; "><font size="3px" color="Black" style=" font-size: 18px; " > <?php echo $namepro; ?>  </font></div>			          
<div align="left"><font size="3px" color="Black" style=" font-size: 18px; " > 
ราคา <?php echo number_format(0+$pricepro);?> บาท 
<?php echo number_format(0+$totalpro);?> ตัว 
ราคา <?php echo number_format(0+$totalsum);?> บาท 
ไซต์ <?php echo $namesize; ?>  </font></div>			          

<?php  $totalprice1 += $totalsum;   } ?>	 
  
</font>
</div>
</td> 
</tr>    
</table>       

<table width="100%"   style="margin-top: 10px;" > 
<tr> 
 <td width="80%" align="right"     >   
	<div style=" margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;   ">  
	<font size="3px" style=" font-size: 18px; ">  

		ยอดรวม <?php 
		
		if(empty($totalprice1)){
			$totalprice1 = 0;
		}
		
		echo number_format(0+$totalprice1); 
		
		?> บาท
		<div style="margin-top: 5px; ">  </div>
		โค้ตส่วนลด <?php 
		
		if(empty($discountprice)){
			$discountprice = 0;
		}
		
		echo number_format(0+$discountprice);
		
		?> บาท
		<div style="margin-top: 5px; ">  </div>
		ค่าขนส่ง 100 บาท
		<div style="margin-top: 5px; ">  </div>
		ยอดชำระทั้งหมด <?php echo number_format(0+$totalprice1+100-$discountprice)   ;?> บาท
		<div style="margin-top: 5px; ">  </div>

	</font>
	</div>
 </td> 
 <td width="20%" align="left"     >   
	<div style=" margin-left: 10px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;   ">  
	<font size="3px" style=" font-size: 18px; ">  

	  <?php if(empty($slip)){ }else{ ?>
		 <img src="../img/<?php echo $slip; ?>" width="100%">
		 <?php } ?>

	</font>
	</div>
 </td> 
</tr>    
</table>	         
	         
		         
</body>
</html>