<?php
$mysqli = new mysqli( "localhost","root","root1234!", "laundry") or die("Error " . mysqli_error($conn));;
if(!$mysqli){
  echo "Failed to connect to Database";
}
session_start();
$sql = "SELECT * FROM WeekSchedule WHERE Apartment='".$_SESSION['Apartment']."'"; 

$result = mysqli_query($mysqli, $sql); 	// Send the query to the database

$sql2 = "select * from weekschedule";
$result2 = mysqli_query($mysqli, $sql2);

{
	if (mysqli_num_rows($result) > 0) 			// If there are rows present
	{
		echo "<h3>This is your time slot<h3> "; 
		echo "<table border='1'><tr><td><center>Date</center></td><td><center>Slot</center></td>";
		while($row = mysqli_fetch_assoc($result)) 									// fetch next row
		{ 																			// display the data
			echo "<tr><td><center>". $row["nameofday"]."</center></td><td>". $row["timeinterval"]."</td></tr>";
			//output data of the row
		}
		echo "</table>"; 
	}
	else if (mysqli_num_rows($result2) == 0){
    $mysqli->query("CALL LoadDate()");
    header('Location: Scheduler.php');
	}
	else if(mysqli_num_rows($result2) > 0){
	header('Location: Scheduler.php');
	}
    else
	{
    $day = date("Y-m-d G:i:s");	
    $sql2 = "SELECT FULLDATE FROM WeekSchedule ORDER BY FULLDATE DESC LIMIT 1";  
    $result2 = mysqli_query($mysqli, $sql2);
    while ($row = mysqli_fetch_assoc($result2)){
    if ($day > $row['FULLDATE'])
    $mysqli->query("CALL reset()");
    header('Location: Scheduler.php');
    }
	}
}
?>
