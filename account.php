/*<?php
    session_start();

    $apartment = $_SESSION['Apartment'];
    $pass = $_SESSION['Password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Home</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body>
    <h1 class="h1 d-flex justify-content-center">Welcome <?php echo $apartment ?></h1>
</body>
</html> */
  
<?php
$mysqli = new mysqli( "localhost","root","root", "laundry") or die("Error " . mysqli_error($conn));;
if(!$mysqli){
  echo "Failed to connect to Database";
}
session_start();
$sql = "SELECT * FROM WeekSchedule WHERE Apartment='".$_SESSION['Apartment']."'"; 

$result = mysqli_query($connect, $sql); 	// Send the query to the database


	if (mysqli_num_rows($result) > 0) 			// If there are rows present
	{
		echo "This is your time slot "; 
		echo "<table border='1'><tr><td>Date</td><td>Slot</td>";
		while($row = mysqli_fetch_assoc($result)) 									// fetch next row
		{ 																			// display the data
			echo "<tr><td>". $row["nameofday"]."</td><td>". $row["timeinterval"]."</td></tr>";
			//output data of the row
		}
		echo "</table>"; 
	}
	else
	{
		
		header('Location:Scheduler.php');
	}


$sql3 = "select * from weekschedule";
$result3 = mysqli_query($mysqli, $sql3);
if(mysqli_num_rows($result3) == 0){
$mysqli->query("CALL LoadDate()");
header('Location: Scheduler.php');}

$day = date("Y-m-d G:i:s");	
$sql2 = "SELECT FULLDATE FROM WeekSchedule ORDER BY FULLDATE DESC LIMIT 1";  
$result2 = mysqli_query($mysqli, $sql2);
while ($row = mysqli_fetch_assoc($result2)){
if ($day > $row['FULLDATE'])
$mysqli->query("CALL reset()");
header('Location: Scheduler.php');
}
?>
