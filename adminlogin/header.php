 <?php 
include("../database.php");

	if(empty($_SESSION["UserID"]) ){ 
		if (isset($_COOKIE["UserID"])){
			$_SESSION["UserID"] = $_COOKIE["UserID"];
			$_SESSION["Status"] = $_COOKIE["Status"];
			$_SESSION["User"] = $_COOKIE["User"];
			$_SESSION["Fullname"] = $_COOKIE["Fullname"]; 
			$_SESSION["Major"] = $_COOKIE["Major"];
		} else { 
			echo("<script>alert(' กรุณาล็อกอิน !')</script>");
			echo("<script>window.location = '../index.php';</script>");
		}
    }
	 
ini_set("memory_limit","10M");
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
<?php
 function DateDiff($strDate1,$strDate2)
 {
			return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
 }
 function TimeDiff($strTime1,$strTime2)
 {
			return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }
 function DateTimeDiff($strDateTime1,$strDateTime2)
 {
			return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../logo.png" type="image/ico" />

    <title> DRAGON FOOTBALL SHIRT </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
 
    <link href="build/css/custom.min.css" rel="stylesheet">
     
     
	<link rel="stylesheet" media="all" type="text/css" href="jquerydatepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="jquerydatepicker/jquery-ui-timepicker-addon.css" />
        
        <script type="text/javascript" src="jquerydatepicker/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="jquerydatepicker/jquery-ui.min.js"></script>
        
        <script type="text/javascript" src="jquerydatepicker/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="jquerydatepicker/jquery-ui-sliderAccess.js"></script>
        
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        
  </head>
  
 <style>
@font-face {
  font-family: SukhumvitSet-Medium;
  src: url('../fonts/IBMPlexSansThai-SemiBold.ttf'); 
}
 
.serif {
  font-family:  SukhumvitSet-Medium, serif;
} 
.serif2 {
  font-family:  SukhumvitSet-Medium, serif;
}

</style>
 
  <body class="nav-md serif " style="background-color: #35363C;">
    <div class="container body"  style=" background-color: #FF6633; "  >
      <div class="main_container"  style="background-color: #35363C;" >
        <div class="col-md-3 left_col"   style=" background-color: #FF6633;  " >
          <div class="left_col scroll-view" style="background-color: #35363C;"> 
           
              <div class="navbar nav_title"  style="  background-color: #FF6633;   " align="left">
              <a href="index.php" class="site_title"   >
              <img src="../logo.png" style="width: 30px; " >   
              <font size="2px" class="serif"  color="#FFF" style="font-size: 15px;"> ระบบจัดการหลังบ้าน </font>  
              </a> 
              <div style=" margin-top: 5px; ">  </div>
              </div>

            <div class="clearfix"></div> 
            <br />
			 <?php 
						$loaddata = $_SESSION["load"];

			  				$page1 = "#35363C"; 
							$page2 = "#35363C";  
							$page3 = "#35363C";  
							$page4 = "#35363C";  
							$page5 = "#35363C";  
							$page6 = "#35363C";  
							$page7 = "#35363C";    
							$page8 = "#35363C";    
							$page9 = "#35363C"; 
							$page10 = "#35363C"; 
							$page11 = "#35363C"; 
							$page12 = "#35363C"; 
							$page13 = "#35363C"; 
			  
			  				$txt1 = "#FFF"; 
							$txt2 = "#FFF";  
							$txt3 = "#FFF";  
							$txt4 = "#FFF";  
							$txt5 = "#FFF";   
							$txt6 = "#FFF";   
							$txt7 = "#FFF";   
							$txt8 = "#FFF";   
							$txt9 = "#FFF";   
							$txt10 = "#FFF";   
							$txt11 = "#FFF";   
							$txt12 = "#FFF";   
							$txt13 = "#FFF";   
			     
							 	
							if($loaddata == "1"){
								$page1 = "#FF6633";
								$txt1 = "#FFF";
								$page1bg = " "; 
							}else if($loaddata == "2"){
								$page2 = "#FF6633";
								$txt2 = "#FFF";
								$page2bg = " "; 
							}else if($loaddata == "3"){
								$page3 = "#FF6633";
								$txt3 = "#FFF";
								$page3bg = " "; 
							}else if($loaddata == "4"){
								$page4 = "#FF6633"; 
								$txt4 = "#FFF";
								$page4bg = " ";  
							}else if($loaddata == "5"){
								$page5 = "#FF6633";
								$txt5 = "#FFF"; 
								$page5bg = " ";  
							}else if($loaddata == "6"){
								$page6 = "#FF6633"; 
								$txt6 = "#FFF";
								$page6bg = " ";  
							}else if($loaddata == "7"){
								$page7 = "#FF6633"; 
								$txt7 = "#FFF";
								$page7bg = " ";  
							}else if($loaddata == "8"){
								$page8 = "#FF6633"; 
								$txt8 = "#FFF";
								$page8bg = " ";  
							}else if($loaddata == "9"){
								$page9 = "#FF6633"; 
								$txt9 = "#FFF";
								$page9bg = " ";  
							}else if($loaddata == "10"){
								$page10 = "#FF6633"; 
								$txt10 = "#FFF";
								$page10bg = " ";  
							}else if($loaddata == "11"){
								$page11 = "#FF6633"; 
								$txt11 = "#FFF";
								$page11bg = " ";  
							}else if($loaddata == "12"){
								$page12 = "#FF6633"; 
								$txt12 = "#FFF";
								$page12bg = " ";  
							}else if($loaddata == "13"){
								$page13 = "#FF6633"; 
								$txt13 = "#FFF";
								$page13bg = " ";  
							}
			 ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print  " style=" margin-top: -10px; ">
              <div class="menu_section">
                 
                <ul class="nav side-menu">
                 	
                  	<li class="<?php echo $page1bg; ?>" style="background-color: <?php echo $page1; ?>"  ><a href="index.php"> <img src="images/a1.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt1; ?>" style=" font-size: 11px; "> &nbsp;  ตรวจสอบคำสั่งซื้อพรีออเดอร์ </font> </a> </li> 
                  	 
                  	  
                 	
                  	<li class="<?php echo $page2bg; ?>" style="background-color: <?php echo $page2; ?>"  ><a href="checkproduct.php"> <img src="images/a2.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt2; ?>" style=" font-size: 11px; "> &nbsp; ตรวจสอบรายการคำสั่งซื้อสินค้า </font> </a> </li> 
                  	
                  	
                 	
                  	<li class="<?php echo $page11bg; ?>" style="background-color: <?php echo $page11; ?>"  ><a href="backpreproduct_n.php"> <img src="images/a2.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt11; ?>" style=" font-size: 11px; "> &nbsp; รายการคืนสินค้า </font> </a> </li> 
                  	
                 	
                  	<li class="<?php echo $page12bg; ?>" style="background-color: <?php echo $page12; ?>"  ><a href="backpreproduct_p.php"> <img src="images/a2.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt12; ?>" style=" font-size: 11px; "> &nbsp; รายการคืนสินค้าพรีออเดอร์ </font> </a> </li> 
                  	
                  	
                  	<li class="<?php echo $page3bg; ?>" style="background-color: <?php echo $page3; ?>"  ><a href="stockproduct.php"> <img src="images/a3.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt3; ?>" style=" font-size: 11px; "> &nbsp;  ข้อมูลรายการสินค้า (มีสต๊อก) </font> </a> </li> 
                  	
                  	<?php if($_SESSION["Status"]  == "A"){ ?> 
                  	<li class="<?php echo $page10bg; ?>" style="background-color: <?php echo $page10; ?>"  ><a href="bank.php"> <img src="images/a3.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt10; ?>" style=" font-size: 11px; "> &nbsp; จัดการข้อมูลธนาคาร  </font> </a> </li> 
                  	<?php } ?>
                  	
                  	<li style="margin-top: -8px; ">  <hr style=" border: 1px solid #FFF; width: 60% " > </li>
                    
                  	<li style="margin-top: -8px; "><a href="incomeproduct.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  รับสินค้า     </font> </a>  </li> 
                  	<li style="margin-top: -8px; "><a href="typeproduct.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ประเภทสินค้า     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="product.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  เพิ่มรายการสินค้า     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="typecolor.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ประเภทสี     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="typesize.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ประเภทไซต์     </font> </a>  </li> 
                  	<li style="margin-top: -8px; "><a href="typesend.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ประเภทขนส่ง     </font> </a>  </li> 
                  	
                  	
                  	<li style="margin-top: -8px; ">  <hr style=" border: 1px solid #FFF; width: 60% " > </li>
                  	
                  	
                  	<li class="<?php echo $page5bg; ?>" style="background-color: <?php echo $page5; ?>"  ><a href="#"> <img src="images/a4.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt5; ?>"  style=" font-size: 11px; " > &nbsp;  ข้อมูลรายการสินค้า(พรีออเดอร์) </font> </a> </li> 
                  	<li style="margin-top: -8px; "><a href="productpre.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  เพิ่มรายการสินค้า     </font> </a>  </li>  
                  	<li style="margin-top: -8px; "><a href="prodcutwait.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ยอดรายการยอดเงินมัดจำสินค้า     </font> </a>  </li> 
                  	
                  	
                  	
                  	<li style="margin-top: -8px; ">  <hr style=" border: 1px solid #FFF; width: 60% " > </li>
                  	
                  	<li class="<?php echo $page6bg; ?>" style="background-color: <?php echo $page6; ?>"  ><a href="createcode_data.php"> <img src="images/a5.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt6; ?>" style=" font-size: 11px; "> &nbsp; สร้างโค้ดส่วนลด </font> </a> </li> 
                  	
                  	<li class="<?php echo $page7bg; ?>" style="background-color: <?php echo $page7; ?>"  ><a href="createpaper.php"> <img src="images/a6.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt7; ?>" style=" font-size: 11px; "> &nbsp; พิมพ์ใบปะสินค้าปกติ </font> </a> </li> 
                  	
                  	<li class="<?php echo $page13bg; ?>" style="background-color: <?php echo $page13; ?>"  ><a href="paperpre.php"> <img src="images/a6.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt13; ?>" style=" font-size: 11px; "> &nbsp; พิมพ์ใบปะสินค้าพรีออเดอร์ </font> </a> </li> 
                  	
                  	
                  	<?php if($_SESSION["Status"]  == "A"){ ?> 
                  	<li class="<?php echo $page8bg; ?>" style="background-color: <?php echo $page8; ?>"  ><a href="staff.php"> <img src="images/a7.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt8; ?>" style=" font-size: 11px; "> &nbsp; เพิ่มข้อมูลพนักงาน </font> </a> </li> 
                  	<?php } ?>
                  	  
                  	
                  	<li style="margin-top: -8px; ">  <hr style=" border: 1px solid #FFF; width: 60% " > </li>
                  	
                  	<li class="<?php echo $page9bg; ?>" style="background-color: <?php echo $page9; ?>"  ><a href="#"> <img src="images/a8.png" style="width: 15px; margin-left: 5px; " > <font size="2px"  color="<?php echo $txt7; ?>"> &nbsp;  สรุปรายงาน </font> </a> </li> 
                  	<li style="margin-top: -8px; "><a href="report1.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  รายงานค่าสินค้า/ค่าส่งปกติ     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="report11.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  รายงานค่าสินค้า/ค่าส่งพรีออเดอร์     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="report2.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ยอดขายปกติ     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="report22.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  ยอดขายพรีออเดอร์     </font> </a>  </li>
                  	<li style="margin-top: -8px; "><a href="report3.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  รายงานการสั่งซื้อปกติ     </font> </a>  </li> 
                  	<li style="margin-top: -8px; "><a href="report33.php"> &nbsp; <img src="images/bb.png"  style="width: 5px; margin-left: 8px; " > <font size="1px" style=" font-size: 11px; "  color="#FFF">  &nbsp;  รายงานการสั่งซื้อพรีออเดอร์     </font> </a>  </li> 
                  	
                  	
                  	 
                    
                </ul>
              </div> 
            </div>
            <!-- /sidebar menu -->

           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav"  >
          <div class="nav_menu"  style=" background-color: #FF6633; height: 58px;   ">
              <div class="nav toggle" >
                <a id="menu_toggle"> <img src="images/bar.png" style="width: 28px; display: none; ">  </a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                 
                 <!--
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                     <font size="2px" color="#FFF"> ยินตอนรับ คุณ นิด วัดดวง  สถานะ CEO    </font>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown"> 
                    <a class="dropdown-item"  href="profile.php"><font size="2px" color="black"> แก้ไขข้อมูลส่วนตัว </font></a>  
                    <a class="dropdown-item"  href="../check_out.php"><i class="fa fa-sign-out pull-right"></i><font size="2px" color="black"> ออกจากระบบ </font></a>
                  </div>
                  -->
                  
                   <li class="nav-item dropdown open" style="padding-left: 15px;">
                   </li>  
                   <div class="col-md-12" align="right" > 
                   <table width="100%">
                   	<tr>
                   		<td align="right">
					   <button class="btn btn-sm" style="background-color: #F53D2D; border-radius: 10px; ">  
						<font size="2px" color="#FFF" style="font-size: 14px;">
						&nbsp;&nbsp;
						  ยินดีตอนรับคุณ  
						<?php echo $_SESSION["Fullname"]; ?>
						สถานะ <?php if($_SESSION["Status"] == "A"){ echo "แอดมิน"; }else{ echo $_SESSION["Status"];  }  ?> 
						&nbsp;&nbsp;
						</font>  
					   </button>
                    
						&nbsp;&nbsp;&nbsp;&nbsp;

						<a href="profile.php" style=" margin-top: -15px; ">   
					    <button class="btn btn-sm"  >  
						<font size="2px" color="#FFF" style="font-size: 14px;"> 
						<img src="images/v1.png" style="width: 15px;" > &nbsp; แก้ไขข้อมูล    </font>    
					    </button>
					    </a> 

						&nbsp;&nbsp;&nbsp;&nbsp;

						<a href="../check_out.php" style="text-decoration-line: none; ">  
					    <button class="btn btn-sm"  >  
               			 <img src="images/v2.png" style="width: 15px;" >  <font size="2px" color="#FFF" style="font-size: 14px;"> &nbsp; ออกจากระบบ    </font>   
					     </button>  
               			 </a>
                
                   		</td>
                   	</tr>
                   </table>
                   
                   </div> 
                     
                      
                    
                   
                </li> 
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

		  <style> 
						@media only screen and (max-width: 767px){
							.tablemobile{
								width: 1280px;
							}
						} 
						</style>	 
       