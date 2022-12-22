<?php
	$servername="localhost";
	$username="root";
	$password= "root1234!";
	$connect=mysqli_connect($servername,$username,$password);
	//checking connection
	if(!$connect)  die("Error"); //else echo "connected";

$check="SELECT * FROM laundry.WeekSchedule WHERE timeinterval='".$_REQUEST['TimeSlot']."' AND nameofday='".$_REQUEST['NoD']."' AND Apartment=''";

$result= mysqli_query($connect, $check);
session_start();
if(mysqli_num_rows($result)>0)
{
	$sql = 
	"UPDATE laundry.WeekSchedule SET Apartment='".$_SESSION['Apartment']."' WHERE timeinterval='".$_REQUEST['TimeSlot']."' AND nameofday='".$_REQUEST['NoD']."' ";

$result = mysqli_query($connect, $sql); 
	// Send the query to the database
	if($result)
	{
		echo "<table border='1'><tr><td><center>Date</center></td><td><center>Slot</center></td>";
		echo "<h2>You have been Schedule for: </h2>";
		echo "<tr><td><center>".$_REQUEST['NoD']." </center></td>"."<td><center>" .$_REQUEST['TimeSlot']." </td></tr><center>";
		echo "</table>";

	}

}		
else
{

	echo "Schedule has been taken";//mysqli_error... displays error that occurs
	echo "<a href=scheduler.php>\nPlease try again</a>";
	
}
?>
