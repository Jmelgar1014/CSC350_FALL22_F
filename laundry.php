<!DOCTYPE html>
<link rel = "stylesheet" href = "style.css">
<html>
<head>   
<h1> SIGN UP SUCCESSFULLY </h1>
</head>
<body>
<?php
$Apartment = $_POST["Apartment"];
$Password  = $_POST["Password"];
$Confirm   = $_POST["Confirm"];

$conn = mysqli_connect("localhost","root","root","laundry");
if(!$conn)
	echo "NO CONNECTION";
else
{
	echo "SUCESSFULLY CONNECTED!</br>";
	$sql="insert into laundrydata (Apartment, Password, Confirm) 
	values ('$Apartment','$Password','$Confirm')";
	if(mysqli_query($conn,$sql))
		echo "ROW INSERTED.";
	else
		echo "SORRY, ROW NOT INSERTED BECAUSE THE APARTMENT IS ALREADY INSERTED.";
}
?>
</body>
</html>