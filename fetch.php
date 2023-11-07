<?php
session_start(); 
header('Content-Type: application/json'); 
include('database.php'); 

$member_user = $_SESSION["UserID2"];
 
$query = "SELECT * FROM list_order WHERE bill_no = '' and create_by = '".$member_user."'  "; 
$result = mysqli_query($con, $query);
$output = '';

$countid = 0;
$totalall = 0;
$totalall2 = 0;
$sumall = 0;  
if(mysqli_num_rows($result) > 0)
{
	 
while($row = mysqli_fetch_array($result)) 
{   
	$countid++;	 
	
	$totalall = 0;
	$sql = "SELECT * FROM list_order where create_by = '".$_SESSION["UserID2"] ."' and bill_no = ''  "; 
	$query = mysqli_query($objCon,$sql); 
	while($objResult = mysqli_fetch_array($query))
	{ 
		$totalall++;
	} 
									
}
} else{
   $output .= '    ';
} 

	 $data = array(
	   'notification' => $totalall,
	   'unseen_notification'  => $totalall2, 
	   'countid'  => $countid 
	);

echo json_encode($data);
	
	  

?>
