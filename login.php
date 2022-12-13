<?php 

session_start();

$_SESSION['Apartment'] = $_POST['Apartment'];
$_SESSION['Password'] = $_POST['Password'];


$Apartment = $_POST["Apartment"];
$Password  = $_POST["Password"];
$Confirm   = $_POST["Confirm"];

$conn = mysqli_connect("localhost","root","root","laundry");
if(!$conn){
	echo "NO CONNECTION";
}

	
else{
	$query = "select * from laundrydata where Apartment = '$Apartment' and Password = '$Password'";
	$res= mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){
		$row = mysqli_fetch_assoc($res);
		if(($Apartment == isset($row['Apartment'])) &&($Password == isset($row['Password'])) ){
			header('Location: account.php');
		}
	}else {
        echo"Make sure the Apartment and Password are correct";
    }
}


?>
