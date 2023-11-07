<?php    
    
    echo "<h1> QR Code TEST</h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    

        // user data
    $filename = $PNG_TEMP_DIR.'test'.md5("https://10.0.0.1".'|'."L".'|'."10").'.png';
    QRcode::png("https://10.0.0.1", $filename, "L", "10", 2);    
    
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
	
	echo $PNG_WEB_DIR.basename($filename);
	?>
    
   
      

    