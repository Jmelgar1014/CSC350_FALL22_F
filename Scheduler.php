<?php
$mysqli = new mysqli( "localhost","root","root", "laundry") or die("Error " . mysqli_error($conn));;
if(!$mysqli){
  echo "Failed to connect to Database";
}
else
	date_default_timezone_set("America/New_York");
	$day = date("Y-m-d G:i:s");	
	$sql = "select timeinterval, FullDate, taken from weekschedule where FullDate > '$day' ";
	

$result = mysqli_query($mysqli, $sql);

	$I = 0;
	$strD = strtotime("Today + $I day");
	$NoD = date("l", $strD);

	if (!$result){
		echo "Error has occur";
	}
	else{
		if(mysqli_num_rows($result) > 0)
		{
		echo "<style>
			    table, th, td {
			    border:1px solid black;
				}
			  </style>";
		echo "<table cellspacing = '0' >";
		echo "<td>";
		echo "<table cellspacing = '0'>";
		echo "<tr><td>$NoD</td></tr> ";
		while ($row = mysqli_fetch_assoc($result)) {
			if($row["taken"] == 1 && $row["timeinterval"] == '12:00:00 AM - 02:00:00 AM')
			{
			echo "<strike>";
			$I = $I + 1;
			$strD = strtotime("Today + $I day");
			$NoD = date("l", $strD);
			echo "</table> </td> <td> <table cellspacing = '0'> <tr><td>$NoD</td></tr>";
			printf("<td>%s</td>", $row["timeinterval"]);	
			echo "</strike>";}
		
			else if($row["timeinterval"] == '12:00:00 AM - 02:00:00 AM'){
			$I = $I + 1;
			$strD = strtotime("Today + $I day");
			$NoD = date("l", $strD);
			echo "</table> </td> <td> <table cellspacing = '0'> <tr><td>$NoD</td></tr>";
				printf("<td>%s</td>", $row["timeinterval"]);	
			}
			
			else if($row["taken"] == 1){
			echo "<tr><td>";				
			echo "<strike>";	
			printf("%s", $row["timeinterval"]);
			echo "</strike>";
			echo "</td></tr>";

			
			}
			else{
			echo "<tr><td>";				
			printf("%s", $row["timeinterval"]);
			echo "</td></tr>";
			}
		}
		echo "</table>";
		echo "</table>";
		}
	}
echo '<center><form action="verify.php" method="post" onsubmit= "confirmation()";>';


echo '<tr><td><label for="Schedule">Choose a Day and a Time Slot:</label>';

echo '
<select name="NoD" id="NoD">

  <option value="Monday">Monday</option>

  <option value="Tuesday">Tuesday</option>

  <option value="Wednesday">Wednesday</option>
  
  <option value="Thursday">Thursday</option>
  
  <option value="Friday">Friday</option>
  
  <option value="Saturday">Saturday</option>
  
  <option value="Sunday">Sunday</option>

</select>';

echo '<select name="TimeSlot" id="TimeSlot">';
echo  '<option value="12:00:00 AM - 02:00:00 AM">12:00:00 AM - 02:00:00 AM</option>';
echo  '<option value="02:00:00 AM - 04:00:00 AM">02:00:00 AM - 04:00:00 AM</option>';
echo  '<option value="04:00:00 AM - 06:00:00 AM">04:00:00 AM - 06:00:00 AM</option>'; 
echo '<option value="06:00:00 AM - 08:00:00 AM">06:00:00 AM - 08:00:00 AM</option>'; 
echo '<option value="08:00:00 AM - 10:00:00 AM">08:00:00 AM - 10:00:00 AM</option>'; 
echo '<option value="10:00:00 AM - 12:00:00 PM">10:00:00 AM - 12:00:00 PM</option>';
echo  '<option value="12:00:00 PM - 02:00:00 PM">12:00:00 PM - 02:00:00 PM</option>';
echo  '<option value="02:00:00 PM - 04:00:00 PM">02:00:00 PM - 04:00:00 PM</option>';  
echo  '<option value="04:00:00 PM - 06:00:00 PM">04:00:00 PM - 06:00:00 PM</option>';  
echo '<option value="06:00:00 PM - 08:00:00 PM">06:00:00 PM - 08:00:00 PM</option>';
echo '<option value="08:00:00 PM - 10:00:00 PM">08:00:00 PM - 10:00:00 PM</option>';
echo '<option value="10:00:00 PM - 12:00:00 PM">10:00:00 PM - 12:00:00 AM</option>';
  
 echo "<script>
 function confirmation()
	{
       if (confirm('Do you want this slot')) {
		HTMLFormElement.submit();
       } 
	   else 
	   {
           return false;
       }
    }";
 
echo "</script>";
echo  '<input type="submit" value="submit" name="submit">'; 

		mysqli_close($mysqli);
?>