<?php
session_start(); 
header('Content-Type: application/json');
include('../database.php');
	
		$input = file_get_contents('php://input');
		$obj = json_decode($input); 
	 
		$id = $_GET["pksave"];  

		 	 

				if(isset($_FILES['file']['name'])){

					/* Getting file name */
					$filename = $_FILES['file']['name'];
					$check_image11 = "Grimg".rand(1,9999999)."img".rand(110000,999999).".png";  

					/* Location */
					$location = "../img/".$check_image11;
					$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
					$imageFileType = strtolower($imageFileType);

					/* Valid extensions */
					$valid_extensions = array("jpg","jpeg","png");

					$response = 0;
					/* Check file extension */
					if(in_array(strtolower($imageFileType), $valid_extensions)) {
						/* Upload file */
						if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
							$response = $location;
						}
					}
					
					$strSQL = " Update product_list Set img = '".$check_image11."'  "  ;
					$strSQL .=" WHERE  pk = '".$id."'   ";
					$objQuery = mysqli_query($objCon, $strSQL); 

					
					

					echo $response;
					exit;
				}

				$data = array(
				   'ans' => "1" 
				); 


echo json_encode($data);

?>