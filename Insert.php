<?php
	$servername="localhost";
	$username="root";
	$password= "root";
	$connect=mysqli_connect($servername,$username,$password);
	//checking connection
	if(!$connect)  die("Error"); //else echo "connected";

$check="Select *FROM laundry.WeekSchedule WHERE timeinterval='".$_REQUEST['timeSlot']."' AND nameofday='".$_REQUEST['NoD']."'AND Apartment= "" ";

$result= mysqli_query($connect, $check);		
		//echo $sql;
session_start();
if(mysqli_num_rows($result)>0)
{
$sql = "INSERT INTO laundry.WeekSchedule WHERE timeinterval='".$_REQUEST['timeSlot']."' AND nameofday='".$_REQUEST['NoD']."' (Apartment)
	VALUES ('".$_SESSION['Apartment']."')";

$result = mysqli_query($connect, $sql); 
	// Send the query to the database
	if($result)
	{
		echo "You have been Schedule for: ".$_SESSION['timeSlot']." at ".$_SESSION['NoD']." ";
	}

}		
else
{

	echo "Schedule has been taken";//mysqli_error... displays error that occurs
	echo "<a href=scheduler.php>\nPlease try again</a>";
	
}
?>