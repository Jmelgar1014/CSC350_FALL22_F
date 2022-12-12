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
else{
	$query = "select * from laundrydata where Apartment = '$Apartment'";
	$res= mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){
		$row = mysqli_fetch_assoc($res);
		if($Apartment == isset($row['Apartment'])){
			echo "Apartment is already taken";
		}
	}else
	{
		echo "SUCESSFULLY CONNECTED!</br>";
		$sql="insert into laundrydata (Apartment, Password, Confirm) 
		values ('$Apartment','$Password','$Confirm')";
		$result = (mysqli_query($conn,$sql));
		if($result){

			echo "ROW INSERTED.";
		}
?>
</body>
</html>
