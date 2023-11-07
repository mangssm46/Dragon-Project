<?php 
session_start();
include("database.php");

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
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>  DRAGON FOOTBALL SHIRT  </title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
   

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>


<style>
		@font-face {
		  font-family: IBMPlexSansThai-Regular;
		  src: url('fonts/Anuphan-VariableFont_wght.ttf'); 
		} 
		.serif1 {
		  font-family:  IBMPlexSansThai-Regular, serif;
		} 
	</style>
	
	
<body class="serif1" style=" background-color: #F5F5F5; "     >

  <div class=" ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top" style="background-color: #FF6633; border: 1px solid #FF6633; display: none;">
        <div class="container-fluid" style="background-color: #FF6633; ">
          <div class="top_nav_container" style="background-color: #FF6633; ">
            <div class="contact_nav">
              <div class=" col-lg-12 ">
              <table width="100%" >
              	<tr> 
              		<td> 
              		<img src="logo.png" style="height: 75px;" >
              		</td>
              		<td> 
              		<font color="#FFF" style=" font-size: 14px; "> 
              		DRAGON FOOTBALL SHIRT 
              		</font>
              		</td>
              	</tr>
              </table> 
              </div>
               
            </div> 
          </div>

        </div>
      </div>
      <div class="header_bottom"  style="background-color: #FF6633; ">
        <div class="container-fluid"  style="background-color: #FF6633; ">
          <nav class="navbar navbar-expand-lg custom_nav-container " s>
            
             
			<style>   
			.showbar{ 
				display: none;
			} 
			.showbarimg{ 
				display: block;
			}
			@media only screen and (max-width: 767px){ 
				.showbar{ display: block;  }
				.showbarimg{ display: none;  }
			}  
			</style>

            <div class="showbar col-md-12" align="right" style="border: 1px solid #FF6633; margin-top: 0px; "  > 
             <table width="100%" >
              	<tr> 
              		<td> 
              		<img src="logo.png" style="height: 70px;" >
              		</td>
              		<td width="80%;" align="left" > 
              		<font color="#FFF" style=" font-size: 14px; "> 
              		 DRAGON FOOTBALL SHIRT 
              		</font>
              		</td>
              		<td width="10%;" align="right"> 
					<a data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="cursor: pointer;  " >
					  <img src="images/bar.png" style="height: 30px; " >
					</a>
              		</td>
              	</tr>
              </table>  
            </div>
   
			<style>   
			.baemenudata{ 
				 
			}
			@media only screen and (max-width: 767px){ 
				.baemenudata{  -ms-flex-preferred-size: 100%;
							   flex-basis: 100%;
							   -ms-flex-positive: 1;
							   flex-grow: 1;
							    -ms-flex-align: left;
							    align-items: left;  }
			}  
			</style>
            
            <div class="collapse navbar-collapse baemenudata" id="navbarSupportedContent" style="background-color: #FF6633;  ">
             <div class=" showbarimg " style="  margin-top: 5px;  " > 
             <font color="#000" style=" font-size: 14px; "> 
            	<table width="100%" border="0">
				<tr>
					<td width="8%"> 
					 <img src="logo.png" style="  width: 45px;  " > 
					</td>
					<td> 
					<font color="#FFF" style=" font-size: 14px; "> 
						&nbsp; DRAGON FOOTBALL SHIRT  
					</font>
					</td>
				</tr>
			</table>
             			 
             </font>
             </div>
             
              
              		
              <ul class="navbar-nav "> 
                <li class="nav-item  ">
                  <a class="nav-link  " href="index.php"> <font color="#FFF" style=" font-size: 14px; ">  หน้าแรก  </font>   </a>
                </li>
                <li class="nav-item  ">
                  <a class="nav-link  " href="product.php"> <font color="#FFF" style=" font-size: 14px; ">   รายการสินค้า  </font>   </a>
                </li> 
                <li class="nav-item  ">
                  <a class="nav-link  " href="pricelow.php"> <font color="#FFF" style=" font-size: 14px; ">    สินค้าลดราคา  </font>   </a>
                </li> 
                <li class="nav-item  ">
                  <a class="nav-link  " href="preorder.php"> <font color="#FFF" style=" font-size: 14px; ">  สินค้าพรีออเดอร์  </font>   </a>
                </li> 
                <li class="nav-item  ">
                  <a class="nav-link  " href="quest.php"> <font color="#FFF" style=" font-size: 14px; ">   คำถามทั่วไป  </font>   </a>
                </li>
                <li class="nav-item  ">
                  <a class="nav-link  " href="contact.php"> <font color="#FFF" style=" font-size: 14px; ">   ติดต่อเรา   </font>   </a>
                </li> 
                
                 <?php if (empty($_SESSION['UserID2'])) { ?> 
                        <li class="nav-item">
						 <a class="nav-link  " href="register.php" >
						 <font color="#FFF" style="font-size: 14px;">
						 ลงทะเบียน </font>  
						 </a>
                        </li> 
                        <li class="nav-item">
                            <a  class="nav-link "  href="login.php"> <font color="#FFF" style="font-size: 14px;"> เข้าสู่ระบบ </font>  </a>
                        </li> 
                        <?php } else { ?>   
                        <li class="nav-item">
						<a href="cart.php"  class="nav-link" >
						<font color="#FFF">  
						<font size="3px" color="#FFF" class="serif2"  style="font-size: 14px;">  ตะกร้าสินค้า (&nbsp; <font class="count" color="#FFF" > 0 </font> &nbsp;)  </font> </font>
						</a>
						</li>
                        <li class="nav-item">
                            <a class="nav-link" href="payment.php"> <font color="#FFF" style="font-size: 14px;"> แจ้งชำระเงิน </font>  </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="backend/index.php"> <font color="#FFF" style="font-size: 14px;"> ระบบหลังบ้าน </font>  </a>
                        </li>
                        <li class="nav-item">
						<a href="check_out.php"  class="nav-link" > 
						 <font color="#FFF" style="font-size: 14px;">  ออกจากระบบ </font>
						</a>
						</li>
				<?php } ?>
                        
              </ul>
            </div>
            
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    
    
    <style>   
	.bannershow{ 
		height: 400px;
	}
	@media only screen and (max-width: 767px){ 
		.bannershow{  height: 160px;  }
	}  
	</style>
				 
   <style> 
		.top-right {
		  position: absolute;
		  top: 1px;
		  right: 16px;
		}
	   .container2 {
		  position: relative;
		  text-align: center;
		  color: white;
		}
		.centered {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		}
	</style> 
    <section class="  ">  
    <div class="container2" > 
       <img src="images/banner.png" width="100%" class=" bannershow "> 
       
       
       
	  <div class="centered">
	   
	   <font color="#000" style="font-size: 35px; "> <b>  &nbsp;	 </b>   </font>
	   <div style=" margin-top: -5px; " > &nbsp; </div>
	   <font color="#000" style="font-size: 35px; ">     &nbsp;	  </font>
	   
	  </div> 
				  
				  
    </div>  
	</section>
    <!-- end slider section -->
   

  </div>
  
  
  
	<!-- Js Plugins -->
	<script src="js/jquery-latest.min.js"></script>
 
    <script>
	$(document).ready(function(){

	 function load_unseen_notification(str)
	 {
		 
		$.ajax({
		type: "POST",
		url: "fetch.php",
		data: '',
		success: function(result) {  

		var check_number = result.countid ;
			if(check_number > 0){
				$('.count').html(check_number);
			}else{
				$('.count').html('0');

			}   
		 }
		});
	 }
 
	  setInterval(function(){  
		  var strtol = Math.random(strtol);
	  load_unseen_notification(strtol);  
	 }, 1000); 
	});
	</script>
 
 
 	<style>     
	  @media only screen and (max-width: 767px){ 
		 .leftmobiledata{  margin-left: 10px; margin-right: 10px;   } 
	  }  
	</style>
