<?php
session_start();

$_SESSION['Apartment'] = $_POST['Apartment'];
$_SESSION['Password'] = $_POST['Password'];

//header('Location: account.php');

$apartment = $_SESSION['Apartment'];
$pass = $_SESSION['Password'];


?>

<!DOCTYPE html>

<html>
<head>   
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body>

<?php



$Apartment = $_POST["Apartment"];
$Password  = $_POST["Password"];
$Confirm   = $_POST["Confirm"];
	
$conn = mysqli_connect("localhost","root","root","laundry");
if(!$conn){
	echo "NO CONNECTION";
}

	
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
		//echo "SUCESSFULLY CONNECTED!</br>";
		$sql="insert into laundrydata (Apartment, Password, Confirm) 
		values ('$Apartment','$Password','$Confirm')";
		$result = (mysqli_query($conn,$sql));
		if($result){
			echo "<h1 class='h1'>Thank you for signing up to Apartment ".$apartment."</h1>";
			echo "<h2 class='h2'>To go to your account home page click on the link below.</h2>";
			echo "<a class='btn btn-primary btn-large' href='account.php' role='button' >Account Home</a>";
			//echo "ROW INSERTED.";
		}
	}
}
?>




</body>
</html>
