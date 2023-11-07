<?php 
include('../database.php'); 
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorHTML.php"; 
?>

<script> 
window.print(); 
</script>  
<?php
	function Convert($amount_number) {
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

	function ReadNumber($number) {
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

	function DateThai($strDate) {
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

	function DateThai2($strDate) {
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

	function DateThai3($strDate) {
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

	function DateThai4($strDate) {
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

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>    ปริ้นแบบ A5  </title>
		<style>
			@font-face {
			  	font-family: SukhumvitSet-Bold;
			  	src: url('../newfont/SukhumvitSet-Bold.ttf'); 
			}
			@font-face {
			  	font-family: SukhumvitSet-Light;
			  	src: url('../newfont/SukhumvitSet-Light.ttf'); 
			}
			@font-face {
			  	font-family: SukhumvitSet-Medium;
			  	src: url('../newfont/SukhumvitSet-Medium.ttf'); 
			}
			@font-face {
			  	font-family: SukhumvitSet-SemiBold;
			  	src: url('../newfont/SukhumvitSet-SemiBold.ttf'); 
			}
			
			.PromptR {
		  		font-family:  Prompt-Regular, PromptR;
			}

			.PromptEL {
			  font-family:  Prompt-ExtraLight, PromptEL;
			}

			body {
			    font-family: SukhumvitSet-Medium, serif;
			    font-size: 15px;
			}

			* {
				color-adjust: exact;
				-webkit-print-color-adjust: exact;
				print-color-adjust: exact;
				box-sizing: border-box;
			}

			.padding-0 {
				padding: 0px !important;
			}

			.pr-10 {
				padding-right: 10px;
			}

			.bg-black {
				background-color: #000;
				color: #fff;
			}

			.bg-logo {
				background-color: #cdff02;
			}
			
			.block-left {
			    display: inline-block;
			    vertical-align: top;
			}

			.block-right,
			.block-center {
				display: inline-block;
			}

			#bill { 
			  	border-collapse: collapse;
			    width: 100%;
			    max-width: 1000px;
			    margin: auto;
			    border-radius: 10px;
			    overflow: hidden;
			    border: none;
			} 

			#bill .tbody {
			    display: block;
			    border-radius: 10px;
			    overflow: hidden;
			    border: 1px solid #a2a2a2;
			}

			#bill td,
			#bill th {
			    border: 1px solid #ddd;
			    padding: 10px;
			    font-size: 14px;
			}

			@page { size: landscape; }
	 	</style>
	</head>  
	<body>  
    	 <?php
			$bill_no = $_GET["bill_no"];//รหัส Barcode ที่ต้องการสร้าง

			$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
			$border = 2;//กำหนดความหน้าของเส้น Barcode
			$height = 50;//กำหนดความสูงของ Barcode
 
		?>      
		  
		<style>
		#customers { 
		  border-collapse: collapse;
		  width: 55%;
		}
		
		#customers td, #customers th {
		  border: 1px solid #A9A9A9; 
		}  
 	    </style>
   
	   <table width="550px" border="1" id="customers" >
	   <tr>
	   		<td width="50%" >  
	   		<div align="center" >
	   		<font size="2px">  
			ผู้ส่ง    
 			</font>  
  			</div> 
	   		<td width="50%" > 
	   		<div align="center" >
	   		<font size="2px">  
			ผู้รับ   
 			</font>  
  			</div>
   			</td>
	   	</tr>
	   <tr>
	   		<td valign="top" >  
	   		<div style="margin-left: 5px; margin-top: 10px; margin-bottom: 10px;  ">
	   		<font size="2px">  
		 	NAME :    DRAGON FOOTBALL SHIRT <br>
			
			PHONE :   012-3456789 <br> <br>
			 
			ADDRESS :  21/75 ซอยเคหะคลองเตย ถนนอาจณรงค์  แขวงคลองเตย เขตคลองเตย กรุงเทพ 10110  <br>
			 
 			</font>  
  			</div>
   			</td> 
	   		<td  valign="top">  
	   		<div style="margin-left: 5px; margin-top: 10px; margin-bottom: 10px;  ">
		<?php
		$sql = " SELECT a.*, b.name FROM list_order a
		Inner Join customer b  On a.create_by = b.pk
		where a.bill_no != ''  and a.bill_no = '".$bill_no."' Group By a.bill_no order by a.pk desc    ";    
				 
		$query = mysqli_query($con,$sql); 
		while($objResult = mysqli_fetch_array($query))
		{     
			$discountprice = 0;
			if(!empty($objResult["discountprice"])){
				$discountprice = $objResult["discountprice"];
			}
			$sendprice = 0;
			if(!empty($objResult["sendprice"])){
				$sendprice = $objResult["sendprice"];
			}
			
			
			$total1 = 0;
			$sql2 = "SELECT * FROM list_order Where  bill_no = '". $objResult["bill_no"]."' ";   
			$query2 = mysqli_query($objCon,$sql2); 
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$total1 += $objResult2["price"] * $objResult2["total"]; 
			}	
 

			$address = "-";
			$all_address = "-";
			$namefull = "-";
			$nametelphone = "-";
			$sql2 = "SELECT * FROM customer Where  pk = '". $objResult["create_by"]."' ";   
			$query2 = mysqli_query($objCon,$sql2); 
			while($objResult2 = mysqli_fetch_array($query2))
			{
				$namefull = $objResult2["name"];
				$nametelphone = $objResult2["telphone"];
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
 
 
			$totalprice = $total1 + $sendprice - $discountprice;
			$typedatasend = $objResult["typedatasend"];
			$numbersend = $objResult["numbersend"];
			
			}
		?>
	   		
	   		
	   		
	   		<font size="2px">  
		 	หมายเลขพัสดุ :   
			<?php echo $numbersend; ?>  <br>
				
		 	NAME :   
			<?php echo $namefull; ?>  <br>
			
			PHONE :  
			<?php echo $nametelphone; ?>   <br> <br>
			
			
			ADDRESS : 
			<?php echo $all_address; ?>  <br>
			 
 			</font>  
  			</div>
   			</td> 
	   	</tr>
	   	
	   	<tr>
	   		<td align="center"> 
			<?php 
			echo $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
			echo $code ;
			?>
   			</td>
	   		<td align="center">  
   			<?php
 
				//set it to writable location, a place for temp generated PNG files
				$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'QR/temp'.DIRECTORY_SEPARATOR;
				
				//html PNG location prefix
				$PNG_WEB_DIR = 'QR/temp/';
			
				include "QR/qrlib.php";    
				
				//ofcourse we need rights to create temp dir
				if (!file_exists($PNG_TEMP_DIR))
					mkdir($PNG_TEMP_DIR);
 
  
				$filename = $PNG_TEMP_DIR."99".$code.rand(11111111111,9999999999).'.png';
				$url_login =  "https://abl-bot.com/dragon/index.php?bill_no=".$code;
			
					// user data
				$filename = $PNG_TEMP_DIR.'test'.md5($url_login.'|'."S".'|'."7").'.png';
				QRcode::png($url_login, $filename, "S", "6.7", 1); 
				
				//display generated file
				echo '<img src="'.$PNG_WEB_DIR.basename($filename).'"  width="50%" /> '; 
				//echo $PNG_WEB_DIR.basename($filename); 
				?>
   	
   			</td>
	   	</tr>
	   	 
	   </table>                                 
	</body>
</html>